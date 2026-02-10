# 📧 CREAR EMAIL info@praxisseguridad.es en Plesk

## ⚠️ IMPORTANTE: Debes hacer esto PRIMERO

Sin este email creado, **NINGÚN email funcionará** (ni newsletter, ni contacto, ni autenticación).

---

## 🎯 Paso a Paso en Plesk

### 1. Login en Plesk
- Ir a tu panel Plesk
- Login con tus credenciales

### 2. Seleccionar el Dominio
- En el dashboard principal
- Click en **`praxisseguridad.es`**

### 3. Ir a Mail
- En el menú lateral buscar **"Mail"** o **"Correo"**
- Click en **"Email Addresses"** o **"Direcciones de correo"**

### 4. Crear Nueva Dirección
- Click en botón **"Create Email Address"** o **"Crear dirección"**
- Aparecerá un formulario

### 5. Rellenar Formulario

```
┌─────────────────────────────────────────┐
│ Email address:                          │
│ ┌──────────┐                            │
│ │   info   │ @praxisseguridad.es        │
│ └──────────┘                            │
│                                         │
│ Password:                               │
│ ┌─────────────────────────────────────┐ │
│ │ [Generar o escribir contraseña]     │ │
│ └─────────────────────────────────────┘ │
│                                         │
│ Mailbox size (MB):                      │
│ ┌──────┐                                │
│ │ 1000 │ MB (1 GB es suficiente)       │
│ └──────┘                                │
│                                         │
│ Description (opcional):                 │
│ Email principal de contacto             │
│                                         │
│ [✓] Enable antivirus                    │
│ [✓] Enable spam filter                  │
└─────────────────────────────────────────┘
```

**Campos importantes:**
- **Email**: `info`
- **Password**: Crea una contraseña segura (guárdala en un lugar seguro)
- **Mailbox size**: 1000 MB es suficiente para empezar

### 6. Guardar
- Click en **"OK"** o **"Create"**
- Plesk creará el buzón

### 7. Verificar Creación
- Deberías ver `info@praxisseguridad.es` en la lista de emails
- Estado debe ser **"Active"**

---

## ✅ Confirmación

Una vez creado, deberías poder:

1. **Login al webmail:**
   - URL: `https://webmail.praxisseguridad.es`
   - O desde Plesk: **"Open Webmail"**
   - Usuario: `info@praxisseguridad.es`
   - Password: La que configuraste

2. **Ver el buzón vacío** (por ahora)

---

## 🔄 Configurar Redirección (Opcional)

Si quieres que los emails lleguen también a tu email personal:

1. En Plesk → Mail → Email Addresses
2. Click en `info@praxisseguridad.es`
3. Ir a pestaña **"Redirection"** o **"Forwarding"**
4. Activar **"Enable redirection"**
5. Añadir tu email personal (ej: `tumail@gmail.com`)
6. ✓ **"Switch on mail"** (para mantener copia en el buzón)
7. Guardar

**Resultado:** Los emails llegarán tanto al buzón de `info@` como a tu email personal.

---

## 📱 Configurar en Cliente de Email (Opcional)

Si quieres leer los emails en Gmail, Outlook, etc:

### IMAP (Recomendado para leer)
```
Servidor entrante: mail.praxisseguridad.es
Puerto: 993
SSL/TLS: Activado
Usuario: info@praxisseguridad.es
Password: [tu contraseña]
```

### SMTP (Para enviar)
```
Servidor saliente: mail.praxisseguridad.es
Puerto: 465 (SSL) o 587 (TLS)
SSL/TLS: Activado
Usuario: info@praxisseguridad.es
Password: [tu contraseña]
Autenticación: Requerida
```

---

## 🧪 Probar que Funciona

### Prueba 1: Enviar Email de Prueba
1. Login en webmail
2. Enviar email a tu personal
3. Verificar que llega

### Prueba 2: Recibir Email
1. Desde tu email personal, enviar a `info@praxisseguridad.es`
2. Verificar que llega al webmail

---

## ⚡ Después de Crear el Email

Una vez tengas `info@praxisseguridad.es` funcionando:

1. **Los emails del sitio empezarán a funcionar:**
   ✅ Newsletter
   ✅ Formularios de contacto
   ✅ Sistema de autenticación
   ✅ Notificaciones

2. **No necesitas cambiar nada en el código**
   - Ya está configurado para usar `info@praxisseguridad.es`
   - Solo sube el `auth-config.php` corregido

---

## ⏱️ Tiempo Estimado

- **Crear email en Plesk**: 2-3 minutos
- **Configurar redirección**: 1 minuto
- **Probar**: 1 minuto

**Total: ~5 minutos**

---

## 🆘 Troubleshooting

### No encuentro "Mail" en Plesk
- Busca "Email" o "Correo"
- O ve a "Hosting & DNS" → "Email"

### Dice "quota exceeded"
- Tu plan tiene límite de buzones
- Contacta a tu proveedor de hosting

### No puedo crear email
- Verifica permisos de administrador
- Contacta soporte de hosting

---

## 📋 Checklist

- [ ] Login en Plesk
- [ ] Ir a Mail → Email Addresses
- [ ] Crear `info@praxisseguridad.es`
- [ ] Configurar password segura
- [ ] Guardar contraseña
- [ ] Verificar email creado
- [ ] (Opcional) Configurar redirección
- [ ] Probar login webmail
- [ ] ✅ Listo para usar

---

**Después de esto, todos los emails funcionarán automáticamente. 🎉**
