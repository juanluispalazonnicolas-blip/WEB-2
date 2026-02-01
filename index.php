<?php
/**
 * Praxis Seguridad - Página Principal
 * Homepage con todas las secciones corporativas
 */

$page_title = 'Praxis Seguridad | Consultoría Estratégica en Seguridad Privada en Murcia';
$page_description = 'Consultoría estratégica en seguridad privada en Murcia. Auditorías de riesgo, diseño de sistemas, optimización de instalaciones y servicios de vigilancia. Pensamos antes de instalar.';
$current_page = 'inicio';

include 'includes/header.php';
?>

<!-- ============================================
     HERO SECTION - 100vh
     ============================================ -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=80" 
             alt="Entorno empresarial corporativo" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-praxis-black/80 via-praxis-black/70 to-praxis-black"></div>
    </div>
    
    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-20">
        <!-- Logo grande prominente -->
        <div class="animate-scale delay-100">
            <img src="images/logo-praxis.png" alt="Praxis Seguridad" class="h-28 md:h-36 lg:h-44 w-auto mx-auto drop-shadow-2xl animate-float">
        </div>
        
        <!-- Pretitle -->
        <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-[0.3em] mb-6 animate-on-load delay-200">
            Consultoría Estratégica en Seguridad Privada
        </p>
        
        <!-- Main Title -->
        <h1 class="font-heading font-extrabold text-4xl sm:text-5xl md:text-6xl lg:text-7xl leading-tight mb-8">
            <span class="text-praxis-white animate-on-load delay-300" style="display: inline-block;">Seguridad pensada.</span><br>
            <span class="gradient-text animate-on-load delay-400" style="display: inline-block;">Decisiones que protegen.</span>
        </h1>
        
        <!-- Subtitle -->
        <p class="text-praxis-gray-light text-lg md:text-xl max-w-3xl mx-auto mb-12 leading-relaxed animate-on-load delay-500">
            Consultoría · Auditoría · Diseño de sistemas · Servicios auxiliares · Estrategia operativa
        </p>
        
        <!-- CTAs -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-on-load delay-600">
            <a href="servicios.php" class="btn-gold btn-shimmer px-8 py-4 rounded-lg text-praxis-black font-heading font-semibold text-sm uppercase tracking-wider">
                <i class="fas fa-shield-halved mr-2"></i>Ver Servicios
            </a>
            <a href="contacto.php" class="px-8 py-4 rounded-lg border-2 border-praxis-gold text-praxis-gold font-heading font-semibold text-sm uppercase tracking-wider hover:bg-praxis-gold hover:text-praxis-black transition-all">
                <i class="fas fa-comments mr-2"></i>Solicitar Consultoría
            </a>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce animate-on-load delay-800">
            <a href="#intro" class="text-praxis-gold">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </div>
</section>


<!-- ============================================
     BARRA DE CONFIANZA
     ============================================ -->
<section class="py-8 bg-praxis-black border-y border-praxis-gold/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
            <div class="flex items-center justify-center gap-3">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-shield-halved text-praxis-gold text-xl"></i>
                </div>
                <div>
                    <p class="text-praxis-gold font-bold text-lg">Director</p>
                    <p class="text-praxis-gray-light text-xs">de Seguridad</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-3">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-lock text-praxis-gold text-xl"></i>
                </div>
                <div>
                    <p class="text-praxis-gold font-bold text-lg">DPO</p>
                    <p class="text-praxis-gray-light text-xs">Certificado</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-3">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-gavel text-praxis-gold text-xl"></i>
                </div>
                <div>
                    <p class="text-praxis-gold font-bold text-lg">Perito</p>
                    <p class="text-praxis-gray-light text-xs">Judicial</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-3">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-praxis-gold text-xl"></i>
                </div>
                <div>
                    <p class="text-praxis-gold font-bold text-lg">+15 años</p>
                    <p class="text-praxis-gray-light text-xs">Experiencia</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     CUESTIONARIO RÁPIDO DE PRESUPUESTO
     ============================================ -->
