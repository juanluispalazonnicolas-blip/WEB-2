<?php
/**
 * Praxis Seguridad - Analytics & Tracking
 * 
 * Este archivo maneja:
 * - Google Analytics 4
 * - Eventos personalizados del chatbot
 * - Tracking de conversiones de checkout
 * - Métricas de UX
 */

// Solo cargar analytics en producción
$is_production = isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'praxisseguridad.es') !== false;
$ga_id = 'G-XXXXXXXXXX'; // Reemplazar con tu ID de Google Analytics
?>

<?php if ($is_production && !empty($ga_id) && $ga_id !== 'G-XXXXXXXXXX'): ?>
<!-- Google Analytics 4 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_id; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo $ga_id; ?>', {
    'anonymize_ip': true,
    'cookie_flags': 'SameSite=None;Secure'
  });
</script>
<?php endif; ?>

<script>
// ============================================
// CUSTOM EVENT TRACKING
// ============================================

/**
 * Enviar evento personalizado a Analytics
 */
function trackEvent(eventName, eventParams = {}) {
    if (typeof gtag !== 'undefined') {
        gtag('event', eventName, eventParams);
    }
    
    // Log en consola en desarrollo
    <?php if (!$is_production): ?>
    console.log('[Analytics]', eventName, eventParams);
    <?php endif; ?>
}

// ============================================
// CHATBOT EVENTS
// ============================================

// Rastrear apertura del chatbot
document.addEventListener('DOMContentLoaded', function() {
    const chatbotToggle = document.getElementById('chatbot-toggle');
    if (chatbotToggle) {
        chatbotToggle.addEventListener('click', function() {
            const isOpen = document.getElementById('chatbot-window').classList.contains('active');
            trackEvent('chatbot_interaction', {
                'event_category': 'Chatbot',
                'event_label': isOpen ? 'Cerrar' : 'Abrir',
                'value': 1
            });
        });
    }
    
    // Rastrear mensajes enviados al chatbot (override sendMessage)
    if (typeof window.sendMessage !== 'undefined') {
        const originalSendMessage = window.sendMessage;
        window.sendMessage = function(message) {
            trackEvent('chatbot_message_sent', {
                'event_category': 'Chatbot',
                'event_label': 'Mensaje enviado',
                'message_length': message.length
            });
            return originalSendMessage(message);
        };
    }
});

// ============================================
// CHECKOUT / CONVERSION EVENTS
// ============================================

// Rastrear inicio de checkout
if (window.location.pathname.includes('pedido.php')) {
    trackEvent('begin_checkout', {
        'event_category': 'Ecommerce',
        'event_label': 'Formulario de pedido abierto'
    });
    
    // Rastrear completado de checkout
    const orderForm = document.getElementById('order-form');
    if (orderForm) {
        orderForm.addEventListener('submit', function() {
            const kitId = document.querySelector('input[name="kit"]:checked')?.value;
            const precio = document.getElementById('summary-total')?.textContent;
            
            trackEvent('purchase_attempt', {
                'event_category': 'Ecommerce',
                'event_label': kitId,
                'value': parseFloat(precio) || 0
            });
        });
    }
}

// Rastrear conversión completada
if (window.location.pathname.includes('pedido-confirmado.php')) {
    // Obtener datos de la sesión (si están disponibles en el DOM)
    trackEvent('purchase', {
        'event_category': 'Ecommerce',
        'event_label': 'Pedido confirmado',
        'value': 1
    });
}

// ============================================
// ENGAGEMENT METRICS
// ============================================

// Tiempo en página
let pageStartTime = Date.now();
window.addEventListener('beforeunload', function() {
    const timeOnPage = Math.round((Date.now() - pageStartTime) / 1000);
    trackEvent('time_on_page', {
        'event_category': 'Engagement',
        'event_label': window.location.pathname,
        'value': timeOnPage
    });
});

// Scroll depth
let maxScrollDepth = 0;
let scrollTracked = false;

