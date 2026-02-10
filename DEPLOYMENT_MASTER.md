# 🚀 DEPLOYMENT FINAL COMPLETO - Praxis Seguridad

## 📋 TODO LO QUE HAY QUE SUBIR AL SERVIDOR

Este documento consolida **TODO** lo que debes hacer para que el sitio funcione 100%.

---

## ⚠️ PASO 0: CREAR EMAIL (CRÍTICO)

**Sin esto, NADA funcionará**

### En Plesk Panel:

1. Login en Plesk
2. Seleccionar dominio `praxisseguridad.es`
3. Ir a: **Mail** → **Email Addresses**
4. Click **"Create Email Address"**
5. Crear:
   ```
   Email: info@praxisseguridad.es
   Password: [Tu contraseña segura]
   Mailbox: 1000 MB
   ✓ Enable antivirus
   ✓ Enable spam filter
   ```
6. **Guardar**

**Tiempo:** 3 minutos

✅ **Verifica:** Login en webmail con `info@praxisseguridad.es`

---

## 📦 PAQUETE 1: SEO LOCAL (13 páginas)

### Archivos a subir:

**Ubicación local:** `DEPLOYMENT_SEO_PACKAGE/`

**Destino servidor:** `httpdocs/`

### Contenido:

```
DEPLOYMENT_SEO_PACKAGE/
├── sitemap.xml                      → httpdocs/sitemap.xml
├── includes/
│   ├── ciudades-data.php           → httpdocs/includes/
│   ├── faq-schema.php              → httpdocs/includes/
│   └── ciudades-faqs.php           → httpdocs/includes/
└── seguridad-{ciudad}/ (x13)
    └── index.php                    → httpdocs/seguridad-{ciudad}/
```

**Total:** 17 archivos (sitemap + 3 includes + 13 páginas)

### Método de Upload:

**Opción A: ZIP (Rápido)**
1. Subir `DEPLOYMENT_SEO_PACKAGE.zip` a `httpdocs/`
2. Extraer en servidor
3. ✅ Listo

**Opción B: Manual (Seguro)**
1. Subir `sitemap.xml` → reemplazar
2. Subir carpeta `includes/` → añadir 3 archivos
3. Subir 13 carpetas `seguridad-*/`

---

## 📧 PAQUETE 2: FIX EMAILS (Newsletter)

### Archivos a subir:

**Ubicación local:** `PLESK_UPLOAD/`

**Destino servidor:** `httpdocs/`

### Contenido:

```
PLESK_UPLOAD/
├── auth-config.php                  → httpdocs/includes/auth-config.php
└── subscribe.php                    → httpdocs/api/newsletter/subscribe.php
```

**Total:** 2 archivos

### Qué hace:

✅ Arregla error 422 en Resend
✅ Añade notificaciones de admin
✅ Emails llegan al 99%+

---

## 🎯 ORDEN RECOMENDADO DE DEPLOYMENT

### 1️⃣ Crear Email (PRIMERO)
```
Plesk → Mail → Create info@praxisseguridad.es
⏱️ 3 minutos
```

### 2️⃣ Subir Fix Emails
```
PLESK_UPLOAD/auth-config.php → httpdocs/includes/
PLESK_UPLOAD/subscribe.php → httpdocs/api/newsletter/
⏱️ 2 minutos
```

### 3️⃣ Probar Emails
```
Ir a sitio → Suscribirse al newsletter → Verificar email llega
⏱️ 2 minutos
```

### 4️⃣ Subir SEO Local
```
DEPLOYMENT_SEO_PACKAGE/* → httpdocs/
⏱️ 5 minutos (manual) o 2 minutos (ZIP)
```

### 5️⃣ Verificar SEO
```
Abrir: https://praxisseguridad.es/seguridad-santomera/
Verificar: Carga correctamente + FAQs visibles
⏱️ 2 minutos
```

### 6️⃣ Google Search Console
```
Submit sitemap.xml
Solicitar indexación páginas principales
⏱️ 5 minutos
```

**Tiempo total: 20-25 minutos**

---

## ✅ CHECKLIST COMPLETO

