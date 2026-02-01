-- =============================================
-- Tabla: solicitudes_contacto
-- Almacena las solicitudes de consultoría
-- =============================================

CREATE TABLE solicitudes_contacto (
    id UUID DEFAULT gen_random_uuid() PRIMARY KEY,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT NOW(),
    
    -- Datos del cliente
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(50),
    
    -- Clasificación
    tipo_cliente VARCHAR(50), -- empresa, comercio, particular
    tipo_servicio VARCHAR(100), -- consultoria, auditoria, alarmas, etc.
    localidad VARCHAR(255),
    
    -- Mensaje
    mensaje TEXT,
    
    -- Metadatos
    origen VARCHAR(100) DEFAULT 'web_contacto', -- De dónde viene el formulario
    ip_address VARCHAR(45),
    user_agent TEXT,
    
    -- Estado de gestión
    estado VARCHAR(50) DEFAULT 'pendiente', -- pendiente, contactado, cerrado
    notas_internas TEXT,
    
    -- Seguimiento
    leido BOOLEAN DEFAULT FALSE,
    respondido_at TIMESTAMP WITH TIME ZONE
);

-- Índices para búsquedas comunes
CREATE INDEX idx_solicitudes_estado ON solicitudes_contacto(estado);
CREATE INDEX idx_solicitudes_fecha ON solicitudes_contacto(created_at DESC);
CREATE INDEX idx_solicitudes_email ON solicitudes_contacto(email);

-- Row Level Security (opcional pero recomendado)
ALTER TABLE solicitudes_contacto ENABLE ROW LEVEL SECURITY;

-- Política para insertar (permite que cualquiera envíe solicitudes)
CREATE POLICY "Permitir inserciones públicas" ON solicitudes_contacto
    FOR INSERT WITH CHECK (true);

-- Política para leer (solo usuarios autenticados)
CREATE POLICY "Solo lectura autenticada" ON solicitudes_contacto
    FOR SELECT USING (auth.role() = 'authenticated');

-- Comentario de tabla
COMMENT ON TABLE solicitudes_contacto IS 'Solicitudes de consultoría recibidas desde la web';
