#!/usr/bin/env php
<?php
/**
 * GENERADOR AUTOMÁTICO DE PÁGINAS LOCALES
 * 
 * Este script genera todas las páginas SEO locales automáticamente
 * basándose en el data array de ciudades.
 * 
 * USO: php generate-local-pages.php
 */

// Cargar datos
$ciudades_data = require_once __DIR__ . '/includes/ciudades-data.php';

// Contador
$generadas = 0;
$errores = [];

echo "🚀 Generando páginas locales SEO...\n\n";

foreach ($ciudades_data as $slug => $data) {
    try {
        // Crear directorio
        $dir = __DIR__ . '/' . $data['url_slug'];
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
            echo "📁 Creado directorio: {$data['url_slug']}/\n";
        }
        
        // Generar contenido de la página
        $content = generarPaginaLocal($data);
        
        // Guardar archivo
        $file = $dir . '/index.php';
        file_put_contents($file, $content);
        
        echo "✅ Generada: {$data['nombre']} ({$data['url_slug']}/index.php)\n";
        $generadas++;
        
    } catch (Exception $e) {
        $errores[] = "{$data['nombre']}: " . $e->getMessage();
        echo "❌ Error: {$data['nombre']} - {$e->getMessage()}\n";
    }
}

echo "\n";
echo "========================================\n";
echo "✅ Generadas: $generadas páginas\n";
if (count($errores) > 0) {
    echo "❌ Errores: " . count($errores) . "\n";
    foreach ($errores as $error) {
        echo "   - $error\n";
    }
}
echo "========================================\n";
echo "\n🎉 ¡Proceso completado!\n\n";

/**
 * Genera el contenido HTML/PHP de una página local
 */
function generarPaginaLocal($data) {
    // Generar descripción de servicios según sector
    $serviciosHTML = generarServiciosHTML($data);
    
    $content = <<<PHP
<?php
/**
 * Página Local SEO - {$data['nombre']}
 * Generada automáticamente - Contenido único
 */

\$page_title = "{$data['title']}";
\$page_description = "{$data['description']}";
\$page_keywords = "{$data['keywords']}";
\$current_page = 'local-{$data['url_slug']}';

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Schema.org LocalBusiness -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SecurityService",
  "name": "Praxis Seguridad - {$data['nombre']}",
  "description": "{$data['description']}",
  "areaServed": {
    "@type": "City",
    "name": "{$data['nombre']}",
    "addressRegion": "{$data['provincia']}",
    "addressCountry": "ES"
  },
  "provider": {
    "@type": "LocalBusiness",
    "name": "Praxis Seguridad",
    "telephone": "+34-637-474-428",
    "email": "info@praxisseguridad.es"
  },
  "serviceType": "Seguridad Privada"
}
</script>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-praxis-black via-praxis-gray-dark to-praxis-black py-32 overflow-hidden">
    <div class="absolute inset-0 bg-dot-pattern opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center px-4 py-2 bg-praxis-gold/10 border border-praxis-gold/30 rounded-full mb-6">
                    <i class="fas fa-map-marker-alt text-praxis-gold mr-2"></i>
                    <span class="text-praxis-gold font-semibold">Cobertura en {$data['nombre']}</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-praxis-white mb-6 leading-tight">
                    Seguridad Privada en<br>
                    <span class="text-praxis-gold">{$data['nombre']}</span>
                </h1>
                
                <p class="text-xl text-praxis-gray-light mb-8 leading-relaxed">
                    {$data['descripcion_zona']}
                    Tiempo de respuesta desde Santomera: <span class="text-praxis-gold font-semibold">{$data['tiempo_respuesta']}</span>.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="tel:+34637474428" class="inline-flex items-center px-8 py-4 bg-praxis-red text-white rounded-lg hover:bg-praxis-red/90 transition-all transform hover:scale-105 shadow-lg">
                        <i class="fas fa-phone-alt mr-3"></i>
                        <span class="font-semibold">Llamar Ahora</span>
                    </a>
                    <a href="#contacto" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-praxis-gold text-praxis-gold rounded-lg hover:bg-praxis-gold hover:text-praxis-black transition-all">
                        <i class="fas fa-envelope mr-3"></i>
                        <span class="font-semibold">Presupuesto Gratis</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Zonas de Cobertura -->
<section class="py-16 bg-praxis-gray-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-12 text-center">
            Zonas de Cobertura en {$data['nombre']}
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <h3 class="text-xl font-semibold text-praxis-white mb-4">
                    <i class="fas fa-industry text-praxis-gold mr-2"></i>
                    Polígonos / Zonas
                </h3>
                <ul class="space-y-2">
PHP;

    // Agregar polígonos
    foreach ($data['poligonos'] as $poligono) {
        $content .= <<<PHP

                    <li class="text-praxis-gray-light flex items-start">
                        <i class="fas fa-check text-praxis-gold mr-2 mt-1"></i>
                        <span>{$poligono}</span>
                    </li>
PHP;
    }
    
    $content .= <<<PHP

                </ul>
            </div>
            
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <h3 class="text-xl font-semibold text-praxis-white mb-4">
                    <i class="fas fa-home text-praxis-gold mr-2"></i>
                    Barrios
                </h3>
                <ul class="space-y-2">
