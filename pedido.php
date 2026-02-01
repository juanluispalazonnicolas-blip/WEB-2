<?php
$current_page = 'tienda';
$page_title = 'Realizar Pedido | Praxis Seguridad';
include 'includes/header.php';
include 'includes/stripe-config.php';

// Obtener kit seleccionado de la URL
$kit_id = isset($_GET['kit']) ? $_GET['kit'] : 'kit-hogar';
$kit_seleccionado = getProducto($kit_id);

// Si el kit no existe, redirigir a tienda
if (!$kit_seleccionado) {
    header('Location: tienda.php');
    exit;
}

// Datos de productos para el selector
$todos_los_kits = [
    'kit-basico' => ['nombre' => 'Kit Básico Hogar', 'precio' => 199],
    'kit-hogar' => ['nombre' => 'Kit Hogar Completo', 'precio' => 349],
    'kit-negocio' => ['nombre' => 'Kit Negocio', 'precio' => 549]
];
?>

<!-- Hero Section -->
<section class="relative pt-32 pb-8 bg-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="tienda.php" class="inline-flex items-center text-praxis-gray-light hover:text-praxis-gold transition-colors mb-6">
            <i class="fas fa-arrow-left mr-2"></i>Volver a la tienda
        </a>
        <h1 class="text-3xl md:text-4xl font-heading font-bold text-praxis-white mb-4">
            Finalizar Pedido
        </h1>
        <p class="text-praxis-gray-light">
            Completa tus datos para recibir tu kit de seguridad
        </p>
    </div>
</section>

