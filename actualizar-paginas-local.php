<?php
/**
 * Script para actualizar todas las páginas locales
 * Usa los datos de ciudades-data.php para generar páginas únicas
 */

// Cargar datos de ciudades
$ciudades = require_once __DIR__ . '/includes/ciudades-data.php';

$template = <<<'TEMPLATE'
<?php
/**
 * Página Local SEO - {CIUDAD_NOMBRE}
 * {SECTOR_DESCRIPCION}
 */

// Cargar datos de ciudad
$ciudades_data = require_once __DIR__ . '/../includes/ciudades-data.php';
$ciudad_key = '{CIUDAD_KEY}';
$ciudad = $ciudades_data[$ciudad_key];

// SEO
$page_title = $ciudad['title'];
$page_description = $ciudad['description'];
$page_keywords = $ciudad['keywords'];
$current_page = 'local-' . $ciudad['url_slug'];

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Schema.org LocalBusiness -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SecurityService",
  "name": "Praxis Seguridad - <?php echo $ciudad['nombre']; ?>",
  "description": "<?php echo $ciudad['description']; ?>",
  "areaServed": {
    "@type": "City",
    "name": "<?php echo $ciudad['nombre']; ?>",
    "addressRegion": "<?php echo $ciudad['provincia']; ?>",
    "addressCountry": "ES"
  },
  "provider": {
    "@type": "LocalBusiness",
    "name": "Praxis Seguridad",
    "image": "https://praxisseguridad.es/images/logo.png",
    "telephone": "+34-637-474-428",
    "email": "info@praxisseguridad.es",
    "address": {
      "@type": "PostalAddress",
      "@addressLocality": "Santomera",
      "addressRegion": "Murcia",
      "addressCountry": "ES"
    }
  },
  "serviceType": "Seguridad Privada",
  "priceRange": "$$"
}
</script>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-praxis-black via-praxis-gray-dark to-praxis-black py-32 overflow-hidden">
    <div class="absolute inset-0 bg-dot-pattern opacity-10"></div>
    <div class="absolute inset-0 bg-gradient-radial from-praxis-gold/5 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <!-- Badge Local -->
                <div class="inline-flex items-center px-4 py-2 bg-praxis-gold/10 border border-praxis-gold/30 rounded-full mb-6">
                    <i class="fas fa-map-marker-alt text-praxis-gold mr-2"></i>
                    <span class="text-praxis-gold font-semibold">Cobertura en <?php echo $ciudad['nombre']; ?></span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-praxis-white mb-6 leading-tight">
                    Seguridad Privada en<br>
                    <span class="text-praxis-gold"><?php echo $ciudad['nombre']; ?></span>
                </h1>
                
                <p class="text-xl text-praxis-gray-light mb-8 leading-relaxed">
                    <?php echo $ciudad['descripcion_zona']; ?>
                    Tiempo de respuesta: <span class="text-praxis-gold font-semibold"><?php echo $ciudad['tiempo_respuesta']; ?></span>.
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
            Zonas de Cobertura en <?php echo $ciudad['nombre']; ?>
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Polígonos/Zonas -->
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <h3 class="text-xl font-semibold text-praxis-white mb-4">
                    <i class="fas fa-industry text-praxis-gold mr-2"></i>
                    Zonas Principales
                </h3>
                <ul class="space-y-2">
                    <?php foreach ($ciudad['poligonos'] as $poligono): ?>
                    <li class="text-praxis-gray-light">
                        <i class="fas fa-check text-praxis-gold mr-2"></i><?php echo $poligono; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Barrios -->
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <h3 class="text-xl font-semibold text-praxis-white mb-4">
                    <i class="fas fa-home text-praxis-gold mr-2"></i>
                    Barrios
                </h3>
                <ul class="space-y-2">
                    <?php foreach ($ciudad['barrios'] as $barrio): ?>
                    <li class="text-praxis-gray-light">
                        <i class="fas fa-check text-praxis-gold mr-2"></i><?php echo $barrio; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Sectores -->
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <h3 class="text-xl font-semibold text-praxis-white mb-4">
                    <i class="fas fa-building text-praxis-gold mr-2"></i>
                    Sectores
                </h3>
                <ul class="space-y-2">
                    <?php foreach ($ciudad['sectores_cliente'] as $sector): ?>
                    <li class="text-praxis-gray-light">
                        <i class="fas fa-check text-praxis-gold mr-2"></i><?php echo $sector; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Servicios -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-black mb-12 text-center">
            Servicios en <?php echo $ciudad['nombre']; ?>
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($ciudad['servicios_clave'] as $servicio): ?>
            <div class="bg-gradient-to-br from-praxis-gray-dark to-praxis-black p-8 rounded-2xl border-2 border-praxis-gold/20 hover:border-praxis-gold transition-all">
                <div class="w-16 h-16 bg-praxis-gold/10 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-praxis-gold text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-praxis-white mb-3"><?php echo $servicio; ?></h3>
                <p class="text-praxis-gray-light">Servicio profesional adaptado a las necesidades de <?php echo $ciudad['nombre']; ?>.</p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Formulario Contacto -->
<section id="contacto" class="py-20 bg-gradient-to-br from-praxis-gray-dark to-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-4">
                Solicita tu Presupuesto en <?php echo $ciudad['nombre']; ?>
            </h2>
            <p class="text-praxis-gray-light text-lg">Respuesta en menos de 24 horas. Sin compromiso.</p>
        </div>
        
        <div class="bg-praxis-black/50 border-2 border-praxis-gold/20 rounded-2xl p-8">
            <form action="/api/contact.php" method="POST" class="space-y-6">
                <input type="hidden" name="ciudad" value="<?php echo $ciudad['nombre']; ?>">
                
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
                    Praxis Seguridad - <?php echo $ciudad['nombre']; ?>
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
TEMPLATE;

echo "🚀 Actualizando páginas locales...\n\n";

$actualizadas = 0;
$errores = 0;

foreach ($ciudades as $key => $ciudad) {
    $directorio = __DIR__ . '/' . $ciudad['url_slug'];
    $archivo = $directorio . '/index.php';
    
    // Crear directorio si no existe
    if (!file_exists($directorio)) {
        mkdir($directorio, 0755, true);
        echo "📁 Creado directorio: {$ciudad['url_slug']}/\n";
    }
    
    // Generar contenido personalizado
    $contenido = str_replace(
        ['{CIUDAD_NOMBRE}', '{SECTOR_DESCRIPCION}', '{CIUDAD_KEY}'],
        [$ciudad['nombre'], ucfirst(str_replace('-', ' y ', $ciudad['sector_economico'])), $key],
        $template
    );
    
    // Escribir archivo
    if (file_put_contents($archivo, $contenido)) {
        echo "✅ Actualizada: {$ciudad['nombre']} ({$ciudad['url_slug']}/index.php)\n";
        $actualizadas++;
    } else {
        echo "❌ Error al actualizar: {$ciudad['nombre']}\n";
        $errores++;
    }
}

echo "\n" . str_repeat("=", 60) . "\n";
echo "📊 RESUMEN:\n";
echo "   ✅ Páginas actualizadas: $actualizadas\n";
echo "   ❌ Errores: $errores\n";
echo str_repeat("=", 60) . "\n\n";

echo "🎯 Próximo paso: Actualizar sitemap.xml\n";
?>
