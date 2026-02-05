<?php
/**
 * API Newsletter - Confirm (Supabase)
 * Endpoint para confirmar suscripción mediante token
 */

// Incluir configuración
require_once dirname(__DIR__, 2) . '/includes/newsletter-config.php';
require_once dirname(__DIR__, 2) . '/includes/db.php';

// Obtener token de la URL
$token = isset($_GET['token']) ? trim($_GET['token']) : '';

if (empty($token)) {
    // Redirigir a home con error
    header('Location: ../../index.php?newsletter_error=token_missing');
    exit;
}

try {
    // Buscar suscriptor por token
    $result = supabase_query(
        'newsletters',
        'GET',
        null,
        'select=id,email,verificado,activo,fecha_suscripcion&token_verificacion=eq.' . urlencode($token)
    );
    
    if (!$result['success'] || empty($result['data'])) {
        // Token no válido
        newsletter_log("Token inválido: {$token}", 'warning');
        header('Location: ../../index.php?newsletter_error=invalid_token');
        exit;
    }
    
    $suscriptor = $result['data'][0];
    
    // Verificar si el token ha expirado (48 horas)
    $fecha_suscripcion = strtotime($suscriptor['fecha_suscripcion']);
    $expiration_time = $fecha_suscripcion + (NEWSLETTER_CONFIRMATION_EXPIRE_HOURS * 3600);
    
    if (!$suscriptor['verificado'] && time() > $expiration_time) {
        newsletter_log("Token expirado para: {$suscriptor['email']}", 'warning');
        header('Location: ../../index.php?newsletter_error=token_expired');
        exit;
    }
    
    // Si ya estaba verificado
    if ($suscriptor['verificado']) {
        newsletter_log("Intento de verificación duplicado: {$suscriptor['email']}");
        header('Location: ' . NEWSLETTER_THANKS_URL . '?duplicate=1');
        exit;
    }
    
    // ======================================================
    // CONFIRMAR SUSCRIPCIÓN
    // ======================================================
    
    // Actualizar estado
    $updateResult = supabase_query(
        'newsletters',
        'PATCH',
        [
            'verificado' => true,
            'activo' => true,
            'fecha_verificacion' => date('Y-m-d\TH:i:sP')
        ],
        'id=eq.' . $suscriptor['id']
    );
    
    if (!$updateResult['success']) {
        newsletter_log("Error al confirmar: " . $updateResult['error'], 'error');
        throw new Exception('Error al confirmar suscripción');
    }
    
    // ======================================================
    // ENVIAR EMAIL DE BIENVENIDA
    // ======================================================
    
    // Generar link de unsubscribe
    $unsubscribe_url = NEWSLETTER_UNSUBSCRIBE_URL . '?token=' . $token;
    
    // Cargar plantilla de bienvenida
    $email_template = file_get_contents(NEWSLETTER_TEMPLATES_DIR . 'newsletter-bienvenida.php');
    
    // Reeplazar placeholder
    $email_html = str_replace('{UNSUBSCRIBE_LINK}', $unsubscribe_url, $email_template);
    
    // Enviar email de bienvenida
    newsletter_send_email(
        $suscriptor['email'],
        NEWSLETTER_WELCOME_SUBJECT,
        $email_html,
        true
    );
    
    // Log
    newsletter_log("Suscripción confirmada: {$suscriptor['email']}");
    
    // Redirigir a página de gracias
    header('Location: ' . NEWSLETTER_THANKS_URL . '?confirmed=1');
    exit;
    
} catch (Exception $e) {
    newsletter_log("Error en confirm: " . $e->getMessage(), 'error');
    header('Location: ../../index.php?newsletter_error=system_error');
    exit;
}
