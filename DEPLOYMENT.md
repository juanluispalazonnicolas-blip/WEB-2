# Guía de Deployment - Sistema de Usuarios
## Praxis Seguridad → Producción

**Fecha:** 2026-02-04  
**Versión:** 1.0.0-MVP  
**Servidor:** Plesk (praxisseguridad.es)

---

## 📦 ARCHIVOS A SUBIR

### Nuevos Directorios (Crear en servidor)

```
/auth/          - Páginas de autenticación
/user/          - Páginas del dashboard de usuario
/admin/         - Panel de administración
/recursos/      - Archivos PDF descargables
/includes/email-templates/  - Templates de email
```

### Lista Completa de Archivos Nuevos

#### 1. Autenticación (`/auth/`)
- ✅ `register.php` (400 líneas)
- ✅ `login.php` (existente - verificar)
- ✅ `verify-email.php` (150 líneas)
- ✅ `logout.php` (20 líneas)

#### 2. Usuario (`/user/`)
- ✅ `dashboard.php` (500 líneas)
- ✅ `recursos.php` (450 líneas)
- ✅ `alertas.php` (400 líneas)
- ✅ `perfil.php` (350 líneas)
- ✅ `badges.php` (450 líneas)
- ✅ `calculadora-riesgo.php` (800 líneas)
- ✅ `cotizaciones.php` (300 líneas)
- ✅ `download-recurso.php` (80 líneas)

#### 3. Admin (`/admin/`)
- ✅ `index.php` (250 líneas)

#### 4. Includes (`/includes/`)
- ✅ `auth-config.php` (365 líneas)
- ✅ `user-functions.php` (420 líneas)
- ✅ `email-templates/verificacion-email.php` (200 líneas)
- ✅ `email-templates/bienvenida-usuario.php` (220 líneas)

#### 5. Database (`/database/`)
- ✅ `setup_users.sql` (395 líneas - YA EJECUTADO en Supabase)

#### 6. Recursos (`/recursos/`)
- ✅ `README.md` (documentación)
- ⏳ PDFs pendientes (crear contenido)

#### 7. Raíz
- ✅ `TESTING.md` (documentación)

---

## 🚀 INSTRUCCIONES DE SUBIDA VÍA PLESK

### Paso 1: Acceder al File Manager

1. Ve a: https://strange-kare.94-143-140-19.plesk.page:8443/smb/file-manager/list?subscriptionId=2
2. Navega a la raíz de tu sitio (generalmente `/httpdocs/` o `/public_html/`)

### Paso 2: Crear Directorios

Crear las siguientes carpetas (si no existen):

```
httpdocs/
├── auth/
├── user/
├── admin/
├── recursos/
└── includes/
    └── email-templates/
```

**Cómo crear:**
- Click derecho → "Crear directorio" o botón "+" 
- Nombrar exactamente como se indica

### Paso 3: Subir Archivos por Sección

**IMPORTANTE:** Subir en este orden para evitar errores

#### A. Includes (primero - dependencias)

Carpeta destino: `/httpdocs/includes/`

Subir:
- `auth-config.php`
- `user-functions.php`

Carpeta destino: `/httpdocs/includes/email-templates/`

Subir:
- `verificacion-email.php`
- `bienvenida-usuario.php`

#### B. Auth (segundo)

Carpeta destino: `/httpdocs/auth/`

Subir:
- `register.php`
- `verify-email.php`
- `logout.php`

#### C. User (tercero)

Carpeta destino: `/httpdocs/user/`

Subir:
- `dashboard.php`
- `recursos.php`
- `alertas.php`
- `perfil.php`
- `badges.php`
- `calculadora-riesgo.php`
- `cotizaciones.php`
- `download-recurso.php`

#### D. Admin (cuarto)

Carpeta destino: `/httpdocs/admin/`

Subir:
- `index.php`

#### E. Recursos (quinto)

Carpeta destino: `/httpdocs/recursos/`

Subir:
- `README.md`

### Paso 4: Verificar Permisos

**Permisos recomendados:**
- Archivos PHP: `644` (rw-r--r--)
- Directorios: `755` (rwxr-xr-x)
- `/recursos/`: `755` (para permitir lectura de PDFs)

**Cómo cambiar en Plesk:**
- Click derecho en archivo/carpeta → "Permisos"
- Configurar según arriba

---

## ⚙️ CONFIGURACIÓN POST-SUBIDA

### 1. Actualizar `includes/auth-config.php`

Verifica estas constantes en el servidor:

```php
// URLs del sitio
define('SITE_URL', 'https://praxisseguridad.es');
define('SITE_NAME', 'Praxis Seguridad');

// Email remitente (verificar dominio)
define('EMAIL_FROM', 'info@praxisseguridad.es');
define('EMAIL_FROM_NAME', 'Praxis Seguridad');
```

### 2. Verificar Conexión Supabase

El archivo `includes/db.php` debe tener:

```php
define('SUPABASE_URL', 'TU_URL_SUPABASE');
define('SUPABASE_KEY', 'TU_KEY_SUPABASE');
```

### 3. Configurar .htaccess (si no existe)

Añadir al `.htaccess` en la raíz:

```apache
# Proteger archivos sensibles
<Files "*.sql">
    Order allow,deny
    Deny from all
</Files>

<Files "*.md">
    Order allow,deny
    Deny from all
</Files>

# PHP settings
php_value upload_max_filesize 20M
php_value post_max_size 20M
php_value max_execution_time 300

# Error handling (en producción, ocultar errores)
php_flag display_errors off
php_flag log_errors on
```