<section class="py-16 bg-gradient-to-r from-praxis-gold to-praxis-gold-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-black mb-4">
                    ¿Necesitas una consulta rápida?
                </h2>
                <p class="text-praxis-black/80 text-lg mb-6">
                    Cuéntame tu situación en 30 segundos y te respondo con una valoración inicial sin compromiso.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-praxis-black">
                        <i class="fas fa-check-circle"></i>
                        <span>Respuesta en menos de 24 horas</span>
                    </li>
                    <li class="flex items-center gap-3 text-praxis-black">
                        <i class="fas fa-check-circle"></i>
                        <span>100% confidencial</span>
                    </li>
                    <li class="flex items-center gap-3 text-praxis-black">
                        <i class="fas fa-check-circle"></i>
                        <span>Sin compromiso ni coste</span>
                    </li>
                </ul>
            </div>
            <div class="bg-praxis-black rounded-2xl p-8 shadow-2xl">
                <form action="contacto.php" method="GET" class="space-y-4">
                    <div>
                        <label class="block text-praxis-gray-light text-sm mb-2">¿Qué tipo de consulta necesitas?</label>
                        <select name="tipo" class="w-full px-4 py-3 bg-praxis-gray/30 border border-praxis-gray/50 rounded-lg text-praxis-white focus:border-praxis-gold focus:outline-none">
                            <option value="">Selecciona una opción</option>
                            <option value="segunda-opinion">Segunda opinión sobre presupuesto</option>
                            <option value="auditoria">Auditoría de sistema existente</option>
                            <option value="diseno">Diseño de nuevo sistema</option>
                            <option value="dpo">Protección de datos (DPO)</option>
                            <option value="peritaje">Peritaje judicial</option>
                            <option value="otro">Otra consulta</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-praxis-gray-light text-sm mb-2">¿Para hogar o empresa?</label>
                        <div class="flex gap-4">
                            <label class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-praxis-gray/30 border border-praxis-gray/50 rounded-lg cursor-pointer hover:border-praxis-gold transition-colors">
                                <input type="radio" name="ambito" value="hogar" class="text-praxis-gold">
                                <i class="fas fa-home text-praxis-gold"></i>
                                <span class="text-praxis-white">Hogar</span>
                            </label>
                            <label class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-praxis-gray/30 border border-praxis-gray/50 rounded-lg cursor-pointer hover:border-praxis-gold transition-colors">
                                <input type="radio" name="ambito" value="empresa" class="text-praxis-gold">
                                <i class="fas fa-building text-praxis-gold"></i>
                                <span class="text-praxis-white">Empresa</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-praxis-gray-light text-sm mb-2">Tu teléfono o email</label>
                        <input type="text" name="contacto" placeholder="Para responderte" class="w-full px-4 py-3 bg-praxis-gray/30 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none">
                    </div>
                    <button type="submit" class="w-full py-4 bg-praxis-gold text-praxis-black font-heading font-bold uppercase tracking-wider rounded-lg hover:bg-white transition-colors">
                        <i class="fas fa-paper-plane mr-2"></i>Solicitar Valoración Gratis
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     INTRO SECTION - Fondo claro
     ============================================ -->
<section id="intro" class="py-24 bg-praxis-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Image -->
            <div class="relative">
                <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80" 
                         alt="Oficina corporativa Praxis Seguridad" 
                         class="w-full h-full object-cover">
                </div>
                <!-- Decorative element -->
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-2xl -z-10"></div>
            </div>
            
            <!-- Content -->
            <div>
                <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                    Bienvenido a Praxis Seguridad
                </p>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-black mb-6 leading-tight">
                    Consultoría que convierte la seguridad en una <span class="text-praxis-gold">ventaja estratégica</span>
                </h2>
                <p class="text-praxis-gray text-lg leading-relaxed mb-6">
                    En Praxis Seguridad ayudamos a empresas y particulares a tomar decisiones correctas en materia de seguridad, basadas en análisis real, experiencia operativa y visión a largo plazo.
                </p>
                <p class="text-praxis-gray text-lg leading-relaxed mb-8">
                    <strong class="text-praxis-black">No vendemos productos. Diseñamos soluciones.</strong><br>
                    Nuestro trabajo comienza antes de cualquier instalación y continúa durante toda la vida del servicio.
                </p>
                
                <!-- Values -->
                <div class="flex flex-wrap gap-3">
                    <?php
                    $values = ['Análisis', 'Criterio', 'Confianza', 'Control', 'Continuidad'];
                    foreach ($values as $value): ?>
                        <span class="px-4 py-2 bg-praxis-black text-praxis-white rounded-lg text-sm font-medium">
                            <?php echo $value; ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     SERVICES SECTION - Fondo oscuro
     ============================================ -->
