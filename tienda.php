<?php
$current_page = 'tienda';
$page_title = 'Kits de Seguridad DIY | Praxis Seguridad';
include 'includes/header.php';

// Definición de productos
$kits = [
    [
        'id' => 'kit-basico',
        'nombre' => 'Kit Básico Hogar',
        'precio' => 199,
        'descripcion' => 'Protección esencial para tu hogar. Ideal para pisos y apartamentos pequeños.',
        'destacado' => false,
        'imagen' => 'https://images.pexels.com/photos/60504/security-protection-anti-virus-software-60504.jpeg?auto=compress&cs=tinysrgb&w=600',
        'contenido' => [
            'Central Hub WiFi + 4G',
            '1x Detector movimiento PIR (pet-immune)',
            '1x Sensor magnético puerta',
            '1x Mando a distancia',
            '1x Sirena interior 85dB',
            'App móvil iOS/Android'
        ],
        'servicios' => [
            'Guía de instalación PDF + Video',
            '1 llamada de configuración (30 min)',
            'Soporte email 7 días'
        ],
        'color' => 'from-gray-600 to-gray-800'
    ],
    [
        'id' => 'kit-hogar',
        'nombre' => 'Kit Hogar Completo',
        'precio' => 349,
        'descripcion' => 'Protección integral para casas y chalets. El más vendido.',
        'destacado' => true,
        'imagen' => 'https://images.pexels.com/photos/430208/pexels-photo-430208.jpeg?auto=compress&cs=tinysrgb&w=600',
        'contenido' => [
            'Central Hub Plus WiFi + 4G + Ethernet',
            '2x Detector movimiento PIR',
            '3x Sensor magnético (puertas/ventanas)',
            '1x Teclado con código',
            '2x Mandos a distancia',
            '1x Sirena interior + 1x exterior',
            'App móvil iOS/Android'
        ],
        'servicios' => [
            'Guía de instalación completa',
            '2 llamadas configuración (1h total)',
            '1 mes soporte técnico incluido'
        ],
        'color' => 'from-praxis-gold to-yellow-600'
    ],
    [
        'id' => 'kit-negocio',
        'nombre' => 'Kit Negocio',
        'precio' => 549,
        'descripcion' => 'Máxima protección para comercios, oficinas y naves. Incluye videovigilancia.',
        'destacado' => false,
        'imagen' => 'https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=600',
        'contenido' => [
            'Central Hub Plus WiFi + 4G + Ethernet',
            '4x Detector movimiento PIR',
            '4x Sensor magnético',
            '1x Teclado con código',
            '3x Mandos a distancia',
            'Sirena interior + exterior',
            '1x Cámara IP WiFi 2MP',
            'App móvil + Acceso web'
        ],
        'servicios' => [
            'Guía instalación profesional',
            'Configuración remota ilimitada (1 semana)',
            '3 meses soporte técnico incluido'
        ],
        'color' => 'from-blue-600 to-blue-800'
    ]
];

// Planes de soporte mensual
$planes_soporte = [
    [
        'nombre' => 'Soporte Básico',
        'precio' => 9.90,
        'caracteristicas' => ['Soporte telefónico L-V', 'Email en 24h', 'Base de conocimiento']
    ],
    [
        'nombre' => 'Soporte Premium',
        'precio' => 19.90,
        'caracteristicas' => ['Soporte 24/7', 'Revisión trimestral', 'Actualizaciones firmware', 'Prioridad media']
    ],
    [
        'nombre' => 'Soporte Pro',
        'precio' => 29.90,
        'caracteristicas' => ['Todo Premium', 'Prioridad máxima', '10% descuento accesorios', 'Consultoría incluida']
    ]
];
?>

<!-- Hero Section -->
<section class="relative pt-32 pb-16 bg-praxis-black overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-gradient-to-b from-praxis-gold/20 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-praxis-gold/20 text-praxis-gold rounded-full text-sm font-semibold mb-6 animate-fade-in">
            <i class="fas fa-box-open mr-2"></i>Nueva Línea de Productos
        </span>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-praxis-white mb-6">
            Kits de Seguridad <span class="text-praxis-gold">Autoinstalables</span>
        </h1>
        <p class="text-xl text-praxis-gray-light max-w-3xl mx-auto mb-8">
            Protege tu hogar o negocio con tecnología profesional. Tú lo instalas, nosotros te guiamos. 
            <strong class="text-praxis-white">Sin cuotas obligatorias.</strong>
        </p>
        <div class="flex flex-wrap justify-center gap-4 text-sm">
            <div class="flex items-center gap-2 text-praxis-gray-light">
                <i class="fas fa-truck text-praxis-gold"></i>
                <span>Envío gratis península</span>
            </div>
            <div class="flex items-center gap-2 text-praxis-gray-light">
                <i class="fas fa-headset text-praxis-gold"></i>
                <span>Soporte experto incluido</span>
            </div>
            <div class="flex items-center gap-2 text-praxis-gray-light">
                <i class="fas fa-shield-check text-praxis-gold"></i>
                <span>Garantía 2 años</span>
            </div>
        </div>
    </div>
