<?php
/**
 * Test de Envío de Email con Resend
 * Praxis Seguridad
 * 
 * USAR SOLO PARA TESTING - Eliminar después
 */

require_once __DIR__ . '/includes/auth-config.php';

// ========================================
// CONFIGURACIÓN DEL TEST
// ========================================

// CAMBIAR ESTE EMAIL POR EL TUYO PARA RECIBIR EL TEST
$email_destino = 'info@praxisseguridad.es'; // 👈 CAMBIAR AQUÍ

// ========================================
// ENVIAR EMAIL DE PRUEBA
// ========================================

echo "<h1>🧪 Test de Resend Email</h1>";
echo "<hr>";

// Verificar que Resend está configurado
if (!defined('RESEND_API_KEY')) {
    echo "❌ <strong>ERROR:</strong> Resend no está configurado<br>";
    echo "Archivo includes/resend-config.php no encontrado<br>";
    exit;
}

if (RESEND_API_KEY === 'your_resend_api_key_here') {
    echo "❌ <strong>ERROR:</strong> API Key no configurada<br>";
    echo "Editar includes/resend-config.php y poner tu API key<br>";
    exit;
}

echo "✅ Resend configurado correctamente<br>";
echo "📧 API Key: " . substr(RESEND_API_KEY, 0, 10) . "..." . substr(RESEND_API_KEY, -5) . "<br>";
echo "<hr>";

// Preparar email
$asunto = '🎉 Test de Resend - Praxis Seguridad';
$cuerpo = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; background: #f4f4f4;">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h1 style="color: #c8102e; margin-bottom: 20px;">🎉 ¡Resend Configurado!</h1>
        
        <p style="font-size: 16px; color: #333;">
            <strong>¡Felicidades!</strong> Tu sistema de emails está funcionando correctamente con Resend API.
        </p>
        
        <div style="background: #d4edda; padding: 15px; border-radius: 5px; border-left: 4px solid #28a745; margin: 20px 0;">
            <strong style="color: #155724;">✅ Sistema Operativo</strong><br>
            <span style="color: #155724;">Los emails de verificación, bienvenida y notificaciones llegarán correctamente a tus usuarios.</span>
        </div>
        
        <h2 style="color: #333; font-size: 18px; margin-top: 30px;">📊 Detalles Técnicos:</h2>
        <ul style="color: #666;">
            <li><strong>Servicio:</strong> Resend API</li>
            <li><strong>Remitente:</strong> Praxis Seguridad</li>
            <li><strong>Email FROM:</strong> info@praxisseguridad.es</li>
            <li><strong>Deliverability:</strong> 99%+</li>
            <li><strong>Plan:</strong> Gratuito (100 emails/día)</li>
        </ul>
        
        <h2 style="color: #333; font-size: 18px; margin-top: 30px;">🚀 Próximos Pasos:</h2>
        <ol style="color: #666;">
            <li>Verificar dominio en Resend (si aún no lo hiciste)</li>
            <li>Configurar registros DNS (SPF, DKIM, MX)</li>
            <li>Probar registro de usuario en producción</li>
            <li>Monitorear emails en dashboard de Resend</li>
        </ol>
        
        <div style="background: #fff3cd; padding: 15px; border-radius: 5px; border-left: 4px solid #ffc107; margin: 20px 0;">
            <strong style="color: #856404;">💡 Consejo:</strong><br>
            <span style="color: #856404;">Revisa el dashboard de Resend para ver métricas de entregas, aperturas y clicks.</span>
        </div>
        
        <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 30px 0;">
        
        <p style="color: #999; font-size: 14px; text-align: center;">
            Este es un email de prueba generado automáticamente<br>
            Sistema de Usuarios - Praxis Seguridad
        </p>
    </div>
</body>
</html>
';

// Enviar email
echo "<h2>📤 Enviando email a: <strong>" . htmlspecialchars($email_destino) . "</strong></h2>";
echo "<p>Espera unos segundos...</p>";

flush();
ob_flush();

$resultado = auth_send_email($email_destino, $asunto, $cuerpo, true);

echo "<hr>";

if ($resultado) {
    echo "<div style='background: #d4edda; padding: 20px; border-radius: 5px; border-left: 4px solid #28a745;'>";
    echo "<h2 style='color: #155724; margin: 0 0 10px 0;'>✅ Email Enviado Exitosamente</h2>";
    echo "<p style='color: #155724; margin: 0;'>";
    echo "El email fue enviado correctamente vía Resend API.<br>";
    echo "<strong>Revisa tu inbox:</strong> " . htmlspecialchars($email_destino) . "<br>";
    echo "(Si no lo ves, revisa SPAM - aunque con Resend no debería estar ahí)";
    echo "</p>";
    echo "</div>";
    
    echo "<br><h3>🎯 Siguiente Paso:</h3>";
    echo "<ol>";
    echo "<li>Revisar tu email</li>";
    echo "<li>Confirmar que llegó (debería llegar en segundos)</li>";
    echo "<li>Verificar que NO está en SPAM</li>";
    echo "<li>Ver métricas en: <a href='https://resend.com/emails' target='_blank'>Resend Dashboard</a></li>";
    echo "</ol>";
    
    echo "<br><div style='background: #fff3cd; padding: 15px; border-radius: 5px;'>";
    echo "<strong>⚠️ IMPORTANTE:</strong><br>";
    echo "Para que los emails NO vayan a SPAM, debes completar la verificación del dominio en Resend añadiendo los registros DNS.";
    echo "</div>";
    
} else {
    echo "<div style='background: #f8d7da; padding: 20px; border-radius: 5px; border-left: 4px solid #dc3545;'>";
    echo "<h2 style='color: #721c24; margin: 0 0 10px 0;'>❌ Error al Enviar Email</h2>";
    echo "<p style='color: #721c24; margin: 0;'>";
    echo "Hubo un problema al enviar el email.<br>";
    echo "<strong>Revisa:</strong>";
    echo "<ul>";
    echo "<li>Que la API key sea correcta</li>";
    echo "<li>Que tengas conexión a Internet</li>";
    echo "<li>Los logs en: <code>logs/auth.log</code></li>";
    echo "</ul>";
    echo "</p>";
    echo "</div>";
    
    echo "<br><h3>📋 Logs:</h3>";
    if (file_exists('logs/auth.log')) {
        $logs = file_get_contents('logs/auth.log');
        $ultimas_lineas = array_slice(explode("\n", $logs), -10);
        echo "<pre style='background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto;'>";
        echo htmlspecialchars(implode("\n", $ultimas_lineas));
        echo "</pre>";
    } else {
        echo "<p>No hay logs disponibles</p>";
    }
}

echo "<hr>";
echo "<p style='color: #999; font-size: 14px;'>";
echo "Test ejecutado el: " . date('d/m/Y H:i:s') . "<br>";
echo "Archivo: test-resend.php<br>";
echo "<strong>RECUERDA:</strong> Eliminar este archivo después del test por seguridad.";
echo "</p>";
?>
