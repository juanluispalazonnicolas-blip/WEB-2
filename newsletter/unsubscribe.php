<?php
$current_page = 'newsletter-unsub';
$page_title = 'Cancelar Suscripción | Praxis Seguridad';
$page_description = 'Darse de baja del newsletter de Praxis Seguridad';
include '../includes/header.php';

$token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : '';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
?>

<section class="min-h-screen bg-gradient-to-br from-praxis-black via-praxis-gray-dark to-praxis-black flex items-center pt-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <div class="bg-praxis-gray rounded-2xl p-8 md:p-12 border border-praxis-gold/20">
            
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-praxis-gray-dark rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-unlink text-praxis-gold text-3xl"></i>
                </div>
                
                <h1 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-4">
                   Cancelar Suscripción
                </h1>
                
                <p class="text-praxis-gray-light text-lg">
                    Lamentamos verte partir. ¿Estás seguro de que quieres darte debaja?
                </p>
            </div>
            
            <!-- Mensaje de resultado (oculto inicialmente) -->
            <div id="unsubscribe-result" class="hidden mb-6"></div>
            
            <!-- Formulario -->
            <form id="unsubscribe-form" class="space-y-6">
                
                <?php if ($token): ?>
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <p class="text-praxis-gray-light text-sm text-center">
                        Se cancelará la suscripción asociada a este enlace.
                    </p>
                <?php elseif ($email): ?>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <p class="text-praxis-gray-light text-sm text-center">
                        Email: <span class="text-praxis-white"><?php echo $email; ?></span>
                    </p>
                <?php else: ?>
                    <div>
                        <label class="block text-praxis-white mb-2">Tu email</label>
                        <input type="email" 
                               name="email" 
                               id="unsubscribe-email" 
                               placeholder="tu@email.com" 
                               class="w-full px-4 py-3 bg-praxis-black border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none"
                               required>
                    </div>
                <?php endif; ?>
                
                <!-- Motivo opcional -->
                <div>
                    <label class="block text-praxis-white mb-2">
                        ¿Por qué te vas? <span class="text-praxis-gray-light text-sm">(opcional)</span>
                    </label>
                    <select name="motivo" class="w-full px-4 py-3 bg-praxis-black border border-praxis-gray/50 rounded-lg text-praxis-white focus:border-praxis-gold focus:outline-none">
                        <option value="">Selecciona un motivo...</option>
                        <option value="demasiados-emails">Recibo demasiados emails</option>
                        <option value="contenido-no-relevante">El contenido no es relevante</option>
                        <option value="no-solicite">No solicité esta suscripción</option>
                        <option value="otro">Otro motivo</option>
                    </select>
                </div>
                
                <div class="bg-praxis-black/50 border-l-4 border-yellow-500 p-4 rounded">
                    <p class="text-yellow-400 text-sm">
                        <i class="fas fa-info-circle mr-2"></i>
                        <strong>¿Sabías que...?</strong> Solo enviamos 1-2 emails al mes con contenido de valor. No spam.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="submit" 
                            id="unsubscribe-submit"
                            class="flex-1 px-8 py-4 bg-red-600 text-white font-heading font-semibold rounded-lg hover:bg-red-700 transition-colors">
                        <span class="submit-text">Sí, darme de baja</span>
                        <span class="loading-text hidden">
                            <i class="fas fa-spinner fa-spin"></i> Procesando...
                        </span>
                    </button>
                    <a href="../index.php" class="flex-1 px-8 py-4 border-2 border-praxis-gold text-praxis-gold font-heading font-semibold rounded-lg hover:bg-praxis-gold hover:text-praxis-black transition-all text-center">
                        No, mantenerme suscrito
                    </a>
                </div>
            </form>
            
            <p class="text-praxis-gray-light text-xs text-center mt-6">
                Si cambias de opinión, puedes volver a suscribirte en cualquier momento desde nuestra <a href="../index.php#newsletter" class="text-praxis-gold hover:underline">página principal</a>.
            </p>
        </div>
        
    </div>
</section>

<script>
document.getElementById('unsubscribe-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    const submitBtn = document.getElementById('unsubscribe-submit');
    const resultDiv = document.getElementById('unsubscribe-result');
    
    // Obtener datos
    const data = {
        token: formData.get('token') || '',
        email: formData.get('email') || ''
    };
    
    // UI Loading
    submitBtn.disabled = true;
    submitBtn.querySelector('.submit-text').classList.add('hidden');
    submitBtn.querySelector('.loading-text').classList.remove('hidden');
    resultDiv.classList.add('hidden');
    
    try {
        const response = await fetch('../api/newsletter/unsubscribe.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
            resultDiv.className = 'py-4 px-6 bg-green-500/20 border border-green-500 rounded-lg text-green-400 mb-6';
            resultDiv.innerHTML = `
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-2xl"></i>
                    <div>
                        <p class="font-semibold">${result.message}</p>
                        <p class="text-sm mt-1">Si cambias de opinión, puedes volver a suscribirte cuando quieras.</p>
                    </div>
                </div>
            `;
            form.classList.add('hidden');
            
            // Redirigir a home después de 3 segundos
            setTimeout(() => {
                window.location.href = '../index.php';
            }, 3000);
            
        } else {
            resultDiv.className = 'py-4 px-6 bg-red-500/20 border border-red-500 rounded-lg text-red-400 mb-6';
            resultDiv.innerHTML = `
                <i class="fas fa-exclamation-circle mr-2"></i>
                ${result.message}
            `;
        }
        
        resultDiv.classList.remove('hidden');
        
    } catch (error) {
        console.error('Error:', error);
        resultDiv.className = 'py-4 px-6 bg-red-500/20 border border-red-500 rounded-lg text-red-400 mb-6';
        resultDiv.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>Error al procesar la solicitud.';
        resultDiv.classList.remove('hidden');
    } finally {
        submitBtn.disabled = false;
        submitBtn.querySelector('.submit-text').classList.remove('hidden');
        submitBtn.querySelector('.loading-text').classList.add('hidden');
    }
});
</script>

<?php include '../includes/footer.php'; ?>
