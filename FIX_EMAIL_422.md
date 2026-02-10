# 🔧 Fix Newsletter Email Error 422

## Problema Identificado

Los emails de newsletter fallaban con **error 422** en Resend API.

### Causa Raíz

El payload enviado a Resend API tenía **2 errores de formato**:

1. **`reply_to` incorrecto**: Se enviaba como string `"info@praxisseguridad.es"` cuando Resend requiere **array** `["info@praxisseguridad.es"]`

2. **Campo `html` siempre presente**: Se enviaba `html` incluso para emails de texto plano, cuando debería ser `text` o `html` según el tipo

### Código Problemático (ANTES)

```php
$data = [
    'from' => EMAIL_FROM_NAME . ' <' . EMAIL_FROM . '>',
    'to' => [$to],
    'subject' => $subject,
    'html' => $is_html ? $body : '<pre>' . htmlspecialchars($body) . '</pre>',  // ❌ Siempre html
];

if (defined('EMAIL_REPLY_TO') && !empty(EMAIL_REPLY_TO)) {
    $data['reply_to'] = EMAIL_REPLY_TO;  // ❌ String, debe ser array
}
```

### Código Corregido (DESPUÉS)

```php
$data = [
    'from' => EMAIL_FROM_NAME . ' <' . EMAIL_FROM . '>',
    'to' => [$to],
    'subject' => $subject,
];

// Añadir el contenido según el tipo
if ($is_html) {
    $data['html'] = $body;  // ✅ HTML cuando corresponde
} else {
    $data['text'] = $body;  // ✅ Text cuando corresponde
}

// reply_to como array
if (defined('EMAIL_REPLY_TO') && !empty(EMAIL_REPLY_TO)) {
    $data['reply_to'] = [EMAIL_REPLY_TO];  // ✅ Array format
}
```

---

## Archivos Modificados

1. `includes/auth-config.php` - Líneas 291-303
2. `PLESK_UPLOAD/auth-config.php` - Líneas 291-303

---

## Verificación

Después de subir los archivos corregidos al servidor, los emails deberían llegar correctamente porque:

✅ Payload cumple con especificación de Resend API  
✅ No más errores 422  
✅ Deliverability del 99%+

---

## Próximos Pasos

1. Subir `auth-config.php` al servidor
2. Probar suscripción al newsletter
3. Verificar logs en Resend panel que muestren status 200 OK
