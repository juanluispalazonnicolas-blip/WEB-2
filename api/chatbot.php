<?php
/**
 * Praxis Seguridad - Chatbot API
 * Endpoint para responder preguntas usando datos de Supabase
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Configuración de Supabase
define('SUPABASE_URL', 'https://eqcgbxovacnlhqjoiwsb.supabase.co');
define('SUPABASE_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVxY2dieG92YWNubGhxam9pd3NiIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Njg4ODIwNTAsImV4cCI6MjA4NDQ1ODA1MH0.91pHDN_6vWyPqRmBPm3lXJKbLLdKfYVwGJhvEQpwyPE');

// Respuestas predefinidas (fallback si Supabase falla)
$fallbackResponses = [
    'servicios' => [
        'keywords' => ['servicio', 'servicios', 'ofrecen', 'hacen', 'ofrece'],
        'answer' => 'Ofrecemos consultoría estratégica, auditoría de riesgos, diseño de sistemas de seguridad (CCTV, alarmas, control de accesos), servicios de vigilancia y tecnología e IA. ¿Te interesa alguno en particular?'
    ],
    'precio' => [
        'keywords' => ['precio', 'coste', 'cuesta', 'presupuesto', 'tarifa', 'cuanto'],
        'answer' => 'Cada proyecto es personalizado según tus necesidades. Solicita una consultoría gratuita y te haremos un presupuesto sin compromiso. ¿Quieres que te contactemos?'
    ],
    'contacto' => [
        'keywords' => ['contacto', 'teléfono', 'telefono', 'llamar', 'whatsapp', 'email', 'correo'],
        'answer' => 'Puedes contactarnos de varias formas:\n📞 Teléfono: +34 637 474 428\n💬 WhatsApp: wa.me/34637474428\n✉️ Email: info@praxisseguridad.es'
    ],
    'horario' => [
        'keywords' => ['horario', 'abierto', 'disponible', 'hora', 'cuando'],
        'answer' => 'Nuestro horario es de lunes a viernes de 09:00 a 18:00. Para urgencias, tenemos disponibilidad 24/7.'
    ],
    'ubicacion' => [
        'keywords' => ['ubicación', 'ubicacion', 'donde', 'dónde', 'murcia', 'santomera', 'direccion', 'dirección'],
        'answer' => 'Estamos ubicados en Santomera, Región de Murcia, España. Damos servicio en toda la región de Murcia y alrededores.'
    ],
    'camaras' => [
        'keywords' => ['cámara', 'camara', 'cámaras', 'camaras', 'cctv', 'video', 'vídeo', 'vigilancia', 'grabar'],
        'answer' => 'Sí, diseñamos e instalamos sistemas CCTV profesionales. No vendemos productos genéricos: analizamos tus necesidades y diseñamos la solución óptima. ¿Quieres una consultoría?'
    ],
    'alarma' => [
        'keywords' => ['alarma', 'alarmas', 'intrusión', 'intrusion', 'robo', 'ladrón', 'ladron', 'detector'],
        'answer' => 'Diseñamos sistemas de detección de intrusión conectados a CRA (Central Receptora de Alarmas). Pensamos antes de instalar para darte la mejor protección.'
    ],
    'control_accesos' => [
        'keywords' => ['acceso', 'accesos', 'entrada', 'puerta', 'biométrico', 'biometrico', 'tarjeta', 'llave'],
        'answer' => 'Implementamos sistemas de control de accesos: tarjetas, códigos, biométricos... Todo diseñado según las necesidades específicas de tu instalación.'
    ],
    'consultoria' => [
        'keywords' => ['consultoría', 'consultoria', 'asesor', 'asesoramiento', 'análisis', 'analisis', 'auditoría', 'auditoria'],
        'answer' => 'Nuestra consultoría estratégica analiza tu situación actual y diseña el modelo de seguridad óptimo. No vendemos, asesoramos. ¿Agendamos una reunión?'
    ],
    'saludo' => [
        'keywords' => ['hola', 'buenas', 'buenos', 'hey', 'saludos', 'qué tal', 'que tal'],
        'answer' => '¡Hola! 👋 Soy el asistente virtual de Praxis Seguridad. ¿En qué puedo ayudarte? Puedo informarte sobre nuestros servicios, precios, horarios o cómo contactarnos.'
    ],
    'gracias' => [
        'keywords' => ['gracias', 'vale', 'ok', 'perfecto', 'genial', 'estupendo'],
        'answer' => '¡De nada! Si tienes más preguntas, aquí estoy. También puedes llamarnos al +34 637 474 428 o solicitar una consultoría gratuita.'
    ]
];

/**
 * Buscar respuesta en las respuestas predefinidas
 */
function findLocalResponse($message, $responses) {
    $message = mb_strtolower(trim($message));
    $bestMatch = null;
    $maxMatches = 0;
    
    foreach ($responses as $key => $data) {
        $matches = 0;
        foreach ($data['keywords'] as $keyword) {
            if (mb_strpos($message, mb_strtolower($keyword)) !== false) {
                $matches++;
            }
        }
        if ($matches > $maxMatches) {
            $maxMatches = $matches;
            $bestMatch = $data['answer'];
        }
    }
    
    return $bestMatch;
}

/**
 * Consultar Supabase para buscar respuesta
 */
function querySupabase($message) {
    $message = mb_strtolower(trim($message));
    
    // Construir URL de consulta
    $url = SUPABASE_URL . '/rest/v1/chatbot_responses?select=*';
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'apikey: ' . SUPABASE_KEY,
            'Authorization: Bearer ' . SUPABASE_KEY,
            'Content-Type: application/json'
        ],
        CURLOPT_TIMEOUT => 5
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode !== 200 || !$response) {
        return null;
    }
    
    $data = json_decode($response, true);
    if (!is_array($data)) {
        return null;
    }
    
    // Buscar mejor coincidencia
    $bestMatch = null;
    $maxScore = 0;
    
    foreach ($data as $row) {
        $score = 0;
        $keywords = $row['keywords'] ?? [];
        
        // Si keywords es string, convertir a array
        if (is_string($keywords)) {
            $keywords = json_decode($keywords, true) ?? explode(',', $keywords);
        }
        
        foreach ($keywords as $keyword) {
            if (mb_strpos($message, mb_strtolower(trim($keyword))) !== false) {
                $score++;
            }
        }
        
        // Bonus por prioridad
        $score += ($row['priority'] ?? 0) * 0.1;
        
        if ($score > $maxScore) {
            $maxScore = $score;
            $bestMatch = $row['answer'];
        }
    }
    
    return $bestMatch;
}

// Procesar solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido']);
    exit();
}

// Obtener mensaje
$input = json_decode(file_get_contents('php://input'), true);
$message = $input['message'] ?? '';

if (empty($message)) {
    echo json_encode(['error' => 'Mensaje vacío']);
    exit();
}

// Intentar primero con Supabase
$response = querySupabase($message);

// Si no hay respuesta de Supabase, usar fallback local
if (!$response) {
    $response = findLocalResponse($message, $fallbackResponses);
}

// Respuesta por defecto
if (!$response) {
    $response = "No tengo información específica sobre eso, pero estaré encantado de ayudarte. Puedes:\n\n📞 Llamarnos: +34 637 474 428\n💬 WhatsApp: wa.me/34637474428\n📝 Rellenar el cuestionario de valoración\n\n¿Hay algo más en lo que pueda ayudarte?";
}

echo json_encode([
    'success' => true,
    'response' => $response,
    'timestamp' => date('c')
]);
