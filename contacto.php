<?php
/**
 * Praxis Seguridad - Página de Contacto
 * Formulario de contacto y información de ubicación
 * SEO optimizado para búsquedas locales en Murcia
 */

$page_title = 'Contacto y Consultoría en Seguridad Privada en Murcia | Praxis Seguridad';
$page_description = 'Contacta con Praxis Seguridad para consultoría en seguridad privada en Santomera y Región de Murcia. Atención profesional para empresas y particulares. Solicita tu estudio de seguridad.';
$current_page = 'contacto';

include 'includes/header.php';
?>

<!-- ============================================
     HERO SECTION (50vh)
     ============================================ -->
<section class="relative min-h-[50vh] flex items-center bg-praxis-black overflow-hidden">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23C9A24D\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 text-center">
        <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-6xl text-praxis-white mb-6 leading-tight">
            Contacto y Consultoría en <span class="gradient-text">Seguridad Privada</span> en Murcia
        </h1>
        <h2 class="text-praxis-gray-light text-xl md:text-2xl max-w-3xl mx-auto">
            Atención profesional para empresas y particulares en Santomera y Región de Murcia
        </h2>
    </div>
    
    <!-- Decorative line -->
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-praxis-gold to-transparent"></div>
</section>


<!-- ============================================
     CONTACT CONTENT - 2 COLUMNS
     ============================================ -->
<section class="py-24 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- LEFT: Contact Information -->
            <div class="bg-praxis-black rounded-2xl p-8 md:p-10 border border-praxis-gray/50">
                
                <h3 class="font-heading font-bold text-2xl text-praxis-white mb-8">
                    Información de <span class="gradient-text">Contacto</span>
                </h3>
                
                <!-- Hours -->
                <div class="mb-8 pb-8 border-b border-praxis-gray/50">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-praxis-gold text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-praxis-white mb-2">Horario de Atención</h4>
                            <p class="text-praxis-gray-light">Lunes a Viernes</p>
                            <p class="text-praxis-gold font-semibold text-lg">09:00 - 18:00</p>
                        </div>
                    </div>
                </div>
                
                <!-- Location -->
                <div class="mb-8 pb-8 border-b border-praxis-gray/50">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-location-dot text-praxis-gold text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-praxis-white mb-2">Ubicación</h4>
                            <p class="text-praxis-gray-light">Santomera</p>
                            <p class="text-praxis-gray-light">Región de Murcia, España</p>
                        </div>
                    </div>
                </div>
                
                <!-- Phone -->
                <div class="mb-8 pb-8 border-b border-praxis-gray/50">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-praxis-gold text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-praxis-white mb-2">Teléfono</h4>
                            <a href="tel:+34600000000" class="text-praxis-gold font-semibold text-lg hover:underline">
                                +34 600 000 000
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- WhatsApp -->
                <div class="mb-8 pb-8 border-b border-praxis-gray/50">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fab fa-whatsapp text-praxis-gold text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-praxis-white mb-2">WhatsApp Profesional</h4>
                            <a href="https://wa.me/34600000000" target="_blank" class="text-praxis-gold font-semibold hover:underline">
                                Enviar mensaje
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="mb-8 pb-8 border-b border-praxis-gray/50">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-praxis-gold text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-praxis-white mb-2">Email Corporativo</h4>
                            <a href="mailto:info@praxisseguridad.es" class="text-praxis-gold font-semibold hover:underline">
                                info@praxisseguridad.es
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Special notes -->
                <div class="mb-8 pb-8 border-b border-praxis-gray/50">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-info-circle text-praxis-gold text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-praxis-white mb-2">Atendemos a</h4>
                            <p class="text-praxis-gray-light text-sm">
                                Empresas, comercios, naves industriales y clientes particulares
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Social -->
                <div>
                    <h4 class="font-heading font-semibold text-praxis-white mb-4">Síguenos</h4>
                    <div class="flex gap-4">
                        <a href="#" class="w-12 h-12 bg-praxis-gray/50 rounded-xl flex items-center justify-center text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-praxis-gray/50 rounded-xl flex items-center justify-center text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-praxis-gray/50 rounded-xl flex items-center justify-center text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <!-- SEO Text -->
                <p class="mt-8 text-praxis-gray-medium text-sm leading-relaxed">
                    Empresa de consultoría en seguridad privada en Murcia, especializada en análisis, auditoría y diseño de sistemas de seguridad para empresas y particulares.
                </p>
            </div>
            
            
            <!-- RIGHT: Contact Form -->
            <div class="bg-praxis-black rounded-2xl p-8 md:p-10 border border-praxis-gray/50">
                
                <h3 class="font-heading font-bold text-2xl text-praxis-white mb-2">
                    Solicita tu <span class="gradient-text">Estudio de Seguridad</span>
                </h3>
                <p class="text-praxis-gray-light mb-8">
                    Completa el formulario y te contactaremos en menos de 24 horas
                </p>
                
                <form action="api/contacto.php" method="POST" class="space-y-6">
                    
                    <!-- Name -->
                    <div>
                        <label for="nombre" class="block text-praxis-white text-sm font-medium mb-2">
                            Nombre y apellidos <span class="text-praxis-gold">*</span>
                        </label>
                        <input type="text" id="nombre" name="nombre" required
                               class="w-full px-4 py-3 bg-praxis-gray/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors"
                               placeholder="Tu nombre completo">
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-praxis-white text-sm font-medium mb-2">
                            Email <span class="text-praxis-gold">*</span>
                        </label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 bg-praxis-gray/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors"
                               placeholder="tu@email.com">
                    </div>
                    
                    <!-- Phone -->
                    <div>
                        <label for="telefono" class="block text-praxis-white text-sm font-medium mb-2">
                            Teléfono
                        </label>
                        <input type="tel" id="telefono" name="telefono"
                               class="w-full px-4 py-3 bg-praxis-gray/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors"
                               placeholder="+34 600 000 000">
                    </div>
                    
                    <!-- Client Type -->
                    <div>
                        <label for="tipo_cliente" class="block text-praxis-white text-sm font-medium mb-2">
                            Tipo de cliente
                        </label>
                        <select id="tipo_cliente" name="tipo_cliente"
                                class="w-full px-4 py-3 bg-praxis-gray/50 border border-praxis-gray/50 rounded-lg text-praxis-white focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors">
                            <option value="">Selecciona una opción</option>
                            <option value="empresa">Empresa</option>
                            <option value="comercio">Comercio</option>
                            <option value="particular">Particular</option>
                        </select>
                    </div>
                    
                    <!-- Service Type -->
                    <div>
                        <label for="tipo_servicio" class="block text-praxis-white text-sm font-medium mb-2">
                            Tipo de servicio
                        </label>
                        <select id="tipo_servicio" name="tipo_servicio"
                                class="w-full px-4 py-3 bg-praxis-gray/50 border border-praxis-gray/50 rounded-lg text-praxis-white focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors">
                            <option value="">Selecciona una opción</option>
                            <option value="consultoria">Consultoría de seguridad</option>
                            <option value="auditoria">Auditoría</option>
                            <option value="alarmas">Alarmas</option>
                            <option value="optimizacion">Optimización de sistemas</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                    
                    <!-- Location -->
                    <div>
                        <label for="localidad" class="block text-praxis-white text-sm font-medium mb-2">
                            Localidad
                        </label>
                        <input type="text" id="localidad" name="localidad"
                               class="w-full px-4 py-3 bg-praxis-gray/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors"
                               placeholder="Ej: Murcia, Santomera...">
                    </div>
                    
                    <!-- Message -->
                    <div>
                        <label for="mensaje" class="block text-praxis-white text-sm font-medium mb-2">
                            Comentarios / Descripción del caso
                        </label>
                        <textarea id="mensaje" name="mensaje" rows="4"
                                  class="w-full px-4 py-3 bg-praxis-gray/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors resize-none"
                                  placeholder="Cuéntanos brevemente tu situación o necesidad..."></textarea>
                    </div>
                    
                    <!-- Privacy -->
                    <div class="flex items-start gap-3">
                        <input type="checkbox" id="privacidad" name="privacidad" required
                               class="mt-1 w-4 h-4 text-praxis-gold bg-praxis-gray border-praxis-gray rounded focus:ring-praxis-gold">
                        <label for="privacidad" class="text-praxis-gray-light text-sm">
                            He leído y acepto la <a href="#" class="text-praxis-gold hover:underline">política de privacidad</a>
                        </label>
                    </div>
                    
                    <!-- Submit -->
                    <button type="submit" class="w-full btn-gold py-4 rounded-lg text-praxis-black font-heading font-bold text-lg uppercase tracking-wider">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Solicitar Estudio de Seguridad
                    </button>
                    
                </form>
            </div>
            
        </div>
    </div>
