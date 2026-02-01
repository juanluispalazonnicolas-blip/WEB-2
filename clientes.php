<?php
/**
 * Praxis Seguridad - Servicios para Clientes
 * Landing page B2C para particulares y empresas que contratan seguridad
 */

$page_title = 'Servicios para Particulares y Empresas | Praxis Seguridad';
$page_description = 'Asesoramiento independiente en seguridad para particulares y empresas. Auditorías, segundas opiniones, supervisión de instalaciones y protección de datos.';
$current_page = 'clientes';

include 'includes/header.php';
?>

<!-- ============================================
     HERO SECTION - B2C
     ============================================ -->
<section class="relative pt-32 pb-20 bg-praxis-black overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute inset-0 bg-gradient-to-r from-praxis-black via-praxis-black/95 to-praxis-black/80"></div>
        <img src="https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=1920" 
             alt="Hogar y negocio protegido" 
             class="w-full h-full object-cover opacity-20">
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-green-500/10 border border-green-500/30 rounded-full text-green-400 text-sm font-medium mb-6">
                <i class="fas fa-home mr-2"></i>Para Particulares y Empresas
            </div>
            
            <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-6xl text-praxis-white mb-6 leading-tight">
                Asesoramiento <span class="gradient-text">independiente</span> en seguridad
            </h1>
            <p class="text-praxis-gray-light text-xl leading-relaxed mb-8">
                ¿Vas a contratar un sistema de alarma? ¿Ya tienes uno y no funciona bien? ¿Tu empresa de seguridad te cobra de más?
                <strong class="text-praxis-white">Te ayudo a tomar la decisión correcta.</strong>
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="contacto.php" class="btn-gold inline-flex items-center justify-center px-8 py-4 rounded-lg text-praxis-black font-heading font-semibold text-sm uppercase tracking-wider">
                    <i class="fas fa-comments mr-2"></i>Consultar sin compromiso
                </a>
                <a href="#servicios-clientes" class="inline-flex items-center justify-center px-8 py-4 rounded-lg border-2 border-praxis-gold text-praxis-gold font-heading font-semibold text-sm uppercase tracking-wider hover:bg-praxis-gold hover:text-praxis-black transition-all">
                    <i class="fas fa-arrow-down mr-2"></i>¿Cómo puedo ayudarte?
                </a>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-praxis-gold/50 to-transparent"></div>
</section>


<!-- ============================================
     MI DIFERENCIA
     ============================================ -->
<section class="py-20 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="font-heading font-bold text-2xl md:text-3xl text-praxis-white mb-4">
                ¿Por qué necesitas un asesor <span class="gradient-text">independiente</span>?
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="text-center p-8 bg-praxis-black/50 rounded-2xl border border-praxis-gray/50">
                <div class="w-16 h-16 bg-red-500/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-store text-red-400 text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-praxis-white mb-3">
                    Las empresas venden
                </h3>
                <p class="text-praxis-gray-light text-sm">
                    Una empresa de alarmas quiere venderte SU sistema. Un instalador quiere hacer SU instalación. 
                    Su objetivo es vender, no necesariamente lo que tú necesitas.
                </p>
            </div>
            
            <div class="text-center p-8 bg-praxis-black/50 rounded-2xl border border-praxis-gray/50">
                <div class="w-16 h-16 bg-amber-500/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-question text-amber-400 text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-praxis-white mb-3">
                    Tú no eres experto
                </h3>
                <p class="text-praxis-gray-light text-sm">
                    Es normal. No tienes por qué saber qué cámara es mejor, qué conectividad necesitas o 
                    si el presupuesto que te han dado es justo. Pero yo sí.
                </p>
            </div>
            
            <div class="text-center p-8 bg-praxis-black/50 rounded-2xl border border-praxis-gold/30">
                <div class="w-16 h-16 bg-praxis-gold/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-handshake text-praxis-gold text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-praxis-white mb-3">
                    Yo trabajo para ti
                </h3>
                <p class="text-praxis-gray-light text-sm">
                    No vendo productos ni cobro comisiones. Mi único interés es que tomes la mejor decisión 
                    para tu seguridad y tu bolsillo.
                </p>
            </div>
            
        </div>
    </div>
</section>


<!-- ============================================
     SERVICIOS PARA CLIENTES
     ============================================ -->
