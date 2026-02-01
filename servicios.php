<?php
/**
 * Praxis Seguridad - Página de Servicios
 * Detalle completo de todos los servicios ofrecidos
 */

$page_title = 'Servicios de Consultoría en Seguridad Privada | Praxis Seguridad';
$page_description = 'Servicios de consultoría estratégica en seguridad: auditorías de riesgo, diseño de sistemas, optimización de instalaciones, vigilancia y tecnología IA en Murcia.';
$current_page = 'servicios';

include 'includes/header.php';
?>

<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="relative pt-32 pb-20 bg-praxis-black overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-1/2 h-full opacity-10">
        <div class="absolute inset-0 bg-gradient-to-l from-praxis-gold/20 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center lg:items-start gap-8">
            <!-- Logo prominente -->
            <div class="flex-shrink-0">
                <img src="images/logo-praxis.png" alt="Praxis Seguridad" class="h-24 md:h-32 w-auto drop-shadow-2xl">
            </div>
            
            <div class="max-w-3xl text-center lg:text-left">
                <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                    Nuestros Servicios
                </p>
                <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-6xl text-praxis-white mb-6 leading-tight">
                    Soluciones de seguridad <span class="gradient-text">con criterio</span>
                </h1>
                <p class="text-praxis-gray-light text-xl leading-relaxed">
                    Cada servicio está diseñado para resolver problemas reales y aportar valor medible. No vendemos productos genéricos: diseñamos soluciones específicas.
                </p>
            </div>
        </div>
    </div>
    
    <!-- Decorative line -->
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-praxis-gold/50 to-transparent"></div>
</section>


<!-- ============================================
     SERVICES DETAIL SECTION
     ============================================ -->
