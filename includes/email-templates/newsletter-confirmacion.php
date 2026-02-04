<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirma tu suscripción</title>
    <style>
        /* Reset básico */
        body, table, td, p, a, li, blockquote {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        
        /* Estilos generales */
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
        }
        
        /* Contenedor principal */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        
        /* Header */
        .email-header {
            background-color: #1a1a1a;
            padding: 30px;
            text-align: center;
        }
        
        .email-logo {
            max-height: 60px;
            width: auto;
        }
        
        /* Contenido */
        .email-content {
            padding: 40px 30px;
            color: #333333;
            line-height: 1.6;
        }
        
        .email-content h1 {
            color: #1a1a1a;
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 20px;
        }
        
        .email-content p {
            margin: 0 0 15px 0;
            font-size: 16px;
        }
        
        /* Botón */
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        
        .button {
            display: inline-block;
            padding: 15px 40px;
            background-color: #C9A24D;
            color: #000000 !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
        }
        
        .button:hover {
            background-color: #d4ad5a;
        }
        
        /* Footer */
        .email-footer {
            background-color: #f4f4f4;
            padding: 20px 30px;
            text-align: center;
            font-size: 12px;
            color: #666666;
            line-height: 1.5;
        }
        
        .email-footer a {
            color: #C9A24D;
            text-decoration: none;
        }
        
        /* Nota de seguridad */
        .security-note {
            background-color: #f9f9f9;
            border-left: 4px solid #C9A24D;
            padding: 15px;
            margin: 20px 0;
            font-size: 14px;
            color: #666666;
        }
        
        /* Responsive */
        @media only screen and (max-width: 600px) {
            .email-content {
                padding: 30px 20px !important;
            }
            .email-header {
                padding: 20px !important;
            }
            .button {
                padding: 12px 30px !important;
                font-size: 14px !important;
            }
        }
    </style>
</head>
<body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">
                <!-- Email Container -->
                <table border="0" cellpadding="0" cellspacing="0" class="email-container">
                    
                    <!-- Header -->
                    <tr>
                        <td class="email-header">
                            <img src="https://praxisseguridad.es/images/logo-praxis.png" alt="Praxis Seguridad" class="email-logo">
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td class="email-content">
                            <h1>🔐 Confirma tu suscripción</h1>
                            
                            <p>Hola,</p>
                            
                            <p>Gracias por suscribirte a la newsletter de <strong>Praxis Seguridad</strong>.</p>
                            
                            <p>Para completar tu suscripción y empezar a recibir consejos prácticos de seguridad, novedades del sector y alertas sobre estafas, necesitamos que confirmes tu email haciendo clic en el botón de abajo:</p>
                            
                            <div class="button-container">
                                <a href="{CONFIRMATION_LINK}" class="button">
                                    ✓ Confirmar mi suscripción
                                </a>
                            </div>
                            
                            <div class="security-note">
                                <p style="margin: 0;"><strong>📧 ¿No solicitaste esta suscripción?</strong></p>
                                <p style="margin: 5px 0 0 0;">Simplemente ignora este email. Tu dirección no será añadida a nuestra lista.</p>
                            </div>
                            
                            <p style="font-size: 14px; color: #999999; margin-top: 20px;">
                                <em>Este enlace expirará en 48 horas por seguridad.</em>
                            </p>
                            
                            <p style="margin-top: 30px;">
                                Un saludo,<br>
                                <strong>El equipo de Praxis Seguridad</strong>
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td class="email-footer">
                            <p style="margin: 0 0 10px 0;">
                                <strong>Praxis Seguridad</strong><br>
                                Consultoría Estratégica en Seguridad Privada
                            </p>
                            <p style="margin: 0 0 10px 0;">
                                📍 Santomera, Murcia<br>
                                📞 <a href="tel:+34637474428">637 474 428</a><br>
                                🌐 <a href="https://praxisseguridad.es">praxisseguridad.es</a>
                            </p>
                            <p style="margin: 10px 0 0 0; font-size: 11px; color: #999999;">
                                Este email fue enviado porque solicitaste suscribirte a nuestro newsletter.<br>
                                Si no lo solicitaste, ignora este mensaje.
                            </p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
