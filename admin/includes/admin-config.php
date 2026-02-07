<?php
/**
 * Admin Configuration
 * Credenciales y configuración del panel de administración
 */

// ==================================
// CREDENCIALES ADMIN
// ==================================
// IMPORTANTE: En producción, mover a variables de entorno o .env

define('ADMIN_USERNAME', 'admin@praxisseguridad.es');
define('ADMIN_PASSWORD_HASH', password_hash('Praxis2026!Admin', PASSWORD_BCRYPT));

// En producción, usar:
// define('ADMIN_PASSWORD_HASH', getenv('ADMIN_PASSWORD_HASH'));

// ==================================
// SESIÓN CONFIG
// ==================================
define('ADMIN_SESSION_NAME', 'praxis_admin_session');
define('ADMIN_SESSION_TIMEOUT', 3600); // 1 hora

// ==================================
// SECURITY
// ==================================
define('ADMIN_MAX_LOGIN_ATTEMPTS', 5);
define('ADMIN_LOCKOUT_TIME', 900); // 15 minutos

// ==================================
// PAGINATION
// ==================================
define('ADMIN_ITEMS_PER_PAGE', 50);

// ==================================
// CSV EXPORT
// ==================================
define('ADMIN_EXPORT_FILENAME', 'suscriptores-newsletter-praxis');
