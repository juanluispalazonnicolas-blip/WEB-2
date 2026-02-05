<?php
/**
 * DATA ARRAY - Todas las Ciudades
 * Información contextualizada única para cada ubicación
 * 
 * IMPORTANTE: Este array contiene datos reales de cada ciudad
 * para evitar contenido duplicado y mejorar posicionamiento local
 */

$ciudades_data = [
    
    // ========================================
    // NIVEL 1: EL NÚCLEO (Santomera base)
    // ========================================
    
    'santomera' => [
        'nombre' => 'Santomera',
        'provincia' => 'Murcia',
        'url_slug' => 'seguridad-santomera',
        'title' => 'Empresa de Seguridad Privada en Santomera | Praxis Seguridad',
        'description' => 'Servicios de seguridad privada en Santomera. Vigilantes, control de accesos, instalación alarmas. Respuesta inmediata desde nuestra base en Santomera.',
        'keywords' => 'seguridad Santomera, vigilantes Santomera, alarmas Santomera',
        'sector_economico' => 'industrial-logistica',
        'descripcion_zona' => 'Santomera es un municipio estratégicamente ubicado en el límite entre Murcia y Alicante, con fuerte presencia de polígonos industriales y empresas de logística.',
        'poligonos' => ['Polígono Industrial de Santomera', 'Zona Industrial El Siscar'],
        'barrios' => ['Centro Santomera', 'El Siscar', 'Zeneta', 'Matanza'],
        'calles_principales' => ['Avenida de Orihuela', 'Calle Mayor', 'Avenida de la Constitución'],
        'tiempo_respuesta' => '15 minutos',
        'servicios_clave' => ['Seguridad Naves Industriales', 'Control Accesos', 'Vigilancia 24/7'],
        'sectores_cliente' => ['Logística', 'Almacenaje', 'Industria Manufacturera']
    ],
    
    'abanilla' => [
        'nombre' => 'Abanilla',
        'provincia' => 'Murcia',
        'url_slug' => 'seguridad-abanilla',
        'title' => 'Seguridad Privada en Abanilla | Vigilancia y Alarmas | Praxis',
        'description' => 'Empresa de seguridad en Abanilla. Protección para fincas, naves agrícolas y viviendas. Respuesta rápida desde Santomera.',
        'keywords' => 'seguridad Abanilla, vigilantes Abanilla, alarmas Abanilla',
        'sector_economico' => 'agricola-residencial',
        'descripcion_zona' => 'Abanilla, conocida por su agricultura y entorno natural, requiere soluciones de seguridad adaptadas a fincas, naves agrícolas y urbanizaciones dispersas.',
        'poligonos' => ['Zona Agrícola Mahoya', 'Paraje Rural La Umbría'],
        'barrios' => ['Abanilla Centro', 'Mahoya', 'Barinas'],
        'calles_principales' => ['Calle Colón', 'Calle Gloria', 'Avenida Constitución'],
        'tiempo_respuesta' => '18 minutos',
        'servicios_clave' => ['Seguridad Fincas', 'Alarmas Rurales', 'Vigilancia Naves Agrícolas'],
        'sectores_cliente' => ['Agricultura', 'Residencial Rural', 'Turismo Rural']
    ],
    
    'fortuna' => [
        'nombre' => 'Fortuna',
        'provincia' => 'Murcia',
        'url_slug' => 'seguridad-fortuna',
        'title' => 'Seguridad en Fortuna | Alarmas y Vigilancia | Praxis Seguridad',
        'description' => 'Servicios de seguridad en Fortuna. Protección para balnearios, hoteles y viviendas. Cobertura desde nuestra base en Santomera.',
        'keywords' => 'seguridad Fortuna, vigilantes Fortuna, alarmas Fortuna',
        'sector_economico' => 'turismo-residencial',
        'descripcion_zona' => 'Fortuna, famosa por sus balnearios termales, combina turismo de salud con una creciente zona residencial que demanda seguridad de calidad.',
        'poligonos' => ['Polígono Industrial Los Baños', 'Zona Comercial Centro'],
        'barrios' => ['Fortuna Centro', 'Baños de Fortuna', 'El Saladar'],
        'calles_principales' => ['Avenida Juan Carlos I', 'Calle Balneario', 'Plaza Constitución'],
        'tiempo_respuesta' => '20 minutos',
        'servicios_clave' => ['Seguridad Hotelera', 'Control Accesos Spas', 'Vigilancia Residencial'],
        'sectores_cliente' => ['Hotelería', 'Balnearios', 'Comercio', 'Residencial']
    ],
    
    // ========================================
    // NIVEL 2: CINTURÓN METROPOLITANO
    // ========================================
    
    // MURCIA CAPITAL
    'murcia' => [
        'nombre' => 'Murcia',
        'provincia' => 'Murcia',
        'url_slug' => 'seguridad-en-murcia',
        'title' => 'Empresa de Seguridad en Murcia Capital | Vigilantes y Alarmas',
        'description' => 'Servicios de seguridad privada en Murcia capital. Vigilantes, control de accesos, consultoría. Experiencia en el sector desde hace años.',
        'keywords' => 'seguridad Murcia, vigilantes Murcia, empresa seguridad Murcia',
        'sector_economico' => 'consultoria-vigilancia',
        'descripcion_zona' => 'Murcia capital, como centro neurálgico de la región, concentra empresas de servicios, comercios y administraciones públicas que requieren seguridad profesional.',
        'poligonos' => ['Polígono Oeste', 'Espinardo Parque Científico', 'Polígono La Estrella'],
        'barrios' => ['Centro', 'El Carmen', 'Santa María de Gracia', 'La Flota', 'Vistabella'],
        'calles_principales' => ['Gran Vía', 'Avenida Libertad', 'Alfonso X El Sabio'],
        'tiempo_respuesta' => '25 minutos',
        'servicios_clave' => ['Consultoría Seguridad', 'Vigilantes Físicos', 'Sistemas Integrados'],
        'sectores_cliente' => ['Administración', 'Comercio', 'Servicios', 'Educación']
    ],
    
    'molina-segura' => [
        'nombre' => 'Molina de Segura',
        'provincia' => 'Murcia',
        'url_slug' => 'seguridad-molina-segura',
        'title' => 'Seguridad en Molina de Segura | Empresas y Polígonos Industriales',
        'description' => 'Seguridad para polígonos industriales de Molina de Segura. Especialistas en naves, almacenes y empresas del sector conservero.',
        'keywords' => 'seguridad Molina de Segura, vigilancia polígonos Molina',
        'sector_economico' => 'industrial-conservero',
        'descripcion_zona' => 'Molina de Segura es uno de los municipios más industrializados de Murcia, destacando por sus polígonos y empresas del sector conservero y agroalimentario.',
        'poligonos' => ['Polígono Industrial La Serreta', 'Polígono Industrial Oeste', 'Polígono Industrial El Llano'],
        'barrios' => ['Molina Centro', 'La Alcayna', 'Ribera de Molina', 'Altorreal'],
        'calles_principales' => ['Avenida de Madrid', 'Calle Mayor', 'Avenida de la Constitución'],
        'tiempo_respuesta' => '25 minutos',
        'servicios_clave' => ['Seguridad Polígonos', 'Vigilancia Naves', 'Control Perimetral'],
        'sectores_cliente' => ['Conservas', 'Logística', 'Industria Agroalimentaria']
    ],
    
    'alcantarilla' => [
        'nombre' => 'Alcantarilla',
        'provincia' => 'Murcia',
        'url_slug' => 'seguridad-alcantarilla',
        'title' => 'Seguridad en Alcantarilla | Vigilancia y Control de Accesos',
        'description' => 'Servicios de seguridad en Alcantarilla. Protección para empresas de logística, almacenes y centros comerciales.',
        'keywords' => 'seguridad Alcantarilla, vigilantes Alcantarilla',
        'sector_economico' => 'logistica-comercial',
        'descripcion_zona' => 'Alcantarilla, ubicada en el área metropolitana de Murcia, cuenta con importantes centros logísticos y comerciales que demandan seguridad especializada.',
        'poligonos' => ['Polígono Industrial Oeste', 'Polígono Industrial Camposol'],
        'barrios' => ['Centro Alcantarilla', 'San José Obrero', 'Vistabella'],
        'calles_principales' => ['Avenida Príncipes de España', 'Calle Mayor', 'Carretera Madrid'],
        'tiempo_respuesta' => '22 minutos',
        'servicios_clave' => ['Seguridad Logística', 'Control Camiones', 'Vigilancia Almacenes'],
        'sectores_cliente' => ['Logística', 'Distribución', 'Comercio']
    ],
    
    'torres-cotillas' => [
        'nombre' => 'Las Torres de Cotillas',
        'provincia' => 'Murcia',
        'url_slug' => 'seguridad-torres-cotillas',
        'title' => 'Seguridad en Las Torres de Cotillas | Empresas y Naves Industriales',
        'description' => 'Seguridad privada en Las Torres de Cotillas. Vigilancia para polígonos industriales y empresas manufactureras.',
        'keywords' => 'seguridad Torres de Cotillas, vigilantes Torres Cotillas',
        'sector_economico' => 'industrial-manufacturero',
        'descripcion_zona' => 'Las Torres de Cotillas es un municipio industrial con crecientes polígonos que albergan empresas manufactureras y de servicios.',
        'poligonos' => ['Polígono Industrial Mosa', 'Polígono Industrial El Romeral'],
        'barrios' => ['Centro', 'La Florida', 'Los Pulpites'],
        'calles_principales' => ['Avenida Reyes Católicos', 'Calle Mayor', 'Avenida Constitución'],
        'tiempo_respuesta' => '28 minutos',
        'servicios_clave' => ['Seguridad Naves', 'Vigilancia Nocturna', 'Control Accesos'],
        'sectores_cliente' => ['Manufactura', 'Metal-mecánica', 'Servicios']
    ],
    
    // VEGA BAJA (ALICANTE)
    'orihuela' => [
        'nombre' => 'Orihuela',
        'provincia' => 'Alicante',
        'url_slug' => 'seguridad-orihuela',
        'title' => 'Seguridad en Orihuela | Vigilancia Urbanizaciones y Empresas',
        'description' => 'Servicios de seguridad en Orihuela y Orihuela Costa. Control de accesos en urbanizaciones, comunidades y empresas.',
        'keywords' => 'seguridad Orihuela, vigilantes Orihuela, seguridad Orihuela Costa',
        'sector_economico' => 'residencial-servicios',
        'descripcion_zona' => 'Orihuela combina un importante casco histórico con Orihuela Costa, zona residencial turística que requiere control de accesos especializado.',
        'poligonos' => ['Polígono Industrial San Bartolomé', 'Polígono Comercial La Zenia Boulevard'],
        'barrios' => ['Orihuela Centro', 'Orihuela Costa', 'Desamparados', 'Campoamor'],
        'calles_principales' => ['Avenida de España', 'Calle Mayor', 'N-332'],
        'tiempo_respuesta' => '30 minutos',
        'servicios_clave' => ['Control Urbanizaciones', 'Seguridad Comunidades', 'Vigilancia Comercial'],
        'sectores_cliente' => ['Residencial', 'Turismo', 'Comercio', 'Servicios']
    ],
    
    // ========================================
    // NIVEL 3: ARCO MEDITERRÁNEO
    // ========================================
    
    // ALICANTE
    'alicante' => [
        'nombre' => 'Alicante',
        'provincia' => 'Alicante',
        'url_slug' => 'seguridad-alicante',
        'title' => 'Empresa de Seguridad en Alicante | Servicios Profesionales',
        'description' => 'Seguridad privada en Alicante capital. Vigilantes, control de accesos, consultoría para empresas de servicios y comercios.',
        'keywords' => 'seguridad Alicante, vigilantes Alicante, empresa seguridad Alicante',
        'sector_economico' => 'servicios-comercial',
        'descripcion_zona' => 'Alicante, capital de la Costa Blanca, es un importante centro de servicios, turismo y comercio que demanda seguridad de alto nivel.',
        'poligonos' => ['Polígono Industrial Pla de la Vallonga', 'Polígono Las Atalayas'],
        'barrios' => ['Centro', 'Playa San Juan', 'Albufereta', 'Cabo de las Huertas'],
        'calles_principales' => ['Avenida Maisonnave', 'Rambla Méndez Núñez', 'Alfonso X El Sabio'],
        'tiempo_respuesta' => '45 minutos',
        'servicios_clave' => ['Seguridad Comercial', 'Eventos', 'Vigilancia Hoteles'],
        'sectores_cliente' => ['Turismo', 'Comercio', 'Servicios', 'Hotelería']
    ],
    
    'elche' => [
        'nombre' => 'Elche',
        'provincia' => 'Alicante',
        'url_slug' => 'seguridad-elche',
        'title' => 'Seguridad en Elche | Industria del Calzado y Empresas',
        'description' => 'Servicios de seguridad en Elche. Especialistas en polígonos industriales del calzado, almacenes y centros logísticos.',
        'keywords' => 'seguridad Elche, vigilancia polígonos Elche',
        'sector_economico' => 'calzado-industrial',
        'descripcion_zona' => 'Elche es la capital del calzado, con numerosos polígonos industriales dedicados a la fabricación, almacenaje y distribución de calzado.',
        'poligonos' => ['Polígono Industrial Carrús', 'Polígono Industrial Altabix', 'Pla de la Vallonga'],
        'barrios' => ['Centro Elche', 'Carrús', 'Altabix', 'El Pla'],
        'calles_principales' => ['Avenida Libertad', 'Avenida del Ferrocarril', 'Paseo de Germanies'],
        'tiempo_respuesta' => '50 minutos',
        'servicios_clave' => ['Seguridad Industria Calzado', 'Vigilancia Almacenes', 'Control Mercancías'],
        'sectores_cliente' => ['Calzado', 'Logística', 'Distribución']
    ],
    
    'torrevieja' => [
        'nombre' => 'Torrevieja',
        'provincia' => 'Alicante',
        'url_slug' => 'seguridad-torrevieja',
        'title' => 'Seguridad en Torrevieja | Vigilancia y Control de Accesos',
        'description' => 'Seguridad en Torrevieja para urbanizaciones, comunidades y negocios turísticos. Control de accesos especializado.',
        'keywords' => 'seguridad Torrevieja, vigilantes Torrevieja',
        'sector_economico' => 'turismo-residencial',
        'descripcion_zona' => 'Torrevieja, importante destino turístico de la Costa Blanca, tiene una alta demanda de seguridad para urbanizaciones residenciales y negocios de servicios.',
        'poligonos' => ['Polígono Industrial La Cooperativa', 'Zona Comercial Habaneras'],
        'barrios' => ['Centro Torrevieja', 'La Mata', 'Punta Prima', 'Los Balcones'],
        'calles_principales' => ['Avenida de las Habaneras', 'Paseo Vistalegre', 'Avenida Doctor Gregorio Marañón'],
        'tiempo_respuesta' => '55 minutos',
        'servicios_clave' => ['Control Urbanizaciones', 'Seguridad Comercial', 'Vigilancia Nocturna'],
        'sectores_cliente' => ['Residencial', 'Turismo', 'Comercio', 'Hostelería']
    ],
    
    // VALENCIA
    'valencia' => [
        'nombre' => 'Valencia',
        'provincia' => 'Valencia',
        'url_slug' => 'seguridad-valencia',
        'title' => 'Empresa de Seguridad en Valencia | Servicios Profesionales',
        'description' => 'Seguridad privada en Valencia. Vigilantes, control de accesos, consultoría para empresas. Experiencia en todo tipo de sectores.',
        'keywords' => 'seguridad Valencia, vigilantes Valencia, empresa seguridad Valencia',
        'sector_economico' => 'servicios-capital',
        'descripcion_zona' => 'Valencia, tercera ciudad de España, concentra empresas de servicios, tecnología, logística portuaria y un importante sector turístico.',
        'poligonos' => ['Polígono Industrial Vara de Quart', 'Parque Tecnológico', 'Puerto de Valencia'],
        'barrios' => ['Centro Valencia', 'Ruzafa', 'Campanar', 'Benimaclet'],
        'calles_principales' => ['Avenida del Puerto', 'Gran Vía Marqués del Turia', 'Avenida Blasco Ibáñez'],
        'tiempo_respuesta' => '90 minutos',
        'servicios_clave' => ['Consultoría Seguridad', 'Vigilancia Empresas', 'Control Logística'],
        'sectores_cliente' => ['Tecnología', 'Logística Portuaria', 'Servicios', 'Turismo']
    ],
    
    // ========================================
    // NIVEL 4: ANDALUCÍA ORIENTAL
    // =======================================
    
    'almeria' => [
        'nombre' => 'Almería',
        'provincia' => 'Almería',
        'url_slug' => 'seguridad-almeria',
        'title' => 'Seguridad en Almería | Vigilancia Agrícola y Empresas',
        'description' => 'Servicios de seguridad en Almería. Especialistas en protección de fincas, invernaderos y empresas del sector agrícola.',
        'keywords' => 'seguridad Almería, vigilancia Almería',
        'sector_economico' => 'agricultura-tecnica',
        'descripcion_zona' => 'Almería, líder en agricultura intensiva y tecnificada, requiere seguridad especializada para invernaderos, instalaciones agroindustriales y fincas.',
        'poligonos' => ['Polígono La Juaida', 'Polígono Industrial Sector 20'],
        'barrios' => ['Centro Almería', 'Nueva Andalucía', 'Los Ángeles'],
        'calles_principales' => ['Rambla de Belén', 'Avenida del Mediterráneo', 'Carretera de Ronda'],
        'tiempo_respuesta' => '120 minutos',
        'servicios_clave' => ['Seguridad Fincas', 'Vigilancia Invernaderos', 'Control Agroindustrial'],
        'sectores_cliente' => ['Agricultura', 'Agroindustria', 'Exportación']
    ]
];

