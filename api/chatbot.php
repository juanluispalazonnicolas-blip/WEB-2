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

// Respuestas predefinidas MEJORADAS (fallback si Supabase falla)
$fallbackResponses = [
    'saludo' => [
        'keywords' => ['hola', 'buenas', 'buenos', 'hey', 'saludos', 'qué tal', 'que tal', 'buen día', 'buen dia'],
        'answer' => "¡Hola! 👋 Soy el asistente de Juan Luis Palazón, consultor de seguridad con más de 15 años de experiencia.\n\n¿En qué puedo ayudarte hoy?\n\n🔒 Consultoría y auditorías\n📹 Sistemas CCTV y alarmas\n🛡️ Protección de datos (DPO)\n⚖️ Peritaje judicial\n\n💡 Tip: Muchos de nuestros clientes ahorran hasta un 30% en seguridad tras una auditoría. ¿Te cuento más?"
    ],
    'servicios' => [
        'keywords' => ['servicio', 'servicios', 'ofrecen', 'hacen', 'ofrece', 'qué hacéis', 'que haceis', 'trabajáis', 'trabajais'],
        'answer' => "Ofrecemos servicios especializados que te ayudan a tomar las mejores decisiones en seguridad:\n\n🎯 **Consultoría Estratégica**\nDiseñamos tu modelo de seguridad ideal. Muchas empresas gastan de más sin estar realmente protegidas.\n\n🔍 **Auditoría de Riesgos**\nAnalizamos tu situación actual y detectamos vulnerabilidades que otros pasan por alto.\n\n📹 **Diseño de Sistemas**\nCCTV, alarmas, control de accesos... Diseñamos la solución óptima, no la más cara.\n\n🛡️ **Protección de Datos (DPO)**\nCumplimiento RGPD completo. Evita multas de hasta 20 millones de euros.\n\n⚖️ **Peritaje Judicial**\nInformes técnicos para juicios y reclamaciones a aseguradoras.\n\n¿Cuál de estos servicios te interesa más? Puedo darte información más detallada."
    ],
    'precio' => [
        'keywords' => ['precio', 'coste', 'cuesta', 'presupuesto', 'tarifa', 'cuanto', 'cuánto', 'caro', 'barato', 'económico', 'economico'],
        'answer' => "Cada proyecto es único, por eso personalizamos cada presupuesto.\n\n💡 **Lo que sí te puedo decir:**\n- Consultoría inicial: desde 150€\n- Auditoría básica: desde 300€\n- Diseño de sistemas: depende del alcance\n- DPO externo: desde 80€/mes\n\n📊 **Dato interesante:**\nEl 95% de nuestros clientes recuperan la inversión en menos de 6 meses, ya sea por ahorro en seguros, optimización de contratos o evitando incidentes.\n\n¿Quieres que analicemos tu caso concreto? La primera consulta es sin compromiso."
    ],
    'contacto' => [
        'keywords' => ['contacto', 'teléfono', 'telefono', 'llamar', 'whatsapp', 'email', 'correo', 'hablar', 'cita', 'reunión', 'reunion'],
        'answer' => "¡Claro! Puedes contactar con Juan Luis directamente:\n\n📞 **Teléfono:** +34 637 474 428\n💬 **WhatsApp:** wa.me/34637474428 (respuesta rápida)\n✉️ **Email:** info@praxisseguridad.es\n\n🤖 **Bot de Telegram:** t.me/Praxis_bot\n\n⏰ **Horario:** L-V 09:00-18:00\nPara urgencias: disponibilidad 24/7\n\n💡 La primera consulta telefónica es gratuita. ¿Quieres que te llamemos nosotros?"
    ],
    'por_que' => [
        'keywords' => ['por qué', 'porque', 'elegir', 'diferencia', 'mejor', 'competencia', 'otros', 'ventaja'],
        'answer' => "**¿Por qué elegir Praxis Seguridad?**\n\n1️⃣ **Independencia total**\nNo vendemos productos, solo asesoramos. No tenemos comisiones de ningún fabricante.\n\n2️⃣ **Experiencia real**\n+15 años en el sector. Director de Seguridad, DPO certificado, Perito Judicial.\n\n3️⃣ **Visión completa**\nConozco el sector desde dentro: he sido vigilante, instalador, comercial y director.\n\n4️⃣ **Resultados medibles**\nNuestros clientes ahorran una media del 28% en costes de seguridad.\n\n5️⃣ **Trato personal**\nNo eres un número. Trabajo directamente contigo.\n\n¿Quieres ver casos de éxito reales?"
    ],
    'auditoria' => [
        'keywords' => ['auditoría', 'auditoria', 'auditar', 'revisar', 'análisis', 'analisis', 'evaluar', 'evaluación', 'evaluacion', 'diagnóstico', 'diagnostico'],
        'answer' => "🔍 **Auditoría de Seguridad**\n\n¿Sabías que el 70% de las empresas pagan más de lo necesario en seguridad SIN estar bien protegidas?\n\nNuestra auditoría incluye:\n✅ Análisis de riesgos reales\n✅ Revisión de sistemas existentes\n✅ Evaluación de contratos y proveedores\n✅ Detección de puntos ciegos\n✅ Informe con recomendaciones claras\n\n📊 **Resultado típico:**\n- Reducción de costes: 25-35%\n- Mejora de cobertura: hasta 40%\n- ROI habitual: 3-6 meses\n\n¿Cuándo fue la última vez que revisaste tu seguridad?"
    ],
    'alarma' => [
        'keywords' => ['alarma', 'alarmas', 'intrusión', 'intrusion', 'robo', 'ladrón', 'ladron', 'detector', 'atraco', 'robar'],
        'answer' => "🚨 **Sistemas de Alarma**\n\n⚠️ **El problema común:**\nMuchas alarmas se instalan sin análisis previo. Resultado: falsas alarmas, puntos ciegos, o sistemas sobredimensionados.\n\n✅ **Nuestra metodología:**\n1. Analizamos TUS riesgos reales\n2. Diseñamos el sistema óptimo\n3. Te ayudamos a elegir proveedor\n4. Supervisamos la instalación\n\n💡 **Ahorro típico:** 20-40% respecto a presupuestos comerciales\n\n¿Ya tienes alarma o estás buscando una nueva? Puedo darte una segunda opinión gratuita sobre cualquier presupuesto."
    ],
    'camaras' => [
        'keywords' => ['cámara', 'camara', 'cámaras', 'camaras', 'cctv', 'video', 'vídeo', 'vigilancia', 'grabar', 'grabación', 'grabacion'],
        'answer' => "📹 **Sistemas CCTV**\n\n❌ **Error frecuente:**\nInstalar cámaras donde 'parece' que hacen falta, sin análisis técnico.\n\n✅ **Lo que hacemos:**\n1. Estudio de cobertura real\n2. Selección de tecnología adecuada (IP, analógica, térmica...)\n3. Diseño de almacenamiento según RGPD\n4. Cumplimiento legal (carteles, registro AEPD...)\n\n⚖️ **Importante:** Un sistema mal diseñado puede ser ILEGAL y las grabaciones, inadmisibles como prueba.\n\n¿Tienes cámaras instaladas o estás pensando en ponerlas?"
    ],
    'dpo' => [
        'keywords' => ['dpo', 'delegado', 'protección de datos', 'rgpd', 'lopd', 'datos personales', 'privacidad', 'aepd', 'multa', 'sanción', 'sancion'],
        'answer' => "🛡️ **Protección de Datos (DPO)**\n\n⚠️ **¿Sabías que...?**\nLas multas por incumplimiento del RGPD pueden llegar a 20 millones de euros o el 4% de la facturación.\n\n**Servicios DPO:**\n✅ Auditoría de cumplimiento\n✅ Registro de actividades de tratamiento\n✅ Políticas de privacidad\n✅ Formación al personal\n✅ Gestión de incidencias\n✅ Delegado externo (DPO as a Service)\n\n💰 **Desde 80€/mes** para empresas pequeñas\n\n¿Tu empresa cumple realmente con el RGPD? Puedo hacer una revisión rápida."
    ],
    'peritaje' => [
        'keywords' => ['peritaje', 'perito', 'judicial', 'informe', 'juicio', 'seguro', 'aseguradora', 'siniestro', 'reclamación', 'reclamacion', 'denuncia'],
        'answer' => "⚖️ **Peritaje Judicial**\n\n¿Problemas con tu aseguradora? ¿Necesitas un informe técnico para un juicio?\n\n**Servicios periciales:**\n✅ Valoración de sistemas de seguridad\n✅ Análisis de siniestros (robos, incendios...)\n✅ Informes para reclamaciones a seguros\n✅ Ratificación en juicio\n✅ Peritajes de parte\n\n📊 **Dato:** El 80% de las reclamaciones con informe pericial profesional se resuelven favorablemente.\n\n¿Tienes algún caso en trámite?"
    ],
    'empresa' => [
        'keywords' => ['empresa', 'empresarial', 'negocio', 'comercio', 'oficina', 'industrial', 'nave', 'local', 'tienda'],
        'answer' => "🏢 **Seguridad para Empresas**\n\nCada negocio tiene riesgos diferentes. Ofrecemos:\n\n📋 **Consultoría estratégica**\n- Modelo de seguridad corporativo\n- Optimización de recursos\n- Formación de personal\n\n🔧 **Servicios técnicos**\n- Diseño de sistemas integrados\n- Auditoría de instalaciones\n- Segunda opinión sobre presupuestos\n\n📜 **Cumplimiento normativo**\n- RGPD y protección de datos\n- Planes de autoprotección\n- Documentación legal\n\n¿Qué tipo de empresa tienes? Así puedo orientarte mejor."
    ],
    'particular' => [
        'keywords' => ['particular', 'casa', 'hogar', 'vivienda', 'chalet', 'piso', 'doméstico', 'domestico', 'residencial', 'familia'],
        'answer' => "🏠 **Seguridad para Hogares**\n\nProteger tu hogar no tiene por qué ser caro ni complicado.\n\n**Te ayudo a:**\n✅ Evaluar tus riesgos reales\n✅ Evitar que te vendan lo que no necesitas\n✅ Elegir el mejor sistema calidad/precio\n✅ Supervisar la instalación\n✅ Configurar correctamente tu alarma\n\n💡 **¿Sabías que...?**\nEl 60% de los sistemas domésticos están mal configurados. Una simple revisión puede marcar la diferencia.\n\n¿Ya tienes algún sistema instalado?"
    ],
    'segunda_opinion' => [
        'keywords' => ['segunda opinión', 'segunda opinion', 'otro presupuesto', 'revisar presupuesto', 'caro el presupuesto', 'comparar'],
        'answer' => "🤔 **¿Dudas sobre un presupuesto?**\n\nEs muy habitual. Las empresas de seguridad suelen recomendar sistemas sobredimensionados.\n\n**Te ofrezco:**\n✅ Revisión de tu presupuesto\n✅ Análisis de lo que realmente necesitas\n✅ Comparativa con alternativas\n✅ Negociación con proveedores\n\n💰 **Coste:** Solo 50€ por revisión\n**Ahorro medio:** 800-2000€ en instalaciones medianas\n\n¿Quieres enviarme el presupuesto por WhatsApp o email?"
    ],
    'urgente' => [
        'keywords' => ['urgente', 'urgencia', 'rápido', 'rapido', 'ahora', 'inmediato', 'emergencia', 'hoy', 'mañana'],
        'answer' => "⚡ **¿Necesitas atención urgente?**\n\nPara urgencias, llama directamente:\n📞 +34 637 474 428\n\nDisponibilidad 24/7 para:\n- Asesoramiento post-robo\n- Incidencias con sistemas\n- Consultas urgentes\n\nSi no es urgente pero quieres respuesta rápida, WhatsApp es la mejor opción:\n💬 wa.me/34637474428"
    ],
    'gracias' => [
        'keywords' => ['gracias', 'vale', 'ok', 'perfecto', 'genial', 'estupendo', 'entendido', 'claro'],
        'answer' => "¡De nada! 😊\n\nRecuerda que puedes:\n📞 Llamar: +34 637 474 428\n💬 WhatsApp: wa.me/34637474428\n📝 Rellenar el cuestionario de valoración\n\n💡 La primera consulta es siempre gratuita y sin compromiso.\n\n¿Hay algo más en lo que pueda ayudarte?"
    ],
    'despedida' => [
        'keywords' => ['adiós', 'adios', 'hasta luego', 'chao', 'bye', 'nos vemos', 'salir'],
        'answer' => "¡Hasta pronto! 👋\n\nSi en algún momento necesitas asesoramiento en seguridad, aquí estaré.\n\n📞 +34 637 474 428\n💬 wa.me/34637474428\n\n¡Que tengas un gran día!"
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