<section class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Nuestros Servicios
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
                Soluciones de seguridad <span class="gradient-text">pensadas y ejecutadas</span>
            </h2>
            <p class="text-praxis-gray-light text-lg max-w-2xl mx-auto">
                Cada servicio está diseñado para aportar valor real, no productos genéricos
            </p>
        </div>
        
        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <?php
            $services = [
                [
                    'icon' => 'fa-chess-queen',
                    'title' => 'Consultoría Estratégica',
                    'desc' => 'Diseño de modelos de seguridad eficientes y escalables. Asesoramiento a dirección y responsables de operaciones.',
                    'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&q=80'
                ],
                [
                    'icon' => 'fa-magnifying-glass-chart',
                    'title' => 'Auditoría de Riesgos',
                    'desc' => 'Detección de fallos, sobrecostes y carencias reales. Evaluación de instalaciones, procesos y personal.',
                    'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&q=80'
                ],
                [
                    'icon' => 'fa-sitemap',
                    'title' => 'Diseño de Sistemas',
                    'desc' => 'Soluciones pensadas antes de ser instaladas. CCTV, intrusión, control de accesos, CRA.',
                    'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&q=80'
                ],
                [
                    'icon' => 'fa-gears',
                    'title' => 'Optimización',
                    'desc' => 'Mejorar sin sustituir innecesariamente. Revisión de configuraciones, arquitectura y uso correcto.',
                    'image' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=600&q=80'
                ],
                [
                    'icon' => 'fa-user-shield',
                    'title' => 'Servicios de Vigilancia',
                    'desc' => 'Estructuración y coordinación profesional. Vigilancia, acudas, servicios auxiliares.',
                    'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=600&q=80'
                ],
                [
                    'icon' => 'fa-microchip',
                    'title' => 'Tecnología e IA',
                    'desc' => 'Automatización, control y eficiencia operativa. Integración de herramientas digitales avanzadas.',
                    'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=80'
                ]
            ];
            
            foreach ($services as $service): ?>
                <div class="group card-hover bg-praxis-gray rounded-2xl overflow-hidden border border-praxis-gray/50">
                    <!-- Image -->
                    <div class="aspect-video overflow-hidden">
                        <img src="<?php echo $service['image']; ?>" 
                             alt="<?php echo $service['title']; ?>" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <!-- Content -->
                    <div class="p-6">
                        <div class="w-12 h-12 bg-praxis-gold/10 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas <?php echo $service['icon']; ?> text-praxis-gold text-xl"></i>
                        </div>
                        <h3 class="font-heading font-bold text-xl text-praxis-white mb-3 group-hover:text-praxis-gold transition-colors">
                            <?php echo $service['title']; ?>
                        </h3>
                        <p class="text-praxis-gray-light text-sm leading-relaxed">
                            <?php echo $service['desc']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>
        
        <!-- CTA -->
        <div class="text-center mt-12">
            <a href="servicios.php" class="inline-flex items-center text-praxis-gold font-heading font-semibold hover:underline">
                Ver todos los servicios
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>


<!-- ============================================
     ABOUT SECTION
     ============================================ -->