<section class="py-24 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php
        $services = [
            [
                'id' => 'consultoria',
                'icon' => 'fa-chess-queen',
                'title' => 'Consultoría Estratégica',
                'badge' => 'Recomendado',
                'badge_color' => 'bg-praxis-gold text-praxis-black',
                'short' => 'Diseño de modelos de seguridad eficientes y escalables',
                'description' => 'Ayudamos a empresas y organizaciones a definir su estrategia de seguridad partiendo del análisis, no de la improvisación. Trabajamos con dirección y responsables operativos para establecer modelos que sean sostenibles, eficientes y adaptados a la realidad del negocio.',
                'features' => [
                    'Definición de modelos de seguridad corporativos',
                    'Asesoramiento a dirección y comités de seguridad',
                    'Análisis de necesidades reales vs. percibidas',
                    'Planificación estratégica a medio y largo plazo',
                    'Optimización de recursos y presupuestos'
                ],
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&q=80'
            ],
            [
                'id' => 'auditoria',
                'icon' => 'fa-magnifying-glass-chart',
                'title' => 'Auditoría y Análisis de Riesgos',
                'badge' => 'Crítico',
                'badge_color' => 'bg-red-500 text-white',
                'short' => 'Detección de vulnerabilidades y oportunidades de mejora',
                'description' => 'Evaluamos instalaciones, procesos y personal para identificar carencias, sobrecostes y vulnerabilidades que afectan a la seguridad real de tu organización. No auditamos por cumplir: auditamos para mejorar.',
                'features' => [
                    'Evaluación integral de instalaciones y perímetros',
                    'Análisis de procedimientos operativos',
                    'Identificación de vulnerabilidades técnicas y humanas',
                    'Detección de sobrecostes innecesarios',
                    'Informe ejecutivo con plan de acción'
                ],
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80'
            ],
            [
                'id' => 'peritaje',
                'icon' => 'fa-gavel',
                'title' => 'Peritaje Judicial en Seguridad Privada',
                'badge' => 'Especializado',
                'badge_color' => 'bg-amber-600 text-white',
                'short' => 'Informes periciales para procedimientos judiciales',
                'description' => 'Elaboramos dictámenes e informes periciales técnicos para procedimientos judiciales en materias de seguridad privada. Actuamos como peritos de parte o designados judicialmente, aportando criterio técnico especializado a jueces, abogados y fiscales.',
                'features' => [
                    'Informes periciales técnicos para juicios',
                    'Auditorías forenses en seguridad privada',
                    'Dictámenes sobre instalaciones y sistemas',
                    'Actuación como perito en vistas judiciales',
                    'Contraperitajes y segundas opiniones técnicas',
                    'Asesoramiento técnico a letrados'
                ],
                'image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=800&q=80'
            ],
            [
                'id' => 'sistemas',
                'icon' => 'fa-sitemap',
                'title' => 'Diseño de Sistemas de Seguridad',
                'badge' => 'Alta demanda',
                'badge_color' => 'bg-blue-500 text-white',
                'short' => 'Arquitectura de sistemas pensada antes de ser instalada',
                'description' => 'Diseñamos sistemas de seguridad integrales (CCTV, control de accesos, intrusión, CRA) basados en las necesidades reales del cliente, no en catálogos de productos. Cada componente tiene un propósito claro.',
                'features' => [
                    'Diseño de sistemas CCTV optimizados',
                    'Control de accesos físicos y lógicos',
                    'Sistemas de detección de intrusión',
                    'Integración con Central Receptora de Alarmas',
                    'Arquitectura escalable y mantenible'
                ],
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&q=80'
            ],
            [
                'id' => 'optimizacion',
                'icon' => 'fa-gears',
                'title' => 'Optimización de Instalaciones Existentes',
                'badge' => null,
                'badge_color' => '',
                'short' => 'Mejorar sin sustituir innecesariamente',
                'description' => 'Muchas instalaciones de seguridad no funcionan correctamente por mala configuración, no por equipamiento inadecuado. Revisamos lo que ya tienes y lo hacemos funcionar como debería.',
                'features' => [
                    'Revisión técnica de sistemas existentes',
                    'Reconfiguración y optimización de equipos',
                    'Corrección de fallos de instalación previos',
                    'Mejora del rendimiento sin nuevas inversiones',
                    'Formación al personal en uso correcto'
                ],
                'image' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=800&q=80'
            ],
            [
                'id' => 'vigilancia',
                'icon' => 'fa-user-shield',
                'title' => 'Servicios Auxiliares y Vigilancia',
                'badge' => null,
                'badge_color' => '',
                'short' => 'Coordinación profesional de recursos humanos',
                'description' => 'Estructuramos y coordinamos servicios de vigilancia, acudas y servicios auxiliares. Mejoramos procedimientos, reducimos incidencias y garantizamos una operativa profesional y estable.',
                'features' => [
                    'Coordinación de servicios de vigilancia',
                    'Gestión de servicios de acuda',
                    'Diseño de procedimientos operativos',
                    'Supervisión y control de calidad',
                    'Reducción de incidencias y errores humanos'
                ],
                'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800&q=80'
            ],
            [
                'id' => 'dpo',
                'icon' => 'fa-shield-halved',
                'title' => 'Delegado de Protección de Datos (DPO)',
                'badge' => 'Cumplimiento',
                'badge_color' => 'bg-green-600 text-white',
                'short' => 'Asesoramiento integral en privacidad y RGPD',
                'description' => 'Ofrecemos el servicio de Delegado de Protección de Datos externo para empresas que requieren cumplir con el RGPD y la LOPDGDD. Realizamos auditorías de privacidad, análisis de riesgos, planes de adecuación y formación al personal.',
                'features' => [
                    'Servicio de DPO externo certificado',
                    'Auditorías de cumplimiento RGPD/LOPDGDD',
                    'Análisis de impacto en protección de datos (EIPD)',
                    'Procedimientos de respuesta ante brechas de seguridad',
                    'Gestión de derechos de los interesados',
                    'Formación y concienciación en privacidad'
                ],
                'image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=800&q=80'
            ],
            [
                'id' => 'tecnologia',
                'icon' => 'fa-microchip',
                'title' => 'Tecnología, Automatización e IA',
                'badge' => 'Innovación',
                'badge_color' => 'bg-purple-500 text-white',
                'short' => 'Integración inteligente de herramientas digitales',
                'description' => 'Incorporamos soluciones tecnológicas avanzadas donde realmente aportan valor: automatización de procesos, analítica de vídeo, inteligencia artificial y herramientas de monitorización que multiplican la eficiencia.',
                'features' => [
                    'Analítica de vídeo inteligente',
                    'Automatización de procesos de seguridad',
                    'Integración de herramientas de IA',
                    'Sistemas de monitorización avanzada',
                    'Dashboards de control en tiempo real'
                ],
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&q=80'
            ]
        ];
        
        foreach ($services as $index => $service):
            $isEven = $index % 2 === 0;
        ?>
        
        <!-- Service: <?php echo $service['title']; ?> -->
        <div id="<?php echo $service['id']; ?>" class="mb-20 last:mb-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center <?php echo $isEven ? '' : 'lg:flex-row-reverse'; ?>">
                
                <!-- Image -->
                <div class="<?php echo $isEven ? 'lg:order-1' : 'lg:order-2'; ?>">
                    <div class="relative">
                        <div class="aspect-video rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo $service['image']; ?>" 
                                 alt="<?php echo $service['title']; ?>" 
                                 class="w-full h-full object-cover">
                        </div>
                        <!-- Decorative corner -->
                        <div class="absolute -bottom-4 <?php echo $isEven ? '-right-4' : '-left-4'; ?> w-24 h-24 border-2 border-praxis-gold rounded-xl -z-10"></div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="<?php echo $isEven ? 'lg:order-2' : 'lg:order-1'; ?>">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-xl flex items-center justify-center">
                            <i class="fas <?php echo $service['icon']; ?> text-praxis-black text-2xl"></i>
                        </div>
                        <?php if ($service['badge']): ?>
                            <span class="px-3 py-1 <?php echo $service['badge_color']; ?> rounded-full text-xs font-bold uppercase tracking-wider">
                                <?php echo $service['badge']; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <h2 class="font-heading font-bold text-2xl md:text-3xl text-praxis-white mb-4">
                        <?php echo $service['title']; ?>
                    </h2>
                    
                    <p class="text-praxis-gold font-medium mb-4">
                        <?php echo $service['short']; ?>
                    </p>
                    
                    <p class="text-praxis-gray-light leading-relaxed mb-6">
                        <?php echo $service['description']; ?>
                    </p>
                    
                    <!-- Features list -->
                    <ul class="space-y-3 mb-8">
                        <?php foreach ($service['features'] as $feature): ?>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-praxis-gold mt-1"></i>
                                <span class="text-praxis-gray-light text-sm"><?php echo $feature; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <a href="contacto.php" class="inline-flex items-center btn-gold px-6 py-3 rounded-lg text-praxis-black font-heading font-semibold text-sm uppercase tracking-wider">
                        Solicitar información
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            
            <?php if ($index < count($services) - 1): ?>
                <!-- Separator -->
                <div class="mt-20 h-px bg-gradient-to-r from-transparent via-praxis-gold/30 to-transparent"></div>
            <?php endif; ?>
        </div>
        
        <?php endforeach; ?>
        
    </div>
