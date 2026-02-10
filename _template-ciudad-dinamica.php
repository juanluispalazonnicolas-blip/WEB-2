<?php
/**
 * Página Local SEO - Dinámica
 * Usa ciudades-data.php para contenido único por ciudad
 */

// Detectar ciudad desde la URL del directorio
$url_parts = explode('/', $_SERVER['REQUEST_URI']);
$carpeta_actual = basename(dirname($_SERVER['SCRIPT_FILENAME']));

// Mapeo de carpetas a claves de ciudad
$carpeta_to_key = [
    'seguridad-santomera' => 'santomera',
    'seguridad-abanilla' => 'abanilla',
    'seguridad-fortuna' => 'fortuna',
    'seguridad-en-murcia' => 'murcia',
    'seguridad-molina-segura' => 'molina-segura',
    'seguridad-alcantarilla' => 'alcantarilla',
    'seguridad-torres-cotillas' => 'torres-cotillas',
    'seguridad-orihuela' => 'orihuela',
    'seguridad-alicante' => 'alicante',
    'seguridad-elche' => 'elche',
    'seguridad-torrevieja' => 'torrevieja',
    'seguridad-valencia' => 'valencia',
    'seguridad-almeria' => 'almeria'
];

// Cargar datos de ciudad
$ciudades_data = require_once __DIR__ . '/../includes/ciudades-data.php';
$ciudad_key = $carpeta_to_key[$carpeta_actual] ?? 'santomera';
$ciudad = $ciudades_data[$ciudad_key];

// Cargar FAQs
$ciudades_faqs = require __DIR__ . '/../includes/ciudades-faqs.php';
$ciudad_faqs = $ciudades_faqs[$ciudad_key] ?? [];

// SEO
$page_title = $ciudad['title'];
$page_description = $ciudad['description'];
$page_keywords = $ciudad['keywords'];
$current_page = 'local-' . $ciudad['url_slug'];

// Canonical URL
$canonical_url = 'https://praxisseguridad.es/' . $ciudad['url_slug'] . '/';

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Canonical URL -->
<link rel="canonical" href="<?php echo $canonical_url; ?>">

<!-- Open Graph Tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta property="og:description" content="<?php echo $page_description; ?>">
<meta property="og:url" content="<?php echo $canonical_url; ?>">
<meta property="og:image" content="https://praxisseguridad.es/images/og-<?php echo $ciudad_key; ?>.jpg">
<meta property="og:locale" content="es_ES">
<meta property="og:site_name" content="Praxis Seguridad">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $page_title; ?>">
<meta name="twitter:description" content="<?php echo $page_description; ?>">
<meta name="twitter:image" content="https://praxisseguridad.es/images/og-<?php echo $ciudad_key; ?>.jpg">

<!-- Preconnect para performance -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Breadcrumbs Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Inicio",
      "item": "https://praxisseguridad.es/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Servicios por Localidad",
      "item": "https://praxisseguridad.es/#servicios-locales"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "<?php echo $ciudad['nombre']; ?>",
      "item": "<?php echo $canonical_url; ?>"
    }
  ]
}
</script>

<!-- Schema.org LocalBusiness -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SecurityService",
  "name": "Praxis Seguridad - <?php echo $ciudad['nombre']; ?>",
  "description": "<?php echo $ciudad['description']; ?>",
  "url": "<?php echo $canonical_url; ?>",
  "image": "https://praxisseguridad.es/images/logo.png",
  "areaServed": {
    "@type": "City",
    "name": "<?php echo $ciudad['nombre']; ?>",
    "addressRegion": "<?php echo $ciudad['provincia']; ?>",
    "addressCountry": "ES"
  },
  "provider": {
    "@type": "LocalBusiness",
    "name": "Praxis Seguridad",
    "@id": "https://praxisseguridad.es/#organization",
    "image": "https://praxisseguridad.es/images/logo.png",
    "logo": "https://praxisseguridad.es/images/logo.png",
    "telephone": "+34-637-474-428",
    "email": "info@praxisseguridad.es",
    "url": "https://praxisseguridad.es",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Santomera",
      "addressRegion": "Murcia",
      "addressCountry": "ES"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "38.0636",
      "longitude": "-0.9999"
    },
    "priceRange": "$$",
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
      "opens": "00:00",
      "closes": "23:59"
    }
  },
  "serviceType": ["Seguridad Privada", "Vigilancia", "Control de Accesos", "Sistemas de Alarmas"],
  "additionalType": "https://schema.org/SecurityService",
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Servicios de Seguridad",
    "itemListElement": [
      <?php 
      $servicios_json = [];
      foreach ($ciudad['servicios_clave'] as $index => $servicio) {
        $servicios_json[] = '{
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "' . $servicio . '",
            "description": "Servicio de ' . strtolower($servicio) . ' en ' . $ciudad['nombre'] . '"
          }
        }';
      }
      echo implode(',', $servicios_json);
      ?>
    ]
  }
}
</script>

