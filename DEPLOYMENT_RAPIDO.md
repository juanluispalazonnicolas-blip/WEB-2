# 📦 Paquete de Deployment - SEO Local
## Fecha: 10 Febrero 2026

---

## 📁 Archivos a Subir al Servidor

### 1. Sitemap y Configuración (Raíz del sitio)
```
/sitemap.xml                          ✅ ACTUALIZADO
/robots.txt                           ✅ Ya existente (verificar)
```

### 2. Includes - Data de Ciudades
```
/includes/
  ├── ciudades-data.php              ✅ NUEVO - Data de 13 ciudades
  └── faq-schema.php                 ✅ NUEVO - Helper FAQs
```

### 3. Páginas Locales - 13 Carpetas
```
/seguridad-santomera/index.php       ✅ ACTUALIZADO
/seguridad-abanilla/index.php        ✅ ACTUALIZADO
/seguridad-fortuna/index.php         ✅ ACTUALIZADO
/seguridad-en-murcia/index.php       ✅ ACTUALIZADO
/seguridad-molina-segura/index.php   ✅ ACTUALIZADO
/seguridad-alcantarilla/index.php    ✅ ACTUALIZADO
/seguridad-torres-cotillas/index.php ✅ ACTUALIZADO
/seguridad-orihuela/index.php        ✅ ACTUALIZADO
/seguridad-alicante/index.php        ✅ ACTUALIZADO
/seguridad-elche/index.php           ✅ ACTUALIZADO
/seguridad-torrevieja/index.php      ✅ ACTUALIZADO
/seguridad-valencia/index.php        ✅ ACTUALIZADO
/seguridad-almeria/index.php         ✅ ACTUALIZADO
```

---

## 🚀 Métodos de Deployment

### Opción 1: Subida Manual por FTP/SFTP (FileZilla)

**Pasos:**
1. Conectar a servidor vía FTP
2. Navegar a la carpeta raíz del sitio web
3. Subir archivos según estructura arriba
4. Verificar permisos: 755 carpetas, 644 archivos

**Tiempo estimado:** 15-20 minutos

---

### Opción 2: Panel Plesk (Recomendado)

**Pasos:**
1. Acceder a Plesk
2. Ir a "File Manager"
3. Navegar a `httpdocs/` o `public_html/`
4. Subir archivos según estructura
5. Verificar con "Check Health"

**Tiempo estimado:** 10-15 minutos

---

### Opción 3: Git Deploy (Si está configurado)

```bash
# En local
git add sitemap.xml includes/ciudades-data.php includes/faq-schema.php
git add seguridad-*/index.php
git commit -m "feat: SEO local - 13 ciudades con optimizaciones técnicas completas"
git push origin main

# En servidor (si hay auto-deploy configurado)
# El servidor pullará automáticamente
```

**Tiempo estimado:** 5 minutos

---

## ✅ Checklist Pre-Upload

- [ ] Backup del sitio actual (por seguridad)
- [ ] Verificar que `ciudades-data.php` no tiene errores PHP
- [ ] Comprobar que todas las carpetas `seguridad-*` existen
- [ ] Verificar paths relativos (`../includes/`)

---

## 🔍 Verificación Post-Upload

### URLs a Probar

**Sitemap:**
- https://praxisseguridad.es/sitemap.xml

**Página Base:**
- https://praxisseguridad.es/seguridad-santomera/

**Páginas Principales:**
- https://praxisseguridad.es/seguridad-en-murcia/
- https://praxisseguridad.es/seguridad-alicante/
- https://praxisseguridad.es/seguridad-valencia/

**Verificar que carga:**
- Sin errores PHP
- Breadcrumbs visibles
- Contenido único de la ciudad
- Meta tags en source

---

## 🔧 Troubleshooting

### Error: "require_once failed"
**Causa:** Path incorrecto a `ciudades-data.php`
**Solución:** Verificar que `/includes/ciudades-data.php` existe

### Error: "Undefined variable $ciudad"
**Causa:** Ciudad no existe en el array
**Solución:** Revisar mapeo en línea 12-26 del index.php

### Error: Página en blanco
**Causa:** Error PHP no mostrado
**Solución:** Activar `display_errors` temporalmente o revisar logs

---

## 📊 Validación SEO Post-Deployment

### Google Tools
1. **Search Console:** Enviar sitemap
   - URL: `https://praxisseguridad.es/sitemap.xml`
   
2. **Rich Results Test:** Verificar schemas
   - Probar: `https://praxisseguridad.es/seguridad-santomera/`
   
3. **PageSpeed Insights:** Verificar performance
   - Objetivo: Score > 90

### Validadores
- [ ] [Schema Validator](https://validator.schema.org/)
- [ ] [Facebook Debugger](https://developers.facebook.com/tools/debug/)
- [ ] [Twitter Card Validator](https://cards-dev.twitter.com/validator)

---

## 📈 Monitoreo Primera Semana

**Diario:**
- Verificar indexación en Search Console
- Revisar errores de rastreo
- Comprobar que no hay 404s

**Semanal:**
- Analizar primeras impresiones
- Revisar keywords posicionadas
- Ajustar según datos

---

## 🎯 Archivos Opcionales (No Críticos)

Estos archivos NO son necesarios para el funcionamiento, solo documentación:

```
IMAGENES_SEO_LOCAL.md          📄 Guía para crear imágenes
DEPLOYMENT_SEO_CHECKLIST.md    📄 Este checklist
_template-ciudad-dinamica.php  📄 Template de referencia
actualizar-paginas-local.php   📄 Script de actualización
```

**No subir estos al servidor público.**

---

## ✨ Resultado Esperado

Tras el deployment exitoso:

✅ 13 páginas locales accesibles
✅ Sitemap con 13 nuevas URLs
✅ Schemas validados
✅ Sin errores PHP
✅ Ready para empezar a rankear

---

**Estado:** 🟢 Listo para deployment
**Prioridad:** Alta (mejorará SEO significativamente)
**Riesgo:** Bajo (archivos nuevos, no modifica existentes)
