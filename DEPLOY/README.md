# 📦 GUÍA RÁPIDA DE DEPLOYMENT - Newsletter + Emails

## ✅ PASO 1: SQL EJECUTADO ✓
Ya completado en Supabase

## 📁 PASO 2: SUBIR ARCHIVOS A PLESK (15 minutos)

### 🔐 Acceso:
https://strange-kare.94-143-140-19.plesk.page:8443/smb/file-manager/list

---

## 📂 INSTRUCCIONES POR CARPETA:

### 1️⃣ INCLUDES (Configuración)
**Ir a:** `/httpdocs/includes/`

**Subir carpeta completa:** `DEPLOY\includes\`
- Esto sube 5 archivos PHP + subcarpeta email-templates
- ⚠️ Si pregunta "¿Reemplazar?": **SÍ**

**Resultado:** `/httpdocs/includes/` tendrá:
- newsletter-config.php ✅
- resend-config.php ✅
- auth-config.php ✅
- header.php ✅
- footer.php ✅
- email-templates/ (con 4 archivos) ✅

---

### 2️⃣ API NEWSLETTER
**Ir a:** `/httpdocs/api/`

**Si NO existe carpeta `newsletter`:**
- Click derecho → New Directory → `newsletter`

**Subir:** `DEPLOY\api\newsletter\` → a `/httpdocs/api/newsletter/`

**Resultado:** `/httpdocs/api/newsletter/` tendrá:
- subscribe.php ✅
- confirm.php ✅
- unsubscribe.php ✅

---

### 3️⃣ NEWSLETTER (Frontend)
**Ir a:** `/httpdocs/`

**Si NO existe carpeta `newsletter`:**
- Click derecho → New Directory → `newsletter`

**Subir:** `DEPLOY\newsletter\` → a `/httpdocs/newsletter/`

**Resultado:** `/httpdocs/newsletter/` tendrá:
- gracias.php ✅
- unsubscribe.php ✅

---

### 4️⃣ CSS (Mobile Fixes)
**Ir a:** `/httpdocs/`

**Si NO existe carpeta `css`:**
- Click derecho → New Directory → `css`

**Subir:** `DEPLOY\css\` → a `/httpdocs/css/`

**Resultado:** `/httpdocs/css/` tendrá:
- mobile-fixes.css ✅

---

### 5️⃣ RAÍZ (Páginas principales)
**Ir a:** `/httpdocs/`

**Subir archivos de:** `DEPLOY\raiz\`
- index.php (⚠️ Reemplazar si pregunta)
- politica-privacidad.php
- aviso-legal.php

**Resultado en `/httpdocs/`:**
- index.php ✅ (actualizado)
- politica-privacidad.php ✅
- aviso-legal.php ✅

---

### 6️⃣ CREAR DIRECTORIO LOGS
**Ir a:** `/httpdocs/`

**Crear:**
- Click derecho → New Directory → `logs`

**Permisos:**
- Click derecho en `logs` → Permissions → `755`

---

## ✅ VERIFICACIÓN RÁPIDA

Verifica que existan estas rutas en Plesk:

```
✅ /httpdocs/includes/newsletter-config.php
✅ /httpdocs/includes/email-templates/newsletter-confirmacion.php
✅ /httpdocs/api/newsletter/subscribe.php
✅ /httpdocs/newsletter/gracias.php
✅ /httpdocs/css/mobile-fixes.css
✅ /httpdocs/politica-privacidad.php
✅ /httpdocs/logs/ (carpeta vacía, permisos 755)
```

---

## 🧪 PASO 3: TESTING (5 minutos)

### Test 1: Newsletter
1. Ir a: https://praxisseguridad.es
2. Scroll al footer
3. Suscribirse con tu email
4. **Resultado esperado:** 
   - Mensaje "¡Gracias! Revisa tu email..."
   - Email de confirmación en inbox (en 1-2 min)

### Test 2: Confirmar Suscripción
1. Abrir email recibido
2. Click "Confirmar Suscripción"
3. **Resultado esperado:**
   - Redirección a página de gracias
   - Email de bienvenida (en 1-2 min)

### Test 3: Mobile
1. Abrir desde móvil
2. **Resultado esperado:**
   - NO scroll horizontal ✅
   - Todo dentro de pantalla ✅

---

## 📊 PASO 4: MONITOREO

### Resend Dashboard
https://resend.com/emails

**Verificar:**
- Email confirmación: Delivered ✅
- Email bienvenida: Delivered ✅
- NO rebotes ✅

### Supabase
```sql
SELECT * FROM newsletters ORDER BY fecha_suscripcion DESC LIMIT 5;
```

**Verificar:**
- Tu email aparece ✅
- verificado = TRUE ✅
- activo = TRUE ✅

---

## 🎊 ¡LISTO!

Una vez completado:
- ✅ Newsletter funcionando
- ✅ Emails 99% deliverability
- ✅ Mobile optimizado
- ✅ Páginas legales compliant

**Tiempo total:** ~20 minutos

---

**¿Problemas?** Revisa `ACTIVACION_COMPLETA.md` para troubleshooting.
