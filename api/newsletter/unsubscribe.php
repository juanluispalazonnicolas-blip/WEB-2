<?php
/**
 * API Newsletter - Unsubscribe (Supabase)
 * Endpoint para darse de baja del newsletter
 */

header('Content-Type: application/json; charset=UTF-8');

// Incluir configuración
require_once dirname(__DIR__, 2) . '/includes/newsletter-config.php';
require_once dirname(__DIR__, 2) . '/includes/db.php';

// Permitir GET y POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Obtener email o token
$token = isset($_REQUEST['token']) ? trim($_REQUEST['token']) : '';
$email = isset($_REQUEST['email']) ? newsletter_sanitize_email($_REQUEST['email']) : '';

if (empty($token) && empty($email)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Token o email requerido'
    ]);
    exit;
}

try {
    // Buscar suscriptor
    if (!empty($token)) {
        $result = supabase_query(
            'newsletters',
            'GET',
            null,
            'select=id,email,activo&token_verificacion=eq.' . urlencode($token)
        );
    } else {
        $result = supabase_query(
            'newsletters',
            'GET',
            null,
            'select=id,email,activo&email=eq.' . urlencode($email)
        );
    }
    
    if (!$result['success'] || empty($result['data'])) {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'message' => 'Suscripción no encontrada'
        ]);
        exit;
    }
    
    $suscriptor = $result['data'][0];
    
    // Si ya estaba inactivo
    if (!$suscriptor['activo']) {
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'message' => 'Esta suscripción ya estaba desactivada'
        ]);
        exit;
    }
    
    // ======================================================
    // DESACTIVAR SUSCRIPCIÓN (soft delete)
    // ======================================================
    
    $updateResult = supabase_query(
        'newsletters',
        'PATCH',
        ['activo' => false],
        'id=eq.' . $suscriptor['id']
    );
    
    if (!$updateResult['success']) {
        newsletter_log("Error unsubscribe: " . $updateResult['error'], 'error');
        throw new Exception('Error al cancelar suscripción');
    }
    
    // Log
    newsletter_log("Baja suscripción: {$suscriptor['email']}");
    
    // Respuesta exitosa
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Te has dado de baja correctamente. Lamentamos verte partir.'
    ]);
    
} catch (Exception $e) {
    newsletter_log("Error en unsubscribe: " . $e->getMessage(), 'error');
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error al procesar la baja. Por favor, inténtalo de nuevo.'
    ]);
}
