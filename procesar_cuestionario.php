<?php
/**
 * Praxis Seguridad - Procesar Cuestionario
 * Recibe y almacena los datos del cuestionario
 */

header('Content-Type: application/json');

// Recibir datos JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Datos no válidos']);
    exit;
}

// Preparar los datos para almacenar
$timestamp = date('Y-m-d H:i:s');
$lead = [
    'timestamp' => $timestamp,
    'tipo_instalacion' => $data['tipo_instalacion'] ?? '',
    'tipo_vivienda' => $data['tipo_vivienda'] ?? '',
    'planta' => $data['planta'] ?? '',
    'caracteristicas' => $data['caracteristicas'] ?? [],
    'metros' => $data['metros'] ?? '',
    'accesos' => $data['accesos'] ?? '',
    'sistema_actual' => $data['sistema_actual'] ?? '',
    'servicios' => $data['servicios'] ?? [],
    'urgencia' => $data['urgencia'] ?? '',
    'presupuesto' => $data['presupuesto'] ?? '',
    'nombre' => $data['nombre'] ?? '',
    'telefono' => $data['telefono'] ?? '',
    'email' => $data['email'] ?? '',
    'localidad' => $data['localidad'] ?? '',
    'comentarios' => $data['comentarios'] ?? '',
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
];

// Directorio para almacenar leads
$leadsDir = __DIR__ . '/leads';
if (!is_dir($leadsDir)) {
    mkdir($leadsDir, 0755, true);
}

// Guardar en archivo JSON (un archivo por día)
$filename = $leadsDir . '/leads_' . date('Y-m-d') . '.json';

$existingLeads = [];
if (file_exists($filename)) {
    $existingData = file_get_contents($filename);
    $existingLeads = json_decode($existingData, true) ?: [];
}

$existingLeads[] = $lead;
file_put_contents($filename, json_encode($existingLeads, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// También guardar en CSV para fácil acceso
$csvFilename = $leadsDir . '/leads.csv';
$isNewFile = !file_exists($csvFilename);

$csvFile = fopen($csvFilename, 'a');
if ($isNewFile) {
    // Escribir encabezados
    fputcsv($csvFile, [
        'Fecha',
        'Tipo Instalación',
        'Tipo Vivienda',
        'Planta',
        'Características',
        'Metros',
        'Accesos',
        'Sistema Actual',
        'Servicios',
        'Urgencia',
        'Presupuesto',
        'Nombre',
        'Teléfono',
        'Email',
        'Localidad',
        'Comentarios'
    ]);
}

fputcsv($csvFile, [
    $timestamp,
    $lead['tipo_instalacion'],
    $lead['tipo_vivienda'],
    $lead['planta'],
    is_array($lead['caracteristicas']) ? implode(', ', $lead['caracteristicas']) : '',
    $lead['metros'],
    $lead['accesos'],
    $lead['sistema_actual'],
    is_array($lead['servicios']) ? implode(', ', $lead['servicios']) : '',
    $lead['urgencia'],
    $lead['presupuesto'],
    $lead['nombre'],
    $lead['telefono'],
    $lead['email'],
    $lead['localidad'],
    $lead['comentarios']
]);

fclose($csvFile);

// Enviar email de notificación (opcional)
$to = 'info@praxisseguridad.es';
$subject = 'Nuevo lead desde cuestionario web - ' . $lead['tipo_instalacion'];
$message = "
Se ha recibido una nueva solicitud de presupuesto:

TIPO DE INSTALACIÓN: {$lead['tipo_instalacion']}
" . ($lead['tipo_vivienda'] ? "Tipo de vivienda: {$lead['tipo_vivienda']}\n" : "") . "
" . ($lead['planta'] ? "Planta: {$lead['planta']}\n" : "") . "
" . (!empty($lead['caracteristicas']) ? "Características: " . implode(', ', $lead['caracteristicas']) . "\n" : "") . "
" . ($lead['metros'] ? "Metros cuadrados: {$lead['metros']}\n" : "") . "
" . ($lead['accesos'] ? "Accesos: {$lead['accesos']}\n" : "") . "
" . ($lead['sistema_actual'] ? "Sistema actual: {$lead['sistema_actual']}\n" : "") . "

SERVICIOS DE INTERÉS:
" . (!empty($lead['servicios']) ? implode(', ', $lead['servicios']) : 'No especificados') . "

URGENCIA: {$lead['urgencia']}
PRESUPUESTO: {$lead['presupuesto']}

DATOS DE CONTACTO:
Nombre: {$lead['nombre']}
Teléfono: {$lead['telefono']}
Email: {$lead['email']}
Localidad: {$lead['localidad']}

Comentarios:
{$lead['comentarios']}

---
Fecha: {$timestamp}
IP: {$lead['ip']}
";

$headers = "From: web@praxisseguridad.es\r\n";
$headers .= "Reply-To: {$lead['email']}\r\n";

// Descomentar para activar envío de email
// mail($to, $subject, $message, $headers);

// Respuesta exitosa
echo json_encode([
    'success' => true,
    'message' => 'Solicitud recibida correctamente',
    'lead_id' => uniqid('LEAD_')
]);