<section id="servicios-clientes" class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                ¿Cómo Puedo Ayudarte?
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
                Servicios para <span class="gradient-text">particulares y empresas</span>
            </h2>
        </div>
        
        <?php
        $client_services = [
            [
                'icon' => 'fa-clipboard-check',
                'title' => 'Antes de Contratar',
                'subtitle' => 'Segunda opinión independiente',
                'description' => '¿Te han dado un presupuesto y no sabes si es justo? ¿No entiendes lo que incluye? Te lo reviso, te lo explico y te digo si es adecuado para tus necesidades.',
                'includes' => [
                    'Análisis del presupuesto recibido',
                    'Evaluación técnica de la propuesta',
                    'Comparativa con alternativas del mercado',
                    'Recomendación honesta: contratar, negociar o buscar otra opción'
                ],
                'price' => 'Desde 75€',
                'image' => 'https://images.pexels.com/photos/590016/pexels-photo-590016.jpeg?auto=compress&cs=tinysrgb&w=600'
            ],
            [
                'icon' => 'fa-magnifying-glass',
                'title' => 'Auditoría de tu Sistema Actual',
                'subtitle' => '¿Tu alarma funciona bien?',
                'description' => 'Muchas instalaciones tienen fallos que nadie detecta hasta que es demasiado tarde. Reviso tu sistema y te digo qué está bien, qué está mal y qué puedes mejorar.',
                'includes' => [
                    'Inspección completa de la instalación',
                    'Pruebas de funcionamiento real',
                    'Detección de puntos ciegos y vulnerabilidades',
                    'Informe con propuestas de mejora'
                ],
                'price' => 'Desde 150€',
                'image' => 'https://images.pexels.com/photos/430208/pexels-photo-430208.jpeg?auto=compress&cs=tinysrgb&w=600'
            ],
            [
                'icon' => 'fa-drafting-compass',
                'title' => 'Diseño de Sistema a Medida',
                'subtitle' => 'Empezar desde cero, bien hecho',
                'description' => 'Si vas a instalar seguridad desde cero, puedo diseñarte el sistema completo: qué necesitas, dónde colocarlo y con qué características. Tú luego eliges quién te lo instala.',
                'includes' => [
                    'Visita y análisis de la instalación',
                    'Diseño técnico completo',
                    'Pliego de especificaciones para solicitar presupuestos',
                    'Asesoramiento durante la instalación'
                ],
                'price' => 'Desde 250€',
                'image' => 'https://images.pexels.com/photos/1249611/pexels-photo-1249611.jpeg?auto=compress&cs=tinysrgb&w=600'
            ],
            [
                'icon' => 'fa-user-lock',
                'title' => 'Protección de Datos (DPO)',
                'subtitle' => 'Cumplimiento RGPD para empresas',
                'description' => 'Si tu empresa maneja datos personales, necesitas cumplir con el RGPD. Te ayudo a adecuarte a la normativa de forma práctica, sin burocracias innecesarias.',
                'includes' => [
                    'Auditoría de cumplimiento RGPD',
                    'Registro de actividades de tratamiento',
                    'Políticas de privacidad y cookies',
                    'Servicio de DPO externo (opcional)'
                ],
                'price' => 'Consultar',
                'image' => 'https://images.pexels.com/photos/60504/security-protection-anti-virus-software-60504.jpeg?auto=compress&cs=tinysrgb&w=600'
            ]
        ];
        
        foreach ($client_services as $index => $service):
            $isEven = $index % 2 === 0;
        ?>
        
        <div class="mb-16 last:mb-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Image -->
                <div class="<?php echo $isEven ? 'lg:order-1' : 'lg:order-2'; ?>">
                    <div class="relative">
                        <div class="aspect-video rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo $service['image']; ?>" 
                                 alt="<?php echo $service['title']; ?>" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-4 <?php echo $isEven ? '-right-4' : '-left-4'; ?> px-6 py-3 bg-praxis-gold rounded-xl">
                            <span class="font-heading font-bold text-praxis-black"><?php echo $service['price']; ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="<?php echo $isEven ? 'lg:order-2' : 'lg:order-1'; ?>">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-xl flex items-center justify-center">
                            <i class="fas <?php echo $service['icon']; ?> text-praxis-black text-2xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="font-heading font-bold text-2xl md:text-3xl text-praxis-white mb-2">
                        <?php echo $service['title']; ?>
                    </h3>
                    
                    <p class="text-praxis-gold font-medium mb-4">
                        <?php echo $service['subtitle']; ?>
                    </p>
                    
                    <p class="text-praxis-gray-light leading-relaxed mb-6">
                        <?php echo $service['description']; ?>
                    </p>
                    
                    <ul class="space-y-3 mb-8">
                        <?php foreach ($service['includes'] as $item): ?>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-praxis-gold mt-1"></i>
                                <span class="text-praxis-gray-light text-sm"><?php echo $item; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <a href="contacto.php" class="inline-flex items-center btn-gold px-6 py-3 rounded-lg text-praxis-black font-heading font-semibold text-sm uppercase tracking-wider">
                        Solicitar información
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            
            <?php if ($index < count($client_services) - 1): ?>
                <div class="mt-16 h-px bg-gradient-to-r from-transparent via-praxis-gold/30 to-transparent"></div>
            <?php endif; ?>
        </div>
        
        <?php endforeach; ?>
        
    </div>
