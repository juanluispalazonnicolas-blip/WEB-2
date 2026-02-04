<?php
/**
 * Configuración de Resend API
 * 
 * INSTRUCCIONES:
 * 1. Renombrar este archivo a: resend-config.php
 * 2. Obtener API Key desde: https://resend.com/api-keys
 * 3. Reemplazar 'your_resend_api_key_here' con tu API key real
 * 4. NO subir este archivo a Git (está en .gitignore)
 */

// API Key de Resend
// Obtener en: https://resend.com/api-keys
define('RESEND_API_KEY', 'your_resend_api_key_here');

// Email remitente verificado en Resend
// IMPORTANTE: Debe estar verificado en tu panel de Resend
define('EMAIL_FROM', 'info@praxisseguridad.es');
define('EMAIL_FROM_NAME', 'Praxis Seguridad');

// Email para respuestas (opcional)
define('EMAIL_REPLY_TO', 'info@praxisseguridad.es');

/**
 * NOTAS IMPORTANTES:
 * 
 * 1. Verificación de Dominio:
 *    - Antes de enviar emails, debes verificar tu dominio en Resend
 *    - Panel Resend → Domains → Add Domain → praxisseguridad.es
 *    - Añadir registros DNS (MX, TXT, DKIM) según instrucciones
 * 
 * 2. Plan Gratuito:
 *    - 100 emails/día GRATIS
 *    - 3,000 emails/mes GRATIS
 *    - Suficiente para validar MVP
 * 
 * 3. Seguridad:
 *    - NUNCA compartir la API key
 *    - NUNCA subir a repositorio público
 *    - Usar variables de entorno en producción
 * 
 * 4. Testing:
 *    - Puedes enviar emails de prueba desde el panel de Resend
 *    - URL: https://resend.com/emails
 * 
 * 5. Logs:
 *    - Todos los emails enviados se registran en Resend
 *    - Puedes ver entregas, aperturas, clicks
 *    - URL: https://resend.com/emails
 */
