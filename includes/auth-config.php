<?php
/**
 * Configuración del Sistema de Autenticación
 * Praxis Seguridad
 */

// Cargar configuración de Resend (si existe)
if (file_exists(__DIR__ . '/resend-config.php')) {
    require_once __DIR__ . '/resend-config.php';
}

// =====================================================
// CONFIGURACIÓN DE SEGURIDAD
// =====================================================

// Duración de sesiones
define('AUTH_SESSION_LIFETIME', 24 * 3600); // 24 horas
define('AUTH_REMEMBER_LIFETIME', 30 * 24 * 3600); // 30 días

// Rate limiting
define('AUTH_MAX_LOGIN_ATTEMPTS', 5);
define('AUTH_LOGIN_ATTEMPT_WINDOW', 3600); // 1 hora

// Password requirements
define('AUTH_MIN_PASSWORD_LENGTH', 8);
define('AUTH_REQUIRE_UPPERCASE', true);
define('AUTH_REQUIRE_NUMBER', true);
define('AUTH_REQUIRE_SPECIAL_CHAR', false);

// Tokens
define('AUTH_TOKEN_EXPIRE_HOURS', 24);
define('AUTH_RESET_TOKEN_EXPIRE_HOURS', 2);

// =====================================================
// CONFIGURACIÓN DE EMAILS
// =====================================================

// Definir constantes de email si no están definidas en resend-config.php
if (!defined('EMAIL_FROM')) {
    define('EMAIL_FROM', 'info@praxisseguridad.es');
}
if (!defined('EMAIL_FROM_NAME')) {
    define('EMAIL_FROM_NAME', 'Praxis Seguridad');
}
if (!defined('EMAIL_REPLY_TO')) {
    define('EMAIL_REPLY_TO', 'info@praxisseguridad.es');
}

// Mantener constantes antiguas para compatibilidad
define('AUTH_FROM_EMAIL', EMAIL_FROM);
define('AUTH_FROM_NAME', EMAIL_FROM_NAME);
define('AUTH_REPLY_TO', EMAIL_REPLY_TO);

// Asuntos
define('AUTH_VERIFY_SUBJECT', 'Verifica tu cuenta - Praxis Seguridad');
define('AUTH_WELCOME_SUBJECT', '¡Bienvenido a Praxis Seguridad!');
define('AUTH_RESET_SUBJECT', 'Restablecer contraseña - Praxis Seguridad');

// =====================================================
// URLS
// =====================================================

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$base_url = $protocol . $host;

define('AUTH_BASE_URL', $base_url);
define('AUTH_VERIFY_URL', $base_url . '/auth/verify-email.php');
define('AUTH_RESET_URL', $base_url . '/auth/reset-password.php');
define('AUTH_LOGIN_URL', $base_url . '/auth/login.php');
define('AUTH_DASHBOARD_URL', $base_url . '/user/dashboard.php');

// =====================================================
// PATHS
// =====================================================

define('AUTH_TEMPLATES_DIR', dirname(__DIR__) . '/includes/email-templates/');
define('AUTH_LOGS_DIR', dirname(__DIR__) . '/logs/');

// =====================================================
// NIVELES DE USUARIO
// =====================================================

define('USER_LEVEL_REGISTERED', 'registrado');
define('USER_LEVEL_CLIENT', 'cliente');
define('USER_LEVEL_PREMIUM', 'premium');

// =====================================================
// BADGES
// =====================================================

$BADGES_CONFIG = [
    'nuevo_miembro' => [
        'nombre' => '🎯 Nuevo Miembro',
        'descripcion' => 'Completaste tu registro',
        'puntos' => 10,
        'icono' => '🎯'
    ],
    'email_verificado' => [
        'nombre' => '✅ Email Verificado',
        'descripcion' => 'Verificaste tu email',
        'puntos' => 20,
        'icono' => '✅'
    ],
    'analista' => [
        'nombre' => '📊 Analista',
        'descripcion' => 'Completaste la calculadora de riesgo',
        'puntos' => 50,
        'icono' => '📊'
    ],
    'estudioso' => [
        'nombre' => '📚 Estudioso',
        'descripcion' => 'Descargaste 3 recursos',
        'puntos' => 30,
        'icono' => '📚'
    ],
    'planificador' => [
        'nombre' => '💾 Planificador',
        'descripcion' => 'Guardaste tu primera cotización',
        'puntos' => 25,
        'icono' => '💾'
    ],
    'primera_compra' => [
        'nombre' => '🛒 Primera Compra',
        'descripcion' => 'Realizaste tu primer pedido',
        'puntos' => 100,
        'icono' => '🛒'
    ],
    'cliente_fiel' => [
        'nombre' => '🔄 Cliente Fiel',
        'descripcion' => 'Realizaste tu segunda compra',
        'puntos' => 150,
        'icono' => '🔄'
    ],
    'vip' => [
        'nombre' => '💎 VIP',
        'descripcion' => 'Te suscribiste al plan Premium',
        'puntos' => 200,
        'icono' => '💎'
    ],
    'influencer' => [
        'nombre' => '📣 Influencer',
        'descripcion' => 'Referiste 3 amigos',
        'puntos' => 200,
        'icono' => '📣'
    ]
];

// =====================================================
// SISTEMA DE PUNTOS
// =====================================================

$PUNTOS_RECOMPENSAS = [
    50 => ['tipo' => 'descuento', 'valor' => 5, 'descripcion' => '5€ descuento'],
    100 => ['tipo' => 'descuento', 'valor' => 10, 'descripcion' => '10€ descuento'],
    200 => ['tipo' => 'accesorio', 'valor' => 0, 'descripcion' => 'Accesorio gratis'],
    500 => ['tipo' => 'garantia', 'valor' => 0, 'descripcion' => 'Extensión garantía 1 año']
];

