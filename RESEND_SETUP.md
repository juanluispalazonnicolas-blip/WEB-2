# Configuración de Resend para Emails
## Praxis Seguridad

## 🚀 Inicio Rápido

### Paso 1: Obtener API Key de Resend

1. **Crear cuenta en Resend:**
   - Ve a: https://resend.com/signup
   - Regístrate con tu email
   - Confirma tu email

2. **Obtener API Key:**
   - Ve a: https://resend.com/api-keys
   - Click en "Create API Key"
   - Nombre: "Praxis Seguridad Production"
   - Permisos: "Sending access"
   - Copiar la API key (¡IMPORTANTE! Solo se muestra una vez)

### Paso 2: Verificar Dominio

1. **Añadir dominio:**
   - Ve a: https://resend.com/domains
   - Click en "Add Domain"
   - Introduce: `praxisseguridad.es`

2. **Configurar DNS:**
   
   Añade estos registros en tu panel de DNS (Plesk):

   ```
   Tipo: TXT
   Nombre: _resend
   Valor: [el valor que te da Resend]
   TTL: 3600

   Tipo: MX
   Nombre: @
   Valor: mx.resend.com
   Prioridad: 10
   TTL: 3600
   ```

3. **Verificar:**
   - En Resend, click "Verify Domain"
   - Espera 5-10 minutos para propagación DNS
   - Refresca la página hasta que aparezca "Verified" ✅

### Paso 3: Configurar en el Proyecto

1. **Copiar archivo de ejemplo:**
   ```bash
   cp includes/resend-config.example.php includes/resend-config.php
   ```

2. **Editar includes/resend-config.php:**
   ```php
   define('RESEND_API_KEY', 're_xxxxxxxxxxxx'); // Tu API key aquí
   define('EMAIL_FROM', 'info@praxisseguridad.es');
   define('EMAIL_FROM_NAME', 'Praxis Seguridad');
   ```

3. **Guardar archivo**
   - NO subir a Git (ya está en .gitignore)

---

## ✅ Verificar Funcionamiento

### Prueba Rápida

Crea un archivo `test-email.php` en la raíz:

```php
<?php
require_once 'includes/auth-config.php';

// Configurar destinatario
$test_email = 'tu_email@gmail.com'; // Cambiar por tu email

// Enviar email de prueba
$subject = 'Test desde Praxis Seguridad';
$body = '<h1>🎉 Resend Configurado Correctamente</h1><p>Este email se envió exitosamente usando Resend API.</p>';

$resultado = auth_send_email($test_email, $subject, $body, true);

if ($resultado) {
    echo "✅ Email enviado exitosamente!<br>";
    echo "Revisa tu inbox: {$test_email}";
} else {
    echo "❌ Error al enviar email<br>";
    echo "Revisa logs/auth.log para más detalles";
}
?>
```

**Ejecutar:**
```bash
php test-email.php
```

O acceder via: `https://praxisseguridad.es/test-email.php`

---

## 📊 Monitoreo de Emails

### Dashboard de Resend

- **Ver emails enviados:** https://resend.com/emails
- **Métricas:**
  - Emails entregados
  - Emails abiertos
  - Emails rebotados
  - Clicks en enlaces

### Logs Locales

Revisar logs en: `logs/auth.log`

```bash
tail -f logs/auth.log
```

Verás algo como:
```
[2026-02-04 10:30:15] [info] Email enviado a juan@example.com vía Resend: OK (ID: abc123)
```

---

## 💰 Precios y Límites

### Plan Gratuito
- ✅ **100 emails/día**
- ✅ **3,000 emails/mes**
- ✅ Perfecto para MVP y validación
- ✅ Sin tarjeta de crédito

### Plan Pago (opcional)
- **$20/mes:** 50,000 emails/mes
- **$80/mes:** 100,000 emails/mes
- Facturación mensual, cancelable en cualquier momento

---

## 🔒 Seguridad

### Mejores Prácticas

1. **Nunca compartir API Key**
2. **Nunca subir resend-config.php a Git**
3. **Usar variables de entorno en producción**
4. **Rotar API keys cada 6 meses**
5. **Habilitar notificaciones de anomalías**

### Variables de Entorno (Recomendado para Producción)

En lugar de `resend-config.php`, usa variables de entorno:

```php
// En auth-config.php
if (getenv('RESEND_API_KEY')) {
    define('RESEND_API_KEY', getenv('RESEND_API_KEY'));
}
```

Configurar en servidor:
```bash
export RESEND_API_KEY="re_xxxxxxxxxxxx"
```

O en `.htaccess`:
```apache
SetEnv RESEND_API_KEY "re_xxxxxxxxxxxx"
```

---

## 🐛 Troubleshooting

### Error: "Invalid API Key"
**Causa:** API key incorrecta o no configurada  
**Solución:** Verificar que `RESEND_API_KEY` esté correctamente definida

### Error: "Domain not verified"
**Causa:** Dominio no verificado en Resend  
**Solución:** Completar configuración DNS y verificar dominio

### Emails van a SPAM
**Causa:** Dominio no verificado o sin registros SPF/DKIM  
**Solución:** 
1. Verificar dominio completamente
2. Añadir registros SPF y DKIM
3. Evitar palabras spam en subject/body

### Error: "Rate limit exceeded"
**Causa:** Superaste límite de 100 emails/día  
**Solución:** Esperar 24h o actualizar a plan pago

---

## 📧 Tipos de Emails del Sistema

El sistema enviará estos emails automáticamente:

1. **Verificación de Email** (alta prioridad)
   - Se envía al registrarse
   - Contiene link de verificación
   - Expira en 24 horas

2. **Email de Bienvenida**
   - Se envía tras verificar
   - Incluye cupón descuento
   - Guía de primeros pasos

3. **Alertas de Seguridad** (futuro)
   - Notificaciones personalizadas
   - Basadas en ubicación

4. **Confirmación de Pedido** (futuro)
   - Se envía al comprar
   - Incluye detalles de compra

---

## 🎯 Próximos Pasos

Una vez configurado Resend:

1. ✅ **Probar registro** en producción
2. ✅ **Verificar recepción** de emails
3. ✅ **Revisar métricas** en Resend dashboard
4. ✅ **Monitorear logs** en servidor
5. ✅ **Ajustar templates** según feedback

---

## 📞 Soporte

- **Documentación Resend:** https://resend.com/docs
- **API Reference:** https://resend.com/docs/api-reference
- **Status Page:** https://status.resend.com
- **Discord Community:** https://resend.com/discord

---

**¡Listo! Tu sistema de emails está configurado profesionalmente.** 🚀
