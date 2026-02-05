# ⏳ PENDIENTE: Configurar Resend para Emails
## Tarea para completar más tarde

**Tiempo estimado:** 30 minutos  
**Prioridad:** ALTA (necesario para producción)  
**Estado:** ⏸️ PAUSADO

---

## 🎯 Objetivo

Activar el envío profesional de emails vía Resend API para que los emails de verificación, bienvenida y notificaciones lleguen correctamente a los usuarios (en lugar de ir a SPAM con PHP mail()).

---

## 📋 Pasos a Seguir

### 1. Crear Cuenta en Resend (5 min)
- [ ] Ir a: https://resend.com/signup
- [ ] Registrarse con email de trabajo
- [ ] Confirmar email de registro

### 2. Obtener API Key (2 min)
- [ ] Login en: https://resend.com/
- [ ] Ir a: https://resend.com/api-keys
- [ ] Click "Create API Key"
  - Nombre: "Praxis Seguridad Production"
  - Permisos: "Sending access"
- [ ] **COPIAR LA API KEY** (solo se muestra una vez)
- [ ] Guardarla en lugar seguro temporalmente

### 3. Verificar Dominio en Resend (15 min)
- [ ] Ir a: https://resend.com/domains
- [ ] Click "Add Domain"
- [ ] Introducir: `praxisseguridad.es`
- [ ] Copiar los registros DNS que aparecen

**Configurar DNS en Plesk:**
- [ ] Ir a tu panel Plesk
- [ ] DNS Settings del dominio
- [ ] Añadir registros (Resend te da los valores exactos):
  - Registro TXT: `_resend` 
  - Registro MX: `mx.resend.com` (prioridad 10)
  - Registros DKIM (2-3 registros TXT)
- [ ] Guardar cambios DNS
- [ ] Esperar 5-10 minutos para propagación
- [ ] En Resend: Click "Verify Domain"
- [ ] Esperar confirmación ✅

### 4. Configurar en el Proyecto (5 min)

**En tu ordenador local:**
```bash
cd c:\Users\Juan Luis\.gemini\antigravity\scratch\WEB-2\includes
copy resend-config.example.php resend-config.php
```

**Editar `includes/resend-config.php`:**
- [ ] Abrir archivo con editor
- [ ] Reemplazar `'your_resend_api_key_here'` con tu API key real
- [ ] Verificar que email sea: `info@praxisseguridad.es`
- [ ] Guardar archivo

### 5. Subir a Servidor (3 min)
- [ ] Acceder a Plesk File Manager
- [ ] Navegar a `/httpdocs/includes/`
- [ ] Subir archivo `resend-config.php`
- [ ] Verificar permisos: 644

### 6. Probar Funcionamiento (5 min)
- [ ] Ir a: https://praxisseguridad.es/auth/register.php
- [ ] Registrar usuario de prueba
- [ ] Verificar que llegue email de verificación
- [ ] Revisar inbox (no debería estar en SPAM)
- [ ] Click en link de verificación
- [ ] Verificar que llegue email de bienvenida

---

## 📖 Documentación de Referencia

**Guía completa:** `RESEND_SETUP.md`
- Instrucciones detalladas paso a paso
- Configuración DNS completa
- Troubleshooting de errores comunes
- Testing y monitoreo

**Archivo de ejemplo:** `includes/resend-config.example.php`
- Template con todos los campos
- Comentarios explicativos

---

## ✅ Verificación de Éxito

Sabrás que está funcionando cuando:
1. ✅ Dominio aparece como "Verified" en Resend
2. ✅ Emails llegan a inbox (no SPAM)
3. ✅ Logs muestran: "Email enviado vía Resend: OK"
4. ✅ Dashboard de Resend muestra emails enviados

---

## 🐛 Si Algo Falla

**Ver logs:**
```bash
tail -f logs/auth.log
```

**Problemas comunes:**
- "Invalid API Key" → Verificar que copiaste bien la key
- "Domain not verified" → Esperar más tiempo, revisar DNS
- Emails a SPAM → Completar TODOS los registros DNS (SPF, DKIM)

**Consultar:** `RESEND_SETUP.md` sección Troubleshooting

---

## 💰 Costos

**Plan Gratuito:**
- ✅ 100 emails/día
- ✅ 3,000 emails/mes
- ✅ Sin tarjeta de crédito
- ✅ Suficiente para MVP

**Cuando crezcas:**
- $20/mes → 50,000 emails/mes

---

## 🎯 Siguiente Paso

**Cuando estés listo para hacerlo:**
1. Abrir https://resend.com/signup en navegador
2. Seguir los pasos de arriba uno por uno
3. Marcar cada checkbox al completarlo
4. ¡Listo en 30 minutos!

---

**📌 IMPORTANTE:** 
- NO subir `resend-config.php` a Git (ya está en .gitignore)
- NO compartir la API key con nadie
- Guardar API key en gestor de contraseñas

---

## 🔗 Links Rápidos

- Resend Dashboard: https://resend.com/
- API Keys: https://resend.com/api-keys
- Domains: https://resend.com/domains
- Emails enviados: https://resend.com/emails
- Documentación: https://resend.com/docs

---

**Estado actual:** Sistema funcional con fallback a PHP mail(), pero emails pueden ir a SPAM.  
**Con Resend:** Deliverability 99%+ garantizado ✅

**¡Nos vemos cuando estés listo para configurarlo!** 🚀
