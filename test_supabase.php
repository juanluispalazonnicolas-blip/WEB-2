<?php
/**
 * Script de verificación - Prueba conexión con Supabase
 * Ejecutar: php test_supabase.php
 */

$supabaseUrl = 'https://eqcgbxovacnlhqjoiwsb.supabase.co';
$supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVxY2dieG92YWNubGhxam9pd3NiIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Njg4ODIwNTAsImV4cCI6MjA4NDQ1ODA1MH0.91pHDN_6vWyPqRmBPm3lXJKbLLdKfYVwGJhvEQpwyPE';

echo "=== Verificando conexión con Supabase ===\n\n";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $supabaseUrl . '/rest/v1/chatbot_responses?select=id,question,category&limit=5',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'apikey: ' . $supabaseKey,
        'Authorization: Bearer ' . $supabaseKey,
        'Content-Type: application/json'
    ],
    CURLOPT_TIMEOUT => 10
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

echo "HTTP Code: $httpCode\n";

if ($error) {
    echo "Error cURL: $error\n";
} else {
    $data = json_decode($response, true);
    
    if ($httpCode === 200 && is_array($data)) {
        echo "✅ Tabla chatbot_responses encontrada!\n";
        echo "Registros encontrados: " . count($data) . "\n\n";
        
        foreach ($data as $row) {
            echo "- ID: " . $row['id'] . " | " . $row['question'] . " (" . $row['category'] . ")\n";
        }
    } else {
        echo "❌ Error o tabla no encontrada\n";
        echo "Respuesta: $response\n";
    }
}

echo "\n=== Fin de verificación ===\n";