<?php if (!empty($ciudad_faqs)): ?>
<!-- FAQPage Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php 
    $faq_items = [];
    foreach ($ciudad_faqs as $faq) {
      $faq_items[] = '{
        "@type": "Question",
        "name": "' . addslashes($faq['pregunta']) . '",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "' . addslashes($faq['respuesta']) . '"
        }
      }';
    }
    echo implode(',', $faq_items);
    ?>
  ]
}
</script>
<?php endif; ?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-praxis-black via-praxis-gray-dark to-praxis-black py-32 overflow-hidden">
    <div class="absolute inset-0 bg-dot-pattern opacity-10"></div>
    <div class="absolute inset-0 bg-gradient-radial from-praxis-gold/5 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <nav class="mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="/" class="text-praxis-gray-light hover:text-praxis-gold transition-colors">
                        <i class="fas fa-home"></i>
                        <span class="ml-1">Inicio</span>
                    </a>
                </li>
                <li class="text-praxis-gray-medium">
                    <i class="fas fa-chevron-right text-xs"></i>
                </li>
                <li>
                    <a href="/#servicios-locales" class="text-praxis-gray-light hover:text-praxis-gold transition-colors">
                        Servicios Locales
                    </a>
                </li>
                <li class="text-praxis-gray-medium">
                    <i class="fas fa-chevron-right text-xs"></i>
                </li>
                <li class="text-praxis-gold font-medium" aria-current="page">
                    <?php echo $ciudad['nombre']; ?>
                </li>
            </ol>
        </nav>
        
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
                
                <!-- USP Cards -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-praxis-gray/20 border border-praxis-gold/20 rounded-xl p-4">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-praxis-gold/10 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-clock text-praxis-gold text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <div class="text-praxis-white font-bold text-lg"><?php echo $ciudad['tiempo_respuesta']; ?></div>
                                <div class="text-praxis-gray-medium text-sm">Tiempo respuesta</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-praxis-gray/20 border border-praxis-gold/20 rounded-xl p-4">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-praxis-gold/10 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-shield-alt text-praxis-gold text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <div class="text-praxis-white font-bold text-lg">24/7</div>
                                <div class="text-praxis-gray-medium text-sm">Cobertura total</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- CTAs -->
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

<?php if (!empty($ciudad_faqs)): ?>
<!-- Preguntas Frecuentes -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-black mb-4">
                Preguntas Frecuentes sobre Seguridad en <?php echo $ciudad['nombre']; ?>
            </h2>
            <p class="text-gray-600 text-lg">
                Resolvemos tus dudas sobre nuestros servicios de seguridad privada
            </p>
        </div>

        <div class="space-y-4">
            <?php foreach ($ciudad_faqs as $index => $faq): ?>
            <div class="bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-praxis-gold transition-all">
                <button 
                    class="faq-button w-full text-left px-6 py-5 flex items-center justify-between"
                    onclick="toggleFaq(<?php echo $index; ?>)"
                    aria-expanded="false"
                    aria-controls="faq-answer-<?php echo $index; ?>">
                    <span class="text-lg font-semibold text-praxis-black pr-4">
                        <?php echo htmlspecialchars($faq['pregunta']); ?>
                    </span>
                    <i class="fas fa-chevron-down text-praxis-gold transition-transform duration-300 faq-icon-<?php echo $index; ?>"></i>
                </button>
                <div 
                    id="faq-answer-<?php echo $index; ?>" 
                    class="faq-answer px-6 pb-5 text-gray-700 leading-relaxed hidden">
                    <div class="pt-2 border-t border-gray-200">
                        <?php echo htmlspecialchars($faq['respuesta']); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center">
            <p class="text-gray-600 mb-4">¿Tienes más preguntas?</p>
            <a href="#contacto" class="inline-flex items-center px-6 py-3 bg-praxis-gold text-praxis-black font-semibold rounded-lg hover:bg-praxis-gold/90 transition-all">
                <i class="fas fa-envelope mr-2"></i>
                Contáctanos
            </a>
        </div>
    </div>
</section>

<script>
function toggleFaq(index) {
    const answer = document.getElementById('faq-answer-' + index);
    const icon = document.querySelector('.faq-icon-' + index);
    const button = answer.previousElementSibling;
    
    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
        button.setAttribute('aria-expanded', 'true');
    } else {
        answer.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
        button.setAttribute('aria-expanded', 'false');
    }
}
</script>
<?php endif; ?>

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
