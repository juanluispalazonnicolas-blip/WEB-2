<?php
/**
 * Descargar Recurso Premium
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Obtener ID del recurso
$recurso_id = $_GET['id'] ?? null;

if (!$recurso_id) {
    header('Location: /user/recursos.php');
    exit;
}

// Obtener recurso
$recurso_result = supabase_query(
    'recursos_premium',
    'GET',
    null,
    'select=*&id=eq.' . $recurso_id . '&activo=eq.true'
);

if (empty($recurso_result['data'])) {
    header('Location: /user/recursos.php?error=not_found');
    exit;
}

$recurso = $recurso_result['data'][0];

// Verificar nivel de acceso
$niveles = ['registrado', 'cliente', 'premium'];
$user_nivel_index = array_search($user['nivel'], $niveles);
$required_nivel_index = array_search($recurso['nivel_requerido'], $niveles);

if ($user_nivel_index < $required_nivel_index) {
    header('Location: /user/recursos.php?error=insufficient_level');
    exit;
}

// Registrar descarga
$descarga_data = [
    'user_id' => $user['id'],
    'recurso_id' => $recurso_id,
    'ip_address' => auth_get_user_ip(),
    'user_agent' => auth_get_user_agent()
];

supabase_query('descargas_usuario', 'POST', $descarga_data);

// Incrementar contador de descargas
supabase_query(
    'recursos_premium',
    'PATCH',
    ['descargas' => $recurso['descargas'] + 1],
    'id=eq.' . $recurso_id
);

// Otorgar badge si es la 3ª descarga
$total_descargas = supabase_query(
    'descargas_usuario',
    'GET',
    null,
    'select=id&user_id=eq.' . $user['id']
);

if (count($total_descargas['data'] ?? []) >= 3) {
    user_award_badge($user['id'], 'estudioso');
}

// Log
auth_log("Descarga recurso: {$recurso['titulo']} por usuario {$user['id']}");

// Si es video, redirigir a URL externa
if ($recurso['tipo'] === 'video' || $recurso['tipo'] === 'webinar') {
    header('Location: ' . $recurso['url_archivo']);
    exit;
}

// Para archivos descargables (PDF, Excel), servir el archivo
// NOTA: En producción, esto debería ser desde CDN (Cloudflare R2, AWS S3)
$file_path = __DIR__ . '/../recursos/' . $recurso['url_archivo'];

if (file_exists($file_path)) {
    // Headers para descarga
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($recurso['url_archivo']) . '"');
    header('Content-Length: ' . filesize($file_path));
    header('Cache-Control: no-cache, must-revalidate');
    header('Pragma: public');
    
    // Limpiar buffer
    ob_clean();
    flush();
    
    // Leer y enviar archivo
    readfile($file_path);
    exit;
} else {
    // Si el archivo no existe localmente, redirigir a URL (CDN)
    header('Location: ' . $recurso['url_archivo']);
    exit;
}
