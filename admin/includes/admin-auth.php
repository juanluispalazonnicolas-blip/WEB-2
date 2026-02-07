<?php
/**
 * Admin Authentication Functions
 * Sistema de autenticación para panel admin
 */

require_once __DIR__ . '/admin-config.php';

// ==================================
// INICIAR SESIÓN ADMIN
// ==================================
function admin_session_start() {
    if (session_status() === PHP_SESSION_NONE) {
        session_name(ADMIN_SESSION_NAME);
        session_start();
        
        // Regenerar ID periódicamente
        if (!isset($_SESSION['last_regeneration'])) {
            $_SESSION['last_regeneration'] = time();
        } elseif (time() - $_SESSION['last_regeneration'] > 300) {
            session_regenerate_id(true);
            $_SESSION['last_regeneration'] = time();
        }
    }
}

// ==================================
// VERIFICAR SI ESTÁ LOGUEADO
// ==================================
function is_admin_logged_in() {
    admin_session_start();
    
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        return false;
    }
    
    // Verificar timeout
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > ADMIN_SESSION_TIMEOUT)) {
        admin_logout();
        return false;
    }
    
    $_SESSION['last_activity'] = time();
    return true;
}

// ==================================
// REQUERIR LOGIN (proteger páginas)
// ==================================
function require_admin_login() {
    if (!is_admin_logged_in()) {
        header('Location: /admin/login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
        exit();
    }
}

// ==================================
// INTENTAR LOGIN
// ==================================
function admin_attempt_login($username, $password) {
    admin_session_start();
    
    // Rate limiting básico (por IP)
    $ip = $_SERVER['REMOTE_ADDR'];
    $attempts_key = 'login_attempts_' . md5($ip);
    $lockout_key = 'login_lockout_' . md5($ip);
    
    // Verificar si está bloqueado
    if (isset($_SESSION[$lockout_key]) && $_SESSION[$lockout_key] > time()) {
        $remaining = $_SESSION[$lockout_key] - time();
        return [
            'success' => false,
            'message' => "Demasiados intentos fallidos. Intenta de nuevo en " . ceil($remaining / 60) . " minutos."
        ];
    }
    
    // Verificar credenciales
    if ($username === ADMIN_USERNAME && password_verify($password, ADMIN_PASSWORD_HASH)) {
        // Login exitoso
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_login_time'] = time();
        $_SESSION['last_activity'] = time();
        
        // Limpiar intentos
        unset($_SESSION[$attempts_key]);
        unset($_SESSION[$lockout_key]);
        
        return [
            'success' => true,
            'message' => 'Login exitoso'
        ];
    } else {
        // Login fallido
        if (!isset($_SESSION[$attempts_key])) {
            $_SESSION[$attempts_key] = 0;
        }
        $_SESSION[$attempts_key]++;
        
        $attempts_left = ADMIN_MAX_LOGIN_ATTEMPTS - $_SESSION[$attempts_key];
        
        if ($_SESSION[$attempts_key] >= ADMIN_MAX_LOGIN_ATTEMPTS) {
            $_SESSION[$lockout_key] = time() + ADMIN_LOCKOUT_TIME;
            return [
                'success' => false,
                'message' => 'Cuenta bloqueada por 15 minutos por múltiples intentos fallidos.'
            ];
        }
        
        return [
            'success' => false,
            'message' => "Credenciales incorrectas. Te quedan $attempts_left intentos."
        ];
    }
}

// ==================================
// LOGOUT
// ==================================
function admin_logout() {
    admin_session_start();
    $_SESSION = [];
    session_destroy();
    setcookie(ADMIN_SESSION_NAME, '', time() - 3600, '/');
}

// ==================================
// CSRF PROTECTION
// ==================================
function generate_csrf_token() {
    admin_session_start();
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    admin_session_start();
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