</section>

<!-- Kits Section -->
<section class="py-20 bg-gradient-to-b from-praxis-black to-praxis-gray-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-4">
                Elige Tu Kit de Seguridad
            </h2>
            <p class="text-praxis-gray-light max-w-2xl mx-auto">
                Cada kit incluye todo lo necesario para proteger tu espacio. Productos de marcas líderes (Ajax, Hikvision) con soporte técnico profesional.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($kits as $kit): ?>
            <div class="relative bg-praxis-black rounded-2xl overflow-hidden border <?php echo $kit['destacado'] ? 'border-praxis-gold shadow-2xl shadow-praxis-gold/20 scale-105' : 'border-praxis-gray/30'; ?> transition-all duration-300 hover:border-praxis-gold/50 flex flex-col">
                
                <?php if ($kit['destacado']): ?>
                <div class="absolute top-4 right-4 z-10">
                    <span class="bg-praxis-gold text-praxis-black text-xs font-bold px-3 py-1 rounded-full">
                        MÁS VENDIDO
                    </span>
                </div>
                <?php endif; ?>
                
                <!-- Imagen -->
                <div class="relative h-48 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b <?php echo $kit['color']; ?> opacity-80"></div>
                    <img src="<?php echo $kit['imagen']; ?>" alt="<?php echo $kit['nombre']; ?>" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-praxis-black via-transparent to-transparent"></div>
                </div>
                
                <!-- Contenido -->
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-2xl font-heading font-bold text-praxis-white mb-2">
                        <?php echo $kit['nombre']; ?>
                    </h3>
                    <p class="text-praxis-gray-light text-sm mb-4">
                        <?php echo $kit['descripcion']; ?>
                    </p>
                    
                    <!-- Precio -->
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-praxis-gold"><?php echo $kit['precio']; ?>€</span>
                        <span class="text-praxis-gray-light text-sm"> + IVA</span>
                    </div>
                    
                    <!-- Contenido del kit -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-praxis-white mb-3 flex items-center gap-2">
                            <i class="fas fa-box text-praxis-gold"></i> Incluye:
                        </h4>
                        <ul class="space-y-2">
                            <?php foreach ($kit['contenido'] as $item): ?>
                            <li class="flex items-start gap-2 text-sm text-praxis-gray-light">
                                <i class="fas fa-check text-green-500 mt-1 flex-shrink-0"></i>
                                <span><?php echo $item; ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <!-- Servicios incluidos -->
                    <div class="mb-6 pt-4 border-t border-praxis-gray/30">
                        <h4 class="text-sm font-semibold text-praxis-white mb-3 flex items-center gap-2">
                            <i class="fas fa-headset text-praxis-gold"></i> Servicio incluido:
                        </h4>
                        <ul class="space-y-2">
                            <?php foreach ($kit['servicios'] as $servicio): ?>
                            <li class="flex items-start gap-2 text-sm text-praxis-gray-light">
                                <i class="fas fa-star text-praxis-gold mt-1 flex-shrink-0"></i>
                                <span><?php echo $servicio; ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <!-- CTA Button -->
                    <div class="mt-auto">
                        <a href="pedido.php?kit=<?php echo $kit['id']; ?>" 
                           class="block w-full text-center py-4 rounded-xl font-semibold transition-all duration-300 <?php echo $kit['destacado'] ? 'btn-gold text-praxis-black' : 'bg-praxis-gray text-praxis-white hover:bg-praxis-gold hover:text-praxis-black'; ?>">
                            <i class="fas fa-shopping-cart mr-2"></i>Pedir Ahora
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Planes de Soporte -->
<section class="py-20 bg-praxis-gray-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl font-heading font-bold text-praxis-white mb-4">
                Planes de Soporte Técnico <span class="text-praxis-gold">Mensual</span>
            </h2>
            <p class="text-praxis-gray-light max-w-2xl mx-auto">
                Opcional: añade soporte técnico profesional a tu kit. Cancela cuando quieras.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <?php foreach ($planes_soporte as $plan): ?>
            <div class="bg-praxis-black/50 rounded-xl p-6 border border-praxis-gray/30 hover:border-praxis-gold/50 transition-all">
                <h3 class="text-lg font-bold text-praxis-white mb-2"><?php echo $plan['nombre']; ?></h3>
                <div class="mb-4">
                    <span class="text-3xl font-bold text-praxis-gold"><?php echo number_format($plan['precio'], 2, ',', '.'); ?>€</span>
                    <span class="text-praxis-gray-light text-sm">/mes</span>
                </div>
                <ul class="space-y-2">
                    <?php foreach ($plan['caracteristicas'] as $car): ?>
                    <li class="flex items-center gap-2 text-sm text-praxis-gray-light">
                        <i class="fas fa-check text-praxis-gold"></i>
                        <?php echo $car; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
        
        <p class="text-center text-praxis-gray-light text-sm mt-8">
            <i class="fas fa-info-circle text-praxis-gold mr-2"></i>
            Los planes de soporte se pueden añadir durante el proceso de compra o posteriormente.
        </p>
    </div>
