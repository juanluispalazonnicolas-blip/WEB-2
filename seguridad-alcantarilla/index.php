<?php
/**
 * PLANTILLA MAESTRA - Página Local SEO
 * Santomera - Base de Operaciones Praxis Seguridad
 * 
 * Esta es la plantilla de referencia para todas las demás ciudades.
 * Contenido 100% único y contextualizado para evitar duplicados.
 */

// Datos específicos de esta ubicación
$ciudad_data = [
    'nombre' => 'Santomera',
    'provincia' => 'Murcia',
    'url_slug' => 'seguridad-santomera',
    
    // SEO
    'title' => 'Empresa de Seguridad Privada en Santomera | Praxis Seguridad',
    'description' => 'Servicios de seguridad privada en Santomera. Vigilantes, control de accesos, instalación alarmas. Respuesta inmediata desde nuestra base en Santomera.',
    'keywords' => 'seguridad Santomera, vigilantes Santomera, alarmas Santomera, empresa seguridad Santomera, control accesos Santomera',
    
    // Contexto geográfico real
    'sector_economico' => 'industrial-logistica',
    'descripcion_zona' => 'Santomera es un municipio estratégicamente ubicado en el límite entre Murcia y Alicante, con fuerte presencia de polígonos industriales y empresas de logística.',
    
    //Referencias geográficas reales
    'poligonos' => [
        'Polígono Industrial de Santomera',
        'Zona Industrial El Siscar',
        'Parque Empresarial Vega Baja'
    ],
    
    'barrios' => [
        'Centro Santomera',
        'El Siscar',
        'Zeneta',
        'Matanza'
    ],
    
    'calles_principales' => [
        'Avenida de Orihuela',
        'Calle Mayor',
        'Avenida de la Constitución'
    ],
    
    // Servicios contextualizados
    'servicios_destacados' => [
        [
            'nombre' => 'Seguridad para Naves Industriales',
            'descripcion' => 'Especializados en la protección de naves logísticas e industriales del polígono. Control perimetral, CCTV y vigilancia 24/7.',
            'icon' => 'fa-warehouse'
        ],
        [
            'nombre' => 'Respuesta Inmediata',
            'descripcion' => 'Al estar ubicados en Santomera, garantizamos tiempo de respuesta inferior a 15 minutos en toda la zona.',
            'icon' => 'fa-clock'
        ],
        [
            'nombre' => 'Control de Accesos Empresarial',
            'descripcion' => 'Sistemas avanzados de control de accesos para empresas de logística y almacenaje.',
            'icon' => 'fa-user-shield'
        ],
        [
            'nombre' => 'Vigilancia Nocturna',
            'descripcion' => 'Rondas programadas en polígonos industriales. Protección específica para almacenes y centros logísticos.',
            'icon' => 'fa-moon'
        ]
    ],
    
    // Ventajas competitivas locales
    'ventajas' => [
        'Base de operaciones en Santomera',
        'Conocimiento profundo del territorio',
        'Respuesta en menos de 15 minutos',
        'Equipo familiarizado con polígonos industriales locales',
        'Cobertura 24/7 todo el año'
    ],
    
    // Sectores objetivo
    'sectores_cliente' => [
        'Logística y Transporte',
        'Almacenaje y Distribución',
        'Industria Manufacturera',
        'Comercio Mayorista',
        'Empresas de Servicios'
    ],
    
    // Casos de éxito (placeholder)
    'testimonios' => [
        [
            'empresa' => 'Empresa Logística Local',
            'sector' => 'Logística',
            'texto' => 'Desde que contratamos a Praxis Seguridad, hemos reducido incidencias en un 95%. Su proximidad desde Santomera es clave.'
        ]
    ],
    
    // Datos NAP
    'tiempo_respuesta' => '15 minutos',
    'area_cobertura' => '15 km radio',
    
    // Mapa
    'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50234.39662656779!2d-0.9998631!3d38.0636042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63832c46d18e4d%3A0x7c5e5f6bc0f1a3d1!2sSantomera%2C%20Murcia!5e0!3m2!1ses!2ses!4v1234567890'
];

