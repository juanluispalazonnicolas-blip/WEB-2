<?php
/**
 * Funciones de Autenticación de Usuarios
 * Praxis Seguridad
 */

require_once __DIR__ . '/auth-config.php';
require_once __DIR__ . '/db.php';

// =====================================================
// GESTIÓN DE USUARIOS
// =====================================================

/**
 * Crear nuevo usuario
 */
function user_create($data) {
    // Validar datos requeridos
    $required = ['email', 'password', 'nombre'];
    foreach ($required as $field) {
        if (empty($data[$field])) {
            return ['success' => false, 'error' => "El campo {$field} es requerido"];
        }
    }
    
    // Validar email
    if (!auth_validate_email($data['email'])) {
        return ['success' => false, 'error' => 'Email inválido'];
    }
    
    // Validar password
    $password_check = auth_validate_password($data['password']);
    if ($password_check !== true) {
        return ['success' => false, 'error' => implode(', ', $password_check)];
    }
    
    // Verificar si email ya existe
    $existing = supabase_query(
        'users',
        'GET',
        null,
        'select=id&email=eq.' . urlencode($data['email'])
    );
    
    if (!empty($existing['data'])) {
        return ['success' => false, 'error' => 'Este email ya está registrado'];
    }
    
    // Hash password
    $password_hash = auth_hash_password($data['password']);
    
    // Generar token verificación
    $token = auth_generate_token();
    
    // Preparar datos
    $user_data = [
        'email' => auth_sanitize($data['email']),
        'password_hash' => $password_hash,
        'nombre' => auth_sanitize($data['nombre']),
        'apellidos' => isset($data['apellidos']) ? auth_sanitize($data['apellidos']) : null,
        'telefono' => isset($data['telefono']) ? auth_sanitize($data['telefono']) : null,
        'ciudad' => isset($data['ciudad']) ? auth_sanitize($data['ciudad']) : null,
        'provincia' => isset($data['provincia']) ? auth_sanitize($data['provincia']) : null,
        'codigo_postal' => isset($data['codigo_postal']) ? auth_sanitize($data['codigo_postal']) : null,
        'tipo_propiedad' => isset($data['tipo_propiedad']) ? $data['tipo_propiedad'] : 'vivienda',
        'token_verificacion' => $token,
        'email_verificado' => false,
        'activo' => true
    ];
    
    // Insertar en BD
    $result = supabase_query('users', 'POST', $user_data);
    
    if (!$result['success']) {
        auth_log("Error crear usuario: " . $result['error'], 'error');
        return ['success' => false, 'error' => 'Error al crear usuario'];
    }
    
    $user = $result['data'][0] ?? null;
    
    if (!$user) {
        return ['success' => false, 'error' => 'Error al crear usuario'];
    }
    
    // Enviar email de verificación
    user_send_verification_email($user['email'], $token);
    
    // Log
    auth_log("Usuario creado: {$user['email']} (ID: {$user['id']})");
    
    return [
        'success' => true,
        'user_id' => $user['id'],
        'email' => $user['email'],
        'token' => $token
    ];
}

/**
 * Verificar email con token
 */
function user_verify_email($token) {
    if (empty($token)) {
        return ['success' => false, 'error' => 'Token requerido'];
    }
    
    // Buscar usuario por token
    $result = supabase_query(
        'users',
        'GET',
        null,
        'select=id,email,email_verificado&token_verificacion=eq.' . urlencode($token)
    );
    
    if (empty($result['data'])) {
        return ['success' => false, 'error' => 'Token inválido'];
    }
    
    $user = $result['data'][0];
    
    // Si ya está verificado
    if ($user['email_verificado']) {
        return ['success' => true, 'already_verified' => true, 'user_id' => $user['id']];
    }
    
    // Actualizar usuario
    $update = supabase_query(
        'users',
        'PATCH',
        ['email_verificado' => true],
        'id=eq.' . $user['id']
    );
    
    if (!$update['success']) {
        return ['success' => false, 'error' => 'Error al verificar email'];
    }
    
    // Otorgar badges
    global $BADGES_CONFIG;
    user_award_badge($user['id'], 'email_verificado');
    
    // Enviar email de bienvenida
    user_send_welcome_email($user['email']);
    
    auth_log("Email verificado: {$user['email']}");
    
    return ['success' => true, 'user_id' => $user['id']];
}

/**
 * Login de usuario
 */
