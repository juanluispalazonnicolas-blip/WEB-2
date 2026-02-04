<?php
$current_page = 'alarmas-cartagena';
$page_title = 'Alarmas en Cartagena - Sistemas de Seguridad | Praxis Seguridad';
$page_description = 'Instalación de alarmas en Cartagena y comarca. Sistemas de seguridad profesionales para hogares, negocios y empresas. Servicio técnico local. ☎ 637474428';
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
                    <li class="text-praxis-gold">Cartagena</li>
                </ol>
            </nav>
            
            <h1 class="text-4xl md:text-6xl font-heading font-bold text-praxis-white mb-6">
                Alarmas en <span class="text-praxis-gold">Cartagena</span>
            </h1>
            
            <p class="text-xl text-praxis-gray-light mb-8 leading-relaxed">
                Protege tu propiedad en <strong class="text-praxis-white">Cartagena y comarca</strong> con sistemas de alarmas profesionales. Servicio para viviendas, locales comerciales y zona portuaria.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="contacto.php?ciudad=Cartagena" class="btn-gold px-8 py-4 rounded-xl text-praxis-black font-heading font-semibold hover:scale-105 transition-all inline-flex items-center justify-center gap-2">
                    <i class="fas fa-phone"></i>
                    Presupuesto en Cartagena
                </a>
                <a href="tienda.php" class="px-8 py-4 border-2 border-praxis-gold text-praxis-gold rounded-xl font-heading font-semibold hover:bg-praxis-gold hover:text-praxis-black transition-all">
                    Ver Kits de Alarmas
                </a>
            </div>
            
            <div class="bg-praxis-black/50 backdrop-blur rounded-2xl p-8 border border-praxis-gold/30">
                <h2 class="text-2xl font-heading font-bold text-praxis-white mb-6">
                    Cobertura Completa en Cartagena
                </h2>
                
                <div class="grid md:grid-cols-2 gap-6 text-left">
                    <div>
                        <h3 class="font-semibold text-praxis-white mb-3"><i class="fas fa-city text-praxis-gold mr-2"></i>Zonas Urbanas</h3>
                        <ul class="text-sm text-praxis-gray-light space-y-1">
                            <li>• Centro histórico</li>
                            <li>• Cartagena Este</li>
                            <li>• Los Dolores</li>
                            <li>• Santa Lucía</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-praxis-white mb-3"><i class="fas fa-umbrella-beach text-praxis-gold mr-2"></i>Zona Costera</h3>
                        <ul class="text-sm text-praxis-gray-light space-y-1">
                            <li>• La Manga</li>
                            <li>• Cabo de Palos</li>
                            <li>• Los Belones</li>
                            <li>• Isla Plana</li>
                        </ul>
                    </div>
                </div>
                
                <div class="mt-6">
                    <p class="text-sm text-praxis-gray-light">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Instalación en 24-48h en toda la comarca de Cartagena
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-praxis-gray-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-heading font-bold text-praxis-white mb-12">
            Especialistas en Seguridad para Cartagena
        </h2>
        
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-praxis-black rounded-xl p-6 border border-praxis-gold/20">
                <i class="fas fa-ship text-4xl text-praxis-gold mb-4"></i>
                <h3 class="text-lg font-heading font-semibold text-praxis-white mb-2">Zona Portuaria</h3>
                <p class="text-sm text-praxis-gray-light">Seguridad para empresas y almacenes en el puerto de Cartagena</p>
            </div>
            
            <div class="bg-praxis-black rounded-xl p-6 border border-praxis-gold/20">
                <i class="fas fa-store text-4xl text-praxis-gold mb-4"></i>
                <h3 class="text-lg font-heading font-semibold text-praxis-white mb-2">Comercios</h3>
                <p class="text-sm text-praxis-gray-light">Protección para tiendas y negocios en el centro y polígonos industriales</p>
            </div>
            
            <div class="bg-praxis-black rounded-xl p-6 border border-praxis-gold/20">
                <i class="fas fa-home text-4xl text-praxis-gold mb-4"></i>
                <h3 class="text-lg font-heading font-semibold text-praxis-white mb-2">Viviendas</h3>
                <p class="text-sm text-praxis-gray-light">Alarmas para pisos, chalets y segundas residencias en la costa</p>
            </div>
        </div>
        
        <div class="mt-12">
            <a href="contacto.php" class="btn-gold px-10 py-5 rounded-xl text-praxis-black font-heading font-bold text-lg hover:scale-105 transition-all inline-flex items-center gap-2">
                <i class="fas fa-envelope"></i>
                Solicitar Información
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