// Servicios compartidos que se adaptan según sector
$servicios_templates = [
    'industrial-logistica' => [
        ['nombre' => 'Seguridad para Naves Industriales', 'icon' => 'fa-warehouse'],
        ['nombre' => 'Respuesta Inmediata', 'icon' => 'fa-clock'],
        ['nombre' => 'Control de Accesos Empresarial', 'icon' => 'fa-user-shield'],
        ['nombre' => 'Vigilancia Nocturna', 'icon' => 'fa-moon']
    ],
    'residencial-servicios' => [
        ['nombre' => 'Control de Accesos Urbanizaciones', 'icon' => 'fa-home-lg-alt'],
        ['nombre' => 'Rondas de Vigilancia', 'icon' => 'fa-route'],
        ['nombre' => 'Seguridad Comunidades', 'icon' => 'fa-users'],
        ['nombre' => 'Alarmas Conectadas', 'icon' => 'fa-bell']
    ],
    'turismo-residencial' => [
        ['nombre' => 'Seguridad Hotelera', 'icon' => 'fa-hotel'],
        ['nombre' => 'Control de Accesos', 'icon' => 'fa-door-open'],
        ['nombre' => 'Vigilancia 24/7', 'icon' => 'fa-shield-alt'],
        ['nombre' => 'Eventos y Protocolo', 'icon' => 'fa-calendar-check']
    ]
];

return $ciudades_data;