<!-- Formulario de Pedido -->
<section class="py-12 bg-praxis-gray-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <form id="order-form" action="api/checkout.php" method="POST" class="grid md:grid-cols-3 gap-8">
            
            <!-- Columna Principal: Datos del Cliente -->
            <div class="md:col-span-2 space-y-8">
                
                <!-- Selección de Kit -->
                <div class="bg-praxis-black rounded-2xl p-6 border border-praxis-gray/30">
                    <h2 class="text-xl font-heading font-bold text-praxis-white mb-4 flex items-center gap-2">
                        <i class="fas fa-box text-praxis-gold"></i>
                        Producto Seleccionado
                    </h2>
                    
                    <div class="space-y-3">
                        <?php foreach ($todos_los_kits as $id => $kit): ?>
                        <label class="flex items-center justify-between p-4 rounded-xl border-2 cursor-pointer transition-all
                            <?php echo $id === $kit_id ? 'border-praxis-gold bg-praxis-gold/10' : 'border-praxis-gray/30 hover:border-praxis-gray'; ?>">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="kit" value="<?php echo $id; ?>" 
                                       <?php echo $id === $kit_id ? 'checked' : ''; ?>
                                       class="w-5 h-5 text-praxis-gold focus:ring-praxis-gold"
                                       onchange="updateTotal()">
                                <span class="font-semibold text-praxis-white"><?php echo $kit['nombre']; ?></span>
                            </div>
                            <span class="text-praxis-gold font-bold"><?php echo $kit['precio']; ?>€</span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Datos Personales -->
                <div class="bg-praxis-black rounded-2xl p-6 border border-praxis-gray/30">
                    <h2 class="text-xl font-heading font-bold text-praxis-white mb-4 flex items-center gap-2">
                        <i class="fas fa-user text-praxis-gold"></i>
                        Datos de Contacto
                    </h2>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-praxis-gray-light text-sm mb-2">Nombre *</label>
                            <input type="text" name="nombre" required
                                   class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors"
                                   placeholder="Tu nombre">
                        </div>
                        <div>
                            <label class="block text-praxis-gray-light text-sm mb-2">Apellidos *</label>
                            <input type="text" name="apellidos" required
                                   class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors"
                                   placeholder="Tus apellidos">
                        </div>
                        <div>
                            <label class="block text-praxis-gray-light text-sm mb-2">Email *</label>
                            <input type="email" name="email" required
                                   class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors"
                                   placeholder="tu@email.com">
                        </div>
                        <div>
                            <label class="block text-praxis-gray-light text-sm mb-2">Teléfono *</label>
                            <input type="tel" name="telefono" required
                                   class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors"
                                   placeholder="+34 XXX XXX XXX">
                        </div>
                    </div>
                </div>
                
                <!-- Dirección de Envío -->
                <div class="bg-praxis-black rounded-2xl p-6 border border-praxis-gray/30">
                    <h2 class="text-xl font-heading font-bold text-praxis-white mb-4 flex items-center gap-2">
                        <i class="fas fa-truck text-praxis-gold"></i>
                        Dirección de Envío
                    </h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-praxis-gray-light text-sm mb-2">Dirección *</label>
                            <input type="text" name="direccion" required
                                   class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors"
                                   placeholder="Calle, número, piso, puerta...">
                        </div>
                        <div class="grid md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-praxis-gray-light text-sm mb-2">Código Postal *</label>
                                <input type="text" name="codigo_postal" required pattern="[0-9]{5}"
                                       class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors"
                                       placeholder="28001">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-praxis-gray-light text-sm mb-2">Ciudad *</label>
                                <input type="text" name="ciudad" required
                                       class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors"
                                       placeholder="Madrid">
                            </div>
                        </div>
                        <div>
                            <label class="block text-praxis-gray-light text-sm mb-2">Provincia *</label>
                            <input type="text" name="provincia" required
                                   class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors"
                                   placeholder="Madrid">
                        </div>
                    </div>
                </div>
                
                <!-- Plan de Soporte (Opcional) -->
                <div class="bg-praxis-black rounded-2xl p-6 border border-praxis-gray/30">
                    <h2 class="text-xl font-heading font-bold text-praxis-white mb-4 flex items-center gap-2">
                        <i class="fas fa-headset text-praxis-gold"></i>
                        Plan de Soporte <span class="text-praxis-gray-light text-sm font-normal">(opcional)</span>
                    </h2>
                    
                    <div class="space-y-3">
                        <label class="flex items-center justify-between p-4 rounded-xl border-2 border-praxis-gray/30 cursor-pointer hover:border-praxis-gray transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="soporte" value="ninguno" checked
                                       class="w-5 h-5 text-praxis-gold focus:ring-praxis-gold"
                                       onchange="updateTotal()">
                                <span class="text-praxis-white">Sin plan de soporte adicional</span>
                            </div>
                            <span class="text-praxis-gray-light">0€/mes</span>
                        </label>
                        
                        <label class="flex items-center justify-between p-4 rounded-xl border-2 border-praxis-gray/30 cursor-pointer hover:border-praxis-gray transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="soporte" value="soporte-basico"
                                       class="w-5 h-5 text-praxis-gold focus:ring-praxis-gold"
                                       onchange="updateTotal()">
                                <div>
                                    <span class="text-praxis-white font-semibold">Soporte Básico</span>
                                    <p class="text-praxis-gray-light text-sm">Soporte L-V, email en 24h</p>
                                </div>
                            </div>
                            <span class="text-praxis-gold font-bold">9,90€/mes</span>
                        </label>
                        
                        <label class="flex items-center justify-between p-4 rounded-xl border-2 border-praxis-gray/30 cursor-pointer hover:border-praxis-gray transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="soporte" value="soporte-premium"
                                       class="w-5 h-5 text-praxis-gold focus:ring-praxis-gold"
                                       onchange="updateTotal()">
                                <div>
                                    <span class="text-praxis-white font-semibold">Soporte Premium</span>
                                    <p class="text-praxis-gray-light text-sm">Soporte 24/7, revisión trimestral</p>
                                </div>
                            </div>
                            <span class="text-praxis-gold font-bold">19,90€/mes</span>
                        </label>
                        
                        <label class="flex items-center justify-between p-4 rounded-xl border-2 border-praxis-gray/30 cursor-pointer hover:border-praxis-gray transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="soporte" value="soporte-pro"
                                       class="w-5 h-5 text-praxis-gold focus:ring-praxis-gold"
                                       onchange="updateTotal()">
                                <div>
                                    <span class="text-praxis-white font-semibold">Soporte Pro</span>
                                    <p class="text-praxis-gray-light text-sm">24/7 + prioridad + 10% dto. accesorios</p>
                                </div>
                            </div>
                            <span class="text-praxis-gold font-bold">29,90€/mes</span>
                        </label>
                    </div>
                </div>
                
                <!-- Notas adicionales -->
                <div class="bg-praxis-black rounded-2xl p-6 border border-praxis-gray/30">
                    <h2 class="text-xl font-heading font-bold text-praxis-white mb-4 flex items-center gap-2">
                        <i class="fas fa-comment text-praxis-gold"></i>
                        Notas adicionales
                    </h2>
                    <textarea name="notas" rows="3"
                              class="w-full px-4 py-3 bg-praxis-gray-dark border border-praxis-gray/30 rounded-xl text-praxis-white focus:border-praxis-gold focus:outline-none transition-colors resize-none"
                              placeholder="¿Alguna indicación especial para el envío o la configuración?"></textarea>
                </div>
            </div>
            
            <!-- Columna Lateral: Resumen del Pedido -->
            <div class="md:col-span-1">
                <div class="sticky top-28 bg-praxis-black rounded-2xl p-6 border border-praxis-gold/30">
                    <h2 class="text-xl font-heading font-bold text-praxis-white mb-6">
                        Resumen del Pedido
                    </h2>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-praxis-gray-light">
                            <span id="summary-kit-name"><?php echo $kit_seleccionado['nombre']; ?></span>
                            <span id="summary-kit-price"><?php echo $kit_seleccionado['precio_display']; ?>€</span>
                        </div>
                        <div class="flex justify-between text-praxis-gray-light" id="summary-soporte-row" style="display: none;">
                            <span id="summary-soporte-name">Plan soporte</span>
                            <span id="summary-soporte-price">0€/mes</span>
                        </div>
                        <div class="flex justify-between text-praxis-gray-light">
                            <span>Envío</span>
                            <span class="text-green-500">Gratis</span>
                        </div>
                    </div>
                    
                    <div class="border-t border-praxis-gray/30 pt-4 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-praxis-white font-semibold">Total (IVA incl.)</span>
                            <span id="summary-total" class="text-2xl font-bold text-praxis-gold">
                                <?php echo number_format($kit_seleccionado['precio_display'] * 1.21, 2, ',', '.'); ?>€
                            </span>
                        </div>
                        <p class="text-xs text-praxis-gray-light mt-1">
                            Base: <span id="summary-base"><?php echo $kit_seleccionado['precio_display']; ?></span>€ + IVA (21%)
                        </p>
                    </div>
                    
                    <!-- Términos y condiciones -->
                    <div class="mb-6">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" name="terminos" required
                                   class="w-5 h-5 mt-0.5 text-praxis-gold focus:ring-praxis-gold rounded">
                            <span class="text-sm text-praxis-gray-light">
                                He leído y acepto los <a href="#" class="text-praxis-gold hover:underline">términos y condiciones</a> 
                                y la <a href="#" class="text-praxis-gold hover:underline">política de privacidad</a>
                            </span>
                        </label>
                    </div>
                    
                    <!-- Botón de pago -->
                    <button type="submit" 
                            class="w-full btn-gold py-4 rounded-xl text-praxis-black font-bold text-lg flex items-center justify-center gap-2 hover:shadow-lg hover:shadow-praxis-gold/30 transition-all">
                        <i class="fas fa-lock"></i>
                        Pagar con Stripe
                    </button>
                    
                    <div class="mt-4 flex items-center justify-center gap-2 text-praxis-gray-light text-sm">
                        <i class="fas fa-shield-alt text-green-500"></i>
                        Pago seguro con encriptación SSL
                    </div>
                    
                    <!-- Métodos de pago -->
                    <div class="mt-4 flex justify-center gap-3">
                        <i class="fab fa-cc-visa text-2xl text-praxis-gray"></i>
                        <i class="fab fa-cc-mastercard text-2xl text-praxis-gray"></i>
                        <i class="fab fa-cc-amex text-2xl text-praxis-gray"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
