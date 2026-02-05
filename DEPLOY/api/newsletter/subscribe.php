<?php
/**
 * API Newsletter - Subscribe (Supabase)
 * Endpoint para suscribirse al newsletter con double opt-in
 */

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Manejar preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Incluir configuración
require_once dirname(__DIR__, 2) . '/includes/newsletter-config.php';
require_once dirname(__DIR__, 2) . '/includes/db.php';

// Obtener datos JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar que se recibió el email
if (empty($data['email'])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'El email es requerido'
    ]);
    exit;
}

$email = newsletter_sanitize_email($data['email']);

// Validar formato de email
if (!newsletter_validate_email($email)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'El formato del email no es válido'
    ]);
    exit;
}

// Obtener datos adicionales
$nombre = isset($data['nombre']) ? trim($data['nombre']) : null;
$origen = isset($data['origen']) ? trim($data['origen']) : 'index';
$ip = newsletter_get_user_ip();
$user_agent = newsletter_get_user_agent();

try {
    // =====================================================
    // RATE LIMITING: Verificar intentos por IP
    // =====================================================
    $oneHourAgo = date('Y-m-d\TH:i:s', strtotime('-1 hour'));
    $result = supabase_query(
        'newsletters',
        'GET',
        null,
        'select=id&ip_suscripcion=eq.' . urlencode($ip) . '&fecha_suscripcion=gte.' . urlencode($oneHourAgo)
    );
    
    if (!$result['success']) {
        newsletter_log("Error rate limit: " . $result['error'], 'error');
        throw new Exception('Error al verificar rate limit');
    }
    
    $intentos = count($result['data'] ?? []);
    
    if ($intentos >= NEWSLETTER_MAX_ATTEMPTS_PER_HOUR) {
        http_response_code(429);
        echo json_encode([
            'success' => false,
            'message' => 'Demasiados intentos. Por favor, inténtalo más tarde.'
        ]);
        exit;
    }
    
    // =====================================================
    // Verificar si ya existe el email
    // =====================================================
    $result = supabase_query(
        'newsletters',
        'GET',
        null,
        'select=id,verificado,activo&email=eq.' . urlencode($email)
    );
    
    if (!$result['success']) {
        newsletter_log("Error verificar email: " . $result['error'], 'error');
        throw new Exception('Error al verificar email existente');
    }
    
    if (count($result['data'] ?? []) > 0) {
        $existing = $result['data'][0];
        
        // Si ya está verificado y activo
        if ($existing['verificado'] && $existing['activo']) {
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Este email ya está suscrito a nuestro newsletter.'
            ]);
            exit;
        }
        
        // Si existe pero no está verificado, reenviar confirmación
        if (!$existing['verificado']) {
            // Generar nuevo token
            $token = newsletter_generate_token($email);
            
            $updateResult = supabase_query(
                'newsletters',
                'PATCH',
                [
                    'token_verificacion' => $token,
                    'fecha_suscripcion' => date('Y-m-d\TH:i:sP'),
                    'ip_suscripcion' => $ip
                ],
                'id=eq.' . $existing['id']
            );
            
            if (!$updateResult['success']) {
                newsletter_log("Error update token: " . $updateResult['error'], 'error');
                throw new Exception('Error al actualizar token');
            }
            
            // Enviar email de confirmación
            $confirmacion_url = NEWSLETTER_CONFIRM_URL . '?token=' . $token;
            $email_template = file_get_contents(NEWSLETTER_TEMPLATES_DIR . 'newsletter-confirmacion.php');
            $email_html = str_replace('{CONFIRMATION_LINK}', $confirmacion_url, $email_template);
            
            newsletter_send_email(
                $email,
                NEWSLETTER_CONFIRMATION_SUBJECT,
                $email_html,
                true
            );
            
            newsletter_log("Reenvío confirmación: {$email}");
            
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Te hemos reenviado el email de confirmación. Revisa tu bandeja de entrada.'
            ]);
            exit;
        }
        
        // Si estaba inactivo, reactivar
        if (!$existing['activo']) {
            $updateResult = supabase_query(
                'newsletters',
                'PATCH',
                [
                    'activo' => true,
                    'fecha_suscripcion' => date('Y-m-d\TH:i:sP')
                ],
                'id=eq.' . $existing['id']
            );
            
            if (!$updateResult['success']) {
                newsletter_log("Error reactivar: " . $updateResult['error'], 'error');
                throw new Exception('Error al reactivar suscripción');
            }
            
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Tu suscripción ha sido reactivada. ¡Bienvenido de nuevo!'
            ]);
            exit;
        }
    }
    
    // =======================================================
    // NUEVA SUSCRIPCIÓN
    // ======================================================
    
    // Generar token único
    $token = newsletter_generate_token($email);
    
    // Insertar en Supabase
    $insertResult = supabase_query(
        'newsletters',
        'POST',
        [
            'email' => $email,
            'nombre' => $nombre,
            'token_verificacion' => $token,
            'verificado' => false,
            'activo' => true,
            'ip_suscripcion' => $ip,
            'user_agent' => $user_agent,
            'origen' => $origen
        ]
    );
    
    if (!$insertResult['success']) {
        newsletter_log("Error insertar: " . $insertResult['error'], 'error');
        throw new Exception('Error al guardar la suscripción');
    }
    
    // ======================================================
    // ENVIAR EMAIL DE CONFIRMACIÓN
    // ======================================================
    
    $confirmacion_url = NEWSLETTER_CONFIRM_URL . '?token=' . $token;
    
    // Cargar plantilla
    $email_template = file_get_contents(NEWSLETTER_TEMPLATES_DIR . 'newsletter-confirmacion.php');
    
    // Reemplazar placeholder
    $email_html = str_replace('{CONFIRMATION_LINK}', $confirmacion_url, $email_template);
    
    // Enviar
    $email_sent = newsletter_send_email(
        $email,
        NEWSLETTER_CONFIRMATION_SUBJECT,
        $email_html,
        true
    );
    
    if (!$email_sent) {
        newsletter_log("Error enviar email a: {$email}", 'error');
        throw new Exception('Error al enviar el email de confirmación');
    }
    
    // Log
    newsletter_log("Nueva suscripción: {$email} - Token: {$token}");
    
    // Respuesta exitosa
    http_response_code(201);
    echo json_encode([
        'success' => true,
        'message' => '¡Gracias! Te hemos enviado un email de confirmación. Revisa tu bandeja de entrada.'
    ]);
    
} catch (Exception $e) {
    newsletter_log("Error en subscribe: " . $e->getMessage(), 'error');
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error al procesar la suscripción. Por favor, inténtalo de nuevo.'
    ]);
}
