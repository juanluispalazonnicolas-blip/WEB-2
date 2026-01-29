-- =============================================
-- Praxis Seguridad - Tabla para Chatbot
-- Ejecutar en Supabase SQL Editor
-- =============================================

-- Crear tabla de respuestas del chatbot
CREATE TABLE IF NOT EXISTS chatbot_responses (
    id SERIAL PRIMARY KEY,
    keywords TEXT[] NOT NULL,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    category VARCHAR(50),
    priority INT DEFAULT 0,
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- Habilitar Row Level Security
ALTER TABLE chatbot_responses ENABLE ROW LEVEL SECURITY;

-- Política para permitir lectura pública (el chatbot web necesita leer)
CREATE POLICY "Allow public read access" 
ON chatbot_responses 
FOR SELECT 
USING (true);

-- =============================================
-- Insertar FAQs iniciales
-- =============================================

INSERT INTO chatbot_responses (keywords, question, answer, category, priority) VALUES
(
    ARRAY['servicio', 'servicios', 'ofrecen', 'hacen', 'ofrece', 'realizan'],
    '¿Qué servicios ofrecéis?',
    'Ofrecemos consultoría estratégica, auditoría de riesgos, diseño de sistemas de seguridad (CCTV, alarmas, control de accesos), servicios de vigilancia y tecnología e IA. ¿Te interesa alguno en particular?',
    'servicios',
    10
),
(
    ARRAY['precio', 'precios', 'coste', 'cuesta', 'presupuesto', 'tarifa', 'cuanto', 'cuánto'],
    '¿Cuánto cuestan vuestros servicios?',
    'Cada proyecto es personalizado según tus necesidades. Solicita una consultoría gratuita y te haremos un presupuesto sin compromiso. ¿Quieres que te contactemos?',
    'precios',
    10
),
(
    ARRAY['contacto', 'teléfono', 'telefono', 'llamar', 'whatsapp', 'email', 'correo', 'hablar'],
    '¿Cómo puedo contactaros?',
    'Puedes contactarnos de varias formas:\n📞 Teléfono: +34 637 474 428\n💬 WhatsApp: wa.me/34637474428\n✉️ Email: info@praxisseguridad.es',
    'contacto',
    10
),
(
    ARRAY['horario', 'hora', 'horas', 'abierto', 'disponible', 'atencion', 'atención', 'cuando', 'cuándo'],
    '¿Cuál es vuestro horario de atención?',
    'Nuestro horario es de lunes a viernes de 09:00 a 18:00. Para urgencias, tenemos disponibilidad 24/7.',
    'horario',
    10
),
(
    ARRAY['ubicación', 'ubicacion', 'donde', 'dónde', 'murcia', 'santomera', 'direccion', 'dirección', 'zona'],
    '¿Dónde estáis ubicados?',
    'Estamos ubicados en Santomera, Región de Murcia, España. Damos servicio en toda la región de Murcia y alrededores.',
    'ubicacion',
    10
),
(
    ARRAY['cámara', 'camara', 'cámaras', 'camaras', 'cctv', 'video', 'vídeo', 'grabar', 'grabación'],
    '¿Instaláis sistemas de cámaras?',
    'Sí, diseñamos e instalamos sistemas CCTV profesionales. No vendemos productos genéricos: analizamos tus necesidades y diseñamos la solución óptima. ¿Quieres una consultoría gratuita?',
    'servicios',
    8
),
(
    ARRAY['alarma', 'alarmas', 'intrusión', 'intrusion', 'robo', 'ladrón', 'ladron', 'detector', 'detectores'],
    '¿Qué sistemas de alarma ofrecéis?',
    'Diseñamos sistemas de detección de intrusión conectados a CRA (Central Receptora de Alarmas). Pensamos antes de instalar para darte la mejor protección.',
    'servicios',
    8
),
(
    ARRAY['acceso', 'accesos', 'entrada', 'puerta', 'biométrico', 'biometrico', 'tarjeta', 'llave', 'control'],
    '¿Instaláis control de accesos?',
    'Implementamos sistemas de control de accesos: tarjetas, códigos, biométricos... Todo diseñado según las necesidades específicas de tu instalación.',
    'servicios',
    8
),
(
    ARRAY['consultoría', 'consultoria', 'asesor', 'asesoramiento', 'análisis', 'analisis', 'auditoría', 'auditoria', 'evaluar'],
    '¿En qué consiste vuestra consultoría?',
    'Nuestra consultoría estratégica analiza tu situación actual y diseña el modelo de seguridad óptimo. No vendemos, asesoramos. ¿Agendamos una reunión sin compromiso?',
    'servicios',
    9
),
(
    ARRAY['hola', 'buenas', 'buenos', 'hey', 'saludos', 'qué tal', 'que tal', 'hi', 'hello'],
    'Saludo',
    '¡Hola! 👋 Soy el asistente virtual de Praxis Seguridad. ¿En qué puedo ayudarte? Puedo informarte sobre nuestros servicios, precios, horarios o cómo contactarnos.',
    'saludo',
    5
),
(
    ARRAY['gracias', 'vale', 'ok', 'perfecto', 'genial', 'estupendo', 'entendido', 'claro'],
    'Agradecimiento',
    '¡De nada! Si tienes más preguntas, aquí estoy. También puedes llamarnos al +34 637 474 428 o solicitar una consultoría gratuita.',
    'cortesia',
    5
),
(
    ARRAY['vigilancia', 'vigilante', 'guardia', 'guardias', 'seguridad', 'vigilar', 'ronda', 'rondas'],
    '¿Ofrecéis servicios de vigilancia?',
    'Sí, ofrecemos estructuración y coordinación profesional de servicios de vigilancia, acudas y servicios auxiliares. Diseñamos el modelo que mejor se adapte a tu necesidad.',
    'servicios',
    8
),
(
    ARRAY['tecnología', 'tecnologia', 'ia', 'inteligencia', 'artificial', 'automatización', 'automatizacion', 'digital'],
    '¿Trabajáis con tecnología e IA?',
    'Sí, integramos automatización, control y eficiencia operativa usando herramientas digitales avanzadas e inteligencia artificial para optimizar la seguridad.',
    'servicios',
    7
);

-- =============================================
-- Verificar datos insertados
-- =============================================
-- SELECT * FROM chatbot_responses ORDER BY priority DESC;
