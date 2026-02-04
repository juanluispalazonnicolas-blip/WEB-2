<?php
$current_page = 'tienda';
$page_title = 'Pedido Confirmado | Praxis Seguridad';

session_start();

// Verificar que hay datos de pedido
if (!isset($_SESSION['pedido']) || empty($_SESSION['pedido'])) {
    header('Location: tienda.php');
    exit;
}

$pedido = $_SESSION['pedido'];
$session_id = isset($_GET['session_id']) ? $_GET['session_id'] : '';

// Verificar la sesión (en producción, verificar con Stripe API)
$es_demo = isset($pedido['demo_mode']) && $pedido['demo_mode'] === true;

include 'includes/header.php';
?>

<!-- Confirmación -->
<section class="relative pt-32 pb-20 bg-praxis-black min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <!-- Icono de éxito -->
        <div class="mb-8">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center animate-pulse">
                <i class="fas fa-check text-4xl text-white"></i>
            </div>
        </div>
        
        <h1 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-4">
            ¡Pedido Confirmado!
        </h1>
        
        <p class="text-xl text-praxis-gray-light mb-8">
            Gracias por tu compra, <span class="text-praxis-white font-semibold"><?php echo htmlspecialchars($pedido['nombre']); ?></span>
        </p>
        
        <?php if ($es_demo): ?>
        <div class="bg-yellow-500/20 border border-yellow-500/50 rounded-xl p-4 mb-8">
            <p class="text-yellow-400 text-sm">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <strong>Modo Demo:</strong> Este es un pedido de prueba. Configura Stripe para procesar pagos reales.
            </p>
        </div>
        <?php endif; ?>
        
        <!-- Resumen del pedido -->
        <div class="bg-praxis-gray-dark rounded-2xl p-8 text-left mb-8">
            <h2 class="text-xl font-heading font-bold text-praxis-white mb-6 flex items-center gap-2">
                <i class="fas fa-receipt text-praxis-gold"></i>
                Resumen del Pedido
            </h2>
            
            <div class="space-y-4">
                <div class="flex justify-between py-3 border-b border-praxis-gray/30">
                    <span class="text-praxis-gray-light">Producto</span>
                    <span class="text-praxis-white font-semibold"><?php echo htmlspecialchars($pedido['kit_nombre']); ?></span>
                </div>
                
                <?php if (isset($pedido['soporte_id']) && $pedido['soporte_id'] !== 'ninguno'): ?>
                <div class="flex justify-between py-3 border-b border-praxis-gray/30">
                    <span class="text-praxis-gray-light">Plan de soporte</span>
                    <span class="text-praxis-white"><?php echo ucfirst(str_replace('soporte-', 'Soporte ', $pedido['soporte_id'])); ?></span>
                </div>
                <?php endif; ?>
                
                <div class="flex justify-between py-3 border-b border-praxis-gray/30">
                    <span class="text-praxis-gray-light">Email</span>
                    <span class="text-praxis-white"><?php echo htmlspecialchars($pedido['email']); ?></span>
                </div>
                
                <div class="flex justify-between py-3 border-b border-praxis-gray/30">
                    <span class="text-praxis-gray-light">Dirección de envío</span>
                    <span class="text-praxis-white text-right">
                        <?php echo htmlspecialchars($pedido['direccion']); ?><br>
                        <?php echo htmlspecialchars($pedido['codigo_postal'] . ' ' . $pedido['ciudad']); ?><br>
                        <?php echo htmlspecialchars($pedido['provincia']); ?>
                    </span>
                </div>
                
                <div class="flex justify-between py-3 pt-4">
                    <span class="text-praxis-white font-bold text-lg">Total pagado</span>
                    <span class="text-praxis-gold font-bold text-2xl"><?php echo number_format($pedido['precio_total'], 2, ',', '.'); ?>€</span>
                </div>
            </div>
        </div>
        
        <!-- Próximos pasos -->
        <div class="bg-praxis-black border border-praxis-gold/30 rounded-2xl p-8 text-left mb-8">
            <h2 class="text-xl font-heading font-bold text-praxis-white mb-6 flex items-center gap-2">
                <i class="fas fa-clipboard-list text-praxis-gold"></i>
                ¿Qué pasa ahora?
            </h2>
            
            <div class="space-y-4">
                <div class="flex gap-4">
                    <div class="w-10 h-10 bg-praxis-gold/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-praxis-gold font-bold">1</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-praxis-white">Confirmación por email</h3>
                        <p class="text-sm text-praxis-gray-light">Recibirás un email con los detalles de tu pedido en <?php echo htmlspecialchars($pedido['email']); ?></p>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <div class="w-10 h-10 bg-praxis-gold/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-praxis-gold font-bold">2</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-praxis-white">Preparación del envío</h3>
                        <p class="text-sm text-praxis-gray-light">Prepararemos tu kit y te enviaremos el número de seguimiento en 24-48h laborables</p>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <div class="w-10 h-10 bg-praxis-gold/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-praxis-gold font-bold">3</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-praxis-white">Instalación y configuración</h3>
                        <p class="text-sm text-praxis-gray-light">Una vez recibas el kit, sigue la guía incluida o agenda tu llamada de configuración</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contacto -->
        <div class="bg-praxis-gray-dark/50 rounded-xl p-6 mb-8">
            <p class="text-praxis-gray-light mb-4">
                ¿Tienes alguna pregunta sobre tu pedido?
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="mailto:info@praxisseguridad.es" class="text-praxis-gold hover:underline">
                    <i class="fas fa-envelope mr-2"></i>info@praxisseguridad.es
                </a>
                <a href="tel:+34XXXXXXXXX" class="text-praxis-gold hover:underline">
                    <i class="fas fa-phone mr-2"></i>+34 XXX XXX XXX
                </a>
            </div>
        </div>
        
        <!-- Botones -->
        <div class="flex flex-wrap justify-center gap-4">
            <a href="index.php" class="px-8 py-4 bg-praxis-gray text-praxis-white rounded-xl font-semibold hover:bg-praxis-gray-dark transition-colors">
                <i class="fas fa-home mr-2"></i>Volver al inicio
            </a>
            <a href="conocimiento.php" class="btn-gold px-8 py-4 rounded-xl text-praxis-black font-semibold">
                <i class="fas fa-book mr-2"></i>Guías de instalación
            </a>
        </div>
    </div>
</section>

<?php 
// Limpiar datos de sesión del pedido después de mostrar
// En producción, guardar en base de datos antes de limpiar
// unset($_SESSION['pedido']);

include 'includes/footer.php'; 
?>