// =====================================================
// DESCUENTOS
// =====================================================

define('AUTH_FIRST_PURCHASE_DISCOUNT', 5); // 5% descuento primera compra

// =====================================================
// LOGS Y DEBUG
// =====================================================

define('AUTH_LOG_FILE', AUTH_LOGS_DIR . 'auth.log');
define('AUTH_DEBUG_MODE', false);

// =====================================================
// HELPER FUNCTIONS
// =====================================================

/**
 * Generar token aleatorio seguro
 */
function auth_generate_token($length = 32) {
    return bin2hex(random_bytes($length));
}

/**
 * Hash de password
 */
function auth_hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

/**
 * Verificar password
 */
function auth_verify_password($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Validar email
 */
function auth_validate_email($email) {
    $email = trim($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    
    // Verificar formato con regex
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        return false;
    }
    
    return true;
}

/**
 * Validar password
 */
function auth_validate_password($password) {
    $errors = [];
    
    if (strlen($password) < AUTH_MIN_PASSWORD_LENGTH) {
        $errors[] = 'La contraseña debe tener al menos ' . AUTH_MIN_PASSWORD_LENGTH . ' caracteres';
    }
    
    if (AUTH_REQUIRE_UPPERCASE && !preg_match('/[A-Z]/', $password)) {
        $errors[] = 'La contraseña debe contener al menos una mayúscula';
    }
    
    if (AUTH_REQUIRE_NUMBER && !preg_match('/[0-9]/', $password)) {
        $errors[] = 'La contraseña debe contener al menos un número';
    }
    
    if (AUTH_REQUIRE_SPECIAL_CHAR && !preg_match('/[^a-zA-Z0-9]/', $password)) {
        $errors[] = 'La contraseña debe contener al menos un carácter especial';
    }
    
    return empty($errors) ? true : $errors;
}

/**
 * Sanitizar input
 */
function auth_sanitize($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Obtener IP del usuario
 */
function auth_get_user_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }
}

/**
 * Obtener User Agent
 */
function auth_get_user_agent() {
    return $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
}

/**
 * Enviar email usando Resend API
 * Documentación: https://resend.com/docs/send-with-php
 */
function auth_send_email($to, $subject, $body, $is_html = false) {
    // Verificar si Resend está configurado
    if (!defined('RESEND_API_KEY') || empty(RESEND_API_KEY) || RESEND_API_KEY === 'your_resend_api_key_here') {
        // Fallback a PHP mail() si Resend no está configurado (NO RECOMENDADO para producción)
        auth_log("WARNING: Resend no configurado, usando PHP mail() - Los emails pueden ir a SPAM");
        
        $headers = "From: " . EMAIL_FROM_NAME . " <" . EMAIL_FROM . ">\r\n";
        $headers .= "Reply-To: " . EMAIL_FROM . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        
        if ($is_html) {
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        }
        
        $success = mail($to, $subject, $body, $headers);
        auth_log("Email enviado a {$to} vía PHP mail(): " . ($success ? 'OK' : 'FAIL'));
        return $success;
    }
    
    // Usar Resend API
    $data = [
        'from' => EMAIL_FROM_NAME . ' <' . EMAIL_FROM . '>',
        'to' => [$to],
        'subject' => $subject,
        'html' => $is_html ? $body : '<pre>' . htmlspecialchars($body) . '</pre>',
    ];
    
    // Si hay reply-to configurado
    if (defined('EMAIL_REPLY_TO') && !empty(EMAIL_REPLY_TO)) {
        $data['reply_to'] = EMAIL_REPLY_TO;
    }
    
    $ch = curl_init('https://api.resend.com/emails');
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . RESEND_API_KEY,
        'Content-Type: application/json'
    ]);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($ch);
    
    curl_close($ch);
    
    // Parsear respuesta
    $result = json_decode($response, true);
    
    // Verificar si fue exitoso
    $success = ($http_code >= 200 && $http_code < 300);
    
    // Log detallado
    if ($success) {
        $email_id = $result['id'] ?? 'unknown';
        auth_log("Email enviado a {$to} vía Resend: OK (ID: {$email_id})");
    } else {
        $error_msg = $result['message'] ?? $curl_error ?? 'Unknown error';
        auth_log("ERROR: Email a {$to} vía Resend FALLÓ: {$error_msg} (HTTP {$http_code})");
    }
    
    return $success;
}
/**
 * Logging
 */
function auth_log($message, $level = 'info') {
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[{$timestamp}] [{$level}] {$message}\n";
    
    if (!file_exists(AUTH_LOGS_DIR)) {
        mkdir(AUTH_LOGS_DIR, 0755, true);
    }
    
    file_put_contents(AUTH_LOG_FILE, $log_message, FILE_APPEND);
}

/**
 * Generar nombre completo
 */
function auth_get_full_name($nombre, $apellidos = '') {
    return trim($nombre . ' ' . $apellidos);
}

/**
 * Validar teléfono español
 */
function auth_validate_phone($phone) {
    // Permitir formato: +34 XXX XXX XXX, 34XXXXXXXXX, XXXXXXXXX
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    
    if (preg_match('/^\+?34[6-9][0-9]{8}$/', $phone)) {
        return true;
    }
    
    if (preg_match('/^[6-9][0-9]{8}$/', $phone)) {
        return true;
    }
    
    return false;
}

/**
 * Validar código postal español
 */
function auth_validate_postal_code($code) {
    return preg_match('/^[0-5][0-9]{4}$/', $code);
}
