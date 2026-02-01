<?php
/**
 * Configuración de Stripe
 * 
 * IMPORTANTE: Cambiar las claves de test por las de producción antes de ir live
 */

// Modo de Stripe: 'test' o 'live'
define('STRIPE_MODE', 'test');

if (STRIPE_MODE === 'test') {
    // Claves de prueba (reemplazar con tus claves reales)
    define('STRIPE_PUBLISHABLE_KEY', 'pk_test_XXXXXXXXXXXXXXXXXXXXXXXXXX');
    define('STRIPE_SECRET_KEY', 'sk_test_XXXXXXXXXXXXXXXXXXXXXXXXXX');
} else {
    // Claves de producción
    define('STRIPE_PUBLISHABLE_KEY', 'pk_live_XXXXXXXXXXXXXXXXXXXXXXXXXX');
    define('STRIPE_SECRET_KEY', 'sk_live_XXXXXXXXXXXXXXXXXXXXXXXXXX');
}

// URL base del sitio (cambiar en producción)
define('SITE_URL', 'https://praxisseguridad.es');

// Webhook secret (para verificar webhooks de Stripe)
define('STRIPE_WEBHOOK_SECRET', 'whsec_XXXXXXXXXXXXXXXXXXXXXXXXXX');

// Definición de productos con sus precios
$PRODUCTOS = [
    'kit-basico' => [
        'nombre' => 'Kit Básico Hogar',
        'precio' => 19900, // En céntimos (199.00€)
        'precio_display' => 199
    ],
    'kit-hogar' => [
        'nombre' => 'Kit Hogar Completo',
        'precio' => 34900, // En céntimos (349.00€)
        'precio_display' => 349
    ],
    'kit-negocio' => [
        'nombre' => 'Kit Negocio',
        'precio' => 54900, // En céntimos (549.00€)
        'precio_display' => 549
    ]
];

// Planes de soporte mensual
$PLANES_SOPORTE = [
    'soporte-basico' => [
        'nombre' => 'Soporte Básico',
        'precio' => 990, // 9.90€/mes
        'precio_display' => 9.90
    ],
    'soporte-premium' => [
        'nombre' => 'Soporte Premium',
        'precio' => 1990, // 19.90€/mes
        'precio_display' => 19.90
    ],
    'soporte-pro' => [
        'nombre' => 'Soporte Pro',
        'precio' => 2990, // 29.90€/mes
        'precio_display' => 29.90
    ]
];

/**
 * Obtener producto por ID
 */
function getProducto($id) {
    global $PRODUCTOS;
    return isset($PRODUCTOS[$id]) ? $PRODUCTOS[$id] : null;
}

/**
 * Obtener plan de soporte por ID
 */
function getPlanSoporte($id) {
    global $PLANES_SOPORTE;
    return isset($PLANES_SOPORTE[$id]) ? $PLANES_SOPORTE[$id] : null;
}
