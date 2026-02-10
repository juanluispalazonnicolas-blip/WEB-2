# 📋 Checklist de Deployment - SEO Local

## ✅ Pre-Deployment (Completado)

- [x] 13 páginas locales creadas
- [x] Sistema dinámico implementado
- [x] Sitemap.xml actualizado
- [x] Robots.txt configurado
- [x] Schemas SEO implementados
- [x] Canonical URLs añadidas
- [x] Open Graph tags
- [x] Breadcrumbs

## 🚀 Deployment a Producción

### 1. Copiar Archivos al Servidor

**Archivos modificados/nuevos:**
```bash
# Sitemap actualizado
/sitemap.xml

# Data de ciudades
/includes/ciudades-data.php
/includes/faq-schema.php

# 13 carpetas de ciudades
/seguridad-santomera/index.php
/seguridad-abanilla/index.php
/seguridad-fortuna/index.php
/seguridad-en-murcia/index.php
/seguridad-molina-segura/index.php
/seguridad-alcantarilla/index.php
/seguridad-torres-cotillas/index.php
/seguridad-orihuela/index.php
/seguridad-alicante/index.php
/seguridad-elche/index.php
/seguridad-torrevieja/index.php
/seguridad-valencia/index.php
/seguridad-almeria/index.php
```

### 2. Verificar en Servidor

**Tras subir archivos:**
- [ ] Verificar que `/sitemap.xml` es accesible
- [ ] Probar acceso a `/seguridad-santomera/`
- [ ] Verificar que carga `ciudades-data.php` correctamente
- [ ] Comprobar que no hay errores PHP

**URLs a probar:**
- https://praxisseguridad.es/sitemap.xml
- https://praxisseguridad.es/seguridad-santomera/
- https://praxisseguridad.es/seguridad-murcia/
- https://praxisseguridad.es/seguridad-alicante/

### 3. Google Search Console

**Enviar Sitemap:**
1. Ir a Google Search Console
2. Sitemaps → Añadir nuevo sitemap
3. URL: `https://praxisseguridad.es/sitemap.xml`
4. Enviar

**Solicitar indexación:**
- [ ] Enviar URL de Santomera
- [ ] Enviar URL de Murcia
- [ ] Enviar URL de Alicante
- [ ] (Opcional) Resto de ciudades

### 4. Verificación de Schemas

**Herramientas:**
- [ ] [Google Rich Results Test](https://search.google.com/test/rich-results)
- [ ] [Schema Markup Validator](https://validator.schema.org/)

**Probar con:**
- https://praxisseguridad.es/seguridad-santomera/

### 5. Verificación Open Graph

**Herramientas:**
- [ ] [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/)
- [ ] [Twitter Card Validator](https://cards-dev.twitter.com/validator)
- [ ] [LinkedIn Post Inspector](https://www.linkedin.com/post-inspector/)

### 6. Performance Testing

**PageSpeed Insights:**
- [ ] Probar velocidad de `/seguridad-santomera/`
- [ ] Verificar Core Web Vitals
- [ ] Objetivo: Score > 90 en móvil

**GTmetrix:**
- [ ] Analizar tiempo de carga
- [ ] Verificar optimización de recursos

### 7. Monitoreo Post-Deployment

**Primera Semana:**
- [ ] Revisar Google Search Console diariamente
- [ ] Verificar errores de rastreo
- [ ] Comprobar indexación de nuevas páginas

**Primer Mes:**
- [ ] Analizar tráfico orgánico por ciudad
- [ ] Revisar keywords posicionadas
- [ ] Ajustar según datos

## 🔧 Troubleshooting Común

### Problema: Páginas devuelven 404
**Solución:** Verificar que:
- Las carpetas existen en el servidor
- Los permisos son correctos (755 para carpetas, 644 para archivos)
- El `.htaccess` permite acceso a las carpetas

### Problema: Error al cargar ciudades-data.php
**Solución:**
- Verificar ruta relativa `__DIR__ . '/../includes/ciudades-data.php'`
- Comprobar que el archivo fue subido
- Revisar errores PHP en logs del servidor

### Problema: Schemas no validados
**Solución:**
- Revisar sintaxis JSON en validator
- Verificar comillas escapadas correctamente
- Comprobar que todas las variables PHP tienen valores

### Problema: Images no cargan
**Solución:**
- Verificar fallback con `onerror`
- Crear `placeholder-local.jpg`
- Ver guía en `IMAGENES_SEO_LOCAL.md`

## 📊 KPIs a Monitorizar

### Google Search Console (primeros 3 meses)
- **Impresiones** por página local
- **Clics** en resultados de búsqueda
- **CTR promedio** de páginas locales
- **Posición promedio** para "[servicio] + [ciudad]"

### Google Analytics
- **Sesiones** a `/seguridad-*/`
- **Tasa de rebote** por página
- **Tiempo en página**
- **Conversiones** (formularios enviados)

### Objetivos Realistas

**Mes 1-3:**
- Indexación completa de 13 páginas
- 5-10 impresiones/día por ciudad principal
- Posición 20-50 en búsquedas locales

**Mes 4-6:**
- Aumento del 50% en impresiones
- Posición 10-20 en búsquedas prioritarias
- Primeras conversiones desde páginas locales

**Mes 7-12:**
- Top 10 en búsquedas clave por ciudad
- 100+ impresiones/día total
- ROI positivo en SEO local

---

**Estado Actual:** ✅ Listo para deployment
**Próximo Paso:** Subir archivos al servidor de producción
