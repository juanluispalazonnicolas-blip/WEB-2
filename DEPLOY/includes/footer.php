    </main>
    
    <!-- Footer -->
    <footer class="bg-praxis-black border-t border-praxis-gray/30 relative">
        <!-- Gradient top border -->
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-praxis-gold to-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                
                <!-- Column 1: Logo & Description -->
                <div class="lg:col-span-1">
                    <a href="<?php echo $base_url; ?>index.php" class="flex items-center space-x-3 group mb-6">
                        <img src="<?php echo $base_url; ?>images/logo-praxis.png" alt="Praxis Seguridad" class="h-14 w-auto">
                        <div class="flex flex-col">
                            <span class="text-lg font-heading font-bold text-praxis-white">PRAXIS</span>
                            <span class="text-sm font-heading font-semibold text-praxis-gold tracking-wide">SEGURIDAD</span>
                        </div>
                    </a>
                    <p class="text-praxis-gray-light text-sm leading-relaxed mb-6">
                        Consultoría estratégica en seguridad privada. Pensamos, diseñamos y decidimos antes de instalar.
                    </p>
                    <!-- Social Icons -->
                    <div class="flex space-x-4">
                        <a href="https://www.linkedin.com/in/juan-luis-palaz%C3%B3n-nicol%C3%A1s-1385581b2/" target="_blank" class="w-10 h-10 rounded-lg bg-praxis-gray/50 flex items-center justify-center text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://www.instagram.com/juanlupalazon/" target="_blank" class="w-10 h-10 rounded-lg bg-praxis-gray/50 flex items-center justify-center text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://x.com/JuanluTropez" target="_blank" class="w-10 h-10 rounded-lg bg-praxis-gray/50 flex items-center justify-center text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all" title="X (Twitter)">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                        <a href="https://t.me/Praxis_bot" target="_blank" class="w-10 h-10 rounded-lg bg-praxis-gray/50 flex items-center justify-center text-praxis-gray-light hover:bg-[#0088cc] hover:text-white transition-all" title="Asistente virtual en Telegram">
                            <i class="fab fa-telegram-plane"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Column 2: Navigation -->
                <div>
                    <h4 class="text-praxis-white font-heading font-semibold text-sm uppercase tracking-wider mb-6">Navegación</h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="<?php echo $base_url; ?>index.php" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">Inicio</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>servicios.php" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">Servicios</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>contacto.php" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">Contacto</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>politica-privacidad.php" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">Política de Privacidad</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>aviso-legal.php" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">Aviso Legal</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Column 3: Hours -->
                <div>
                    <h4 class="text-praxis-white font-heading font-semibold text-sm uppercase tracking-wider mb-6">Horario</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-clock text-praxis-gold mt-1"></i>
                            <div>
                                <p class="text-praxis-white text-sm font-medium">Lunes - Viernes</p>
                                <p class="text-praxis-gray-light text-sm">09:00 - 18:00</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-calendar-check text-praxis-gold mt-1"></i>
                            <div>
                                <p class="text-praxis-white text-sm font-medium">Consultas</p>
                                <p class="text-praxis-gray-light text-sm">Con cita previa</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-phone-volume text-praxis-gold mt-1"></i>
                            <div>
                                <p class="text-praxis-white text-sm font-medium">Urgencias</p>
                                <p class="text-praxis-gray-light text-sm">Disponibilidad 24/7</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Column 4: Contact -->
                <div>
                    <h4 class="text-praxis-white font-heading font-semibold text-sm uppercase tracking-wider mb-6">Contacto</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-location-dot text-praxis-gold mt-1"></i>
                            <div>
                                <p class="text-praxis-gray-light text-sm">Santomera</p>
                                <p class="text-praxis-gray-light text-sm">Región de Murcia, España</p>
                            </div>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-phone text-praxis-gold"></i>
                            <a href="tel:+34637474428" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">+34 637 474 428</a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fab fa-whatsapp text-praxis-gold"></i>
                            <a href="https://wa.me/34637474428" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">WhatsApp</a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-praxis-gold"></i>
                            <a href="mailto:info@praxisseguridad.es" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">info@praxisseguridad.es</a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fab fa-telegram-plane text-praxis-gold"></i>
                            <a href="https://t.me/Praxis_bot" target="_blank" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">Asistente Telegram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-praxis-gray/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                    <p class="text-praxis-gray-medium text-sm text-center md:text-left">
                        © <?php echo date('Y'); ?> Praxis Seguridad. Todos los derechos reservados.
                    </p>
                    <p class="text-praxis-gray-medium text-sm">
                        Consultoría en Seguridad Privada en Murcia
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Questionnaire Modal -->
    <?php include dirname(__FILE__) . '/questionnaire.php'; ?>
    
    <!-- Chatbot Widget (replaces Telegram) -->
    <?php include dirname(__FILE__) . '/chatbot.php'; ?>
    
    <!-- Analytics & Tracking -->
    <?php include dirname(__FILE__) . '/analytics.php'; ?>
    
    <!-- Scroll to top button (positioned to not interfere with chatbot) -->
    <button onclick="scrollToTop()" id="scrollTop" class="fixed bottom-8 right-24 w-12 h-12 bg-praxis-gold rounded-lg text-praxis-black flex items-center justify-center opacity-0 invisible transition-all hover:scale-110 z-40">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <script>
        // ========================================
        // PAGE LOADER & ENTRANCE ANIMATIONS
        // ========================================
        
        // Hide loader when page is fully loaded
        window.addEventListener('load', function() {
            const loader = document.getElementById('pageLoader');
            if (loader) {
                setTimeout(function() {
                    loader.classList.add('hidden');
                    
                    // Trigger entrance animations after loader hides
                    setTimeout(function() {
                        triggerEntranceAnimations();
                    }, 100);
                }, 800); // Show loader for at least 800ms
            } else {
                triggerEntranceAnimations();
            }
        });
        
        // Trigger all entrance animations
        function triggerEntranceAnimations() {
            // Animate elements with class animate-on-load
            const animateOnLoad = document.querySelectorAll('.animate-on-load');
            animateOnLoad.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('animated');
                }, index * 100);
            });
            
            // Animate elements from left
            const animateFromLeft = document.querySelectorAll('.animate-from-left');
            animateFromLeft.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('animated');
                }, index * 150);
            });
            
            // Animate elements from right
            const animateFromRight = document.querySelectorAll('.animate-from-right');
            animateFromRight.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('animated');
                }, index * 150);
            });
            
            // Animate scale elements
            const animateScale = document.querySelectorAll('.animate-scale');
            animateScale.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('animated');
                }, index * 100);
            });
            
            // Animate text reveal
            const textReveal = document.querySelectorAll('.text-reveal');
            textReveal.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('animated');
                }, 500 + (index * 200));
            });
        }
        
        // ========================================
        // SCROLL ANIMATIONS (Intersection Observer)
        // ========================================
        
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    scrollObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe elements that should animate on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const scrollAnimateElements = document.querySelectorAll('.animate-on-scroll');
            scrollAnimateElements.forEach(el => {
                scrollObserver.observe(el);
            });
        });
        
        // ========================================
        // SCROLL TO TOP & HEADER
        // ========================================
        
        // Scroll to top functionality
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        
        // Show/hide scroll button
        window.addEventListener('scroll', function() {
            const scrollTop = document.getElementById('scrollTop');
            if (scrollTop) {
                if (window.scrollY > 500) {
                    scrollTop.classList.remove('opacity-0', 'invisible');
                    scrollTop.classList.add('opacity-100', 'visible');
                } else {
                    scrollTop.classList.add('opacity-0', 'invisible');
                    scrollTop.classList.remove('opacity-100', 'visible');
                }
            }
        });
        
        // Header background on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('bg-praxis-black/95');
                } else {
                    header.classList.remove('bg-praxis-black/95');
                }
            }
        });
        
        // ========================================
        // PARALLAX EFFECT (optional)
        // ========================================
        
        window.addEventListener('scroll', function() {
            const parallaxElements = document.querySelectorAll('.parallax-bg');
            parallaxElements.forEach(el => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * 0.3;
                el.style.transform = 'translateY(' + rate + 'px)';
            });
        });
    </script>
</body>
</html>
