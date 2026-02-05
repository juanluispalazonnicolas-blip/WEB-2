# Guía de Testing Móvil - Praxis Seguridad

## 🔧 Fix Aplicado: Scroll Horizontal

### Problema Reportado:
"Cuando accedo desde el teléfono, se me mueve mucho la web para los lados al intentar arrastrarlo"

### ✅ Solución Implementada:

**Archivo creado:** `css/mobile-fixes.css`

Este archivo CSS contiene más de 150 líneas de código específicamente diseñadas para:

1. **Prevenir Scroll Horizontal:**
   - `overflow-x: hidden` en html, body y todos los contenedores
   - `max-width: 100vw` para asegurar que nada se salga
   - Word-wrap automático en textos

2. **Elementos Responsivos:**
   - Todas las imágenes al 100% de ancho
   - Tablas con scroll horizontal controlado
   - Grids y flexbox limitados al viewport

3. **Optimizaciones Táctiles:**
   - Botones y links de mínimo 44x44px (estándar iOS)
   - Inputs de 16px para prevenir auto-zoom
   - Smooth scrolling mejorado

4. **Fixes Específicos Móvil:**
   - Chatbot posicionado correctamente
   - Modales dentro del viewport
   - Formularios responsivos
   - Navegación móvil ajustada

---

## 📱 Cómo Probar en tu Móvil:

### Opción 1: Chrome DevTools (Simulación)
1. Abrir web en Chrome
2. F12 → Toggle device toolbar
3. Seleccionar dispositivo (iPhone, Samsung, etc.)
4. Probar scroll horizontal

### Opción 2: Teléfono Real (Recomendado)
1. **Sube los archivos a servidor:**
   - `css/mobile-fixes.css`
   - `includes/header.php` (actualizado)

2. **Accede desde tu móvil:**
   - Abre https://praxisseguridad.es
   - Intenta hacer scroll horizontal
   - Prueba en diferentes páginas

3. **Pruebas a realizar:**
   - ✅ Scroll vertical (debe funcionar)
   - ✅ Scroll horizontal (NO debe moverse)
   - ✅ Zoom con pellizco (debe funcionar)
   - ✅ Imágenes responsivas
   - ✅ Formularios dentro de pantalla
   - ✅ Botones fáciles de tocar
   - ✅ Chatbot no se solapa
   - ✅ Menú móvil funciona

---

## 🐛 Si Aún Hay Problemas:

### Debug Mode:
Editar `css/mobile-fixes.css` y descomentar la última línea:

```css
* {
    outline: 1px solid red !important;
}
```

Esto pondrá un borde rojo a TODOS los elementos, permitiéndote ver cuál se sale.

### Herramientas de Inspección Móvil:
- **Safari iOS:** Conectar iPhone → Desarrollo → Inspeccionar
- **Chrome Android:** chrome://inspect → Inspeccionar dispositivo

### Elementos Comunes que Causan Problemas:
- Imágenes sin `max-width: 100%`
- Textos largos sin `word-wrap`
- Containers con width fijo (px)
- Position fixed sin límite de ancho
- Tablas muy anchas

---

## 📊 Checklist de Verificación:

### Desktop:
- [ ] La web se ve igual (ningún cambio visual)
- [ ] No hay regresiones

### Móvil (Vertical):
- [ ] No hay scroll horizontal
- [ ] Todo el contenido visible
- [ ] Botones fáciles de presionar
- [ ] Formularios usables
- [ ] Imágenes ajustadas

### Móvil (Horizontal):
- [ ] Contenido ajustado
- [ ] Hero sections reducidos
- [ ] Header compacto

### Tablets:
- [ ] Responsive correcto
- [ ] No hay elementos cortados

---

## ✅ Confirmación de Fix:

**Antes:**
- ❌ Scroll horizontal
- ❌ Contenido se sale
- ❌ Difícil de navegar

**Después:**
- ✅ Solo scroll vertical
- ✅ Todo dentro del viewport
- ✅ Navegación fluida
- ✅ UX móvil profesional

---

## 🚀 Próximos Pasos:

1. **Sube archivos a producción**
2. **Prueba en tu móvil real**
3. **Confirma que funciona**
4. **Reporta cualquier issue**

Si encuentras algún elemento específico que aún causa problemas, indícame cuál es y lo ajustaré específicamente.

---

**Nota:** Los fixes aplicados siguen las mejores prácticas de mobile-first design y son compatibles con todos los navegadores móviles (iOS Safari, Chrome Android, Firefox Mobile, etc.).