function user_login($email, $password, $remember = false) {
    // Validar
    if (empty($email) || empty($password)) {
        return ['success' => false, 'error' => 'Email y contraseña requeridos'];
    }
    
    // Buscar usuario
    $result = supabase_query(
        'users',
        'GET',
        null,
        'select=id,email,password_hash,email_verificado,activo,nombre,apellidos,nivel_usuario,puntos&email=eq.' . urlencode($email)
    );
    
    if (empty($result['data'])) {
        auth_log("Login fallido: email no encontrado - {$email}", 'warning');
        return ['success' => false, 'error' => 'Credenciales incorrectas'];
    }
    
    $user = $result['data'][0];
    
    // Verificar si está activo
    if (!$user['activo']) {
        return ['success' => false, 'error' => 'Cuenta desactivada'];
    }
    
    // Verificar password
    if (!auth_verify_password($password, $user['password_hash'])) {
        auth_log("Login fallido: password incorrecta - {$email}", 'warning');
        return ['success' => false, 'error' => 'Credenciales incorrectas'];
    }
    
    // Verificar email
    if (!$user['email_verificado']) {
        return [
            'success' => false,
            'error' => 'Debes verificar tu email antes de iniciar sesión',
            'email_not_verified' => true
        ];
    }
    
    // Crear sesión
    $session = user_create_session($user['id'], $remember);
    
    if (!$session['success']) {
        return ['success' => false, 'error' => 'Error al crear sesión'];
    }
    
    // Actualizar último acceso
    supabase_query(
        'users',
        'PATCH',
        ['ultimo_acceso' => date('Y-m-d\TH:i:sP')],
        'id=eq.' . $user['id']
    );
    
    auth_log("Login exitoso: {$email}");
    
    return [
        'success' => true,
        'user' => [
            'id' => $user['id'],
            'email' => $user['email'],
            'nombre' => $user['nombre'],
            'apellidos' => $user['apellidos'],
            'nivel' => $user['nivel_usuario'],
            'puntos' => $user['puntos']
        ],
        'session_token' => $session['token']
    ];
}

/**
 * Logout
 */
function user_logout($session_token) {
    if (empty($session_token)) {
        return ['success' => false];
    }
    
    // Desactivar sesión
    $result = supabase_query(
        'user_sessions',
        'PATCH',
        ['activo' => false],
        'session_token=eq.' . urlencode($session_token)
    );
    
    // Limpiar cookies
    setcookie('session_token', '', time() - 3600, '/');
    setcookie('remember_token', '', time() - 3600, '/');
    
    return ['success' => true];
}

// =====================================================
// GESTIÓN DE SESIONES
// =====================================================

/**
 * Crear sesión
 */
function user_create_session($user_id, $remember = false) {
    $session_token = auth_generate_token();
    $remember_token = $remember ? auth_generate_token() : null;
    
    $expiration = time() + AUTH_SESSION_LIFETIME;
    
    $session_data = [
        'user_id' => $user_id,
        'session_token' => $session_token,
        'remember_token' => $remember_token,
        'ip_address' => auth_get_user_ip(),
        'user_agent' => auth_get_user_agent(),
        'fecha_expiracion' => date('Y-m-d\TH:i:sP', $expiration),
        'activo' => true
    ];
    
    $result = supabase_query('user_sessions', 'POST', $session_data);
    
    if (!$result['success']) {
        return ['success' => false, 'error' => 'Error al crear sesión'];
    }
    
    // Establecer cookies
    setcookie('session_token', $session_token, $expiration, '/', '', true, true);
    
    if ($remember) {
        $remember_expiration = time() + AUTH_REMEMBER_LIFETIME;
        setcookie('remember_token', $remember_token, $remember_expiration, '/', '', true, true);
    }
    
    return ['success' => true, 'token' => $session_token];
}

/**
 * Verificar sesión actual
 */
function user_check_session() {
    $session_token = $_COOKIE['session_token'] ?? null;
    
    if (!$session_token) {
        return null;
    }
    
    // Buscar sesión
    $result = supabase_query(
        'user_sessions',
        'GET',
        null,
        'select=user_id,fecha_expiracion,activo&session_token=eq.' . urlencode($session_token)
    );
    
    if (empty($result['data'])) {
        return null;
    }
    
    $session = $result['data'][0];
    
    // Verificar si está activa
    if (!$session['activo']) {
        return null;
    }
    
    // Verificar expiración
    if (strtotime($session['fecha_expiracion']) < time()) {
        return null;
    }
    
    // Obtener datos del usuario
    $user_result = supabase_query(
        'users',
        'GET',
        null,
        'select=id,email,nombre,apellidos,nivel_usuario,puntos,email_verificado,activo&id=eq.' . $session['user_id']
    );
    
    if (empty($user_result['data'])) {
        return null;
    }
    
    $user = $user_result['data'][0];
    
    // Actualizar último uso de sesión
    supabase_query(
        'user_sessions',
        'PATCH',
        ['ultimo_uso' => date('Y-m-d\TH:i:sP')],
        'session_token=eq.' . urlencode($session_token)
    );
    
    return $user;
}

