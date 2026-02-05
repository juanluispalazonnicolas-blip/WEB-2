# 🚀 Guía de Activación - Newsletter + Emails
## Deploy Completo a Producción

**Tiempo estimado:** 45 minutos  
**Requisitos:** Acceso a Plesk + Supabase

---

## ✅ PARTE 1: Base de Datos (10 min)

### Paso 1: Ejecutar SQL en Supabase

1. **Abrir Supabase:**
   - Ir a: https://supabase.com/dashboard
   - Proyecto: [tu proyecto]
   - SQL Editor → New Query

2. **Ejecutar SQL de Newsletter:**
   ```sql
   -- Copiar TODO el contenido de:
   database/setup_newsletter.sql
   
   -- Pegar en SQL Editor
   -- Click "Run"
   ```

3. **Verificar tablas creadas:**
   ```sql
   SELECT * FROM newsletters LIMIT 1;
   SELECT * FROM newsletter_envios LIMIT 1;
   SELECT * FROM newsletter_tracking LIMIT 1;
   ```

**Resultado esperado:** 3 tablas creadas ✅

---

## ✅ PARTE 2: Subir Archivos a Plesk (20 min)

### Paso 2: Acceder a Plesk File Manager

URL: https://strange-kare.94-143-140-19.plesk.page:8443/smb/file-manager/list

### Paso 3: Subir Archivos por Sección

#### A. Configuración (📁 `/includes/`)

**Subir estos archivos:**
```
✅ includes/newsletter-config.php (ACTUALIZADO - con Resend)
✅ includes/resend-config.php (si no está)
✅ includes/auth-config.php (si no está)
```

#### B. Templates Email (📁 `/includes/email-templates/`)

**Subir estos archivos:**
```
✅ includes/email-templates/newsletter-confirmacion.php
✅ includes/email-templates/newsletter-bienvenida.php
✅ includes/email-templates/verificacion-email.php
✅ includes/email-templates/bienvenida-usuario.php
```

#### C. API Newsletter (📁 `/api/newsletter/`)

**Crear carpeta si no existe:** `/api/newsletter/`

**Subir estos archivos:**
```
✅ api/newsletter/subscribe.php
✅ api/newsletter/confirm.php
✅ api/newsletter/unsubscribe.php
```

#### D. Frontend (📁 `/newsletter/`)

**Crear carpeta:** `/newsletter/`

**Subir estos archivos:**
```
✅ newsletter/gracias.php
✅ newsletter/unsubscribe.php
```

#### E. Actualizaciones Raíz

**Archivos a actualizar:**
```
✅ index.php (tiene formulario newsletter integrado)
```

### Paso 4: Crear Directorio de Logs

**Ruta:** `/httpdocs/logs/`

**Permisos:** 755 (rwxr-xr-x)

```bash
# Vía SSH (si tienes acceso):
mkdir /httpdocs/logs
chmod 755 /httpdocs/logs

# Vía Plesk:
# File Manager → New Directory → "logs" → Permissions → 755
```

---

## ✅ PARTE 3: Verificar Configuración (5 min)

### Paso 5: Verificar Constantes

**Archivo:** `includes/newsletter-config.php`

Verificar estas líneas:
```php
define('NEWSLETTER_BASE_URL', 'https://praxisseguridad.es'); // ✅ SIN barra final
define('NEWSLETTER_FROM_EMAIL', 'info@praxisseguridad.es'); // ✅ Tu email
define('NEWSLETTER_DEV_MODE', false); // ✅ false en producción
```

**Archivo:** `includes/resend-config.php`

Verificar:
```php
define('RESEND_API_KEY', 're_cLZAAtQH_8xjVUxtMXqii7Q7uXqetsLzU'); // ✅ Tu key
define('EMAIL_FROM', 'info@praxisseguridad.es'); // ✅ Tu email
```

---

## ✅ PARTE 4: Testing (10 min)

### Paso 6: Probar Newsletter

**Test 1: Suscripción**
1. Ir a: https://praxisseguridad.es/
2. Scroll hasta el footer
3. Buscar formulario "Suscríbete al Newsletter"
4. Ingresar tu email (usa uno real)
5. Click "Suscribirse"
6. Esperar mensaje: "¡Gracias! Revisa tu email..."

**Test 2: Confirmación**
1. Revisar inbox del email usado
2. Buscar email: "Confirma tu suscripción a Praxis Seguridad"
3. Click en botón "Confirmar Suscripción"
4. Verificar redirección a página de gracias
5. Revisar inbox: Email de bienvenida debe llegar

**Test 3: Verificar en Supabase**

```sql
-- Ver suscriptor
SELECT * FROM newsletters 
WHERE email = 'tu_email@example.com';

-- Debe mostrar:
-- verificado: TRUE
-- activo: TRUE
-- fecha_verificacion: [timestamp]
```

