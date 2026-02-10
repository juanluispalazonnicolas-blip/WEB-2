<?php
/**
 * Script de depuración para identificar el error 422 en Resend
 */

require_once __DIR__ . '/includes/resend-config.php';

// Email de prueba
$to = 'juan.luis@praxisseguridad.es';
$subject = 'Test de depuración Resend';
$body = '<h1>Test</h1><p>Este es un email de prueba.</p>';

echo "<h2>🔍 Debug: Resend API Email Test</h2>";
echo "<hr>";

// Verificar configuración
echo "<h3>1. Verificar configuración</h3>";
echo "<p><strong>RESEND_API_KEY:</strong> " . (defined('RESEND_API_KEY') ? (strlen(RESEND_API_KEY) > 10 ? 'Definida ✅' : 'Muy corta ❌') : 'NO definida ❌') . "</p>";
echo "<p><strong>EMAIL_FROM:</strong> " . (defined('EMAIL_FROM') ? EMAIL_FROM : 'NO definida ❌') . "</p>";
echo "<p><strong>EMAIL_FROM_NAME:</strong> " . (defined('EMAIL_FROM_NAME') ? EMAIL_FROM_NAME : 'NO definida ❌') . "</p>";
echo "<p><strong>EMAIL_REPLY_TO:</strong> " . (defined('EMAIL_REPLY_TO') ? EMAIL_REPLY_TO : 'NO definida ❌') . "</p>";

echo "<hr>";
echo "<h3>2. Construir payload</h3>";

// Construir el payload EXACTAMENTE como lo hace auth_send_email
$data = [
    'from' => EMAIL_FROM_NAME . ' <' . EMAIL_FROM . '>',
    'to' => [$to],
    'subject' => $subject,
    'html' => $body
];

// AQUÍ ESTÁ EL PROBLEMA POTENCIAL - Verificar cómo se envía reply_to
if (defined('EMAIL_REPLY_TO') && !empty(EMAIL_REPLY_TO)) {
    // PROBAR PRIMERO SIN ARRAY (CORRECTO según Resend)
    $data['reply_to'] = EMAIL_REPLY_TO;
}

echo "<pre>";
echo "Payload a enviar:\n";
print_r($data);
echo "</pre>";

echo "<p><strong>JSON a enviar:</strong></p>";
$json_payload = json_encode($data);
echo "<pre>" . htmlspecialchars($json_payload) . "</pre>";

echo "<hr>";
echo "<h3>3. Enviar a Resend API</h3>";

$ch = curl_init('https://api.resend.com/emails');

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . RESEND_API_KEY,
    'Content-Type: application/json'
]);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);

curl_close($ch);

echo "<p><strong>HTTP Code:</strong> " . $http_code . "</p>";

if ($http_code >= 200 && $http_code < 300) {
    echo "<p style='color: green; font-weight: bold;'>✅ Email enviado correctamente</p>";
} else {
    echo "<p style='color: red; font-weight: bold;'>❌ ERROR al enviar email</p>";
}

echo "<p><strong>Respuesta completa:</strong></p>";
echo "<pre>" . htmlspecialchars($response) . "</pre>";

if ($curl_error) {
    echo "<p><strong>cURL Error:</strong> " . htmlspecialchars($curl_error) . "</p>";
}

// Parsear respuesta JSON
$result = json_decode($response, true);
if ($result) {
    echo "<hr>";
    echo "<h3>4. Respuesta decodificada</h3>";
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    
    if (isset($result['message'])) {
        echo "<p style='background: #ffe6e6; padding: 10px; border-left: 4px solid #ff0000;'>";
        echo "<strong>Mensaje de error:</strong> " . htmlspecialchars($result['message']);
        echo "</p>";
    }
}

echo "<hr>";
echo "<h3>5. Probar variantes</h3>";

// Probar SIN reply_to
echo "<h4>Test A: Sin reply_to</h4>";
$data_test_a = [
    'from' => EMAIL_FROM_NAME . ' <' . EMAIL_FROM . '>',
    'to' => [$to],
    'subject' => $subject . ' - Test A (sin reply_to)',
    'html' => $body
];

$ch = curl_init('https://api.resend.com/emails');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . RESEND_API_KEY,
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_test_a));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response_a = curl_exec($ch);
$http_code_a = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<p><strong>HTTP Code:</strong> " . $http_code_a . " " . ($http_code_a >= 200 && $http_code_a < 300 ? '✅' : '❌') . "</p>";
echo "<pre>" . htmlspecialchars($response_a) . "</pre>";

// Probar con reply_to como STRING (correcto)
echo "<h4>Test B: Con reply_to como STRING</h4>";
$data_test_b = [
    'from' => EMAIL_FROM_NAME . ' <' . EMAIL_FROM . '>',
    'to' => [$to],
    'subject' => $subject . ' - Test B (reply_to string)',
    'html' => $body,
    'reply_to' => EMAIL_REPLY_TO  // STRING
];

$ch = curl_init('https://api.resend.com/emails');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . RESEND_API_KEY,
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_test_b));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response_b = curl_exec($ch);
$http_code_b = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<p><strong>HTTP Code:</strong> " . $http_code_b . " " . ($http_code_b >= 200 && $http_code_b < 300 ? '✅' : '❌') . "</p>";
echo "<pre>" . htmlspecialchars($response_b) . "</pre>";

// Probar con reply_to como ARRAY (incorrecto según la corrección)
echo "<h4>Test C: Con reply_to como ARRAY</h4>";
$data_test_c = [
    'from' => EMAIL_FROM_NAME . ' <' . EMAIL_FROM . '>',
    'to' => [$to],
    'subject' => $subject . ' - Test C (reply_to array)',
    'html' => $body,
    'reply_to' => [EMAIL_REPLY_TO]  // ARRAY
];

$ch = curl_init('https://api.resend.com/emails');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . RESEND_API_KEY,
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_test_c));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response_c = curl_exec($ch);
$http_code_c = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<p><strong>HTTP Code:</strong> " . $http_code_c . " " . ($http_code_c >= 200 && $http_code_c < 300 ? '✅' : '❌') . "</p>";
echo "<pre>" . htmlspecialchars($response_c) . "</pre>";

echo "<hr>";
echo "<h3>✅ Resumen de Tests</h3>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Test</th><th>HTTP Code</th><th>Estado</th></tr>";
echo "<tr><td>Original</td><td>" . $http_code . "</td><td>" . ($http_code >= 200 && $http_code < 300 ? '✅ OK' : '❌ ERROR') . "</td></tr>";
echo "<tr><td>A - Sin reply_to</td><td>" . $http_code_a . "</td><td>" . ($http_code_a >= 200 && $http_code_a < 300 ? '✅ OK' : '❌ ERROR') . "</td></tr>";
echo "<tr><td>B - reply_to STRING</td><td>" . $http_code_b . "</td><td>" . ($http_code_b >= 200 && $http_code_b < 300 ? '✅ OK' : '❌ ERROR') . "</td></tr>";
echo "<tr><td>C - reply_to ARRAY</td><td>" . $http_code_c . "</td><td>" . ($http_code_c >= 200 && $http_code_c < 300 ? '✅ OK' : '❌ ERROR') . "</td></tr>";
echo "</table>";
?>