window.addEventListener('scroll', function() {
    const scrollPercent = Math.round((window.scrollY + window.innerHeight) / document.documentElement.scrollHeight * 100);
    
    if (scrollPercent > maxScrollDepth) {
        maxScrollDepth = scrollPercent;
    }
    
    // Rastrear cuando el usuario alcanza el 75% de scroll
    if (!scrollTracked && maxScrollDepth >= 75) {
        scrollTracked = true;
        trackEvent('scroll_depth_75', {
            'event_category': 'Engagement',
            'event_label': window.location.pathname
        });
    }
});

// ============================================
// CTA TRACKING
// ============================================

// Rastrear clicks en CTAs principales
document.addEventListener('DOMContentLoaded', function() {
    // Botones CTA principales
    const ctaButtons = document.querySelectorAll('.btn-gold, [href*="contacto"], [href*="tienda"]');
    
    ctaButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            trackEvent('cta_click', {
                'event_category': 'CTA',
                'event_label': this.textContent.trim() || this.href,
                'cta_location': window.location.pathname
            });
        });
    });
    
    // Enlaces sociales
    const socialLinks = document.querySelectorAll('a[href*="linkedin"], a[href*="instagram"], a[href*="twitter"], a[href*="telegram"], a[href*="whatsapp"]');
    
    socialLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            const platform = this.href.includes('linkedin') ? 'LinkedIn' :
                           this.href.includes('instagram') ? 'Instagram' :
                           this.href.includes('twitter') || this.href.includes('x.com') ? 'Twitter' :
                           this.href.includes('telegram') ? 'Telegram' :
                           this.href.includes('whatsapp') ? 'WhatsApp' : 'Otro';
            
            trackEvent('social_click', {
                'event_category': 'Social',
                'event_label': platform,
                'link_location': window.location.pathname
            });
        });
    });
    
    // Teléfono
    const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
    phoneLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            trackEvent('phone_click', {
                'event_category': 'Contact',
                'event_label': 'Teléfono',
                'phone_location': window.location.pathname
            });
        });
    });
    
    // Email
    const emailLinks = document.querySelectorAll('a[href^="mailto:"]');
    emailLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            trackEvent('email_click', {
                'event_category': 'Contact',
                'event_label': 'Email',
                'email_location': window.location.pathname
            });
        });
    });
});

// ============================================
// ERROR TRACKING
// ============================================

window.addEventListener('error', function(e) {
    trackEvent('javascript_error', {
        'event_category': 'Error',
        'event_label': e.message,
        'error_file': e.filename,
        'error_line': e.lineno
    });
});

// Rastrear errores de validación de formularios
document.addEventListener('invalid', function(e) {
    trackEvent('form_validation_error', {
        'event_category': 'Form',
        'event_label': e.target.name || 'Unknown field',
        'page': window.location.pathname
    }, true);
}, true);
</script>

<?php
/**
 * INSTRUCCIONES DE USO:
 * 
 * 1. Reemplazar 'G-XXXXXXXXXX' con tu ID real de Google Analytics 4
 * 2. Incluir este archivo en footer.php antes del cierre de </body>
 * 3. Los eventos se rastrearán automáticamente
 * 
 * EVENTOS RASTREADOS:
 * - chatbot_interaction: Apertura/cierre del chatbot
 * - chatbot_message_sent: Mensajes enviados al chatbot
 * - begin_checkout: Inicio del proceso de compra
 * - purchase_attempt: Intento de compra (submit del formulario)
 * - purchase: Compra completada
 * - time_on_page: Tiempo que el usuario pasa en cada página
 * - scroll_depth_75: Usuario alcanza el 75% de scroll
 * - cta_click: Click en botones CTA
 * - social_click: Click en enlaces sociales
 * - phone_click: Click en teléfono
 * - email_click: Click en email
 * - javascript_error: Errores de JavaScript
 * - form_validation_error: Errores de validación de formularios
 */
?>