**Test 4: Verificar Resend Dashboard**
1. Ir a: https://resend.com/emails
2. Ver últimos emails enviados
3. Verificar:
   - Email de confirmación ✅
   - Email de bienvenida ✅
   - Estado: Delivered ✅

### Paso 7: Probar Sistema de Usuarios

**Test 1: Registro**
1. Ir a: https://praxisseguridad.es/auth/register.php
2. Registrar usuario de prueba
3. Verificar email de verificación llega
4. Click en link de verificación
5. Verificar email de bienvenida llega

**Test 2: Login**
1. Login con usuario creado
2. Acceder a dashboard
3. Verificar todas las páginas funcionan

---

## 📊 PARTE 5: Monitoreo

### Logs a Revisar

**Logs Locales:**
```
/logs/newsletter.log
/logs/auth.log
```

**Ver últimas líneas:**
```bash
tail -f /httpdocs/logs/newsletter.log
tail -f /httpdocs/logs/auth.log
```

**Resend Dashboard:**
```
https://resend.com/emails
```

Revisar:
- ✅ Emails entregados (no rebotados)
- ✅ No van a SPAM
- ✅ Tasa de apertura

### Consultas SQL Útiles

**Estadísticas Newsletter:**
```sql
SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN verificado = TRUE THEN 1 ELSE 0 END) as verificados,
    SUM(CASE WHEN activo = TRUE THEN 1 ELSE 0 END) as activos
FROM newsletters;
```

**Últimas 10 suscripciones:**
```sql
SELECT 
    email,
    verificado,
    activo,
    fecha_suscripcion,
    fecha_verificacion
FROM newsletters
ORDER BY fecha_suscripcion DESC
LIMIT 10;
```

**Usuarios registrados:**
```sql
SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN email_verificado = TRUE THEN 1 ELSE 0 END) as verificados
FROM users;
```

---

## 🐛 TROUBLESHOOTING

### Email no llega

1. **Verificar Resend Dashboard:**
   - ¿Aparece el email como enviado?
   - ¿Estado = "Delivered"?

2. **Revisar SPAM:**
   - Buscar en carpeta SPAM/Junk
   - Si está ahí, verificar dominio está verificado en Resend

3. **Ver Logs:**
   ```bash
   tail -50 /httpdocs/logs/newsletter.log
   tail -50 /httpdocs/logs/auth.log
   ```

4. **Probar test-resend.php:**
   ```
   https://praxisseguridad.es/test-resend.php
   ```

### Suscripción falla

1. **Verificar tabla existe:**
   ```sql
   SHOW TABLES LIKE 'newsletters';
   ```

2. **Ver errores en logs:**
   ```bash
   cat /httpdocs/logs/newsletter.log | grep ERROR
   ```

3. **Verificar permisos:**
   - `/api/newsletter/*.php` → 644
   - `/logs/` → 755

### Error 404 en API

Verificar rutas:
```
✅ /api/newsletter/subscribe.php
✅ /api/newsletter/confirm.php
✅ /api/newsletter/unsubscribe.php
```

Crear carpetas si no existen.

---

## ✅ CHECKLIST FINAL

### Newsletter:
- [ ] SQL ejecutado en Supabase
- [ ] Tablas creadas (newsletters, newsletter_envios, newsletter_tracking)
- [ ] Archivos API subidos
- [ ] Templates subidos
- [ ] Configuración actualizada
- [ ] Directorio /logs creado con permisos
- [ ] Probado suscripción
- [ ] Email confirmación recibido
- [ ] Email bienvenida recibido
- [ ] Verificado en Supabase
- [ ] Verificado en Resend Dashboard

### Sistema Usuarios:
- [ ] Archivos user/* subidos
- [ ] Probado registro
- [ ] Email verificación recibido
- [ ] Email bienvenida recibido
- [ ] Dashboard accesible
- [ ] Todas las páginas funcionan

### Resend:
- [ ] Dominio verificado ✅
- [ ] API key configurada ✅
- [ ] Emails entregados (no SPAM)
- [ ] Dashboard monitoreado

---

## 🎊 ¡SISTEMA ACTIVADO!

Una vez completada esta guía, tendrás:

✅ Newsletter 100% funcional  
✅ Emails con deliverability 99%+  
✅ Sistema de usuarios completo  
✅ Monitoreo y métricas  
✅ Logs detallados  

**URLs Activas:**
- Newsletter: https://praxisseguridad.es (footer)
- Registro: https://praxisseguridad.es/auth/register.php
- Dashboard: https://praxisseguridad.es/user/dashboard.php
- Admin: https://praxisseguridad.es/admin/

**Monitoring:**
- Resend: https://resend.com/emails
- Supabase: https://supabase.com/dashboard

---

**¿Problemas?** Revisar logs y Resend dashboard primero.

**¡Tu sistema está listo para capturar suscriptores!** 🚀
