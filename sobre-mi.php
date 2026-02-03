<?php
/**
 * Praxis Seguridad - Sobre Mí
 * Página personal de Juan Luis Palazón Nicolás
 */

$page_title = 'Juan Luis Palazón Nicolás | Consultor en Seguridad Privada | Praxis Seguridad';
$page_description = 'Conoce a Juan Luis Palazón Nicolás, Director de Seguridad habilitado, DPO y Perito Judicial. Consultoría estratégica en seguridad privada en Murcia.';
$current_page = 'sobre-mi';

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
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Photo -->
            <div class="relative order-2 lg:order-1">
                <div class="relative max-w-md mx-auto lg:ml-0">
                    <div class="aspect-[3/4] rounded-2xl overflow-hidden shadow-2xl border-2 border-praxis-gold/20">
                        <img src="images/juan-luis-palazon.jpg" 
                             alt="Juan Luis Palazón Nicolás - Director de Seguridad" 
                             class="w-full h-full object-cover">
                    </div>
                    <!-- Decorative corner -->
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 border-2 border-praxis-gold rounded-2xl -z-10"></div>
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-gradient-to-br from-praxis-gold/20 to-transparent rounded-2xl -z-10"></div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="order-1 lg:order-2">
                <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                    Fundador & Director
                </p>
                <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-6xl text-praxis-white mb-6 leading-tight">
                    Juan Luis<br><span class="gradient-text">Palazón Nicolás</span>
                </h1>
                <p class="text-praxis-gray-light text-xl leading-relaxed mb-8">
                    Director de Seguridad habilitado, Delegado de Protección de Datos y Perito Judicial. 
                    <strong class="text-praxis-white">Creo en la seguridad pensada, no improvisada.</strong>
                </p>
                
                <!-- Quick credentials -->
                <div class="flex flex-wrap gap-3 mb-8">
                    <span class="px-4 py-2 bg-praxis-gold/10 border border-praxis-gold/30 rounded-lg text-praxis-gold text-sm font-medium">
                        <i class="fas fa-shield-halved mr-2"></i>Director de Seguridad
                    </span>
                    <span class="px-4 py-2 bg-praxis-gold/10 border border-praxis-gold/30 rounded-lg text-praxis-gold text-sm font-medium">
                        <i class="fas fa-user-lock mr-2"></i>DPO Certificado
                    </span>
                    <span class="px-4 py-2 bg-praxis-gold/10 border border-praxis-gold/30 rounded-lg text-praxis-gold text-sm font-medium">
                        <i class="fas fa-gavel mr-2"></i>Perito Judicial
                    </span>
                </div>
                
                <a href="contacto.php" class="btn-gold inline-flex items-center px-8 py-4 rounded-lg text-praxis-black font-heading font-semibold text-sm uppercase tracking-wider">
                    <i class="fas fa-comments mr-2"></i>Contactar
                </a>
            </div>
        </div>
    </div>
    
    <!-- Decorative line -->
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-praxis-gold/50 to-transparent"></div>
</section>


<!-- ============================================
     MI HISTORIA - Narrativo
     ============================================ -->
