# ✅ Lista de Archivos para Deploy - Newsletter + Usuarios
## Copiar esta lista para subirlos vía Plesk

---

## 📁 CONFIGURACIÓN (/includes/)

```
✅ includes/newsletter-config.php (ACTUALIZADO)
✅ includes/resend-config.php
✅ includes/auth-config.php
✅ includes/user-functions.php
```

---

## 📧 EMAIL TEMPLATES (/includes/email-templates/)

```
✅ includes/email-templates/newsletter-confirmacion.php
✅ includes/email-templates/newsletter-bienvenida.php
✅ includes/email-templates/verificacion-email.php
✅ includes/email-templates/bienvenida-usuario.php
```

---

## 🔌 API NEWSLETTER (/api/newsletter/)

**CREAR CARPETA:** `/api/newsletter/`

```
✅ api/newsletter/subscribe.php
✅ api/newsletter/confirm.php
✅ api/newsletter/unsubscribe.php
```

---

## 🌐 FRONTEND NEWSLETTER (/newsletter/)

**CREAR CARPETA:** `/newsletter/`

```
✅ newsletter/gracias.php
✅ newsletter/unsubscribe.php
```

---

## 👤 SISTEMA USUARIOS (/user/)

**CREAR CARPETA:** `/user/` (si no existe)

```
✅ user/dashboard.php
✅ user/recursos.php
✅ user/alertas.php
✅ user/perfil.php
✅ user/badges.php
✅ user/calculadora-riesgo.php
✅ user/cotizaciones.php
✅ user/download-recurso.php
```

---

## 🔐 AUTENTICACIÓN (/auth/)

**CREAR CARPETA:** `/auth/` (si no existe)

```
✅ auth/register.php
✅ auth/login.php
✅ auth/verify-email.php
✅ auth/logout.php
```

---

## 👨‍💼 ADMIN (/admin/)

**CREAR CARPETA:** `/admin/` (si no existe)

```
✅ admin/index.php
```

---

## 📄 PÁGINAS LEGALES (raíz)

```
✅ politica-privacidad.php
✅ aviso-legal.php
```

---

## 🎨 CSS (NUEVO)

**CREAR CARPETA:** `/css/`

```
✅ css/mobile-fixes.css
```

---

## 🔄 ACTUALIZACIONES

```
✅ includes/header.php (ACTUALIZADO - mobile fixes)
✅ includes/footer.php (ACTUALIZADO - links legales)
✅ index.php (ACTUALIZADO - formulario newsletter)
```

---

## 📦 RECURSOS (/recursos/)

**CREAR CARPETA:** `/recursos/`

```
✅ recursos/README.md
```

(PDFs se subirán posteriormente)

---

## 🗂️ DIRECTORIOS A CREAR

```bash
✅ /logs/ (permisos 755)
✅ /api/newsletter/
✅ /newsletter/
✅ /user/
✅ /auth/
✅ /admin/
✅ /recursos/
✅ /css/
```

---

## 📊 BASE DE DATOS (Supabase SQL)

```sql
-- Ejecutar en Supabase SQL Editor:

✅ database/setup_users.sql (YA EJECUTADO)
✅ database/setup_newsletter.sql (PENDIENTE)
```

---

## ⚙️ CONFIGURACIÓN POST-UPLOAD

### 1. Verificar permisos:
- Archivos PHP: 644
- Directorios: 755
- /logs/: 755 (escribible)

### 2. Editar (si es necesario):
- `includes/resend-config.php` → Verificar API key
- `includes/newsletter-config.php` → Verificar URLs

### 3. Crear logs:
```bash
mkdir /httpdocs/logs
chmod 755 /httpdocs/logs
```

---

## 🧪 TESTING POST-DEPLOY

### Newsletter:
1. Ir a praxisseguridad.es
2. Suscribirse (footer)
3. Revisar email confirmación
4. Confirmar suscripción
5. Revisar email bienvenida

### Usuarios:
1. Ir a /auth/register.php
2. Registrar usuario
3. Verificar email
4. Login y acceder dashboard

### Resend:
1. https://resend.com/emails
2. Verificar emails enviados
3. Comprobar deliverability

---

## 📈 TOTAL DE ARCHIVOS

- **Configuración:** 4 archivos
- **Templates:** 4 archivos
- **API:** 3 archivos
- **Frontend:** 2 archivos
- **Usuarios:** 8 archivos
- **Auth:** 4 archivos
- **Admin:** 1 archivo
- **Legales:** 2 archivos
- **CSS:** 1 archivo
- **SQL:** 1 script

**TOTAL:** ~30 archivos + 7 directorios

---

## ⏱️ TIEMPO ESTIMADO

- Crear directorios: 5 min
- Subir archivos: 15 min
- Ejecutar SQL: 2 min
- Configurar: 5 min
- Testing: 10 min

**TOTAL:** ~40 minutos

---

**Nota:** Usa esta lista como checklist al subir archivos vía Plesk File Manager.