/**
 * Requerir login (middleware)
 */
function user_require_login() {
    $user = user_check_session();
    
    if (!$user) {
        header('Location: ' . AUTH_LOGIN_URL . '?redirect=' . urlencode($_SERVER['REQUEST_URI']));
        exit;
    }
    
    return $user;
}

// =====================================================
// BADGES Y PUNTOS
// =====================================================

/**
 * Otorgar badge a usuario
 */
function user_award_badge($user_id, $badge_type) {
    global $BADGES_CONFIG;
    
    if (!isset($BADGES_CONFIG[$badge_type])) {
        return false;
    }
    
    $badge = $BADGES_CONFIG[$badge_type];
    
    // Verificar si ya tiene el badge
    $existing = supabase_query(
        'user_badges',
        'GET',
        null,
        'select=id&user_id=eq.' . $user_id . '&badge_tipo=eq.' . urlencode($badge_type)
    );
    
    if (!empty($existing['data'])) {
        return false; // Ya tiene el badge
    }
    
    // Insertar badge
    $badge_data = [
        'user_id' => $user_id,
        'badge_tipo' => $badge_type,
        'badge_nombre' => $badge['nombre'],
        'badge_descripcion' => $badge['descripcion'],
        'badge_icono' => $badge['icono'],
        'puntos_otorgados' => $badge['puntos']
    ];
    
    $result = supabase_query('user_badges', 'POST', $badge_data);
    
    if ($result['success']) {
        // Actualizar puntos del usuario
        supabase_query(
            'users',
            'PATCH',
            ['puntos' => supabase_query('users', 'GET', null, 'select=puntos&id=eq.' . $user_id)['data'][0]['puntos'] + $badge['puntos']],
            'id=eq.' . $user_id
        );
        
        auth_log("Badge otorgado: {$badge_type} a usuario {$user_id}");
        return true;
    }
    
    return false;
}

// =====================================================
// EMAILS
// =====================================================

/**
 * Enviar email de verificación
 */
function user_send_verification_email($email, $token) {
    $verify_url = AUTH_VERIFY_URL . '?token=' . $token;
    
    $template = file_get_contents(AUTH_TEMPLATES_DIR . 'verificacion-email.php');
    $html = str_replace('{VERIFICATION_LINK}', $verify_url, $template);
    
    return auth_send_email($email, AUTH_VERIFY_SUBJECT, $html, true);
}

/**
 * Enviar email de bienvenida
 */
function user_send_welcome_email($email) {
    $template = file_get_contents(AUTH_TEMPLATES_DIR . 'bienvenida-usuario.php');
    $html = str_replace('{DASHBOARD_LINK}', AUTH_DASHBOARD_URL, $template);
    
    return auth_send_email($email, AUTH_WELCOME_SUBJECT, $html, true);
}

// =====================================================
// UTILIDADES
// =====================================================

/**
 * Obtener estadísticas del usuario
 */
function user_get_stats($user_id) {
    // Usar función SQL
    $result = supabase_rpc('get_user_stats', ['p_user_id' => $user_id]);
    
    if ($result['success'] && !empty($result['data'])) {
        return $result['data'][0];
    }
    
    // Fallback: queries individuales
    $cotizaciones = supabase_query('cotizaciones_guardadas', 'GET', null, 'select=id&user_id=eq.' . $user_id);
    $descargas = supabase_query('descargas_usuario', 'GET', null, 'select=id&user_id=eq.' . $user_id);
    $badges = supabase_query('user_badges', 'GET', null, 'select=id&user_id=eq.' . $user_id);
    $user = supabase_query('users', 'GET', null, 'select=puntos,nivel_usuario&id=eq.' . $user_id);
    
    return [
        'total_cotizaciones' => count($cotizaciones['data'] ?? []),
        'total_descargas' => count($descargas['data'] ?? []),
        'total_badges' => count($badges['data'] ?? []),
        'puntos_totales' => $user['data'][0]['puntos'] ?? 0,
        'nivel' => $user['data'][0]['nivel_usuario'] ?? 'registrado'
    ];
}

/**
 * Obtener badges del usuario
 */
function user_get_badges($user_id) {
    $result = supabase_query(
        'user_badges',
        'GET',
        null,
        'select=*&user_id=eq.' . $user_id . '&order=fecha_obtencion.desc'
    );
    
    return $result['data'] ?? [];
}