<section class="py-24 bg-praxis-gray">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Mi Trayectoria
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                Una carrera construida sobre <span class="gradient-text">criterio y experiencia</span>
            </h2>
        </div>
        
        <!-- Narrative content -->
        <div class="prose prose-invert prose-lg max-w-none">
            <div class="bg-praxis-black/50 rounded-2xl p-8 md:p-12 border border-praxis-gold/10">
                
                <p class="text-praxis-gray-light text-lg leading-relaxed mb-6">
                    Mi camino en el mundo de la seguridad comenzó con una convicción clara: 
                    <strong class="text-praxis-white">la seguridad efectiva nace del análisis, no de la improvisación</strong>. 
                    A lo largo de los años, he tenido la oportunidad de formarme en las áreas más críticas 
                    de este sector y poner ese conocimiento al servicio de empresas y particulares que 
                    buscan proteger lo que más les importa.
                </p>
                
                <p class="text-praxis-gray-light text-lg leading-relaxed mb-6">
                    Como <strong class="text-praxis-gold">Director de Seguridad habilitado</strong>, entiendo 
                    que cada organización tiene necesidades únicas. No existen soluciones genéricas cuando 
                    hablamos de proteger personas, activos y reputación. Por eso, cada proyecto que asumo 
                    comienza con un análisis profundo: identificar riesgos reales, evaluar recursos existentes 
                    y diseñar estrategias que sean sostenibles en el tiempo.
                </p>
                
                <p class="text-praxis-gray-light text-lg leading-relaxed mb-6">
                    Mi formación como <strong class="text-praxis-gold">Delegado de Protección de Datos (DPO)</strong> 
                    me ha permitido comprender que la seguridad física y la seguridad de la información 
                    están íntimamente conectadas. En un mundo cada vez más digitalizado, proteger los datos 
                    es tan importante como proteger las instalaciones. Ayudo a las empresas a cumplir con 
                    el RGPD y la LOPDGDD de forma práctica, sin burocracias innecesarias.
                </p>
                
                <p class="text-praxis-gray-light text-lg leading-relaxed mb-6">
                    Como <strong class="text-praxis-gold">Perito Judicial en Seguridad Privada</strong>, 
                    aporto criterio técnico especializado en procedimientos judiciales. Cuando un juez, 
                    abogado o fiscal necesita entender si una instalación de seguridad era adecuada, 
                    si los procedimientos se ejecutaron correctamente, o si hubo negligencia profesional, 
                    mi trabajo es traducir la complejidad técnica en informes claros y fundamentados.
                </p>
                
                <div class="mt-10 p-6 bg-praxis-gold/5 border-l-4 border-praxis-gold rounded-r-xl">
                    <p class="text-praxis-white text-xl font-heading font-semibold mb-2">
                        "Pensar antes de instalar"
                    </p>
                    <p class="text-praxis-gray-light">
                        Esta es la filosofía que guía todo mi trabajo. La mejor inversión en seguridad 
                        es aquella que se hace con criterio, no por miedo o por moda.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     TITULACIONES Y CERTIFICACIONES
     ============================================ -->
<section class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Formación Oficial
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                Titulaciones y <span class="gradient-text">Certificaciones</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Director de Seguridad -->
            <div class="bg-praxis-gray/30 rounded-2xl p-8 border border-praxis-gray/50 card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-shield-halved text-praxis-black text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-xl text-praxis-white mb-3">
                    Director de Seguridad
                </h3>
                <p class="text-praxis-gold text-sm font-medium mb-4">
                    Habilitación Oficial
                </p>
                <p class="text-praxis-gray-light text-sm leading-relaxed">
                    Titulación oficial que habilita para el ejercicio profesional de Director de Seguridad 
                    según la normativa española de seguridad privada (Ley 5/2014).
                </p>
                <div class="mt-6 pt-6 border-t border-praxis-gray/30">
                    <span class="text-xs text-praxis-gray-medium uppercase tracking-wider">
                        <i class="fas fa-certificate text-praxis-gold mr-2"></i>Ministerio del Interior
                    </span>
                </div>
            </div>
            
            <!-- DPO -->
            <div class="bg-praxis-gray/30 rounded-2xl p-8 border border-praxis-gray/50 card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-user-lock text-praxis-black text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-xl text-praxis-white mb-3">
                    Delegado de Protección de Datos
                </h3>
                <p class="text-praxis-gold text-sm font-medium mb-4">
                    DPO Certificado
                </p>
                <p class="text-praxis-gray-light text-sm leading-relaxed">
                    Formación especializada en protección de datos personales, RGPD y LOPDGDD. 
                    Capacitado para actuar como DPO externo en organizaciones.
                </p>
                <div class="mt-6 pt-6 border-t border-praxis-gray/30">
                    <span class="text-xs text-praxis-gray-medium uppercase tracking-wider">
                        <i class="fas fa-certificate text-praxis-gold mr-2"></i>Cumplimiento RGPD/LOPDGDD
                    </span>
                </div>
            </div>
            
            <!-- Perito Judicial -->
            <div class="bg-praxis-gray/30 rounded-2xl p-8 border border-praxis-gray/50 card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-gavel text-praxis-black text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-xl text-praxis-white mb-3">
                    Perito Judicial
                </h3>
                <p class="text-praxis-gold text-sm font-medium mb-4">
                    Elaboración de Informes Periciales
                </p>
                <p class="text-praxis-gray-light text-sm leading-relaxed">
                    Formación especializada en elaboración de dictámenes e informes periciales 
                    técnicos para procedimientos judiciales en materia de seguridad privada.
                </p>
                <div class="mt-6 pt-6 border-t border-praxis-gray/30">
                    <span class="text-xs text-praxis-gray-medium uppercase tracking-wider">
                        <i class="fas fa-certificate text-praxis-gold mr-2"></i>Actuación en tribunales
                    </span>
                </div>
            </div>
            
        </div>
    </div>
