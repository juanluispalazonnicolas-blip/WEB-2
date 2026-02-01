<?php
/**
 * API Endpoint para crear sesión de Stripe Checkout
 * 
 * Recibe los datos del formulario de pedido y redirige a Stripe
 */

// Cargar configuración
require_once '../includes/stripe-config.php';

// Verificar que es POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

// Recoger datos del formulario
$kit_id = isset($_POST['kit']) ? $_POST['kit'] : '';
$soporte_id = isset($_POST['soporte']) ? $_POST['soporte'] : 'ninguno';
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
$direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : '';
$codigo_postal = isset($_POST['codigo_postal']) ? trim($_POST['codigo_postal']) : '';
$ciudad = isset($_POST['ciudad']) ? trim($_POST['ciudad']) : '';
$provincia = isset($_POST['provincia']) ? trim($_POST['provincia']) : '';
$notas = isset($_POST['notas']) ? trim($_POST['notas']) : '';

// Validar campos obligatorios
$errores = [];
if (empty($kit_id) || !getProducto($kit_id)) {
    $errores[] = 'Kit no válido';
}
if (empty($nombre)) $errores[] = 'Nombre es obligatorio';
if (empty($apellidos)) $errores[] = 'Apellidos es obligatorio';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = 'Email no válido';
if (empty($telefono)) $errores[] = 'Teléfono es obligatorio';
if (empty($direccion)) $errores[] = 'Dirección es obligatoria';
if (empty($codigo_postal) || !preg_match('/^[0-9]{5}$/', $codigo_postal)) $errores[] = 'Código postal no válido';
if (empty($ciudad)) $errores[] = 'Ciudad es obligatoria';
if (empty($provincia)) $errores[] = 'Provincia es obligatoria';

if (!empty($errores)) {
    // Redirigir de vuelta con errores
    $_SESSION['errores_pedido'] = $errores;
    header('Location: ../pedido.php?kit=' . $kit_id . '&error=1');
    exit;
}

// Obtener producto
$producto = getProducto($kit_id);
$precio_base = $producto['precio']; // En céntimos
$precio_con_iva = round($precio_base * 1.21); // IVA 21%

// Guardar datos del cliente en sesión para recuperarlos después del pago
session_start();
$_SESSION['pedido'] = [
    'kit_id' => $kit_id,
    'kit_nombre' => $producto['nombre'],
    'soporte_id' => $soporte_id,
    'nombre' => $nombre,
    'apellidos' => $apellidos,
    'email' => $email,
    'telefono' => $telefono,
    'direccion' => $direccion,
    'codigo_postal' => $codigo_postal,
    'ciudad' => $ciudad,
    'provincia' => $provincia,
    'notas' => $notas,
    'precio_base' => $producto['precio_display'],
    'precio_total' => $precio_con_iva / 100,
    'fecha' => date('Y-m-d H:i:s')
];

/**
 * INTEGRACIÓN CON STRIPE
 * 
 * Para activar Stripe necesitas:
 * 1. Instalar la librería: composer require stripe/stripe-php
 * 2. Configurar las API keys en includes/stripe-config.php
 * 3. Descomentar el código a continuación
 */

/*
// Cargar autoload de Composer
require_once '../vendor/autoload.php';

// Configurar Stripe
\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

try {
    // Crear sesión de Checkout
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'customer_email' => $email,
        'line_items' => [[
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => $producto['nombre'],
                    'description' => 'Kit de seguridad autoinstalable - Praxis Seguridad',
                ],
                'unit_amount' => $precio_con_iva,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => SITE_URL . '/pedido-confirmado.php?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => SITE_URL . '/pedido.php?kit=' . $kit_id . '&cancelled=1',
        'metadata' => [
            'kit_id' => $kit_id,
            'soporte_id' => $soporte_id,
            'telefono' => $telefono,
            'direccion_completa' => $direccion . ', ' . $codigo_postal . ' ' . $ciudad . ', ' . $provincia
        ],
        'shipping_address_collection' => [
            'allowed_countries' => ['ES'],
        ],
    ]);

    // Redirigir a Stripe Checkout
    header("Location: " . $checkout_session->url);
    exit;

} catch (\Exception $e) {
    // Error al crear la sesión
    error_log("Error Stripe: " . $e->getMessage());
    header('Location: ../pedido.php?kit=' . $kit_id . '&error=stripe');
    exit;
}
*/

/**
 * MODO DEMO (sin Stripe configurado)
 * 
 * Mientras no tengas Stripe configurado, se simula el pago
 * y se redirige directamente a la página de confirmación.
 */

// Generar un ID de sesión simulado
$session_id = 'demo_' . bin2hex(random_bytes(16));
$_SESSION['pedido']['session_id'] = $session_id;
$_SESSION['pedido']['demo_mode'] = true;

// Redirigir a confirmación (modo demo)
header('Location: ../pedido-confirmado.php?session_id=' . $session_id);
exit;