</section>

<!-- Cómo funciona -->
<section class="py-20 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-4">
                ¿Cómo Funciona?
            </h2>
            <p class="text-praxis-gray-light">Proceso simple en 4 pasos</p>
        </div>
        
        <div class="grid md:grid-cols-4 gap-8">
            <?php 
            $pasos = [
                ['icon' => 'fa-shopping-cart', 'titulo' => 'Elige tu Kit', 'desc' => 'Selecciona el kit que mejor se adapte a tus necesidades'],
                ['icon' => 'fa-credit-card', 'titulo' => 'Pago Seguro', 'desc' => 'Paga de forma segura con tarjeta a través de Stripe'],
                ['icon' => 'fa-truck-fast', 'titulo' => 'Recibe en Casa', 'desc' => 'Envío gratuito en 24-48h a península'],
                ['icon' => 'fa-screwdriver-wrench', 'titulo' => 'Instala y Configura', 'desc' => 'Sigue nuestra guía o agenda una llamada con nuestro técnico']
            ];
            foreach ($pasos as $i => $paso): 
            ?>
            <div class="text-center">
                <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-praxis-gold to-yellow-600 rounded-2xl flex items-center justify-center relative">
                    <i class="fas <?php echo $paso['icon']; ?> text-2xl text-praxis-black"></i>
                    <span class="absolute -top-2 -right-2 w-8 h-8 bg-praxis-black border-2 border-praxis-gold rounded-full flex items-center justify-center text-praxis-gold font-bold text-sm">
                        <?php echo $i + 1; ?>
                    </span>
                </div>
                <h3 class="text-lg font-bold text-praxis-white mb-2"><?php echo $paso['titulo']; ?></h3>
                <p class="text-sm text-praxis-gray-light"><?php echo $paso['desc']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Rápido -->
<section class="py-20 bg-praxis-gray-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl font-heading font-bold text-praxis-white mb-4">
                Preguntas Frecuentes
            </h2>
        </div>
        
        <div class="space-y-4">
            <?php
            $faqs = [
                ['q' => '¿Necesito conocimientos técnicos para instalar?', 'a' => 'No. Los kits están diseñados para ser instalados por cualquier persona. Incluyen guías paso a paso y tienes acceso a soporte técnico telefónico.'],
                ['q' => '¿Puedo conectar a una Central Receptora de Alarmas?', 'a' => 'Los equipos son compatibles con CRA. Actualmente ofrecemos soporte técnico remoto. La conexión a CRA estará disponible próximamente.'],
                ['q' => '¿Qué pasa si necesito más sensores?', 'a' => 'Puedes ampliar tu sistema en cualquier momento. Contáctanos para añadir detectores, cámaras u otros accesorios.'],
                ['q' => '¿Tienen garantía?', 'a' => 'Sí, todos los equipos tienen 2 años de garantía del fabricante. Además, nuestro soporte técnico te ayuda con cualquier incidencia.']
            ];
            foreach ($faqs as $faq):
            ?>
            <details class="bg-praxis-black/50 rounded-xl border border-praxis-gray/30 group">
                <summary class="flex items-center justify-between p-6 cursor-pointer">
                    <span class="font-semibold text-praxis-white"><?php echo $faq['q']; ?></span>
                    <i class="fas fa-chevron-down text-praxis-gold group-open:rotate-180 transition-transform"></i>
                </summary>
                <div class="px-6 pb-6 text-praxis-gray-light">
                    <?php echo $faq['a']; ?>
                </div>
            </details>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-8">
            <a href="faq.php" class="text-praxis-gold hover:underline">
                Ver todas las preguntas frecuentes <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-16 bg-gradient-to-r from-praxis-gold to-yellow-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-heading font-bold text-praxis-black mb-4">
            ¿Tienes dudas? Hablemos
        </h2>
        <p class="text-praxis-black/80 mb-8">
            Nuestro equipo de expertos en seguridad te asesora sin compromiso
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="contacto.php" class="bg-praxis-black text-praxis-white px-8 py-4 rounded-xl font-semibold hover:bg-praxis-gray-dark transition-colors">
                <i class="fas fa-envelope mr-2"></i>Contactar
            </a>
            <a href="https://wa.me/34XXXXXXXXX" class="bg-green-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-green-700 transition-colors">
                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