</section>


<!-- ============================================
     VALORES Y FILOSOFÍA
     ============================================ -->
<section class="py-24 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Cómo Trabajo
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                Valores que guían <span class="gradient-text">mi trabajo</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <?php
            $values = [
                [
                    'icon' => 'fa-brain',
                    'title' => 'Análisis',
                    'desc' => 'Toda recomendación está fundamentada en un análisis real de la situación, nunca en suposiciones.'
                ],
                [
                    'icon' => 'fa-handshake',
                    'title' => 'Independencia',
                    'desc' => 'No vendo productos. Mi único interés es que el cliente tome la mejor decisión posible.'
                ],
                [
                    'icon' => 'fa-comments',
                    'title' => 'Claridad',
                    'desc' => 'Comunico de forma directa y comprensible. Sin jerga innecesaria ni tecnicismos gratuitos.'
                ],
                [
                    'icon' => 'fa-lock',
                    'title' => 'Discreción',
                    'desc' => 'La confidencialidad es innegociable. Tu información está protegida en todo momento.'
                ]
            ];
            
            foreach ($values as $value): ?>
                <div class="text-center p-8 bg-praxis-black/50 rounded-2xl border border-praxis-gray/50 card-hover">
                    <div class="w-16 h-16 bg-praxis-gold/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas <?php echo $value['icon']; ?> text-praxis-gold text-2xl"></i>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-praxis-white mb-3">
                        <?php echo $value['title']; ?>
                    </h3>
                    <p class="text-praxis-gray-light text-sm">
                        <?php echo $value['desc']; ?>
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
        
        <div class="w-20 h-20 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-2xl flex items-center justify-center mx-auto mb-8">
            <i class="fas fa-comments text-praxis-black text-3xl"></i>
        </div>
        
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
            ¿Hablamos de tu proyecto de <span class="gradient-text">seguridad</span>?
        </h2>
        <p class="text-praxis-gray-light text-lg mb-10 max-w-2xl mx-auto">
            Cuéntame tu situación y te ayudaré a tomar la mejor decisión. Sin compromiso, sin presión de venta.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="contacto.php" class="btn-gold px-10 py-5 rounded-lg text-praxis-black font-heading font-bold uppercase tracking-wider">
                <i class="fas fa-envelope mr-2"></i>Contactar
            </a>
            <a href="tel:+34637474428" class="flex items-center text-praxis-gray-light hover:text-praxis-gold transition-colors">
                <i class="fas fa-phone mr-3 text-praxis-gold"></i>
                <span class="font-medium">+34 637 474 428</span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
