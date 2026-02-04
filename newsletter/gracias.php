<?php
$current_page = 'newsletter-gracias';
$page_title = '¡Gracias por suscribirte! | Praxis Seguridad';
$page_description = 'Confirmación de suscripción al newsletter de Praxis Seguridad';
include 'includes/header.php';

$confirmed = isset($_GET['confirmed']) && $_GET['confirmed'] == '1';
$duplicate = isset($_GET['duplicate']) && $_GET['duplicate'] == '1';
?>

<section class="min-h-screen bg-gradient-to-br from-praxis-black via-praxis-gray-dark to-praxis-black flex items-center pt-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        
        <?php if ($confirmed): ?>
            <!-- Confirmación exitosa -->
            <div class="animate-on-load">
                <div class="w-24 h-24 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fas fa-check text-praxis-black text-4xl"></i>
                </div>
                
                <h1 class="font-heading font-bold text-4xl md:text-5xl text-praxis-white mb-6">
                    ¡Suscripción Confirmada! 🎉
                </h1>
                
                <p class="text-xl text-praxis-gray-light mb-8 max-w-2xl mx-auto">
                    Gracias por confirmar tu suscripción. Ya formas parte de nuestra comunidad.
                </p>
                
                <div class="bg-praxis-gray rounded-2xl p-8 mb-12 border border-praxis-gold/20">
                    <h2 class="text-2xl font-heading font-semibold text-praxis-white mb-4">
                        📬 ¿Qué recibirás en tu email?
                    </h2>
                    
                    <div class="grid md:grid-cols-2 gap-6 text-left mt-6">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-praxis-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-shield-alt text-praxis-gold"></i>
                            </div>
                            <div>
                                <h3 class="text-praxis-white font-semibold mb-1">Consejos de Seguridad</h3>
                                <p class="text-praxis-gray-light text-sm">Tips prácticos que puedes aplicar hoy mismo</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-praxis-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-praxis-gold"></i>
                            </div>
                            <div>
                                <h3 class="text-praxis-white font-semibold mb-1">Alertas de Estafas</h3>
                                <p class="text-praxis-gray-light text-sm">Mantente protegido ante fraudes</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-praxis-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-newspaper text-praxis-gold"></i>
                            </div>
                            <div>
                                <h3 class="text-praxis-white font-semibold mb-1">Novedades del Sector</h3>
                                <p class="text-praxis-gray-light text-sm">Lo más relevante en seguridad privada</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-praxis-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-tag text-praxis-gold"></i>
                            </div>
                            <div>
                                <h3 class="text-praxis-white font-semibold mb-1">Ofertas Exclusivas</h3>
                                <p class="text-praxis-gray-light text-sm">Descuentos solo para suscriptores</p>
                            </div>
                        </div>
                    </div>
                    
                    <p class="text-praxis-gray-light text-sm mt-6">
                        <i class="fas fa-clock mr-2"></i>
                        Frecuencia: 1-2 emails al mes. Sin spam, prometido.
                    </p>
                </div>
                
        <?php elseif ($duplicate): ?>
            <!-- Ya estaba suscrito -->
            <div class="animate-on-load">
                <div class="w-24 h-24 bg-praxis-gold/20 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fas fa-info-circle text-praxis-gold text-4xl"></i>
                </div>
                
                <h1 class="font-heading font-bold text-4xl md:text-5xl text-praxis-white mb-6">
                    Ya estabas suscrito
                </h1>
                
                <p class="text-xl text-praxis-gray-light mb-12 max-w-2xl mx-auto">
                    Tu email ya fue verificado anteriormente. Sigues recibiendo nuestro newsletter.
                </p>
                
        <?php else: ?>
            <!-- Estado desconocido -->
            <div class="animate-on-load">
                <div class="w-24 h-24 bg-praxis-gray rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fas fa-envelope text-praxis-gold text-4xl"></i>
                </div>
                
                <h1 class="font-heading font-bold text-4xl md:text-5xl text-praxis-white mb-6">
                    Newsletter
                </h1>
                
                <p class="text-xl text-praxis-gray-light mb-12 max-w-2xl mx-auto">
                    Mantente informado con nuestro newsletter de seguridad.
                </p>
        <?php endif; ?>
                
                <h2 class="text-2xl font-heading font-semibold text-praxis-white mb-8">
                    Mientras tanto, ¿qué te gustaría hacer?
                </h2>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="servicios.php" class="btn-gold px-8 py-4 rounded-xl text-praxis-black font-heading font-semibold hover:scale-105 transition-all inline-flex items-center justify-center gap-2">
                        <i class="fas fa-shield-halved"></i>
                        Ver Servicios
                    </a>
                    <a href="tienda.php" class="px-8 py-4 border-2 border-praxis-gold text-praxis-gold rounded-xl font-heading font-semibold hover:bg-praxis-gold hover:text-praxis-black transition-all inline-flex items-center justify-center gap-2">
                        <i class="fas fa-shopping-cart"></i>
                        Ver Alarmas
                    </a>
                    <a href="contacto.php" class="px-8 py-4 border-2 border-praxis-gray-light text-praxis-gray-light rounded-xl font-heading font-semibold hover:border-praxis-white hover:text-praxis-white transition-all inline-flex items-center justify-center gap-2">
                        <i class="fas fa-envelope"></i>
                        Contactar
                    </a>
                </div>
                
                <!-- Social Follow -->
                <div class="mt-16 pt-16 border-t border-praxis-gray/30">
                    <h3 class="text-xl font-heading font-semibold text-praxis-white mb-6">
                        Síguenos en redes sociales
                    </h3>
                    <div class="flex gap-6 justify-center">
                        <a href="https://www.linkedin.com/in/juanluispalazonnicolas/" target="_blank" rel="noopener" class="w-14 h-14 bg-praxis-gray rounded-lg flex items-center justify-center text-praxis-gold hover:bg-praxis-gold hover:text-praxis-black transition-all">
                            <i class="fab fa-linkedin-in text-2xl"></i>
                        </a>
                        <a href="https://instagram.com/praxis.seguridad" target="_blank" rel="noopener" class="w-14 h-14 bg-praxis-gray rounded-lg flex items-center justify-center text-praxis-gold hover:bg-praxis-gold hover:text-praxis-black transition-all">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
