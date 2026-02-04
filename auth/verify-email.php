<?php
/**
 * Verificación de Email
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Obtener token de URL
$token = $_GET['token'] ?? null;
$error = null;
$success = false;

if (!$token) {
    $error = 'Token de verificación no proporcionado';
} else {
    // Verificar email
    $result = user_verify_email($token);
    
    if ($result['success']) {
        $success = true;
        $user_id = $result['user_id'];
        
        // Auto-login después de verificar
        if (!isset($result['already_verified'])) {
            // Crear sesión automática
            $session = user_create_session($user_id, false);
        }
    } else {
        $error = $result['error'];
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.verify-container {
    max-width: 600px;
    margin: 100px auto 60px;
    padding: 60px 40px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    text-align: center;
}

.verify-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
}

.verify-icon.success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
}

.verify-icon.error {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
}

.verify-icon.info {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
    color: white;
}

.verify-container h1 {
    color: #1a1a1a;
    font-size: 32px;
    margin-bottom: 20px;
    font-weight: 700;
}

.verify-container p {
    color: #666;
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 30px;
}

.btn-dashboard {
    display: inline-block;
    padding: 14px 32px;
    background: linear-gradient(135deg, #c8102e 0%, #a00d25 100%);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s;
    margin: 10px;
}

.btn-dashboard:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(200, 16, 46, 0.3);
    color: white;
}

.btn-secondary {
    display: inline-block;
    padding: 14px 32px;
    background: #6c757d;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s;
    margin: 10px;
}

.btn-secondary:hover {
    background: #5a6268;
    color: white;
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 40px;
    text-align: left;
}

.benefit-card {
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 4px solid #c8102e;
}

.benefit-card h3 {
    color: #c8102e;
    font-size: 18px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.benefit-card p {
    color: #666;
    font-size: 14px;
    margin: 0;
}

@media (max-width: 768px) {
    .verify-container {
        margin: 40px 20px;
        padding: 40px 24px;
    }
    
    .verify-container h1 {
        font-size: 24px;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="verify-container">
    <?php if ($success): ?>
        <!-- Verificación Exitosa -->
        <div class="verify-icon success">
            <i class="fas fa-check"></i>
        </div>
        
        <h1>¡Email Verificado!</h1>
        
        <p>
            Tu cuenta ha sido verificada exitosamente. Ahora tienes acceso completo a todos los beneficios exclusivos de Praxis Seguridad.
        </p>
        
        <?php if (!isset($result['already_verified'])): ?>
            <div style="background: #d4edda; padding: 15px; border-radius: 8px; margin: 20px 0; color: #155724;">
                <strong>🎉 ¡Recompensa desbloqueada!</strong><br>
                Has ganado el badge "✅ Email Verificado" (+20 puntos)<br>
                <strong>Cupón de bienvenida: 5% de descuento en tu primera compra</strong>
            </div>
        <?php endif; ?>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <h3><i class="fas fa-calculator"></i> Calculadora de Riesgo</h3>
                <p>Evalúa el nivel de seguridad de tu propiedad con nuestro sistema inteligente</p>
            </div>
            
            <div class="benefit-card">
                <h3><i class="fas fa-book"></i> Recursos Premium</h3>
                <p>Descarga guías PDF, webinars y plantillas exclusivas totalmente gratis</p>
            </div>
            
            <div class="benefit-card">
                <h3><i class="fas fa-bell"></i> Alertas Personalizadas</h3>
                <p>Recibe avisos de estafas y novedades en tu zona</p>
            </div>
            
            <div class="benefit-card">
                <h3><i class="fas fa-save"></i> Cotizaciones Guardadas</h3>
                <p>Guarda y compara diferentes configuraciones de alarmas</p>
            </div>
        </div>
        
        <div style="margin-top: 40px;">
            <a href="/user/dashboard.php" class="btn-dashboard">
                <i class="fas fa-tachometer-alt"></i> Ir a Mi Dashboard
            </a>
            <a href="/" class="btn-secondary">
                <i class="fas fa-home"></i> Volver al Inicio
            </a>
        </div>
        
    <?php elseif ($error === 'Token inválido'): ?>
        <!-- Token Inválido -->
        <div class="verify-icon error">
            <i class="fas fa-times"></i>
        </div>
        
        <h1>Token Inválido</h1>
        
        <p>
            El enlace de verificación no es válido o ha expirado. Los enlaces de verificación son válidos por 24 horas.
        </p>
        
        <p>
            <strong>¿Qué puedo hacer?</strong>
        </p>
        
        <ul style="text-align: left; max-width: 400px; margin: 20px auto;">
            <li>Revisa que hayas copiado el enlace completo del email</li>
            <li>Verifica que no haya espacios al inicio o final del enlace</li>
            <li>Si han pasado más de 24 horas, solicita un nuevo email de verificación</li>
        </ul>
        
        <a href="/auth/login.php" class="btn-dashboard">
            <i class="fas fa-sign-in-alt"></i> Ir al Login
        </a>
        
    <?php else: ?>
        <!-- Error General -->
        <div class="verify-icon error">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        
        <h1>Error de Verificación</h1>
        
        <p>
            <?php echo htmlspecialchars($error ?? 'Ha ocurrido un error al verificar tu email.'); ?>
        </p>
        
        <p>
            Por favor, intenta nuevamente o contacta con nuestro equipo de soporte si el problema persiste.
        </p>
        
        <a href="/contacto.php" class="btn-dashboard">
            <i class="fas fa-envelope"></i> Contactar Soporte
        </a>
        <a href="/" class="btn-secondary">
            <i class="fas fa-home"></i> Volver al Inicio
        </a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
