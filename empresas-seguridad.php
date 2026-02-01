<?php
/**
 * Praxis Seguridad - Servicios para Empresas de Seguridad
 * Landing page B2B para empresas del sector
 */

$page_title = 'Servicios para Empresas de Seguridad | Consultoría B2B | Praxis Seguridad';
$page_description = 'Consultoría especializada para empresas de seguridad privada: formación, optimización operativa, auditorías internas y soporte técnico para CRAs y servicios de vigilancia.';
$current_page = 'empresas-seguridad';

include 'includes/header.php';
?>

<!-- ============================================
     HERO SECTION - B2B
     ============================================ -->
<section class="relative pt-32 pb-20 bg-praxis-black overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute inset-0 bg-gradient-to-r from-praxis-black via-praxis-black/95 to-praxis-black/80"></div>
        <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=1920" 
             alt="Equipo de seguridad profesional" 
             class="w-full h-full object-cover opacity-20">
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-blue-500/10 border border-blue-500/30 rounded-full text-blue-400 text-sm font-medium mb-6">
                <i class="fas fa-building mr-2"></i>Servicios B2B para el Sector
            </div>
            
            <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-6xl text-praxis-white mb-6 leading-tight">
                Consultoría para <span class="gradient-text">empresas de seguridad</span>
            </h1>
            <p class="text-praxis-gray-light text-xl leading-relaxed mb-8">
                Si diriges una empresa de seguridad, sabes que los márgenes son ajustados y la competencia feroz. 
                Te ayudo a <strong class="text-praxis-white">optimizar operaciones, formar equipos y captar clientes más rentables</strong>.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="contacto.php" class="btn-gold inline-flex items-center justify-center px-8 py-4 rounded-lg text-praxis-black font-heading font-semibold text-sm uppercase tracking-wider">
                    <i class="fas fa-handshake mr-2"></i>Hablemos de tu empresa
                </a>
                <a href="#servicios-b2b" class="inline-flex items-center justify-center px-8 py-4 rounded-lg border-2 border-praxis-gold text-praxis-gold font-heading font-semibold text-sm uppercase tracking-wider hover:bg-praxis-gold hover:text-praxis-black transition-all">
                    <i class="fas fa-arrow-down mr-2"></i>Ver servicios
                </a>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-praxis-gold/50 to-transparent"></div>
</section>


<!-- ============================================
     PROBLEMA - SOLUCIÓN
     ============================================ -->
<section class="py-20 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Problemas comunes -->
            <div class="bg-red-500/5 border border-red-500/20 rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center">
                        <i class="fas fa-triangle-exclamation text-red-400 text-xl"></i>
                    </div>
                    <h2 class="font-heading font-bold text-xl text-praxis-white">¿Te suena familiar?</h2>
                </div>
                <ul class="space-y-4">
                    <?php
                    $problems = [
                        'Alta rotación de personal y costes de formación constantes',
                        'Clientes que regatean precios y márgenes cada vez más ajustados',
                        'Dificultad para diferenciarte de la competencia',
                        'Incidencias repetitivas que consumen recursos',
                        'Falta de tiempo para planificar y solo "apagar fuegos"',
                        'Dependencia excesiva de pocos clientes grandes'
                    ];
                    foreach ($problems as $problem): ?>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-times text-red-400 mt-1"></i>
                            <span class="text-praxis-gray-light"><?php echo $problem; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Cómo ayudo -->
            <div class="bg-praxis-gold/5 border border-praxis-gold/20 rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                        <i class="fas fa-lightbulb text-praxis-gold text-xl"></i>
                    </div>
                    <h2 class="font-heading font-bold text-xl text-praxis-white">Así puedo ayudarte</h2>
                </div>
                <ul class="space-y-4">
                    <?php
                    $solutions = [
                        'Diseño de procedimientos que reducen incidencias',
                        'Formación técnica que profesionaliza al equipo',
                        'Estrategias de captación de clientes premium',
                        'Optimización de rutas y recursos operativos',
                        'Auditorías internas que detectan fugas de rentabilidad',
                        'Consultoría estratégica para crecimiento sostenible'
                    ];
                    foreach ($solutions as $solution): ?>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-praxis-gold mt-1"></i>
                            <span class="text-praxis-gray-light"><?php echo $solution; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     SERVICIOS B2B ESPECÍFICOS
     ============================================ -->
