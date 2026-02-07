<?php
/**
 * Admin - Campañas Newsletter
 * Crear y enviar newsletters a suscriptores
 */

require_once __DIR__ . '/includes/admin-auth.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/resend-config.php';

// Requerir login
require_admin_login();

$page_title = 'Campañas Newsletter';
$page_subtitle = 'Crear y enviar emails masivos';

$success_message = '';
$error_message = '';

// ==================================
// ENVIAR CAMPAÑA
// ==================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_campana'])) {
    $csrf_token = $_POST['csrf_token'] ?? '';
    
    if (!verify_csrf_token($csrf_token)) {
        $error_message = 'Token de seguridad inválido.';
    } else {
        $asunto = trim($_POST['asunto'] ?? '');
        $mensaje_html = $_POST['mensaje_html'] ?? '';
        $destinatarios = $_POST['destinatarios'] ?? 'confirmados';
        
        if (empty($asunto) || empty($mensaje_html)) {
            $error_message = 'Asunto y mensaje son obligatorios.';
        } else {
            // Obtener destinatarios
            $query_params = ['select' => 'email'];
            
            if ($destinatarios === 'confirmados') {
                $query_params['confirmed'] = 'eq.true';
                $query_params['unsubscribed_at'] = 'is.null';
            } elseif ($destinatarios === 'pendientes') {
                $query_params['confirmed'] = 'eq.false';
            }
            
            $suscriptores = supabase_query('newsletter_subscribers', $query_params);
            
            if (empty($suscriptores)) {
                $error_message = 'No hay destinatarios para esta campaña.';
            } else {
                // Enviar emails (lote de 50 por request a Resend)
                $enviados = 0;
                $fallidos = 0;
                
                foreach ($suscriptores as $sub) {
                    try {
                        $result = resend_send_email(
                            $sub['email'],
                            $asunto,
                            $mensaje_html
                        );
                        
                        if ($result['success']) {
                            $enviados++;
                        } else {
                            $fallidos++;
                        }
                    } catch (Exception $e) {
                        $fallidos++;
                    }
                    
                    // Rate limiting básico (evitar sobrecarga)
                    usleep(100000); // 0.1 segundos entre emails
                }
                
                $success_message = "Campaña enviada: $enviados exitosos, $fallidos fallidos.";
            }
        }
    }
}

// Obtener estadísticas para preview
$total_confirmados_query = supabase_query('newsletter_subscribers', [
    'select' => 'id',
    'confirmed' => 'eq.true',
    'unsubscribed_at' => 'is.null',
    'count' => 'exact'
]);
$total_confirmados = $total_confirmados_query['count'] ?? 0;

$total_pendientes_query = supabase_query('newsletter_subscribers', [
    'select' => 'id',
    'confirmed' => 'eq.false',
    'count' => 'exact'
]);
$total_pendientes = $total_pendientes_query['count'] ?? 0;

$csrf_token = generate_csrf_token();

include __DIR__ . '/includes/admin-header.php';
?>

<!-- Alertas -->
<?php if ($success_message): ?>
    <div class="mb-6 p-4 bg-green-100 border border-green-300 rounded-xl text-green-800 flex items-center gap-3">
        <i class="fas fa-check-circle text-xl"></i>
        <div>
            <p class="font-medium"><?php echo htmlspecialchars($success_message); ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if ($error_message): ?>
    <div class="mb-6 p-4 bg-red-100 border border-red-300 rounded-xl text-red-800 flex items-center gap-3">
        <i class="fas fa-exclamation-triangle text-xl"></i>
        <div>
            <p class="font-medium"><?php echo htmlspecialchars($error_message); ?></p>
        </div>
    </div>
<?php endif; ?>

<!-- Info Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                <i class="fas fa-check-circle text-white text-xl"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-gray-800"><?php echo number_format($total_confirmados); ?></p>
                <p class="text-sm text-gray-600">Suscriptores confirmados</p>
            </div>
        </div>
    </div>
    
    <div class="bg-amber-50 border-2 border-amber-200 rounded-xl p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center">
                <i class="fas fa-clock text-white text-xl"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-gray-800"><?php echo number_format($total_pendientes); ?></p>
                <p class="text-sm text-gray-600">Suscriptores pendientes</p>
            </div>
        </div>
    </div>
</div>

