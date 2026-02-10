<?php
/**
 * GENERADOR DE PÁGINAS LOCALES SEO
 * 
 * Este script lee el template de Santomera y genera páginas personalizadas
 * para cada ciudad usando los datos de ciudades-data.php
 */

// Cargar datos de ciudades
require_once __DIR__ . '/includes/ciudades-data.php';

// Ciudades que necesitan página (las que NO tienen directorio o archivo index.php)
$ciudades_pendientes = [
    'fortuna',
   'murcia',
    'molina-segura',
    'alcantarilla',
    'torres-cotillas',
    'orihuela',
    'alicante',
    'elche',
    'torrevieja',
    'valencia',
    'almeria'
];

//Template base (Santomera)
$template = file_get_contents(__DIR__ . '/seguridad-santomera/index.php');

foreach ($ciudades_pendientes as $ciudad_key) {
    if (!isset($ciudades_data[$ciudad_key])) {
        echo "⚠️ Ciudad '$ciudad_key' no encontrada en ciudades-data.php\n";
        continue;
    }
    
    $data = $ciudades_data[$ciudad_key];
    $folder = $data['url_slug'];
    
    // Crear directorio si no existe
    if (!is_dir(__DIR__ . '/' . $folder)) {
        mkdir(__DIR__ . '/' . $folder, 0755, true);
    }
    
    // Generar contenido personalizado
    $content = <<<PHP
<?php
/**
 * Página Local SEO - {$data['nombre']}
 * Generada automáticamente con datos únicos
 */

// Datos específicos de esta ubicación
\$ciudad_data = [
    'nombre' => '{$data['nombre']}',
    'provincia' => '{$data['provincia']}',
    'url_slug' => '{$data['url_slug']}',
    
    // SEO
    'title' => '{$data['title']}',
    'description' => '{$data['description']}',
    'keywords' => '{$data['keywords']}',
    
    // Contexto geográfico real
    'sector_economico' => '{$data['sector_economico']}',
    'descripcion_zona' => '{$data['descripcion_zona']}',
    
    // Referencias geográficas
    'poligonos' => [
PHP;
    
    foreach ($data['poligonos'] as $poligono) {
        $content .= "\n        '" . addslashes($poligono) . "',";
    }
    $content = rtrim($content, ',');
    
    $content .= "\n    ],\n    \n    'barrios' => [\n";
    
    foreach ($data['barrios'] as $barrio) {
        $content .= "        '" . addslashes($barrio) . "',\n";
    }
    $content = rtrim($content, ",\n");
    
    $content .= "\n    ],\n    \n    'calles_principales' => [\n";
    
    foreach ($data['calles_principales'] as $calle) {
        $content .= "        '" . addslashes($calle) . "',\n";
    }
    $content = rtrim($content, ",\n");
    
    $content .= <<<PHP

    ],
    
    // Servicios contextualizados
    'servicios_destacados' => [
        [
            'nombre' => '{$data['servicios_clave'][0]}',
            'descripcion' => 'Protección especializada para el sector {$data['sector_economico']} de {$data['nombre']}.',
            'icon' => 'fa-warehouse'
        ],
        [
            'nombre' => 'Respuesta Inmediata',
            'descripcion' => 'Tiempo de respuesta aproximado: {$data['tiempo_respuesta']} desde nuestra base en Santomera.',
            'icon' => 'fa-clock'
        ],
        [
            'nombre' => '{$data['servicios_clave'][1]}',
            'descripcion' => 'Sistemas avanzados de control y monitorización.',
            'icon' => 'fa-user-shield'
        ],
        [
            'nombre' => '{$data['servicios_clave'][2]}',
            'descripcion' => 'Cobertura completa 24/7 en {$data['nombre']} y alrededores.',
            'icon' => 'fa-moon'
        ]
    ],
    
    // Ventajas competitivas locales
    'ventajas' => [
        'Conocimiento profundo de {$data['nombre']}',
        'Respuesta en {$data['tiempo_respuesta']}',
        'Experiencia en sector {$data['sector_economico']}',
        'Equipo profesional certificado',
        'Cobertura 24/7 todo el año'
    ],
    
    // Sectores objetivo
    'sectores_cliente' => [
PHP;
    
    foreach ($data['sectores_cliente'] as $sector) {
        $content .= "\n        '" . addslashes($sector) . "',";
    }
    $content = rtrim($content, ',');
    
    $content .= <<<PHP

    ],
    
    // Datos NAP
    'tiempo_respuesta' => '{$data['tiempo_respuesta']}',
    'area_cobertura' => '20 km radio',
    
    // Mapa (placeholder - actualizar con embedding real de Google Maps)
    'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50000!2d-1!3d38!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x!2s{$data['nombre']}!5e0!3m2!1ses!2ses!4v1234567890'
];

// Page config
\$page_title = \$ciudad_data['title'];
\$page_description = \$ciudad_data['description'];
\$page_keywords = \$ciudad_data['keywords'];
\$current_page = 'local-' . \$ciudad_data['url_slug'];

PHP;
    
    // Añadir el resto del template (desde require header en adelante)
    $template_lines = explode("\n", $template);
    $start_from = 0;
    foreach ($template_lines as $i => $line) {
        if (strpos($line, "require_once __DIR__ . '/../includes/header.php'") !== false) {
            $start_from = $i;
            break;
        }
    }
    
    $remaining_template = implode("\n", array_slice($template_lines, $start_from));
    $content .= "\n" . $remaining_template;
    
    // Escribir archivo
    $filepath = __DIR__ . '/' . $folder . '/index.php';
    file_put_contents($filepath, $content);
    
    echo "✅ Creado: {$folder}/index.php\n";
}

echo "\n🎉 ¡Todas las páginas generadas!\n";
?>