<section id="servicios-b2b" class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Servicios Especializados
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
                Lo que ofrezco a <span class="gradient-text">empresas del sector</span>
            </h2>
            <p class="text-praxis-gray-light text-lg max-w-2xl mx-auto">
                Servicios diseñados específicamente para las necesidades de empresas de seguridad privada
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <?php
            $b2b_services = [
                [
                    'icon' => 'fa-graduation-cap',
                    'title' => 'Formación Técnica',
                    'badge' => 'Popular',
                    'badge_color' => 'bg-blue-500',
                    'features' => [
                        'Cursos para vigilantes y técnicos',
                        'Formación en sistemas CCTV/Alarmas',
                        'Protocolos de actuación',
                        'Atención al cliente'
                    ]
                ],
                [
                    'icon' => 'fa-chart-pie',
                    'title' => 'Auditoría Operativa',
                    'badge' => null,
                    'badge_color' => '',
                    'features' => [
                        'Análisis de rentabilidad por cliente',
                        'Detección de ineficiencias',
                        'Optimización de recursos',
                        'Informe con plan de acción'
                    ]
                ],
                [
                    'icon' => 'fa-route',
                    'title' => 'Optimización de Rutas',
                    'badge' => null,
                    'badge_color' => '',
                    'features' => [
                        'Diseño de zonas de acuda',
                        'Reducción de tiempos de respuesta',
                        'Análisis de costes por desplazamiento',
                        'Redistribución de personal'
                    ]
                ],
                [
                    'icon' => 'fa-headset',
                    'title' => 'Soporte CRA',
                    'badge' => 'Especializado',
                    'badge_color' => 'bg-purple-500',
                    'features' => [
                        'Protocolos de recepción de alarmas',
                        'Formación de operadores',
                        'Gestión de falsas alarmas',
                        'Mejora de tiempos de verificación'
                    ]
                ],
                [
                    'icon' => 'fa-file-contract',
                    'title' => 'Documentación y Cumplimiento',
                    'badge' => null,
                    'badge_color' => '',
                    'features' => [
                        'Revisión de contratos tipo',
                        'Adecuación a normativa',
                        'Procedimientos internos',
                        'Libro de registro electrónico'
                    ]
                ],
                [
                    'icon' => 'fa-bullseye',
                    'title' => 'Estrategia Comercial',
                    'badge' => null,
                    'badge_color' => '',
                    'features' => [
                        'Definición de cliente objetivo',
                        'Propuesta de valor diferenciadora',
                        'Pricing y márgenes',
                        'Argumentario de ventas'
                    ]
                ]
            ];
            
            foreach ($b2b_services as $service): ?>
                <div class="bg-praxis-gray/30 rounded-2xl p-8 border border-praxis-gray/50 card-hover relative">
                    <?php if ($service['badge']): ?>
                        <span class="absolute top-4 right-4 px-3 py-1 <?php echo $service['badge_color']; ?> text-white rounded-full text-xs font-bold uppercase">
                            <?php echo $service['badge']; ?>
                        </span>
                    <?php endif; ?>
                    
                    <div class="w-14 h-14 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-xl flex items-center justify-center mb-6">
                        <i class="fas <?php echo $service['icon']; ?> text-praxis-black text-xl"></i>
                    </div>
                    
                    <h3 class="font-heading font-bold text-xl text-praxis-white mb-4">
                        <?php echo $service['title']; ?>
                    </h3>
                    
                    <ul class="space-y-2 mb-6">
                        <?php foreach ($service['features'] as $feature): ?>
                            <li class="flex items-center gap-2 text-praxis-gray-light text-sm">
                                <i class="fas fa-check text-praxis-gold text-xs"></i>
                                <?php echo $feature; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <a href="contacto.php" class="inline-flex items-center text-praxis-gold text-sm font-semibold hover:underline">
                        Solicitar información <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</section>


<!-- ============================================
     POR QUÉ YO
     ============================================ -->
<section class="py-24 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div>
                <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                    Mi Diferencia
                </p>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6 leading-tight">
                    Conozco el sector <span class="gradient-text">desde dentro</span>
                </h2>
                <p class="text-praxis-gray-light text-lg leading-relaxed mb-6">
                    No soy un consultor genérico que aplica metodologías de otros sectores. 
                    <strong class="text-praxis-white">Conozco los problemas reales</strong> de una empresa de seguridad: 
                    los márgenes, la rotación, las incidencias, la presión comercial, el cumplimiento normativo.
                </p>
                <p class="text-praxis-gray-light text-lg leading-relaxed mb-8">
                    Mi trabajo es ayudarte a ser más eficiente, más rentable y más profesional. 
                    Sin teorías abstractas, con soluciones prácticas que puedes implementar mañana.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <div class="px-4 py-3 bg-praxis-black/50 rounded-lg">
                        <p class="text-praxis-gold font-heading font-bold text-2xl">+15</p>
                        <p class="text-praxis-gray-light text-sm">Años en seguridad</p>
                    </div>
                    <div class="px-4 py-3 bg-praxis-black/50 rounded-lg">
                        <p class="text-praxis-gold font-heading font-bold text-2xl">100%</p>
                        <p class="text-praxis-gray-light text-sm">Enfocado en resultados</p>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="aspect-video rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=800" 
                         alt="Consultoría empresarial" 
                         class="w-full h-full object-cover">
                </div>
                <div class="absolute -bottom-4 -left-4 w-24 h-24 border-2 border-praxis-gold rounded-xl -z-10"></div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     CTA
     ============================================ -->
<section class="py-24 bg-gradient-to-b from-praxis-gray to-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
            ¿Hablamos sobre cómo mejorar <span class="gradient-text">tu empresa</span>?
        </h2>
        <p class="text-praxis-gray-light text-lg mb-10 max-w-2xl mx-auto">
            Una conversación de 30 minutos puede darte claridad sobre tu próximo paso. Sin compromiso, sin venta agresiva.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="contacto.php" class="btn-gold px-10 py-5 rounded-lg text-praxis-black font-heading font-bold uppercase tracking-wider">
                <i class="fas fa-calendar mr-2"></i>Agendar Consulta
            </a>
            <a href="tel:+34637474428" class="flex items-center text-praxis-gray-light hover:text-praxis-gold transition-colors">
                <i class="fas fa-phone mr-3 text-praxis-gold"></i>
                <span class="font-medium">+34 637 474 428</span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