<!-- Formulario Nueva Campaña -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">
        <i class="fas fa-paper-plane mr-2 text-blue-600"></i>
        Nueva Campaña
    </h3>
    
    <form method="POST" action="" x-data="{ preview: false }">
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
        
        <div class="space-y-6">
            
            <!-- Asunto -->
            <div>
                <label for="asunto" class="block text-sm font-medium text-gray-700 mb-2">
                    Asunto del Email <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="asunto" 
                    name="asunto" 
                    required
                    maxlength="200"
                    placeholder="Ej: Novedades en Seguridad - Febrero 2026"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <!-- Destinatarios -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">
                    Destinatarios <span class="text-red-500">*</span>
                </label>
                <div class="space-y-3">
                    <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                        <input type="radio" name="destinatarios" value="confirmados" checked class="text-blue-600 focus:ring-blue-500">
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">Solo confirmados</p>
                            <p class="text-sm text-gray-500"><?php echo number_format($total_confirmados); ?> destinatarios</p>
                        </div>
                        <i class="fas fa-check-circle text-green-500"></i>
                    </label>
                    
                    <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                        <input type="radio" name="destinatarios" value="pendientes" class="text-blue-600 focus:ring-blue-500">
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">Solo pendientes de confirmación</p>
                            <p class="text-sm text-gray-500"><?php echo number_format($total_pendientes); ?> destinatarios</p>
                        </div>
                        <i class="fas fa-clock text-amber-500"></i>
                    </label>
                    
                    <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                        <input type="radio" name="destinatarios" value="todos" class="text-blue-600 focus:ring-blue-500">
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">Todos los suscriptores</p>
                            <p class="text-sm text-gray-500"><?php echo number_format($total_confirmados + $total_pendientes); ?> destinatarios</p>
                        </div>
                        <i class="fas fa-users text-blue-500"></i>
                    </label>
                </div>
            </div>
            
            <!-- Mensaje HTML -->
            <div>
                <label for="mensaje_html" class="block text-sm font-medium text-gray-700 mb-2">
                    Contenido del Email (HTML) <span class="text-red-500">*</span>
                </label>
                <p class="text-xs text-gray-500 mb-3">
                    <i class="fas fa-info-circle mr-1"></i>
                    Puedes usar HTML para formato. Usa <code class="bg-gray-100 px-1 rounded">{EMAIL}</code> para insertar el email del destinatario.
                </p>
                <textarea 
                    id="mensaje_html" 
                    name="mensaje_html" 
                    rows="15" 
                    required
                    placeholder="<h1>Hola,</h1><p>Aquí va tu mensaje...</p>"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-mono text-sm"></textarea>
            </div>
            
            <!-- Botones -->
            <div class="flex gap-4">
                <button 
                    type="submit" 
                    name="enviar_campana"
                    onclick="return confirm('¿Seguro que quieres enviar esta campaña? Esta acción no se puede deshacer.')"
                    class="flex-1 px-6 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-bold text-lg">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Enviar Campaña
                </button>
                
                <button 
                    type="button"
                    @click="preview = !preview"
                    class="px-6 py-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium">
                    <i class="fas fa-eye mr-2"></i>
                    Vista Previa
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Plantillas Sugeridas -->
<div class="mt-8 bg-gray-50 rounded-xl p-6 border-2 border-gray-200">
    <h4 class="text-lg font-bold text-gray-800 mb-4">
        <i class="fas fa-lightbulb mr-2 text-amber-500"></i>
        Plantillas Sugeridas
    </h4>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded-lg border border-gray-200">
            <p class="font-medium text-gray-800 mb-2">Newsletter Informativa</p>
            <pre class="text-xs text-gray-600 overflow-x-auto"><code>&lt;h2&gt;Novedades del mes&lt;/h2&gt;
&lt;p&gt;Hola,&lt;/p&gt;
&lt;p&gt;Te compartimos las últimas novedades...&lt;/p&gt;</code></pre>
        </div>
        
        <div class="bg-white p-4 rounded-lg border border-gray-200">
            <p class="font-medium text-gray-800 mb-2">Promoción</p>
            <pre class="text-xs text-gray-600 overflow-x-auto"><code>&lt;h2&gt;🎉 Oferta Especial&lt;/h2&gt;
&lt;p&gt;Solo este mes: 15% descuento...&lt;/p&gt;</code></pre>
        </div>
    </div>
</div>

<!-- Nota Importante -->
<div class="mt-6 bg-blue-50 border-2 border-blue-200 rounded-xl p-6">
    <div class="flex gap-4">
        <i class="fas fa-info-circle text-blue-600 text-xl"></i>
        <div>
            <p class="font-bold text-gray-800 mb-2">Nota Importante</p>
            <ul class="text-sm text-gray-700 space-y-1">
                <li>• Los emails se envían vía Resend API</li>
                <li>• Hay un pequeño delay entre cada envío para evitar problemas</li>
                <li>• Se recomienda probar primero con pocos destinatarios</li>
                <li>• Recuerda incluir un link de desuscripción en tus campañas</li>
            </ul>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/admin-footer.php'; ?>
