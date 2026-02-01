<?php
/**
 * API Endpoint para guardar solicitudes de contacto en Supabase
 * 
 * Recibe los datos del formulario de contacto y los guarda en la tabla solicitudes_contacto
 */

// Configuración de Supabase
define('SUPABASE_URL', 'https://eqcgbxovacnlhqjoiwsb.supabase.co');
define('SUPABASE_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVxY2dieG92YWNubGhxam9pd3NiIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Njg4ODIwNTAsImV4cCI6MjA4NDQ1ODA1MH0.zOofje2fFmPypNb83wHFqqq_UteIXKGwcZRaHtnP6b0');

// Headers para CORS y JSON
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Manejar preflight CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido', 'success' => false]);
    exit;
}

// Recoger datos del formulario
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
$tipo_cliente = isset($_POST['tipo_cliente']) ? trim($_POST['tipo_cliente']) : '';
$tipo_servicio = isset($_POST['tipo_servicio']) ? trim($_POST['tipo_servicio']) : '';
$localidad = isset($_POST['localidad']) ? trim($_POST['localidad']) : '';
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';
$origen = isset($_POST['origen']) ? trim($_POST['origen']) : 'web_contacto';

// Validaciones básicas
$errores = [];
if (empty($nombre)) $errores[] = 'El nombre es obligatorio';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = 'Email no válido';

if (!empty($errores)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Errores de validación',
        'errores' => $errores
    ]);
    exit;
}

// Preparar datos para Supabase
$datos = [
    'nombre' => $nombre,
    'email' => $email,
    'telefono' => $telefono ?: null,
    'tipo_cliente' => $tipo_cliente ?: null,
    'tipo_servicio' => $tipo_servicio ?: null,
    'localidad' => $localidad ?: null,
    'mensaje' => $mensaje ?: null,
    'origen' => $origen,
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? null,
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null
];

// Enviar a Supabase
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => SUPABASE_URL . '/rest/v1/solicitudes_contacto',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($datos),
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'apikey: ' . SUPABASE_KEY,
        'Authorization: Bearer ' . SUPABASE_KEY,
        'Prefer: return=minimal'
    ]
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

// Verificar respuesta
if ($httpCode >= 200 && $httpCode < 300) {
    // Éxito - redirigir a página de confirmación o devolver JSON
    if (isset($_POST['ajax']) && $_POST['ajax'] === '1') {
        echo json_encode([
            'success' => true,
            'message' => 'Solicitud enviada correctamente. Te contactaremos en menos de 24 horas.'
        ]);
    } else {
        // Redirigir a página de éxito
        header('Location: ../contacto-confirmado.php?success=1');
        exit;
    }
} else {
    // Error
    error_log("Error Supabase: HTTP $httpCode - $response - $curlError");
    
    if (isset($_POST['ajax']) && $_POST['ajax'] === '1') {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Error al enviar la solicitud. Por favor, inténtalo de nuevo.'
        ]);
    } else {
        header('Location: ../contacto.php?error=1');
        exit;
    }
}