PHP;

    // Agregar barrios
    foreach ($data['barrios'] as $barrio) {
        $content .= <<<PHP

                    <li class="text-praxis-gray-light flex items-start">
                        <i class="fas fa-check text-praxis-gold mr-2 mt-1"></i>
                        <span>{$barrio}</span>
                    </li>
PHP;
    }
    
    $content .= <<<PHP

                </ul>
            </div>
            
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <h3 class="text-xl font-semibold text-praxis-white mb-4">
                    <i class="fas fa-building text-praxis-gold mr-2"></i>
                    Sectores
                </h3>
                <ul class="space-y-2">
PHP;

    // Agregar sectores
    foreach ($data['sectores_cliente'] as $sector) {
        $content .= <<<PHP

                    <li class="text-praxis-gray-light flex items-start">
                        <i class="fas fa-check text-praxis-gold mr-2 mt-1"></i>
                        <span>{$sector}</span>
                    </li>
PHP;
    }
    
    $content .= <<<PHP

                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Servicios -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-black mb-12 text-center">
            Servicios en {$data['nombre']}
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
PHP;

    // Agregar servicios clave
    foreach ($data['servicios_clave'] as $servicio) {
        $content .= <<<PHP

            <div class="bg-gradient-to-br from-praxis-gray-dark to-praxis-black p-8 rounded-2xl border-2 border-praxis-gold/20 hover:border-praxis-gold transition-all">
                <div class="w-16 h-16 bg-praxis-gold/10 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-praxis-gold text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-praxis-white mb-3">{$servicio}</h3>
                <p class="text-praxis-gray-light">Soluciones profesionales adaptadas al sector {$data['sector_economico']} de {$data['nombre']}.</p>
            </div>
PHP;
    }
    
    $content .= <<<PHP

        </div>
    </div>
</section>

<!-- Formulario de Contacto -->
<section id="contacto" class="py-20 bg-gradient-to-br from-praxis-gray-dark to-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-4">
                Solicita tu Presupuesto en {$data['nombre']}
            </h2>
            <p class="text-praxis-gray-light text-lg">
                Respuesta en menos de 24 horas. Sin compromiso.
            </p>
        </div>
        
        <div class="bg-praxis-black/50 border-2 border-praxis-gold/20 rounded-2xl p-8">
            <form action="/api/contact.php" method="POST" class="space-y-6">
                <input type="hidden" name="ciudad" value="{$data['nombre']}">
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-praxis-white font-medium mb-2">Nombre *</label>
                        <input type="text" name="nombre" required class="w-full px-4 py-3 bg-praxis-gray border border-praxis-gold/30 rounded-lg text-praxis-white focus:border-praxis-gold focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-praxis-white font-medium mb-2">Teléfono *</label>
                        <input type="tel" name="telefono" required class="w-full px-4 py-3 bg-praxis-gray border border-praxis-gold/30 rounded-lg text-praxis-white focus:border-praxis-gold focus:outline-none">
                    </div>
                </div>
                
                <div>
                    <label class="block text-praxis-white font-medium mb-2">Email *</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 bg-praxis-gray border border-praxis-gold/30 rounded-lg text-praxis-white focus:border-praxis-gold focus:outline-none">
                </div>
                
                <div>
                    <label class="block text-praxis-white font-medium mb-2">Mensaje</label>
                    <textarea name="mensaje" rows="4" class="w-full px-4 py-3 bg-praxis-gray border border-praxis-gold/30 rounded-lg text-praxis-white focus:border-praxis-gold focus:outline-none"></textarea>
                </div>
                
                <button type="submit" class="w-full py-4 bg-praxis-red text-white font-semibold rounded-lg hover:bg-praxis-red/90 transition-all">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Enviar Solicitud
                </button>
            </form>
        </div>
    </div>
</section>

<!-- NAP Footer -->
<section class="py-12 bg-praxis-gold">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between gap-6">
            <div>
                <h3 class="text-2xl font-heading font-bold text-praxis-black mb-2">
                    Praxis Seguridad - {$data['nombre']}
                </h3>
                <div class="flex flex-wrap gap-6 text-praxis-black">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>Santomera, Murcia</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone mr-2"></i>
                        <a href="tel:+34637474428" class="hover:underline">637 474 428</a>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        <a href="mailto:info@praxisseguridad.es" class="hover:underline">info@praxisseguridad.es</a>
                    </div>
                </div>
            </div>
            <div>
                <a href="tel:+34637474428" class="inline-flex items-center px-8 py-4 bg-praxis-black text-praxis-gold font-semibold rounded-lg hover:bg-praxis-gray-dark transition-all">
                    <i class="fas fa-phone-alt mr-3"></i>
                    Llamar: 637 474 428
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
PHP;

    return $content;
}

function generarServiciosHTML($data) {
    // Lógica para generar servicios según sector económico
    // Se implementará más adelante si es necesario
    return '';
}
