<?php
/**
 * Script de verificación y reparación de codificación UTF-8
 * Ejecutar una vez después de subir los archivos
 * URL: https://praxisseguridad.infinityfree.me/fix-encoding.php
 * 
 * ¡ELIMINAR ESTE ARCHIVO DESPUÉS DE USARLO!
 */

// Seguridad - contraseña simple
$password = 'praxis2024';

if (!isset($_GET['key']) || $_GET['key'] !== $password) {
    die('Acceso denegado. Usa: ?key=' . $password);
}

echo "<h1>Verificación de Codificación UTF-8</h1>";
echo "<style>body{font-family:sans-serif;padding:20px;} .ok{color:green;} .error{color:red;} pre{background:#f5f5f5;padding:10px;}</style>";

// Probar carácteres
$test_chars = [
    'Consultoría' => 'Consultoría',
    'Región' => 'Región', 
    'España' => 'España',
    'Navegación' => 'Navegación',
    'diseñamos' => 'diseñamos',
    'Política' => 'Política'
];

echo "<h2>1. Test de caracteres españoles:</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Debería verse</th><th>Se ve como</th><th>Estado</th></tr>";

foreach ($test_chars as $expected => $actual) {
    $status = ($expected === $actual) ? "<span class='ok'>✓ OK</span>" : "<span class='error'>✗ ERROR</span>";
    echo "<tr><td>$expected</td><td>$actual</td><td>$status</td></tr>";
}
echo "</table>";

// Verificar headers
echo "<h2>2. Headers HTTP actuales:</h2>";
echo "<pre>";
foreach (headers_list() as $header) {
    echo htmlspecialchars($header) . "\n";
}
echo "</pre>";

// Información del servidor
echo "<h2>3. Configuración PHP:</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><td>default_charset</td><td>" . ini_get('default_charset') . "</td></tr>";
echo "<tr><td>mbstring.internal_encoding</td><td>" . (function_exists('mb_internal_encoding') ? mb_internal_encoding() : 'No disponible') . "</td></tr>";
echo "<tr><td>mbstring.http_output</td><td>" . ini_get('mbstring.http_output') . "</td></tr>";
echo "</table>";

// Test de footer
echo "<h2>4. Contenido del footer (primeras líneas):</h2>";
$footer_file = __DIR__ . '/includes/footer.php';
if (file_exists($footer_file)) {
    $content = file_get_contents($footer_file);
    $first_500 = substr($content, 0, 500);
    
    // Detectar si está corrupto
    if (strpos($content, 'Ã') !== false) {
        echo "<p class='error'><strong>⚠️ ARCHIVO CORRUPTO DETECTADO</strong></p>";
        echo "<p>El archivo footer.php contiene caracteres corruptos (Ã). Esto indica que se subió incorrectamente.</p>";
        echo "<p><strong>Solución:</strong> Sube los archivos como ZIP y descomprímelos en el servidor.</p>";
    } else {
        echo "<p class='ok'><strong>✓ ARCHIVO OK</strong></p>";
    }
    
    echo "<pre>" . htmlspecialchars($first_500) . "...</pre>";
} else {
    echo "<p class='error'>No se encontró el archivo footer.php</p>";
}

echo "<hr>";
echo "<h2>Instrucciones para arreglar:</h2>";
echo "<ol>";
echo "<li>En tu PC, comprime toda la carpeta WEB-2 en un archivo <strong>.zip</strong></li>";
echo "<li>Sube el archivo .zip al servidor usando FileManager</li>";
echo "<li>Extrae el ZIP en el servidor (esto preserva la codificación UTF-8)</li>";
echo "<li>Elimina el archivo .zip y este script (fix-encoding.php)</li>";
echo "</ol>";

echo "<p style='color:red;'><strong>⚠️ IMPORTANTE: Elimina este archivo después de usarlo por seguridad.</strong></p>";
?>