---

## ✅ CHECKLIST DE VERIFICACIÓN

### Archivos Subidos
- [ ] `/auth/register.php`
- [ ] `/auth/verify-email.php`
- [ ] `/auth/logout.php`
- [ ] `/user/dashboard.php`
- [ ] `/user/recursos.php`
- [ ] `/user/alertas.php`
- [ ] `/user/perfil.php`
- [ ] `/user/badges.php`
- [ ] `/user/calculadora-riesgo.php`
- [ ] `/user/cotizaciones.php`
- [ ] `/user/download-recurso.php`
- [ ] `/admin/index.php`
- [ ] `/includes/auth-config.php`
- [ ] `/includes/user-functions.php`
- [ ] `/includes/email-templates/verificacion-email.php`
- [ ] `/includes/email-templates/bienvenida-usuario.php`

### Configuración
- [ ] Credenciales Supabase configuradas
- [ ] URLs del sitio actualizadas
- [ ] Permisos de archivos correctos
- [ ] `.htaccess` configurado

### Testing en Producción
- [ ] Acceder a https://praxisseguridad.es/auth/register.php
- [ ] Registrar usuario de prueba
- [ ] Verificar email recibido
- [ ] Completar verificación
- [ ] Acceder a dashboard
- [ ] Probar calculadora de riesgo
- [ ] Revisar recursos
- [ ] Ver alertas
- [ ] Editar perfil

---

## 🔧 TROUBLESHOOTING

### Error: "Cannot modify header information"
**Causa:** Espacios o saltos de línea antes de `<?php`
**Solución:** Asegurar que todos los archivos PHP empiecen exactamente con `<?php` sin espacios previos

### Error: "Class/Function not found"
**Causa:** Archivos de includes no subidos o rutas incorrectas
**Solución:** 
1. Verificar que `auth-config.php` y `user-functions.php` estén en `/includes/`
2. Verificar rutas en `require_once`

### Error: "Permission denied"
**Causa:** Permisos incorrectos
**Solución:** Configurar permisos 644 para PHP, 755 para directorios

### Emails no llegan
**Causa:** PHP `mail()` bloqueado o va a SPAM
**Solución:** 
1. Verificar logs del servidor
2. Implementar Resend API (recomendado)
3. Usar SMTP del hosting

### Base de datos no conecta
**Causa:** Credenciales Supabase incorrectas
**Solución:**
1. Verificar `SUPABASE_URL` y `SUPABASE_KEY`
2. Probar conexión con `test_supabase.php`

---

## 📊 MONITOREO POST-DEPLOYMENT

### Logs a Revisar

1. **Error Log PHP:**
   - Ubicación: `/var/log/php_errors.log` o panel Plesk
   - Revisar errores críticos

2. **Access Log:**
   - Ver qué páginas se están accediendo
   - Identificar errores 404/500

3. **Supabase Dashboard:**
   - Verificar queries ejecutadas
   - Revisar RLS policies
   - Monitorear inserciones

### Métricas Clave

- **Usuarios registrados:** Ver tabla `users` en Supabase
- **Emails verificados:** Count de `email_verificado = true`
- **Descargas:** Count en tabla `descargas_usuario`
- **Cálculos completados:** Count en `calculadora_resultados`

---

## 🚨 IMPORTANTE - ANTES DE PRODUCCIÓN

### 1. Configurar Email Transaccional

**CRÍTICO:** PHP `mail()` NO funcionará bien

**Solución Recomendada - Resend:**

```php
// Reemplazar en auth-config.php
function auth_send_email($to, $subject, $html) {
    $api_key = 'tu_api_key_resend';
    
    $ch = curl_init('https://api.resend.com/emails');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $api_key,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'from' => 'Praxis Seguridad <info@praxisseguridad.es>',
        'to' => [$to],
        'subject' => $subject,
        'html' => $html
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($response, true);
}
```

**Costo:** Gratis hasta 100 emails/día, luego $10/mes por 50K emails

### 2. Ocultar Errores PHP en Producción

En `php.ini` o `.htaccess`:

```
display_errors = Off
log_errors = On
error_log = /ruta/a/logs/php_errors.log
```

### 3. Backups Automáticos

Configurar en Plesk:
- Backup diario de archivos
- Backup diario de BD (aunque Supabase tiene sus propios backups)
- Retención: 7 días

---

## 📞 SOPORTE

Si encuentras problemas:

1. **Revisar logs** en Plesk
2. **Verificar permisos** de archivos
3. **Probar conexión** a Supabase
4. **Revisar** configuración de email

**Contacto del desarrollador (yo):**
- Puedo ayudarte a debuggear cualquier error
- Proporcionarte ajustes de código
- Guiarte en configuraciones avanzadas

---

## 🎊 ¡LISTO!

Una vez completados todos los pasos, tu sistema de usuarios estará **100% operativo** en producción.

**URL de acceso:**
- Registro: https://praxisseguridad.es/auth/register.php
- Login: https://praxisseguridad.es/auth/login.php
- Dashboard: https://praxisseguridad.es/user/dashboard.php
- Admin: https://praxisseguridad.es/admin/

**¡Felicidades por completar el sistema!** 🚀