</section>


<!-- ============================================
     FAQ
     ============================================ -->
<section class="py-24 bg-praxis-gray">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Preguntas Frecuentes
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                Dudas <span class="gradient-text">habituales</span>
            </h2>
        </div>
        
        <div class="space-y-4">
            <?php
            $faqs = [
                [
                    'q' => '¿No es un gasto innecesario pagar a alguien antes de contratar una alarma?',
                    'a' => 'Al contrario. Una buena asesoría puede ahorrarte cientos de euros en equipamiento innecesario o mal dimensionado. Y sobre todo, evitar que contrates algo que no te protege de verdad.'
                ],
                [
                    'q' => '¿No puedo simplemente comparar presupuestos yo mismo?',
                    'a' => 'Puedes comparar precios, pero ¿sabes comparar calidad técnica? ¿Entiendes la diferencia entre resoluciones, tipos de sensor o protocolos de comunicación? Yo traduzco eso para ti.'
                ],
                [
                    'q' => '¿Cobras comisión si luego contrato alguna empresa?',
                    'a' => 'No. Mi única relación comercial es contigo. No tengo acuerdos con instaladores ni fabricantes. Eso me permite ser completamente honesto en mis recomendaciones.'
                ],
                [
                    'q' => '¿También trabajas para empresas o solo particulares?',
                    'a' => 'Trabajo con ambos. Si tienes un negocio, las necesidades son diferentes pero el enfoque es el mismo: analizar, recomendar y acompañarte en la decisión.'
                ]
            ];
            
            foreach ($faqs as $index => $faq): ?>
                <div class="bg-praxis-black/50 rounded-xl border border-praxis-gray/50 overflow-hidden">
                    <button class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none" 
                            onclick="toggleFaq(<?php echo $index; ?>)">
                        <span class="font-heading font-semibold text-praxis-white pr-4"><?php echo $faq['q']; ?></span>
                        <i class="fas fa-chevron-down text-praxis-gold transition-transform" id="faq-icon-<?php echo $index; ?>"></i>
                    </button>
                    <div class="hidden px-6 pb-5" id="faq-content-<?php echo $index; ?>">
                        <p class="text-praxis-gray-light"><?php echo $faq['a']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</section>

<script>
function toggleFaq(index) {
    const content = document.getElementById('faq-content-' + index);
    const icon = document.getElementById('faq-icon-' + index);
    
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}
</script>


<!-- ============================================
     CTA
     ============================================ -->
<section class="py-24 bg-gradient-to-b from-praxis-gray to-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
            ¿Tienes dudas sobre tu <span class="gradient-text">seguridad</span>?
        </h2>
        <p class="text-praxis-gray-light text-lg mb-10 max-w-2xl mx-auto">
            Cuéntame tu situación. Sin presión, sin venta agresiva. Solo un profesional que escucha y aconseja.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="contacto.php" class="btn-gold px-10 py-5 rounded-lg text-praxis-black font-heading font-bold uppercase tracking-wider">
                <i class="fas fa-comments mr-2"></i>Consultar
            </a>
            <a href="tel:+34637474428" class="flex items-center text-praxis-gray-light hover:text-praxis-gold transition-colors">
                <i class="fas fa-phone mr-3 text-praxis-gold"></i>
                <span class="font-medium">+34 637 474 428</span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