<section class="py-24 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Content -->
            <div>
                <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                    Sobre Nosotros
                </p>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6 leading-tight">
                    Experiencia, criterio y <span class="gradient-text">responsabilidad</span>
                </h2>
                <p class="text-praxis-gray-light text-lg leading-relaxed mb-6">
                    Praxis Seguridad nace de la necesidad de aportar orden, método y criterio técnico en un sector donde la seguridad suele gestionarse de forma reactiva o fragmentada.
                </p>
                <p class="text-praxis-gray-light text-lg leading-relaxed mb-8">
                    Nuestro valor no está en vender sistemas o personal, sino en <strong class="text-praxis-white">decidir qué seguridad es necesaria</strong>, cómo debe implementarse y cómo mantenerse estable en el tiempo.
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6">
                    <div class="text-center">
                        <p class="font-heading font-bold text-3xl text-praxis-gold mb-1">15+</p>
                        <p class="text-praxis-gray-light text-sm">Años de experiencia</p>
                    </div>
                    <div class="text-center">
                        <p class="font-heading font-bold text-3xl text-praxis-gold mb-1">100%</p>
                        <p class="text-praxis-gray-light text-sm">Compromiso</p>
                    </div>
                    <div class="text-center">
                        <p class="font-heading font-bold text-3xl text-praxis-gold mb-1">24/7</p>
                        <p class="text-praxis-gray-light text-sm">Soporte</p>
                    </div>
                </div>
            </div>
            
            <!-- Image -->
            <div class="relative">
                <div class="aspect-[4/5] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=800&q=80" 
                         alt="Equipo profesional Praxis Seguridad" 
                         class="w-full h-full object-cover">
                </div>
                <!-- Decorative border -->
                <div class="absolute -top-4 -left-4 w-full h-full border-2 border-praxis-gold rounded-2xl -z-10"></div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     CTA BANNER
     ============================================ -->
<section class="relative py-24 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=1920&q=80" 
             alt="Instalación protegida" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-praxis-black via-praxis-black/90 to-praxis-black/80"></div>
    </div>
    
    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl lg:text-5xl text-praxis-white mb-6">
            Hablemos de seguridad <span class="gradient-text">con criterio</span>
        </h2>
        <p class="text-praxis-gray-light text-lg md:text-xl mb-10 max-w-2xl mx-auto">
            Analizamos tu situación y te proponemos la mejor solución, sin compromiso.
        </p>
        <a href="contacto.php" class="btn-gold inline-flex items-center px-10 py-5 rounded-lg text-praxis-black font-heading font-bold text-lg uppercase tracking-wider">
            <i class="fas fa-comments mr-3"></i>
            Solicitar Consultoría
        </a>
    </div>
</section>


<!-- ============================================
     SOCIAL / GALLERY SECTION
     ============================================ -->
<section class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Nuestro Trabajo
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                Proyectos y <span class="gradient-text">procesos reales</span>
            </h2>
        </div>
        
        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php
            $gallery = [
                'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=600&q=80',
                'https://images.unsplash.com/photo-1557597774-9d273605dfa9?w=600&q=80',
                'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=80',
                'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80',
                'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&q=80',
                'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=600&q=80'
            ];
            
            foreach ($gallery as $index => $image): ?>
                <div class="aspect-square rounded-xl overflow-hidden group cursor-pointer">
                    <img src="<?php echo $image; ?>" 
                         alt="Proyecto Praxis Seguridad <?php echo $index + 1; ?>" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================
     CÓMO TRABAJAMOS - Proceso
     ============================================ -->