const kitsPrecios = {
    'kit-basico': { nombre: 'Kit Básico Hogar', precio: 199 },
    'kit-hogar': { nombre: 'Kit Hogar Completo', precio: 349 },
    'kit-negocio': { nombre: 'Kit Negocio', precio: 549 }
};

const soportePrecios = {
    'ninguno': { nombre: '', precio: 0 },
    'soporte-basico': { nombre: 'Soporte Básico', precio: 9.90 },
    'soporte-premium': { nombre: 'Soporte Premium', precio: 19.90 },
    'soporte-pro': { nombre: 'Soporte Pro', precio: 29.90 }
};

function updateTotal() {
    const kitId = document.querySelector('input[name="kit"]:checked').value;
    const soporteId = document.querySelector('input[name="soporte"]:checked').value;
    
    const kit = kitsPrecios[kitId];
    const soporte = soportePrecios[soporteId];
    
    // Actualizar resumen
    document.getElementById('summary-kit-name').textContent = kit.nombre;
    document.getElementById('summary-kit-price').textContent = kit.precio + '€';
    
    // Mostrar/ocultar soporte
    const soporteRow = document.getElementById('summary-soporte-row');
    if (soporteId !== 'ninguno') {
        soporteRow.style.display = 'flex';
        document.getElementById('summary-soporte-name').textContent = soporte.nombre;
        document.getElementById('summary-soporte-price').textContent = soporte.precio.toFixed(2).replace('.', ',') + '€/mes';
    } else {
        soporteRow.style.display = 'none';
    }
    
    // Calcular total (solo kit, el soporte es mensual)
    const base = kit.precio;
    const total = base * 1.21;
    
    document.getElementById('summary-base').textContent = base;
    document.getElementById('summary-total').textContent = total.toFixed(2).replace('.', ',') + '€';
    
    // Actualizar estilo de radio buttons seleccionados
    document.querySelectorAll('input[name="kit"]').forEach(radio => {
        const label = radio.closest('label');
        if (radio.checked) {
            label.classList.add('border-praxis-gold', 'bg-praxis-gold/10');
            label.classList.remove('border-praxis-gray/30');
        } else {
            label.classList.remove('border-praxis-gold', 'bg-praxis-gold/10');
            label.classList.add('border-praxis-gray/30');
        }
    });
    
    document.querySelectorAll('input[name="soporte"]').forEach(radio => {
        const label = radio.closest('label');
        if (radio.checked) {
            label.classList.add('border-praxis-gold', 'bg-praxis-gold/10');
            label.classList.remove('border-praxis-gray/30');
        } else {
            label.classList.remove('border-praxis-gold', 'bg-praxis-gold/10');
            label.classList.add('border-praxis-gray/30');
        }
    });
}

// Inicializar al cargar
document.addEventListener('DOMContentLoaded', updateTotal);
</script>

<?php include 'includes/footer.php'; ?>