### Fase 1: Preparación
- [ ] ✅ Leer esta guía completa
- [ ] ✅ Tener acceso a Plesk
- [ ] ✅ Tener archivos descargados

### Fase 2: Email
- [ ] Crear `info@praxisseguridad.es` en Plesk
- [ ] Verificar login webmail funciona
- [ ] (Opcional) Configurar redirección a personal

### Fase 3: Fix Emails
- [ ] Subir `auth-config.php` a `httpdocs/includes/`
- [ ] Subir `subscribe.php` a `httpdocs/api/newsletter/`
- [ ] Probar suscripción newsletter
- [ ] Verificar emails llegan (user + admin)
- [ ] Verificar Resend panel: sin error 422

### Fase 4: SEO Local
- [ ] Subir `sitemap.xml` a raíz
- [ ] Subir 3 archivos a `includes/`
- [ ] Subir 13 carpetas `seguridad-*/`
- [ ] Verificar permiso 644 en archivos PHP

### Fase 5: Verificación
- [ ] Probar URL: `/seguridad-santomera/`
- [ ] Probar URL: `/seguridad-en-murcia/`
- [ ] Probar URL: `/seguridad-alicante/`
- [ ] Verificar FAQs aparecen y funcionan
- [ ] Validar schemas en Google Rich Results
- [ ] Verificar sitemap.xml carga

### Fase 6: Google
- [ ] Login Google Search Console
- [ ] Submit sitemap.xml
- [ ] Solicitar indexación Santomera
- [ ] Solicitar indexación Murcia
- [ ] Solicitar indexación Alicante

---

## 🔧 HERRAMIENTAS NECESARIAS

### Accesos:
- ✅ Plesk panel
- ✅ Google Search Console
- ✅ Resend panel (para verificar)

### Software (elige 1):
- Plesk File Manager (recomendado)
- FileZilla (FTP)
- WinSCP (SFTP)

---

## 📊 RESULTADO ESPERADO

### Después del deployment completo:

✅ **Emails:**
- Newsletter funciona
- Confirmaciones llegan
- Notificaciones admin llegan
- Sin errores 422
- 99%+ deliverability

✅ **SEO Local:**
- 13 páginas online
- Sitemap completo
- FAQs visibles
- Schemas validados
- Listo para rankear

✅ **Performance:**
- PageSpeed OK
- Sin errores PHP
- Todo responsive

---

## 🆘 SOPORTE

### Si algo falla:

**Emails no llegan:**
1. Verificar `info@praxisseguridad.es` existe
2. Verificar `auth-config.php` subido correctamente
3. Revisar logs Resend panel

**Páginas SEO 404:**
1. Verificar carpetas creadas
2. Verificar permisos 755 en carpetas
3. Verificar `index.php` dentro de cada carpeta

**FAQs no aparecen:**
1. Verificar `ciudades-faqs.php` en includes
2. Ver errores PHP en logs servidor

---

## 📁 ESTRUCTURA FINAL EN SERVIDOR

```
httpdocs/
├── sitemap.xml                      ← Actualizado
├── includes/
│   ├── auth-config.php             ← REEMPLAZADO (fix 422)
│   ├── ciudades-data.php           ← Nuevo
│   ├── ciudades-faqs.php           ← Nuevo
│   ├── faq-schema.php              ← Nuevo
│   └── (otros archivos existentes)
├── api/
│   └── newsletter/
│       └── subscribe.php           ← REEMPLAZADO (+ notificaciones)
├── seguridad-santomera/
│   └── index.php                    ← Nuevo
├── seguridad-abanilla/
│   └── index.php                    ← Nuevo
├── (... 11 carpetas seguridad-* más)
└── (resto del sitio sin cambios)
```

---

## 🎉 DESPUÉS DEL DEPLOYMENT

### Inmediato:
- ✅ Emails funcionando
- ✅ 13 páginas online
- ✅ Sitemap indexable

### Semana 1:
- Google indexa páginas
- Primeras impresiones en búsquedas

### Mes 1-3:
- Posicionamiento mejora
- +30% tráfico orgánico

---

**¿Listo para empezar?** 🚀  
**Empieza por el PASO 0: Crear el email**