<section class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Metodología
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-4">
                Cómo <span class="gradient-text">trabajamos</span>
            </h2>
            <p class="text-praxis-gray-light text-lg max-w-2xl mx-auto">
                Un proceso claro y transparente en 4 pasos
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $pasos = [
                [
                    'numero' => '01',
                    'titulo' => 'Escucho',
                    'descripcion' => 'Me cuentas tu situación, tus preocupaciones y tus objetivos. Sin prisa, sin presión.',
                    'icono' => 'fa-headset'
                ],
                [
                    'numero' => '02',
                    'titulo' => 'Analizo',
                    'descripcion' => 'Estudio tu caso en profundidad: riesgos reales, recursos disponibles y opciones viables.',
                    'icono' => 'fa-magnifying-glass-chart'
                ],
                [
                    'numero' => '03',
                    'titulo' => 'Propongo',
                    'descripcion' => 'Te presento un informe claro con mis recomendaciones, alternativas y costes estimados.',
                    'icono' => 'fa-file-contract'
                ],
                [
                    'numero' => '04',
                    'titulo' => 'Acompaño',
                    'descripcion' => 'Si lo necesitas, superviso la implementación para asegurar que todo se hace correctamente.',
                    'icono' => 'fa-handshake'
                ]
            ];
            
            foreach ($pasos as $index => $paso): ?>
                <div class="relative">
                    <!-- Línea conectora -->
                    <?php if ($index < 3): ?>
                        <div class="hidden lg:block absolute top-12 left-full w-full h-0.5 bg-gradient-to-r from-praxis-gold/50 to-transparent z-0"></div>
                    <?php endif; ?>
                    
                    <div class="relative z-10 text-center p-6 bg-praxis-gray/20 rounded-2xl border border-praxis-gray/30 hover:border-praxis-gold/50 transition-colors">
                        <div class="w-20 h-20 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-2xl flex items-center justify-center mx-auto mb-6 relative">
                            <i class="fas <?php echo $paso['icono']; ?> text-praxis-black text-2xl"></i>
                            <span class="absolute -top-2 -right-2 w-8 h-8 bg-praxis-black border-2 border-praxis-gold rounded-full flex items-center justify-center text-praxis-gold font-bold text-sm">
                                <?php echo $paso['numero']; ?>
                            </span>
                        </div>
                        <h3 class="font-heading font-bold text-xl text-praxis-white mb-3"><?php echo $paso['titulo']; ?></h3>
                        <p class="text-praxis-gray-light text-sm"><?php echo $paso['descripcion']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================
     NEWSLETTER
     ============================================ -->
<section class="py-16 bg-praxis-gray">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-praxis-black rounded-2xl p-8 md:p-12 border border-praxis-gold/20 text-center">
            <div class="w-16 h-16 bg-praxis-gold/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-envelope text-praxis-gold text-2xl"></i>
            </div>
            <h2 class="font-heading font-bold text-2xl md:text-3xl text-praxis-white mb-4">
                Consejos de seguridad en tu email
            </h2>
            <p class="text-praxis-gray-light mb-8 max-w-xl mx-auto">
                Suscríbete para recibir consejos prácticos, novedades del sector y alertas sobre estafas. Sin spam, solo contenido útil.
            </p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <input type="email" placeholder="Tu email" class="flex-1 px-6 py-4 bg-praxis-gray/30 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none">
                <button type="submit" class="px-8 py-4 bg-praxis-gold text-praxis-black font-heading font-bold uppercase tracking-wider rounded-lg hover:bg-white transition-colors whitespace-nowrap">
                    Suscribirme
                </button>
            </form>
            <p class="text-praxis-gray-medium text-xs mt-4">
                <i class="fas fa-lock mr-1"></i> Tus datos están seguros. Puedes darte de baja cuando quieras.
            </p>
        </div>
    </div>
</section>


<!-- ============================================
     FINAL CTA SECTION
     ============================================ -->
<section class="py-24 bg-gradient-to-b from-praxis-gray to-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <div class="w-20 h-20 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-2xl flex items-center justify-center mx-auto mb-8">
            <i class="fas fa-shield-halved text-praxis-black text-3xl"></i>
        </div>
        
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
            ¿Necesitas tomar una <span class="gradient-text">decisión correcta</span> en seguridad?
        </h2>
        <p class="text-praxis-gray-light text-lg mb-10 max-w-2xl mx-auto">
            Analizamos tu situación y te proponemos la mejor solución, sin compromiso.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="contacto.php" class="btn-gold px-10 py-5 rounded-lg text-praxis-black font-heading font-bold uppercase tracking-wider">
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
