<?php
/**
 * Configuración del Sistema de Newsletter
 * Praxis Seguridad
 */

// =====================================================
// EMAIL SETTINGS
// =====================================================

// Email de envío
define('NEWSLETTER_FROM_EMAIL', 'info@praxisseguridad.es');
define('NEWSLETTER_FROM_NAME', 'Praxis Seguridad');
define('NEWSLETTER_REPLY_TO', 'info@praxisseguridad.es');

// =====================================================
// RATE LIMITING & SEGURIDAD
// =====================================================

// Máximo de intentos de suscripción por hora desde la misma IP
define('NEWSLETTER_MAX_ATTEMPTS_PER_HOUR', 3);

// Tiempo de expiración del token de confirmación (en horas)
define('NEWSLETTER_CONFIRMATION_EXPIRE_HOURS', 48);

// =====================================================
// URLs BASE
// =====================================================

// URL base del sitio (sin barra final)
define('NEWSLETTER_BASE_URL', 'https://praxisseguridad.es');

// URL de confirmación
define('NEWSLETTER_CONFIRM_URL', NEWSLETTER_BASE_URL . '/api/newsletter/confirm.php');

// URL de unsubscribe
define('NEWSLETTER_UNSUBSCRIBE_URL', NEWSLETTER_BASE_URL . '/newsletter/unsubscribe.php');

// URL de página de gracias
define('NEWSLETTER_THANKS_URL', NEWSLETTER_BASE_URL . '/newsletter/gracias.php');

// =====================================================
// DATABASE TABLES
// =====================================================

define('NEWSLETTER_TABLE', 'newsletters');
define('NEWSLETTER_ENVIOS_TABLE', 'newsletter_envios');
define('NEWSLETTER_TRACKING_TABLE', 'newsletter_tracking');

// =====================================================
// CONFIGURACIÓN DE EMAILS
// =====================================================

// Usar HTML en emails
define('NEWSLETTER_USE_HTML', true);

// Plantillas de email
define('NEWSLETTER_TEMPLATES_DIR', dirname(__FILE__) . '/email-templates/');

// =====================================================
// TEXTOS POR DEFECTO
// =====================================================

// Texto del asunto del email de confirmación
define('NEWSLETTER_CONFIRMATION_SUBJECT', 'Confirma tu suscripción a Praxis Seguridad');

// Texto del asunto del email de bienvenida
define('NEWSLETTER_WELCOME_SUBJECT', '¡Bienvenido a Praxis Seguridad!');

// =====================================================
// DESARROLLO vs PRODUCCIÓN
// =====================================================

// Modo desarrollo (si true, emails van solo a NEWSLETTER_DEV_EMAIL)
define('NEWSLETTER_DEV_MODE', false);
define('NEWSLETTER_DEV_EMAIL', 'juan.luis@praxisseguridad.es');

// =====================================================
// FUNCIONES HELPER
// =====================================================

/**
 * Genera un token único para verificación
 */
function newsletter_generate_token($email) {
    return hash('sha256', $email . time() . rand(1000, 9999));
}

/**
 * Valida formato de email
 */
function newsletter_validate_email($email) {
    // Filtro básico PHP
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    
    // Regex adicional para mayor seguridad
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}

/**
 * Sanitiza email
 */
function newsletter_sanitize_email($email) {
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}

/**
 * Obtiene IP del usuario
 */
function newsletter_get_user_ip() {
    $ip = '';
    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    }
    
    // Limpiar
    return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '0.0.0.0';
}

/**
 * Obtiene User Agent del usuario
 */
function newsletter_get_user_agent() {
    return substr($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown', 0, 255);
}

/**
 * Envía email con configuración correcta
 */
function newsletter_send_email($to, $subject, $message, $is_html = true) {
    // En modo desarrollo, redirigir a email de desarrollo
    if (NEWSLETTER_DEV_MODE && NEWSLETTER_DEV_EMAIL) {
        $to = NEWSLETTER_DEV_EMAIL;
        $subject = '[DEV] ' . $subject;
    }
    
    // Headers
    $headers = [];
    $headers[] = 'From: ' . NEWSLETTER_FROM_NAME . ' <' . NEWSLETTER_FROM_EMAIL . '>';
    $headers[] = 'Reply-To: ' . NEWSLETTER_REPLY_TO;
    
    if ($is_html) {
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
    } else {
        $headers[] = 'Content-Type: text/plain; charset=UTF-8';
    }
    
    // Enviar
    return mail($to, $subject, $message, implode("\r\n", $headers));
}

/**
 * Log de actividad (para debugging)
 */
function newsletter_log($message, $level = 'info') {
    $log_file = dirname(__FILE__) . '/../logs/newsletter.log';
    $log_dir = dirname($log_file);
    
    // Crear directorio si no existe
    if (!is_dir($log_dir)) {
        @mkdir($log_dir, 0755, true);
    }
    
    $timestamp = date('Y-m-d H:i:s');
    $log_entry = "[{$timestamp}] [{$level}] {$message}\n";
    
    @file_put_contents($log_file, $log_entry, FILE_APPEND);
}