</section>


<!-- ============================================
     WHY CHOOSE US
     ============================================ -->
<section class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                ¿Por qué elegirnos?
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                Trabajo <span class="gradient-text">con criterio</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $reasons = [
                ['icon' => 'fa-brain', 'title' => 'Análisis primero', 'desc' => 'Pensamos antes de proponer. Cada recomendación tiene fundamento.'],
                ['icon' => 'fa-handshake', 'title' => 'Sin conflicto de interés', 'desc' => 'No vendemos productos. Solo asesoramos.'],
                ['icon' => 'fa-chart-line', 'title' => 'Enfoque en resultados', 'desc' => 'Medimos el impacto real de cada intervención.'],
                ['icon' => 'fa-shield-halved', 'title' => 'Marco legal español', 'desc' => 'Operamos dentro del marco de seguridad privada en España.']
            ];
            
            foreach ($reasons as $reason): ?>
                <div class="text-center p-8 bg-praxis-gray/30 rounded-2xl border border-praxis-gray/50 card-hover">
                    <div class="w-16 h-16 bg-praxis-gold/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas <?php echo $reason['icon']; ?> text-praxis-gold text-2xl"></i>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-praxis-white mb-3">
                        <?php echo $reason['title']; ?>
                    </h3>
                    <p class="text-praxis-gray-light text-sm">
                        <?php echo $reason['desc']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================
     CTA SECTION
     ============================================ -->
<section class="py-24 bg-gradient-to-b from-praxis-gray to-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
            ¿Listo para tomar decisiones <span class="gradient-text">correctas en seguridad</span>?
        </h2>
        <p class="text-praxis-gray-light text-lg mb-10">
            Cuéntanos tu situación y te propondremos la mejor solución, sin compromiso.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="contacto.php" class="btn-gold px-10 py-5 rounded-lg text-praxis-black font-heading font-bold uppercase tracking-wider">
                <i class="fas fa-comments mr-2"></i>
                Solicitar Consultoría
            </a>
            <a href="tel:+34637474428" class="flex items-center text-praxis-gray-light hover:text-praxis-gold transition-colors">
                <i class="fas fa-phone mr-3 text-praxis-gold"></i>
                <span class="font-medium">+34 637 474 428</span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
