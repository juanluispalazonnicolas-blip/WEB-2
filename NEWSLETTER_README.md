# Sistema de Newsletter - Praxis Seguridad

Sistema completo de newsletter con double opt-in, gestión de suscriptores y envío masivo de emails.

## 📋 Componentes Implementados

### Base de Datos
- **`database/setup_newsletter.sql`**: Schema con 3 tablas
  - `newsletters`: Suscriptores y sus estados
  - `newsletter_envios`: Historial de newsletters enviadas
  - `newsletter_tracking`: Tracking individual de envíos

### Configuración
- **`includes/newsletter-config.php`**: Configuración centralizada
  - Constantes de email y URLs
  - Funciones helper (validación, sanitización, envío)
  - Rate limiting settings
  - Logging system

### API Endpoints
- **`api/newsletter/subscribe.php`**: Suscripción con double opt-in
  - Validación de email
  - Rate limiting (3 intentos/hora por IP)
  - Detección de duplicados
  - Envío de email de confirmación
  
- **`api/newsletter/confirm.php`**: Confirmación de suscripción
  - Validación de token
  - Expiración de 48 horas
  - Envío de email de bienvenida
  
- **`api/newsletter/unsubscribe.php`**: Dar de baja
  - Soft delete (activo = FALSE)
  - Por token o email

### Templates de Email
- **`includes/email-templates/newsletter-confirmacion.php`**: Email de confirmación
- **`includes/email-templates/newsletter-bienvenida.php`**: Email de bienvenida

### Frontend
- **`index.php`**: Formulario AJAX integrado (línea 543)
- **`newsletter/gracias.php`**: Página de agradecimiento
- **`newsletter/unsubscribe.php`**: Página de baja

## 🚀 Instalación

### 1. Ejecutar SQL
```bash
# Importar schema en tu base de datos
mysql -u usuario -p database_name < database/setup_newsletter.sql
```

### 2. Configurar
Editar `includes/newsletter-config.php` si es necesario:
- Cambiar URLs si no es `praxisseguridad.es`
- Ajustar email de envío
- Modo desarrollo/producción

### 3. Permisos
```bash
# Crear directorio de logs
mkdir logs
chmod 755 logs
```

## 📧 Flujo de Suscripción

1. **Usuario se suscribe** en `index.php`
   - POST a `/api/newsletter/subscribe.php`
   - Validación + rate limiting
   - Email de confirmación enviado

2. **Usuario confirma** haciendo click en email
   - GET a `/api/newsletter/confirm.php?token=xxx`
   - Marca como verificado
   - Email de bienvenida enviado
   - Redirige a `/newsletter/gracias.php`

3. **Usuario se da de baja** (opcional)
   - Click en link de unsubscribe
   - POST a `/api/newsletter/unsubscribe.php`
   - Marca como inactivo

## 🧪 Testing

### Test Manual
1. Ir a la home (`index.php`)
2. Suscribirse con tu email
3. Revisar bandeja: email de confirmación
4. Click en "Confirmar suscripción"
5. Revisar bandeja: email de bienvenida
6. Ver página de gracias

### Test API (cURL)
```bash
# Suscribirse
curl -X POST http://localhost/api/newsletter/subscribe.php \
  -H "Content-Type: application/json" \
  -d '{"email": "test@example.com"}'

# Unsubscribe
curl -X POST http://localhost/api/newsletter/unsubscribe.php \
  -H "Content-Type: application/json" \
  -d '{"email": "test@example.com"}'
```

### Verificar BD
```sql
-- Ver suscriptores
SELECT * FROM newsletters ORDER BY fecha_suscripcion DESC;

-- Ver solo verificados
SELECT * FROM newsletters WHERE verificado = TRUE AND activo = TRUE;

-- Estadísticas
SELECT 
    COUNT(*) as total,
    SUM(verificado) as verificados,
    SUM(activo) as activos
FROM newsletters;
```

## 🔒 Seguridad

✅ **Implementado:**
- SQL injection protection (prepared statements)
- XSS protection (htmlspecialchars en outputs)
- Rate limiting (3 intentos/hora)
- Email validation (filter_var + regex)
- Token expiration (48h)
- Soft delete (GDPR friendly)

## 📊 Próximos Pasos (Pendientes)

### Panel de Administración
- [ ] `admin/newsletter.php`: Dashboard de suscriptores
- [ ] Estadísticas y gráficos
- [ ] Exportar a CSV
- [ ] Búsqueda y filtros

### Sistema de Envío Masivo
- [ ] `api/newsletter/send.php`: Envío masivo
- [ ] Editor WYSIWYG
- [ ] Preview antes de enviar
- [ ] Tracking de envíos

### Mejoras Opcionales
- [ ] Segmentación de suscriptores
- [ ] A/B testing
- [ ] Estadísticas de apertura (tracking pixel)
- [ ] Estadísticas de clicks
- [ ] Scheduler para envíos programados

## 📁 Estructura de Archivos

```
WEB-2/
├── database/
│   └── setup_newsletter.sql
├── includes/
│   ├── newsletter-config.php
│   └── email-templates/
│       ├── newsletter-confirmacion.php
│       └── newsletter-bienvenida.php
├── api/
│   └── newsletter/
│       ├── subscribe.php
│       ├── confirm.php
│       └── unsubscribe.php
├── newsletter/
│   ├── gracias.php
│   └── unsubscribe.php
├── logs/
│   └── newsletter.log (auto-generado)
└── index.php (formulario integrado)
```

## 🐛 Troubleshooting

### Email no llega
- Verificar configuración SMTP en `php.ini`
- Revisar spam/junk folder
- Verificar logs: `logs/newsletter.log`
- Activar modo desarrollo: `NEWSLETTER_DEV_MODE = true`

### Error en BD
- Verificar que las tablas existen
- Comprobar permisos de usuario MySQL
- Revisar conexión en `includes/db.php`

### Token inválido
- Verificar que no hayan pasado 48h
- Comprobar que el token existe en BD
- Revisar logs para más detalles

## 📝 Logs

Los logs se guardan en `logs/newsletter.log`:
```
[2026-02-04 01:00:00] [info] Nueva suscripción: test@example.com - Token: abc123...
[2026-02-04 01:05:00] [info] Suscripción confirmada: test@example.com
[2026-02-04 01:10:00] [warning] Token inválido: xyz789...
```

## 👨‍💻 Soporte

Para reportar bugs o solicitar features:
- Email: info@praxisseguridad.es
- Tel: 637 474 428

---

**Versión:** 1.0  
**Fecha:** 2026-02-04  
**Autor:** Praxis Seguridad