// Page config
$page_title = $ciudad_data['title'];
$page_description = $ciudad_data['description'];
$page_keywords = $ciudad_data['keywords'];
$current_page = 'local-' . $ciudad_data['url_slug'];

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Schema.org LocalBusiness -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SecurityService",
  "name": "Praxis Seguridad - <?php echo $ciudad_data['nombre']; ?>",
  "description": "<?php echo $ciudad_data['description']; ?>",
  "areaServed": {
    "@type": "City",
    "name": "<?php echo $ciudad_data['nombre']; ?>",
    "addressRegion": "<?php echo $ciudad_data['provincia']; ?>",
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
      "addressLocality": "Santomera",
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
            <!-- Contenido -->
            <div>
                <!-- Badge Local -->
                <div class="inline-flex items-center px-4 py-2 bg-praxis-gold/10 border border-praxis-gold/30 rounded-full mb-6">
                    <i class="fas fa-map-marker-alt text-praxis-gold mr-2"></i>
                    <span class="text-praxis-gold font-semibold">Base en <?php echo $ciudad_data['nombre']; ?></span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-praxis-white mb-6 leading-tight">
                    Seguridad Privada en<br>
                    <span class="text-praxis-gold"><?php echo $ciudad_data['nombre']; ?></span>
                </h1>
                
                <p class="text-xl text-praxis-gray-light mb-8 leading-relaxed">
                    <?php echo $ciudad_data['descripcion_zona']; ?>
                    Nuestra sede en <?php echo $ciudad_data['nombre']; ?> nos permite ofrecer 
                    <span class="text-praxis-gold font-semibold">respuesta inmediata en menos de <?php echo $ciudad_data['tiempo_respuesta']; ?></span>.
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
                                <div class="text-praxis-white font-bold text-lg">&lt; <?php echo $ciudad_data['tiempo_respuesta']; ?></div>
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
                        <span class="font-semibold">Solicitar Presupuesto</span>
                    </a>
                </div>
            </div>
            
            <!-- Visual -->
            <div class="relative">
                <div class="relative rounded-2xl overflow-hidden border-4 border-praxis-gold/30 shadow-2xl">
                    <img src="/images/santomera-seguridad.jpg" alt="Seguridad en <?php echo $ciudad_data['nombre']; ?>" class="w-full h-auto" onerror="this.src='/images/placeholder-local.jpg'">
                    <!-- Overlay badge -->
                    <div class="absolute bottom-6 left-6 right-6 bg-praxis-black/80 backdrop-blur-sm border border-praxis-gold/30 rounded-xl p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-praxis-gold text-sm font-semibold mb-1">Cobertura en <?php echo $ciudad_data['nombre']; ?></div>
                                <div class="text-praxis-white font-bold text-lg">Radio <?php echo $ciudad_data['area_cobertura']; ?></div>
                            </div>
                            <div class="w-16 h-16 bg-praxis-gold/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-map-marked-alt text-praxis-gold text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Zonas de Cobertura -->
<section class="py-16 bg-praxis-gray-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-4">
                Zonas de Cobertura en <?php echo $ciudad_data['nombre']; ?>
            </h2>
            <p class="text-praxis-gray-light text-lg max-w-3xl mx-auto">
                Damos servicio en toda la zona de <?php echo $ciudad_data['nombre']; ?>, incluyendo:
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Polígonos -->
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-praxis-gold/10 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-industry text-praxis-gold text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-praxis-white">Polígonos Industriales</h3>
                </div>
                <ul class="space-y-2">
                    <?php foreach ($ciudad_data['poligonos'] as $poligono): ?>
                    <li class="text-praxis-gray-light flex items-start">
                        <i class="fas fa-check text-praxis-gold mr-2 mt-1"></i>
                        <span><?php echo $poligono; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Barrios -->
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-praxis-gold/10 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-home text-praxis-gold text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-praxis-white">Barrios y Pedanías</h3>
                </div>
                <ul class="space-y-2">
                    <?php foreach ($ciudad_data['barrios'] as $barrio): ?>
                    <li class="text-praxis-gray-light flex items-start">
                        <i class="fas fa-check text-praxis-gold mr-2 mt-1"></i>
                        <span><?php echo $barrio; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Calles -->
            <div class="bg-praxis-black/50 border border-praxis-gold/20 rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-praxis-gold/10 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-road text-praxis-gold text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-praxis-white">Calles Principales</h3>
                </div>
                <ul class="space-y-2">
                    <?php foreach ($ciudad_data['calles_principales'] as $calle): ?>
                    <li class="text-praxis-gray-light flex items-start">
                        <i class="fas fa-check text-praxis-gold mr-2 mt-1"></i>
                        <span><?php echo $calle; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Servicios Específicos -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-black mb-4">
                Servicios Especializados en <?php echo $ciudad_data['nombre']; ?>
            </h2>
            <p class="text-praxis-gray text-lg max-w-3xl mx-auto">
                Soluciones de seguridad adaptadas al sector <?php echo str_replace('-', ' y ', $ciudad_data['sector_economico']); ?> 
                predominante en la zona.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($ciudad_data['servicios_destacados'] as $servicio): ?>
            <div class="group bg-gradient-to-br from-praxis-gray-dark to-praxis-black p-8 rounded-2xl border-2 border-praxis-gold/20 hover:border-praxis-gold transition-all hover:transform hover:scale-105">
                <div class="w-16 h-16 bg-praxis-gold/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-praxis-gold/20 transition-colors">
                    <i class="fas <?php echo $servicio['icon']; ?> text-praxis-gold text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-praxis-white mb-3">
                    <?php echo $servicio['nombre']; ?>
                </h3>
                <p class="text-praxis-gray-light">
                    <?php echo $servicio['descripcion']; ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Ventajas Locales -->
<section class="py-20 bg-gradient-to-br from-praxis-black to-praxis-gray-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-6">
                    ¿Por qué elegirnos en <?php echo $ciudad_data['nombre']; ?>?
                </h2>
                <p class="text-praxis-gray-light text-lg mb-8">
                    Nuestra base de operaciones en <?php echo $ciudad_data['nombre']; ?> nos convierte en la opción más 
                    eficiente para la seguridad de tu negocio.
                </p>
                
                <ul class="space-y-4">
                    <?php foreach ($ciudad_data['ventajas'] as $ventaja): ?>
                    <li class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-praxis-gold/10 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-check text-praxis-gold"></i>
                            </div>
                        </div>
                        <span class="text-praxis-gray-light text-lg"><?php echo $ventaja; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                <div class="mt-8">
                    <a href="/contacto.php" class="inline-flex items-center px-8 py-4 bg-praxis-gold text-praxis-black rounded-lg hover:bg-praxis-gold-light transition-all font-semibold">
                        Solicitar Asesoramiento
                        <i class="fas fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <div class="bg-praxis-gray/20 border-2 border-praxis-gold/30 rounded-2xl p-8">
                    <h3 class="text-2xl font-semibold text-praxis-white mb-6">Sectores que Atendemos</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <?php foreach ($ciudad_data['sectores_cliente'] as $sector): ?>
                        <div class="bg-praxis-black/50 rounded-lg p-4 border border-praxis-gold/10">
                            <i class="fas fa-building text-praxis-gold mb-2"></i>
                            <div class="text-praxis-white font-medium"><?php echo $sector; ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mapa de Ubicación -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-black mb-4">
                Nuestra Ubicación en <?php echo $ciudad_data['nombre']; ?>
            </h2>
            <p class="text-praxis-gray text-lg">
                Estratégicamente ubicados para cubrir toda la zona
            </p>
        </div>
        
        <div class="rounded-2xl overflow-hidden border-4 border-praxis-gold/20 shadow-xl">
            <iframe 
                src="<?php echo $ciudad_data['google_maps_embed']; ?>" 
                width="100%" 
                height="500" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- Formulario de Contacto Local -->
<section id="contacto" class="py-20 bg-gradient-to-br from-praxis-gray-dark to-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-4">
                Solicita tu Presupuesto en <?php echo $ciudad_data['nombre']; ?>
            </h2>
            <p class="text-praxis-gray-light text-lg">
                Respuesta en menos de 24 horas. Sin compromiso.
            </p>
        </div>
        
        <div class="bg-praxis-black/50 border-2 border-praxis-gold/20 rounded-2xl p-8">
            <form action="/api/contact.php" method="POST" class="space-y-6">
                <input type="hidden" name="ciudad" value="<?php echo $ciudad_data['nombre']; ?>">
                
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
                    <label class="block text-praxis-white font-medium mb-2">Tipo de Servicio</label>
                    <select name="servicio" class="w-full px-4 py-3 bg-praxis-gray border border-praxis-gold/30 rounded-lg text-praxis-white focus:border-praxis-gold focus:outline-none">
                        <option>Selecciona un servicio</option>
                        <?php foreach ($ciudad_data['servicios_destacados'] as $servicio): ?>
                        <option><?php echo $servicio['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
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

<!-- NAP + CTA Final -->
<section class="py-12 bg-praxis-gold">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between gap-6">
            <div>
                <h3 class="text-2xl font-heading font-bold text-praxis-black mb-2">
                    Praxis Seguridad - <?php echo $ciudad_data['nombre']; ?>
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