</section>


<!-- ============================================
     MAP SECTION
     ============================================ -->
<section class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="font-heading font-bold text-3xl text-praxis-white mb-4">
                Dónde estamos – <span class="gradient-text">Santomera (Murcia)</span>
            </h2>
            <p class="text-praxis-gray-light">
                Prestamos servicios de consultoría en seguridad privada en Santomera, Murcia capital y toda la Región de Murcia.
            </p>
        </div>
        
        <!-- Map Container -->
        <div class="rounded-2xl overflow-hidden border border-praxis-gray/50">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25264.689731145286!2d-1.0726!3d38.0608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63894d5c1c2f8f%3A0x9d7be3e67ff69f1f!2sSantomera%2C%20Murcia!5e0!3m2!1ses!2ses!4v1"
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="grayscale hover:grayscale-0 transition-all duration-500">
            </iframe>
        </div>
        
        <!-- SEO Text -->
        <div class="mt-8 text-center">
            <p class="text-praxis-gray-medium text-sm max-w-3xl mx-auto">
                <strong class="text-praxis-white">Praxis Seguridad</strong> ofrece servicios de consultoría en seguridad privada en toda la Región de Murcia. 
                Atendemos a empresas en Murcia capital, Cartagena, Lorca, Molina de Segura, Santomera y alrededores.
            </p>
        </div>
    </div>
</section>


<!-- ============================================
     FINAL CTA
     ============================================ -->
<section class="py-16 bg-gradient-to-r from-praxis-gold/10 via-praxis-gray to-praxis-gold/10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="font-heading font-bold text-xl text-praxis-white mb-4">
            ¿Prefieres llamarnos directamente?
        </p>
        <a href="tel:+34600000000" class="inline-flex items-center text-praxis-gold text-3xl font-heading font-bold hover:underline">
            <i class="fas fa-phone mr-4"></i>
            +34 600 000 000
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
