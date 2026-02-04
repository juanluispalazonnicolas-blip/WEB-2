<?php
$current_page = 'alarmas-molina-segura';
$page_title = 'Alarmas en Molina de Segura - Instalación | Praxis Seguridad';
$page_description = 'Empresa de alarmas en Molina de Segura. Sistemas de seguridad para viviendas y negocios.  Instalación rápida y profesional. ☎ 637474428';
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
                    <li class="text-praxis-gold">Molina de Segura</li>
                </ol>
            </nav>
            
            <h1 class="text-4xl md:text-6xl font-heading font-bold text-praxis-white mb-6">
                Alarmas en <span class="text-praxis-gold">Molina de Segura</span>
            </h1>
            
            <p class="text-xl text-praxis-gray-light mb-8">
                Instalación profesional de alarmas en <strong class="text-praxis-white">Molina de Segura</strong>. Protege tu hogar o negocio con tecnología de última generación.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="contacto.php?ciudad=Molina de Segura" class="btn-gold px-8 py-4 rounded-xl text-praxis-black font-heading font-semibold hover:scale-105 transition-all inline-flex items-center gap-2">
                    <i class="fas fa-phone"></i>
                    Contactar
                </a>
                <a href="tienda.php" class="px-8 py-4 border-2 border-praxis-gold text-praxis-gold rounded-xl font-heading font-semibold hover:bg-praxis-gold hover:text-praxis-black transition-all">
                    Ver Precios
                </a>
            </div>
            
            <div class="bg-praxis-black/50 backdrop-blur rounded-2xl p-8 border border-praxis-gold/30">
                <h2 class="text-2xl font-heading font-bold text-praxis-white mb-6">
                    Servicio en Molina de Segura
                </h2>
                
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <i class="fas fa-home text-3xl text-praxis-gold mb-3"></i>
                        <h3 class="font-semibold text-praxis-white mb-2">Viviendas</h3>
                        <p class="text-sm text-praxis-gray-light">Sistemas completos para tu hogar</p>
                    </div>
                    
                    <div class="text-center">
                        <i class="fas fa-building text-3xl text-praxis-gold mb-3"></i>
                        <h3 class="font-semibold text-praxis-white mb-2">Negocios</h3>
                        <p class="text-sm text-praxis-gray-light">Protección profesional</p>
                    </div>
                    
                    <div class="text-center">
                        <i class="fas fa-tools text-3xl text-praxis-gold mb-3"></i>
                        <h3 class="font-semibold text-praxis-white mb-2">Mantenimiento</h3>
                        <p class="text-sm text-praxis-gray-light">Soporte técnico local</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-praxis-gray-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <a href="tel:+34637474428" class="btn-gold px-10 py-5 rounded-xl text-praxis-black font-heading font-bold text-lg hover:scale-105 transition-all inline-flex items-center gap-2">
            <i class="fas fa-phone"></i>
            637 474 428
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
