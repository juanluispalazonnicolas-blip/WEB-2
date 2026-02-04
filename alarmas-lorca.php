<?php
$current_page = 'alarmas-lorca';
$page_title = 'Alarmas en Lorca - Seguridad Profesional | Praxis Seguridad';
$page_description = 'Sistemas de alarmas en Lorca, Murcia. Instalación profesional para hogares, negocios y explotaciones agrícolas. Cobertura en Lorca y pedanías. ☎ 637474428';
include 'includes/header.php';
?>

<section class="relative min-h-screen bg-gradient-to-br from-praxis-black via-praxis-gray-dark to-praxis-black flex items-center pt-20">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="max-w-4xl mx-auto text-center">
            
            <nav class="mb-4 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center justify-center gap-2 text-praxis-gray-light">
                    <li><a href="index.php" class="hover:text-praxis-gold transition-colors">Inicio</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li><a href="alarmas-murcia.php" class="hover:text-praxis-gold transition-colors">Alarmas Murcia</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li class="text-praxis-gold">Lorca</li>
                </ol>
            </nav>
            
            <h1 class="text-4xl md:text-6xl font-heading font-bold text-praxis-white mb-6">
                Alarmas en <span class="text-praxis-gold">Lorca</span>
            </h1>
            
            <p class="text-xl text-praxis-gray-light mb-8">
                Sistemas de seguridad profesionales en <strong class="text-praxis-white">Lorca y todas sus pedanías</strong>. Especialistas en protección de viviendas rurales y explotaciones agrícolas.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="contacto.php?ciudad=Lorca" class="btn-gold px-8 py-4 rounded-xl text-praxis-black font-heading font-semibold hover:scale-105 transition-all inline-flex items-center gap-2">
                    <i class="fas fa-phone"></i>
                    Presupuesto en Lorca
                </a>
            </div>
            
            <div class="bg-praxis-black/50 backdrop-blur rounded-2xl p-8 border border-praxis-gold/30">
                <h2 class="text-2xl font-heading font-bold text-praxis-white mb-6">
                    Servicio en Lorca y Pedanías
                </h2>
                
                <div class="flex flex-wrap justify-center gap-3 mb-6">
                    <span class="px-3 py-2 bg-praxis-gold/20 rounded-lg text-praxis-white text-sm">Lorca Centro</span>
                    <span class="px-3 py-2 bg-praxis-gold/20 rounded-lg text-praxis-white text-sm">Purias</span>
                    <span class="px-3 py-2 bg-praxis-gold/20 rounded-lg text-praxis-white text-sm">La Hoya</span>
                    <span class="px-3 py-2 bg-praxis-gold/20 rounded-lg text-praxis-white text-sm">Almendricos</span>
                    <span class="px-3 py-2 bg-praxis-gold/20 rounded-lg text-praxis-white text-sm">Zarzilla de Ramos</span>
                    <span class="px-3 py-2 bg-praxis-gold/20 rounded-lg text-praxis-white text-sm">Todas las pedanías</span>
                </div>
                
                <div class="text-left grid md:grid-cols-2 gap-6">
                    <div>
                        <i class="fas fa-tractor text-3xl text-praxis-gold mb-3"></i>
                        <h3 class="font-semibold text-praxis-white mb-2">Explotaciones Agrícolas</h3>
                        <p class="text-sm text-praxis-gray-light">Sistemas especializados para naves, almacenes y fincas rurales en Lorca.</p>
                    </div>
                    
                    <div>
                        <i class="fas fa-warehouse text-3xl text-praxis-gold mb-3"></i>
                        <h3 class="font-semibold text-praxis-white mb-2">Polígonos Industriales</h3>
                        <p class="text-sm text-praxis-gray-light">Protección profesional para naves y empresas en los polígonos de Lorca.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-praxis-gray-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-heading font-bold text-praxis-white mb-8">
            Contacta con Nosotros
        </h2>
        
        <a href="tel:+34637474428" class="btn-gold px-10 py-5 rounded-xl text-praxis-black font-heading font-bold text-lg hover:scale-105 transition-all inline-flex items-center gap-2">
            <i class="fas fa-phone"></i>
            637 474 428
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
