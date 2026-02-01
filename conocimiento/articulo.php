<?php
/**
 * Praxis Seguridad - Artículo Individual
 * Vista de un artículo del centro de conocimiento
 */

$cat_id = $_GET['cat'] ?? '';
$articulo_id = $_GET['id'] ?? '';

// ========================================
// CONTENIDO DE ARTÍCULOS (EDITABLE MANUALMENTE)
// Añade aquí el contenido completo de cada artículo
// ========================================
$contenido_articulos = [
    
    // ========== CCTV ==========
    'configuracion-nvr-hikvision' => [
        'titulo' => 'Configuración inicial de NVR Hikvision',
        'categoria' => 'CCTV y Videovigilancia',
        'categoria_id' => 'cctv',
        'fecha' => '2024-01-20',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '8 min',
        'acceso' => 'public',
        'contenido' => '
## Introducción

Los grabadores de red (NVR) Hikvision son una de las opciones más populares para sistemas de videovigilancia profesionales. En esta guía te explico paso a paso cómo configurar tu NVR desde cero.

## Requisitos previos

Antes de empezar, asegúrate de tener:

- NVR Hikvision conectado a la red
- Cámaras IP compatibles
- Cable de red y router
- Monitor o TV con entrada HDMI/VGA
- Ratón USB

## Paso 1: Conexión física

1. Conecta el NVR a la corriente eléctrica
2. Conecta el cable de red al router
3. Conecta el monitor mediante HDMI o VGA
4. Conecta el ratón USB

## Paso 2: Configuración inicial

Al encender el NVR por primera vez, aparecerá un asistente de configuración:

### 2.1 Idioma y zona horaria
- Selecciona **Español** como idioma
- Configura la zona horaria: **GMT+1 (Madrid)**

### 2.2 Contraseña de administrador
- Crea una contraseña segura (mínimo 8 caracteres, mayúsculas, minúsculas y números)
- **¡Importante!** Guarda esta contraseña en un lugar seguro

### 2.3 Configuración de red
- **DHCP**: Recomendado para configuración inicial
- **IP estática**: Recomendado para instalación definitiva

## Paso 3: Añadir cámaras

### Método automático (Plug & Play)
Si las cámaras están en la misma red, el NVR las detectará automáticamente:

1. Ve a **Configuración > Cámara > Cámara IP**
2. Haz clic en **Buscar**
3. Selecciona las cámaras detectadas
4. Introduce la contraseña de cada cámara
5. Haz clic en **Añadir**

### Método manual
Para añadir cámaras de otras marcas o redes diferentes:

1. Ve a **Configuración > Cámara > Cámara IP**
2. Haz clic en **Añadir manualmente**
3. Introduce:
   - Dirección IP de la cámara
   - Puerto (normalmente 8000 o 554)
   - Usuario y contraseña
4. Selecciona el protocolo (ONVIF, RTSP, etc.)

## Paso 4: Configurar grabación

### Grabación continua 24/7
1. Ve a **Configuración > Grabación > Programación**
2. Selecciona todas las cámaras
3. Marca **Grabación continua**
4. Aplica a todos los días

### Grabación por detección de movimiento
1. Ve a **Configuración > Evento > Detección de movimiento**
2. Activa la detección para cada cámara
3. Ajusta la sensibilidad
4. En **Programación de grabación**, selecciona **Por eventos**

## Paso 5: Acceso remoto

### Hik-Connect (Cloud P2P)
La forma más sencilla de acceso remoto:

1. Ve a **Configuración > Red > Acceso a plataforma**
2. Activa **Hik-Connect**
3. Escanea el código QR con la app móvil
4. Sigue las instrucciones en pantalla

### DDNS
Para acceso sin servicios cloud:

1. Contrata un servicio DDNS (ej: No-IP)
2. Ve a **Configuración > Red > DDNS**
3. Introduce tus credenciales DDNS
4. Configura el reenvío de puertos en tu router

## Consejos finales

- **Actualiza el firmware** regularmente
- **Cambia las contraseñas por defecto** de todas las cámaras
- **Haz copias de seguridad** de la configuración
- **Revisa los discos duros** periódicamente

## ¿Necesitas ayuda?

Si tienes problemas con la configuración, puedo ayudarte:

📞 **+34 637 474 428**
💬 **wa.me/34637474428**
        '
    ],
    
    'tipos-camaras-seguridad' => [
        'titulo' => 'Tipos de cámaras de seguridad: guía completa',
        'categoria' => 'CCTV y Videovigilancia',
        'categoria_id' => 'cctv',
        'fecha' => '2024-01-18',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '10 min',
        'acceso' => 'public',
        'contenido' => '
## Introducción

Elegir la cámara adecuada es fundamental para un sistema de videovigilancia efectivo. En esta guía te explico los diferentes tipos de cámaras y cuándo usar cada una.

## Clasificación por tecnología

### Cámaras IP (Red)
Las más modernas y versátiles:

**Ventajas:**
- Alta resolución (hasta 4K/8MP o más)
- Transmisión por cable de red o WiFi
- Alimentación PoE (un solo cable)
- Análisis de vídeo integrado (IA)
- Escalabilidad sin límites

**Desventajas:**
- Precio más elevado
- Requiere conocimientos de redes
- Mayor consumo de ancho de banda

**Ideal para:** Instalaciones nuevas, empresas, aplicaciones profesionales.

### Cámaras analógicas HD (HDCVI/HDTVI/AHD)
Evolución de las analógicas tradicionales:

**Ventajas:**
- Precio competitivo
- Instalación sencilla (cable coaxial)
- Compatible con infraestructura existente
- Resolución hasta 4K

**Desventajas:**
- Limitación de distancia (hasta 500m)
- Menos funcionalidades avanzadas
- Sin análisis de IA nativo

**Ideal para:** Modernizar instalaciones antiguas, presupuestos ajustados.

## Clasificación por formato

### Cámaras Bullet
Formato cilíndrico, diseño disuasorio:

- ✅ Mayor alcance de infrarrojos
- ✅ Efecto disuasorio visible
- ✅ Fácil instalación en exteriores
- ❌ Más expuestas a vandalismo

**Uso típico:** Exteriores, parkings, perímetros.

### Cámaras Domo
Formato semiesférico, discretas:

- ✅ Diseño discreto
- ✅ Resistentes a vandalismo (IK10)
- ✅ Difícil identificar hacia dónde graban
- ❌ Menor alcance de IR

**Uso típico:** Interiores, comercios, oficinas.

### Cámaras Turret
Híbrido entre bullet y domo:

- ✅ Compactas y versátiles
- ✅ Sin reflejos en la cúpula
- ✅ Económicas
- ❌ Menos resistentes que domo

**Uso típico:** Todo uso, interior/exterior.

### Cámaras PTZ
Pan-Tilt-Zoom (movimiento y zoom):

- ✅ Control remoto de orientación
- ✅ Zoom óptico potente (hasta 40x)
- ✅ Seguimiento automático
- ❌ Coste elevado
- ❌ Partes móviles = más mantenimiento

**Uso típico:** Grandes superficies, vigilancia activa.

## Clasificación por función especial

### Cámaras térmicas
Detectan calor, no necesitan luz:

- Ideal para perímetros
- Detección de intrusos a larga distancia
- Precio muy elevado

### Cámaras LPR/ANPR
Lectura de matrículas:

- Reconocimiento automático
- Control de accesos vehicular
- Bases de datos de matrículas

### Cámaras antideflagrantes
Para entornos explosivos (ATEX):

- Industria petroquímica
- Silos de grano
- Zonas con gases

## ¿Qué resolución necesito?

| Resolución | Megapíxeles | Uso recomendado |
|------------|-------------|-----------------|
| 1080p | 2 MP | General, interiores |
| 2K | 4 MP | Exteriores, identificación |
| 4K | 8 MP | Reconocimiento facial, forense |

## Consejos de compra

1. **No compres por precio**: Una cámara barata puede salir cara
2. **Considera el almacenamiento**: Más resolución = más espacio
3. **Piensa en el futuro**: Elige sistemas escalables
4. **Consulta a un profesional**: Cada instalación es única

## ¿Necesitas asesoramiento?

Te ayudo a elegir las cámaras adecuadas para tu caso:

📞 **+34 637 474 428**
        '
    ],
    
    // ========== ALARMAS ==========
    'elegir-sistema-alarma' => [
        'titulo' => 'Cómo elegir un sistema de alarma',
        'categoria' => 'Sistemas de Alarma',
        'categoria_id' => 'alarmas',
        'fecha' => '2024-01-18',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '9 min',
        'acceso' => 'public',
        'contenido' => '
## ¿Por qué necesitas este artículo?

El mercado de alarmas está lleno de comerciales agresivos que venden lo que les interesa a ellos, no lo que necesitas tú. Como consultor independiente, te explico cómo elegir bien.

## Tipos de sistemas de alarma

### Alarmas conectadas a CRA
**CRA = Central Receptora de Alarmas**

Es el sistema más seguro porque incluye vigilancia profesional 24/7.

**Cómo funciona:**
1. Se dispara la alarma
2. La CRA recibe el aviso instantáneamente
3. Verifican si es real o falsa alarma
4. Avisan a la policía si es necesario

**Costes típicos:**
- Instalación: 200-500€
- Cuota mensual: 30-50€

**Importante:** La Ley de Seguridad Privada obliga a conectar a CRA en establecimientos que almacenen bienes valiosos (joyerías, bancos, etc.)

### Alarmas sin CRA (locales)
Solo emiten sirena y notificación al móvil.

**Ventajas:**
- Sin cuota mensual
- Tú gestionas los avisos

**Desventajas:**
- Sin verificación profesional
- La policía no acude automáticamente
- Tú eres responsable de actuar

### Alarmas de grado

| Grado | Uso típico | Requisitos |
|-------|------------|------------|
| Grado 1 | Viviendas sin objetos valiosos | Mínimos |
| Grado 2 | Viviendas y pequeños comercios | Batería 12h, comunicación doble vía |
| Grado 3 | Joyerías, armerías, casinos | Batería 24h, doble vía comunicación, anti-inhibición |
| Grado 4 | Instalaciones militares, explosivos | Máxima seguridad |

## ¿Qué detectores necesito?

### Obligatorios
- **Contactos magnéticos** en puertas y ventanas principales
- **Detector PIR** (movimiento) en zonas de paso
- **Sirena interior** (mínimo 90 dB)

### Recomendados
- **Detector de rotura de cristal**
- **Detector de humo/CO**
- **Sirena exterior** con flash
- **Detector perimetral** (barrera IR)

### Opcionales
- **Cámaras con verificación de alarma**
- **Pulsador de pánico**
- **Control de accesos integrado**

## Preguntas que hacerte

1. **¿Qué protejo?** (vivienda, negocio, nave...)
2. **¿Cuánto tiempo está vacío?**
3. **¿Hay mascotas?** (necesitarás detectores antimascota)
4. **¿Tengo buena cobertura móvil/internet?**
5. **¿Cuál es mi presupuesto mensual?**

## Errores comunes a evitar

❌ **Comprar por impulso** tras visita de comercial
❌ **Firmar permanencia** de 24-36 meses sin leer
❌ **Instalar sin estudio previo** de riesgos
❌ **Escatimar en detectores** (dejar zonas sin cubrir)
❌ **No probar el sistema** regularmente

## Mi recomendación

Antes de contratar cualquier alarma:

1. Solicita **varios presupuestos**
2. Pide que te expliquen **exactamente qué cubren**
3. **No firmes nada** en la primera visita
4. Si tienes dudas, **pide una segunda opinión**

## Servicio de segunda opinión

Por solo 50€ reviso cualquier presupuesto que te hayan dado y te digo:
- Si el precio es justo
- Si los componentes son adecuados
- Qué te sobra y qué te falta

📞 **+34 637 474 428**
        '
    ],
    
    'detectores-pir-ubicacion' => [
        'titulo' => 'Detectores PIR: tipos y ubicación correcta',
        'categoria' => 'Sistemas de Alarma',
        'categoria_id' => 'alarmas',
        'fecha' => '2024-01-12',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '7 min',
        'acceso' => 'public',
        'contenido' => '
## ¿Qué es un detector PIR?

PIR significa **Passive Infrared** (Infrarrojo Pasivo). Estos detectores captan los cambios de temperatura causados por el movimiento de personas o animales.

## Cómo funciona

1. El detector tiene una lente Fresnel que divide el campo de visión en zonas
2. Cuando una persona cruza de una zona a otra, genera un cambio de temperatura
3. El sensor detecta este cambio y dispara la alarma

**Importante:** No detectan "movimiento" sino "cambio térmico en movimiento".

## Tipos de detectores PIR

### Por cobertura
| Tipo | Ángulo | Alcance | Uso |
|------|--------|---------|-----|
| Estándar | 90-110° | 12-15m | Habitaciones |
| Gran angular | 120-140° | 10-12m | Pasillos anchos |
| Largo alcance | 15-30° | 20-40m | Pasillos largos |
| Cortina | 5-10° | 15m | Ventanas, accesos |
| 360° | 360° | 8-10m | Techos, centros |

### Por tecnología
- **PIR simple**: Económico, más falsas alarmas
- **Doble PIR**: Dos sensores, más fiable
- **PIR + Microondas**: Doble tecnología, muy fiable
- **PIR antimascota**: Ignora animales hasta 25-40kg
- **PIR exterior**: Preparado para intemperie

## Ubicación correcta

### ✅ Dónde SÍ colocarlos

- **Esquinas de habitaciones** (máxima cobertura)
- **Zonas de paso obligado** (pasillos, escaleras)
- **Mirando hacia puertas y ventanas** (detectar entrada)
- **A 2,0-2,4m de altura** (según fabricante)

### ❌ Dónde NO colocarlos

- **Frente a ventanas con sol directo** (falsas alarmas)
- **Cerca de fuentes de calor** (radiadores, estufas)
- **Apuntando a aire acondicionado** (corrientes)
- **Zonas con mascotas** (si no es antimascota)
- **Detrás de muebles u obstáculos**

## Causas de falsas alarmas

1. **Sol directo** a través de ventanas
2. **Calefacción/aire acondicionado** encendiéndose
3. **Mascotas** (gatos que trepan, perros grandes)
4. **Insectos** dentro del detector
5. **Sensibilidad excesiva** mal configurada
6. **Mala ubicación** del detector

## Consejos de instalación

- **No instales solo uno**: Mínimo 2 para crear redundancia
- **Solapamiento**: Que las zonas de cobertura se crucen
- **Prueba el sistema**: Camina por toda la casa y verifica detección
- **Ajusta sensibilidad**: Empieza baja y sube si es necesario
- **Limpia periódicamente**: El polvo reduce eficacia

## Detectores antimascota

### ¿Cómo funcionan?
- Ignoran calor por debajo de cierta altura
- Distinguen peso/tamaño del cuerpo
- Algoritmos específicos para animales

### Limitaciones
- No son infalibles (gato subido a mueble = alarma)
- Múltiples mascotas pueden sumar calor
- Animales muy grandes pueden disparar

## ¿Problemas con falsas alarmas?

Te ayudo a revisar tu sistema y eliminar las falsas alarmas:

📞 **+34 637 474 428**
        '
    ],
    
    // ========== RGPD ==========
    'guia-rgpd-empresas' => [
        'titulo' => 'Guía RGPD para empresas: todo lo que debes saber',
        'categoria' => 'Protección de Datos',
        'categoria_id' => 'rgpd',
        'fecha' => '2024-01-20',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '15 min',
        'acceso' => 'public',
        'contenido' => '
## ¿Qué es el RGPD?

El **Reglamento General de Protección de Datos** (RGPD) es la normativa europea que regula cómo las organizaciones deben tratar los datos personales.

Entró en vigor el **25 de mayo de 2018** y afecta a TODAS las empresas que traten datos de ciudadanos europeos.

## ¿A quién aplica?

El RGPD aplica a:

- ✅ Cualquier empresa con sede en la UE
- ✅ Empresas fuera de la UE que traten datos de europeos
- ✅ Autónomos
- ✅ Asociaciones, fundaciones, ONGs
- ✅ Administraciones públicas

**No hay excepciones por tamaño.** Un autónomo tiene las mismas obligaciones que una multinacional.

## Principios fundamentales

### 1. Licitud, lealtad y transparencia
- Solo puedes tratar datos con una base legal válida
- Debes informar claramente qué haces con los datos

### 2. Limitación de la finalidad
- Solo usar datos para el fin que dijiste
- No puedes usar datos de clientes para marketing si no lo consintieron

### 3. Minimización de datos
- Solo recoger los datos estrictamente necesarios
- ¿Necesitas el DNI de un cliente para venderle una camiseta? No.

### 4. Exactitud
- Los datos deben estar actualizados
- Debes permitir rectificación

### 5. Limitación del plazo de conservación
- No guardar datos más tiempo del necesario
- Definir plazos de borrado

### 6. Integridad y confidencialidad
- Proteger los datos contra accesos no autorizados
- Medidas de seguridad técnicas y organizativas

## Obligaciones principales

### 📋 Registro de Actividades de Tratamiento (RAT)
Documento interno que describe:
- Qué datos tratas
- Para qué finalidad
- Quién tiene acceso
- Plazos de conservación
- Medidas de seguridad

### 📄 Cláusulas informativas
Debes informar a los interesados:
- Quién eres (responsable)
- Para qué usas sus datos
- Durante cuánto tiempo
- Sus derechos
- Si compartes datos con terceros

### ✋ Obtener consentimiento (cuando sea necesario)
El consentimiento debe ser:
- **Libre**: Sin condicionamientos
- **Específico**: Para finalidades concretas
- **Informado**: Saber qué aceptas
- **Inequívoco**: Acción afirmativa clara

### 🤝 Contratos con encargados
Si contratas servicios que acceden a datos (gestoría, hosting, marketing...):
- Contrato de encargado de tratamiento
- Verificar garantías del proveedor

### 🔐 Medidas de seguridad
- Según el riesgo de los tratamientos
- Técnicas: cifrado, copias, accesos
- Organizativas: formación, políticas

### 🚨 Notificación de brechas
Si hay violación de seguridad:
- Notificar a la AEPD en 72 horas
- Notificar a afectados si hay riesgo alto

## Derechos de los ciudadanos

Los interesados pueden ejercer:

| Derecho | Descripción | Plazo respuesta |
|---------|-------------|-----------------|
| Acceso | Saber qué datos tienes | 1 mes |
| Rectificación | Corregir datos erróneos | 1 mes |
| Supresión | Borrar sus datos | 1 mes |
| Oposición | No querer recibir publicidad | 1 mes |
| Portabilidad | Llevarse sus datos | 1 mes |
| Limitación | Restringir el uso | 1 mes |

## Sanciones

Las multas por incumplimiento pueden ser:

- **Infracciones leves**: Hasta 40.000€
- **Infracciones graves**: Hasta 300.000€
- **Infracciones muy graves**: Hasta 20 millones € o 4% facturación global

**Casos reales en España:**
- Vodafone: 8 millones €
- Google: 10 millones €
- Caixabank: 6 millones €

## Checklist rápido

- [ ] ¿Tienes política de privacidad en la web?
- [ ] ¿Tienes cláusulas en formularios?
- [ ] ¿Tienes Registro de Actividades de Tratamiento?
- [ ] ¿Formas a tus empleados?
- [ ] ¿Tienes contratos con tus proveedores?
- [ ] ¿Sabes cómo gestionar una brecha?
- [ ] ¿Necesitas un DPO?

## ¿Necesitas ayuda con el RGPD?

Como DPO certificado, puedo:
- Auditar tu cumplimiento actual
- Implementar toda la documentación
- Actuar como tu DPO externo

📞 **+34 637 474 428**
        '
    ],
    
    // ========== CONTROL DE ACCESOS ==========
    'tipos-control-accesos' => [
        'titulo' => 'Tipos de sistemas de control de accesos',
        'categoria' => 'Control de Accesos',
        'categoria_id' => 'accesos',
        'fecha' => '2024-01-15',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '10 min',
        'acceso' => 'public',
        'contenido' => '
## Introducción

El control de accesos es una pieza clave en cualquier sistema de seguridad. En esta guía te explico los diferentes tipos de tecnologías disponibles y cuándo usar cada una.

## Tipos de tecnologías de identificación

### Tarjetas RFID/Proximidad

La tecnología más extendida en entornos empresariales.

**Cómo funciona:**
- La tarjeta contiene un chip con un código único
- El lector detecta la tarjeta por radiofrecuencia (sin contacto)
- El sistema valida el código y autoriza o deniega el acceso

**Ventajas:**
- Económico y fiable
- Fácil de usar
- Sin mantenimiento

**Desventajas:**
- Se puede perder o robar
- No confirma identidad (cualquiera puede usar la tarjeta)

### Códigos PIN/Teclados

Identificación mediante código numérico.

**Ventajas:**
- Bajo coste de implantación
- No hay elementos físicos que perder

**Desventajas:**
- Los códigos se comparten
- Riesgo de observación (shoulder surfing)
- Códigos simples son vulnerables

### Biométricos

Identificación por características físicas únicas.

**Tipos:**
- Huella dactilar (más común)
- Reconocimiento facial
- Iris/retina
- Geometría de mano
- Venas de la mano

**Ventajas:**
- No se puede perder ni robar
- Confirma identidad real
- Sin elementos físicos que gestionar

**Desventajas:**
- Mayor coste
- Implicaciones RGPD (dato sensible)
- Puede fallar con suciedad, heridas...

### Sistemas Bluetooth/Móvil

Control desde smartphone.

**Ventajas:**
- Sin tarjeta adicional (usas tu móvil)
- Actualizaciones remotas
- Registro detallado

**Desventajas:**
- Dependencia de batería del móvil
- Requiere app instalada

## Combinaciones recomendadas

### Seguridad básica
- Tarjeta RFID + código PIN

### Seguridad media
- Huella dactilar + tarjeta RFID

### Alta seguridad
- Huella dactilar + reconocimiento facial
- O tres factores: tarjeta + PIN + biométrico

## Elementos del sistema

### Lectores
- De pared (entrada)
- Tipo teclado
- Con pantalla táctil
- Empotrados o superficie

### Controladores
- Gestionan puertas y lectores
- Almacenan usuarios y permisos
- Conexión a red para gestión remota

### Elementos de cierre
- Cerraderos eléctricos
- Electroimanes (300kg, 600kg...)
- Cerraduras motorizadas
- Tornos/barreras

## Consideraciones RGPD

**Importante:** Los datos biométricos son datos sensibles según el RGPD.

**Debes:**
- Realizar evaluación de impacto
- Tener consentimiento explícito o base legal
- Informar a los trabajadores/usuarios
- Garantizar la seguridad de los datos

## ¿Necesitas asesoramiento?

Te ayudo a diseñar el sistema de control de accesos adecuado:

📞 **+34 637 474 428**
        '
    ],
    
    'biometricos-huella-facial' => [
        'titulo' => 'Sistemas biométricos: huella vs reconocimiento facial',
        'categoria' => 'Control de Accesos',
        'categoria_id' => 'accesos',
        'fecha' => '2024-01-10',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '8 min',
        'acceso' => 'public',
        'contenido' => '
## Introducción

La biometría ofrece la identificación más segura, pero ¿qué tecnología elegir? Comparo huella dactilar y reconocimiento facial.

## Huella dactilar

### Ventajas
- Tecnología madura y probada
- Coste razonable
- Alta precisión (error < 0.001%)
- Rápido (< 1 segundo)

### Desventajas
- Requiere contacto físico
- Problemas con manos sucias/mojadas
- Heridas pueden afectar lectura
- Higiene en tiempos de pandemia

### Ideal para
- Oficinas y empresas
- Control horario
- Zonas con acceso frecuente

## Reconocimiento facial

### Ventajas
- Sin contacto (higiénico)
- Funciona caminando (no hay que pararse)
- Puede detectar mascarilla, temperatura
- Experiencia de usuario moderna

### Desventajas
- Mayor coste inicial
- Puede confundirse con fotos (modelos básicos)
- Iluminación afecta rendimiento
- Gemelos pueden ser problema

### Ideal para
- Recepciones de alto tráfico
- Entornos que requieren higiene
- Edificios con imagen moderna
- Control de aforo

## Comparativa técnica

| Característica | Huella | Facial |
|----------------|--------|--------|
| Coste terminal | 150-400€ | 300-800€ |
| Velocidad | 0.5-1s | 0.3-0.5s |
| Precisión | 99.9% | 99.5% |
| Contacto | Sí | No |
| Usuarios máx. | 3.000-10.000 | 5.000-50.000 |

## Consideraciones legales

Ambas tecnologías tratan **datos biométricos** (categoría especial RGPD).

**Obligaciones:**
- Realizar EIPD (Evaluación de Impacto)
- Base legal para el tratamiento
- Información clara a usuarios
- Medidas de seguridad reforzadas
- No conservar más tiempo del necesario

## Mi recomendación

- **Para pymes**: Huella dactilar (mejor relación calidad/precio)
- **Alta rotación/tráfico**: Reconocimiento facial
- **Máxima seguridad**: Combinación de ambos

## ¿Dudas sobre qué sistema elegir?

📞 **+34 637 474 428**
        '
    ],
    
    'cerraduras-inteligentes' => [
        'titulo' => 'Cerraduras inteligentes: Tedee, Ezviz y más',
        'categoria' => 'Control de Accesos',
        'categoria_id' => 'accesos',
        'fecha' => '2023-12-28',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '9 min',
        'acceso' => 'public',
        'contenido' => '
## Introducción

Las cerraduras inteligentes permiten controlar el acceso a tu hogar o negocio desde el móvil. Analizamos las opciones más populares.

## Tedee

### Características
- Diseño europeo (compatible con bombillos europeos)
- App muy intuitiva
- Integración con HomeKit, Google, Alexa
- Bloqueo automático

### Modelos
- **Tedee GO**: Versión económica, Bluetooth
- **Tedee PRO**: WiFi incluido, más funciones

### Precio
- Tedee GO: ~199€
- Tedee PRO: ~299€
- Bridge WiFi (para GO): ~79€

## Ezviz L2

### Características
- Lector de huella integrado
- Teclado numérico
- Tarjetas RFID
- App Ezviz

### Ideal para
- Oficinas pequeñas
- Alquileres vacacionales
- Quien busca todo-en-uno

### Precio
- Desde 249€

## Nuki

### Características
- Marca austriaca muy popular
- Compatible con la mayoría de cerraduras europeas
- Excelente app
- Muchas integraciones

### Modelos
- Nuki Smart Lock 3.0
- Nuki Smart Lock 3.0 Pro (WiFi integrado)

### Precio
- Modelo básico: ~149€
- Pro con WiFi: ~249€

## Comparativa

| Marca | Huella | Teclado | WiFi | Precio desde |
|-------|--------|---------|------|--------------|
| Tedee | No | No | Opcional | 199€ |
| Ezviz | Sí | Sí | Sí | 249€ |
| Nuki | No | Opcional | Opcional | 149€ |

## Consideraciones de seguridad

### Ventajas
- Control de accesos remotos
- Códigos temporales para visitas
- Historial de accesos
- No hay llaves que copiar

### Precauciones
- WiFi doméstico debe ser seguro
- Contraseñas robustas
- Actualizar firmware regularmente
- Tener método de entrada alternativo (llave física)

## ¿Cerradura inteligente para tu negocio?

Si necesitas asesoramiento profesional:

📞 **+34 637 474 428**
        '
    ],
    
    'control-presencia' => [
        'titulo' => 'Control de presencia y fichaje: normativa laboral',
        'categoria' => 'Control de Accesos',
        'categoria_id' => 'accesos',
        'fecha' => '2023-12-20',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '7 min',
        'acceso' => 'public',
        'contenido' => '
## Obligación legal de fichaje

Desde el **12 de mayo de 2019**, todas las empresas en España están obligadas a registrar la jornada laboral de sus trabajadores.

## ¿Qué dice la ley?

El Real Decreto-ley 8/2019 establece:

- Registro diario de jornada obligatorio
- Debe incluir hora de inicio y fin
- Conservar registros 4 años
- A disposición de trabajadores e Inspección

## Sanciones por incumplimiento

| Gravedad | Multa |
|----------|-------|
| Leve | 60-625€ |
| Grave | 625-6.250€ |
| Muy grave | 6.250-187.515€ |

## Sistemas de fichaje válidos

### Sistemas físicos
- Huella dactilar
- Tarjeta RFID
- Reconocimiento facial
- Código PIN

### Sistemas digitales
- Apps móviles
- Fichaje web
- Software de escritorio

### Sistemas mixtos
- Los más recomendables
- Fichaje físico + gestión digital

## Requisitos del sistema

**Debe garantizar:**
- Fiabilidad del registro
- No manipulable por el trabajador
- Acceso para el trabajador a sus datos
- Conservación durante 4 años
- Protección de datos (RGPD)

## RGPD y fichaje

### Si usas biometría:
- Es dato sensible (categoría especial)
- Requiere base legal reforzada
- Los trabajadores deben ser informados
- Realizar Evaluación de Impacto

### Alternativas menos invasivas:
- Tarjeta RFID
- PIN con token
- App con geolocalización (con consentimiento)

## ¿Qué sistema elegir?

**Pequeña empresa (< 10):** App móvil o fichaje web

**Mediana empresa (10-50):** Terminal de fichaje + software

**Gran empresa (> 50):** Sistema integrado con RRHH

## ¿Necesitas implementar control de presencia?

Te asesoro sobre la mejor solución:

📞 **+34 637 474 428**
        '
    ],
    
    // ========== MANUALES TÉCNICOS ==========
    'guia-rapida-dahua' => [
        'titulo' => 'Guía rápida DVR/NVR Dahua',
        'categoria' => 'Manuales Técnicos',
        'categoria_id' => 'manuales',
        'fecha' => '2024-01-05',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '8 min',
        'acceso' => 'public',
        'contenido' => '
## Configuración inicial en 10 pasos

### Paso 1: Conexiones físicas
- Conecta el grabador a la corriente
- Conecta cable de red al router
- Conecta monitor por HDMI/VGA
- Conecta ratón USB

### Paso 2: Primer arranque
- Espera a que cargue el sistema
- Aparecerá el asistente de configuración

### Paso 3: Crear contraseña
- Mínimo 8 caracteres
- Combina mayúsculas, minúsculas y números
- Guárdala en lugar seguro

### Paso 4: Configurar red
**DHCP (recomendado al inicio):**
- Activa DHCP
- El router asignará IP automáticamente

**IP estática (para instalación definitiva):**
- IP: 192.168.1.X (X = número único)
- Máscara: 255.255.255.0
- Puerta de enlace: 192.168.1.1

### Paso 5: Añadir cámaras

**Detección automática:**
1. Ve a Configuración > Cámara > Añadir cámara
2. Pulsa Buscar
3. Selecciona las cámaras
4. Introduce contraseña
5. Pulsa Añadir

### Paso 6: Configurar grabación
- Ve a Configuración > Almacenamiento > Programación
- Selecciona tipo: Continua, Movimiento o Alarma
- Aplica a todos los canales

### Paso 7: Configurar detección de movimiento
- Ve a Configuración > Evento > Detección movimiento
- Activa para cada cámara
- Ajusta sensibilidad
- Define zonas de detección

### Paso 8: Acceso remoto (DMSS/gDMSS)
1. Descarga la app DMSS (móvil)
2. En el grabador: Configuración > Red > P2P
3. Escanea el código QR con la app
4. Añade el dispositivo

### Paso 9: Configurar usuarios
- Ve a Configuración > Sistema > Cuenta
- Crea usuarios con permisos específicos
- No uses admin para el día a día

### Paso 10: Copia de seguridad de configuración
- Ve a Configuración > Sistema > Importar/Exportar
- Exporta configuración a USB
- Guárdala en lugar seguro

## Acceso por navegador web

1. Abre navegador (Chrome recomendado)
2. Escribe la IP del grabador
3. Descarga e instala el plugin
4. Inicia sesión

## Solución de problemas comunes

**No detecta cámaras:**
- Verifica que están en la misma red
- Comprueba contraseñas
- Reinicia cámara

**No graba:**
- Verifica disco duro formateado
- Comprueba programación de grabación
- Revisa espacio disponible

**No accede remotamente:**
- Verifica conexión a internet
- Comprueba P2P activado
- Actualiza firmware

## ¿Problemas con tu Dahua?

📞 **+34 637 474 428**
        '
    ],
    
    'configuracion-ezviz-app' => [
        'titulo' => 'Configuración app Ezviz: guía completa',
        'categoria' => 'Manuales Técnicos',
        'categoria_id' => 'manuales',
        'fecha' => '2023-12-28',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '10 min',
        'acceso' => 'public',
        'contenido' => '
## Introducción

Ezviz es la marca de consumo de Hikvision. Su app permite gestionar cámaras, videoporteros y dispositivos smart home.

## Paso 1: Descargar la app

- **iOS**: App Store > buscar "Ezviz"
- **Android**: Google Play > buscar "Ezviz"

## Paso 2: Crear cuenta

1. Abre la app
2. Pulsa "Registrarse"
3. Introduce tu email
4. Crea contraseña segura
5. Verifica el email recibido

## Paso 3: Añadir dispositivo

### Método QR (recomendado)
1. Pulsa "+" en la app
2. Selecciona "Escanear código QR"
3. Escanea el QR del dispositivo
4. Sigue las instrucciones

### Método manual
1. Pulsa "+" > "Añadir manualmente"
2. Introduce número de serie
3. Introduce código de verificación

## Paso 4: Conectar a WiFi

1. La app buscará redes WiFi
2. Selecciona tu red
3. Introduce contraseña WiFi
4. Espera conexión (puede tardar 1-2 min)

## Configuración de notificaciones

### Activar alertas de movimiento
1. Selecciona la cámara
2. Pulsa icono engranaje (⚙️)
3. Ve a "Notificaciones"
4. Activa "Notificaciones inteligentes"

### Personalizar sensibilidad
1. Configuración > Detección
2. Ajusta sensibilidad (baja/media/alta)
3. Define horarios de detección

## Grabación en la nube

### Planes disponibles
- **7 días**: ~3.99€/mes
- **30 días**: ~7.99€/mes

### Activar CloudPlay
1. Configuración > Servicio de nube
2. Selecciona plan
3. Introduce método de pago

## Compartir dispositivo

1. Ve a Configuración del dispositivo
2. Pulsa "Compartir dispositivo"
3. Introduce email del otro usuario
4. El otro usuario recibirá invitación

**Nota:** Puedes limitar permisos del usuario compartido.

## Visualización en TV

### Chromecast/Google TV
1. Abre la app
2. Pulsa icono de casting
3. Selecciona tu dispositivo

### Amazon Alexa/Echo Show
1. Habilita skill "Ezviz" en Alexa
2. Vincula tu cuenta
3. Di "Alexa, muestra la cámara del salón"

## Solución de problemas

**Cámara offline:**
- Verifica WiFi funcionando
- Acerca cámara al router
- Reinicia la cámara

**No recibo notificaciones:**
- Verifica permisos de la app
- Comprueba configuración de detección
- Revisa "No molestar" del móvil

**Imagen borrosa:**
- Limpia la lente
- Verifica iluminación
- Comprueba configuración de imagen

## ¿Necesitas ayuda?

📞 **+34 637 474 428**
        '
    ],
    
    // ========== ARTÍCULOS CON REGISTRO REQUERIDO ==========
    
    'manual-hikvision-nvr' => [
        'titulo' => 'Manual NVR Hikvision Serie DS-7600',
        'categoria' => 'Manuales Técnicos',
        'categoria_id' => 'manuales',
        'fecha' => '2024-01-15',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '20 min',
        'acceso' => 'registered',
        'contenido' => '
## Especificaciones Serie DS-7600

La serie DS-7600 de Hikvision es una de las más populares para instalaciones profesionales de pequeño y mediano tamaño.

### Modelos disponibles

| Modelo | Canales | Resolución Max | Salidas | Bahías HDD |
|--------|---------|----------------|---------|------------|
| DS-7604NI-K1 | 4 | 8MP | 1 HDMI | 1 |
| DS-7608NI-K2 | 8 | 8MP | HDMI+VGA | 2 |
| DS-7616NI-K2 | 16 | 8MP | HDMI+VGA | 2 |
| DS-7632NI-K2 | 32 | 8MP | HDMI+VGA | 2 |

## Instalación física

### Requisitos previos
- Cable de alimentación
- Cable de red Cat5e o superior
- Disco duro compatible (WD Purple, Seagate SkyHawk)
- Monitor con HDMI o VGA
- Ratón USB

### Instalación del disco duro
1. Retira los tornillos de la carcasa
2. Conecta el cable SATA al disco
3. Conecta el cable de alimentación al disco
4. Fija el disco con los tornillos
5. Cierra la carcasa

## Configuración inicial

### Paso 1: Asistente de inicio
- Selecciona idioma: Español
- Zona horaria: GMT+1 Madrid
- Acepta términos

### Paso 2: Contraseña
- Mínimo 8 caracteres
- Debe incluir: mayúscula, minúscula, número
- Configura pregunta de seguridad

### Paso 3: Red
**Modo DHCP:**
- Activar DHCP
- El router asigna IP

**Modo estático (recomendado):**
- IP: 192.168.1.64 (ejemplo)
- Máscara: 255.255.255.0
- Puerta: 192.168.1.1
- DNS: 8.8.8.8

### Paso 4: Formatear disco
- Ve a Configuración > Disco duro
- Selecciona disco
- Pulsa Formatear
- Espera a que termine

## Añadir cámaras

### Cámaras Hikvision (Plug & Play)
1. Configuración > Cámara > Añadir
2. Pulsa Buscar
3. Selecciona cámaras encontradas
4. Introduce contraseña de las cámaras
5. Pulsa Añadir

### Cámaras ONVIF (otras marcas)
1. Configuración > Cámara > Añadir
2. Selecciona protocolo ONVIF
3. Introduce IP de la cámara
4. Puerto: 80 o 8080
5. Usuario y contraseña
6. Pulsa Añadir

## Configuración de grabación

### Grabación continua
1. Configuración > Grabación > Programación
2. Selecciona canal
3. Tipo: Continua (azul)
4. Aplica a todos los días

### Grabación por movimiento
1. Configuración > Evento > Detección movimiento
2. Activa para cada cámara
3. Define áreas de detección
4. Configura sensibilidad

### Calidad de grabación
1. Configuración > Grabación > Parámetros
2. Stream principal: H.265, 4MP, 25fps
3. Stream secundario: H.265, 720p, 15fps

## Acceso remoto

### Hik-Connect (recomendado)
1. Configuración > Red > Acceso a plataforma
2. Activa Hik-Connect
3. Acepta términos
4. Anota el código de verificación
5. En la app móvil: escanea QR o introduce código

### DDNS Hikvision
1. Configuración > Red > DDNS
2. Servidor: Hik-Online
3. Usuario: tu cuenta Hikvision
4. Contraseña: tu contraseña

## Troubleshooting

### La cámara aparece offline
- Verifica conexión de red
- Comprueba contraseña
- Reinicia la cámara

### No graba
- Verifica disco duro detectado
- Comprueba programación
- Revisa espacio disponible

### Calidad de imagen pobre
- Ajusta parámetros de imagen
- Verifica iluminación
- Limpia objetivo de la cámara

## Soporte técnico

📞 **+34 637 474 428**
        '
    ],
    
    'manual-ajax-hub' => [
        'titulo' => 'Manual Ajax Hub y Hub Plus',
        'categoria' => 'Manuales Técnicos',
        'categoria_id' => 'manuales',
        'fecha' => '2024-01-10',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '15 min',
        'acceso' => 'registered',
        'contenido' => '
## Introducción a Ajax Systems

Ajax es un sistema de alarma profesional inalámbrico con comunicación bidireccional cifrada y alcance de hasta 2.000 metros.

## Modelos de Hub

| Modelo | Dispositivos | SIM | Ethernet | WiFi |
|--------|-------------|-----|----------|------|
| Hub | 100 | 1 | Sí | No |
| Hub Plus | 150 | 2 | Sí | Sí |
| Hub 2 | 100 | 2 | Sí | No |
| Hub 2 Plus | 200 | 2 | Sí | Sí |

## Instalación del Hub

### Ubicación
- Centro de la instalación (maximiza cobertura)
- Evitar sótanos o cuartos metálicos
- Altura recomendada: 1.5-2m
- Lejos de fuentes de interferencia

### Conexiones
1. Inserta la SIM (opcional)
2. Conecta cable Ethernet
3. Conecta alimentación
4. Espera LED verde

## Configuración con App

### Descargar Ajax
- iOS: App Store
- Android: Google Play
- Buscar: "Ajax Security System"

### Crear cuenta
1. Abre la app
2. Registrarse con email
3. Verifica email

### Añadir Hub
1. Pulsa "+"
2. Escanea QR del Hub (bajo tapa)
3. Nombra el Hub
4. Selecciona ubicación

## Añadir dispositivos

### Proceso general
1. En app: Hub > Dispositivos > Añadir
2. Selecciona tipo de dispositivo
3. Activa modo emparejamiento en dispositivo
4. Sigue instrucciones

### Detectores principales

**MotionProtect (PIR):**
- Alcance interno: 12m
- Inmune a mascotas hasta 20kg
- Batería: 5 años

**DoorProtect (magnético):**
- Para puertas y ventanas
- Detección de manipulación
- Batería: 7 años

**GlassProtect:**
- Detección rotura de cristal
- Micrófono electret
- Alcance: 9m

## Configuración de zonas

### Tipos de zonas
- **Instantánea**: Dispara inmediatamente
- **Retardada**: Espera tiempo de entrada
- **24 horas**: Siempre activa (anti-sabotaje)
- **Incendio**: Para detectores de humo

### Configurar retardo
1. Configuración del dispositivo
2. Tipo de zona: Retardada entrada
3. Tiempo de retardo: 30-60 segundos

## Usuarios y accesos

### Añadir usuario
1. Hub > Usuarios > Añadir
2. Introduce email
3. Asigna permisos

### Tipos de usuario
- **Administrador**: Control total
- **Usuario**: Armar/desarmar
- **Invitado**: Solo visualizar

### KeyPad
- Códigos personales por usuario
- Coacción: código+1 (alerta silenciosa)
- Código master separado

## Conexión a CRA

### Requisitos
- Contrato con CRA compatible Ajax
- Identificador proporcionado por CRA

### Configuración
1. Hub > Centrales receptoras
2. Añadir protocolo (Contact ID, SIA)
3. Introduce datos de la CRA

## Aplicación PRO (instaladores)

### Funciones adicionales
- Gestión de múltiples instalaciones
- Configuración remota
- Informes y estadísticas
- Fotoverificación

### Registro como PRO
1. Web Ajax Systems
2. Solicitar cuenta PRO
3. Verificación de empresa

## Mantenimiento

### Comprobaciones periódicas
- Test de comunicación semanal
- Verificar baterías mensualmente
- Prueba de sirena trimestral

### Actualización firmware
- Automática si está habilitada
- Manual desde app si es necesario

## Soporte

📞 **+34 637 474 428**
        '
    ],
    
    'hikvision-control-accesos' => [
        'titulo' => 'Gama de control de accesos Hikvision',
        'categoria' => 'Control de Accesos',
        'categoria_id' => 'accesos',
        'fecha' => '2024-01-05',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '12 min',
        'acceso' => 'registered',
        'contenido' => '
## Ecosistema Hikvision Access Control

Hikvision ofrece una gama completa de control de accesos que incluye terminales, controladores, lectores y software de gestión.

## Terminales standalone

### DS-K1T321 (básico)
- Pantalla 2.4"
- Tarjeta Mifare
- 3.000 usuarios
- WiFi/Ethernet

### DS-K1T341 (huella + tarjeta)
- Pantalla 4.3"
- Huella + Mifare
- 3.000 huellas
- API abierta

### DS-K1T671 (facial)
- Reconocimiento facial
- Pantalla 7"
- 6.000 rostros
- Detección de mascarilla
- Control de temperatura

## Controladores

### DS-K2600
Serie de controladores para grandes instalaciones:

| Modelo | Puertas | Lectores |
|--------|---------|----------|
| DS-K2601 | 1 | 2 |
| DS-K2602 | 2 | 4 |
| DS-K2604 | 4 | 8 |

**Características:**
- Wiegand 26/34
- RS-485
- 100.000 tarjetas
- 300.000 eventos
- Anti-passback

### DS-K2210
Controlador para ascensores:
- Control de plantas
- 16 relevadores
- Integración con tarjetas

## Lectores

### Lectores de tarjeta
- **DS-K1102**: Lector Mifare básico
- **DS-K1104**: Con teclado PIN
- **DS-K1107**: Antivandálico IP65

### Lectores biométricos
- **DS-K1201**: Huella dactilar
- **DS-K1A802**: Huella + tarjeta

### Lectores de largo alcance
- **DS-K2M0**: Lector de vehículos UHF
- Alcance hasta 10 metros

## Software de gestión

### Hik-Central
Plataforma unificada para:
- Control de accesos
- Videovigilancia
- Intrusión
- Intercomunicación

### iVMS-4200
Software gratuito para:
- Gestión de usuarios
- Configuración de horarios
- Visualización de eventos
- Informes de acceso

## Integración con vídeo

### Ventajas
- Foto en cada acceso
- Verificación visual
- Grabación de eventos
- Búsqueda combinada

### Configuración
1. Añadir cámara en iVMS-4200
2. Vincular a puerta
3. Activar captura en evento

## Casos de uso

### Oficina pequeña (< 20 empleados)
- 1x Terminal DS-K1T341 (huella)
- Cerradero eléctrico
- Fuente de alimentación

### Oficina mediana (20-100)
- Controlador DS-K2602
- 2x Lectores DS-K1102
- Botón de salida
- Cerradero o electroimán

### Edificio corporativo
- Varios DS-K2604
- Terminales faciales en recepción
- Integración con Hik-Central
- Tornos o barreras

## Normativa RGPD

### Datos biométricos
- Requieren consentimiento específico
- Evaluación de impacto obligatoria
- Alternativa no biométrica disponible

### Registro de accesos
- Conservar tiempo mínimo necesario
- Acceso limitado a personal autorizado
- Derecho de acceso del trabajador

## Instalación

### Requisitos eléctricos
- Fuente 12V DC para cerraderos
- PoE para terminales IP
- SAI recomendado

### Cableado
- Wiegand: hasta 150m
- RS-485: hasta 1.200m
- Ethernet: hasta 100m

## Asesoramiento

📞 **+34 637 474 428**
        '
    ],
    
    'manual-zkteco-control-acceso' => [
        'titulo' => 'Manual ZKTeco Control de Acceso Atlas',
        'categoria' => 'Manuales Técnicos',
        'categoria_id' => 'manuales',
        'fecha' => '2023-12-20',
        'autor' => 'Juan Luis Palazón',
        'tiempo_lectura' => '18 min',
        'acceso' => 'registered',
        'contenido' => '
## Serie Atlas de ZKTeco

La serie Atlas es la gama profesional de controladores de acceso de ZKTeco, diseñada para instalaciones de mediano y gran tamaño.

## Modelos disponibles

| Modelo | Puertas | Lectores | Usuarios |
|--------|---------|----------|----------|
| Atlas-100 | 1 | 2 | 5.000 |
| Atlas-200 | 2 | 4 | 10.000 |
| Atlas-400 | 4 | 8 | 30.000 |
| Atlas-460 | 4 | 8 | 100.000 |

## Instalación física

### Alimentación
- Entrada: 12V DC
- Fuente recomendada: 3A mínimo
- SAI: altamente recomendado

### Conexiones
**Panel Atlas:**
- Power: 12V DC
- Ethernet: RJ45
- Wiegand: para lectores
- Relay: para cerraderos
- Exit: botón de salida
- Sensor: estado de puerta

### Cableado de lectores
```
Lector          Atlas
D0 (verde)  ->  D0
D1 (blanco) ->  D1
GND         ->  GND
LED         ->  LED
BEEP        ->  BEEP
+12V        ->  +12V
```

## Software ZKBioAccess

### Instalación
1. Descarga desde zktecoeurope.com
2. Ejecuta instalador
3. Configura base de datos (SQL Express incluido)
4. Inicia el servicio

### Añadir controlador
1. Sistema > Dispositivos > Buscar
2. Selecciona Atlas encontrado
3. Introduce contraseña (por defecto: vacío)
4. Sincroniza hora

## Configuración de puertas

### Parámetros básicos
- **Nombre**: Identificativo de la puerta
- **Tiempo apertura**: 3-10 segundos
- **Tiempo puerta abierta**: Alarma si excede
- **Modo**: Normal, Bloqueada, Libre

### Tipos de desbloqueo
- Solo tarjeta
- Solo huella
- Tarjeta + PIN
- Huella + tarjeta
- Cualquier credencial

## Gestión de usuarios

### Crear usuario
1. Personal > Añadir persona
2. Datos básicos (nombre, departamento)
3. Credenciales:
   - Tarjeta: escanear o introducir número
   - Huella: registrar en terminal compatible
   - PIN: código personal

### Grupos de acceso
1. Acceso > Grupos de acceso
2. Crear grupo
3. Asignar puertas y horarios
4. Vincular usuarios al grupo

## Horarios y zonas

### Crear horario
1. Acceso > Zonas horarias
2. Nuevo horario
3. Define franjas por día
4. Guarda y aplica

### Horarios típicos
- **Laborable**: L-V 07:00-20:00
- **Finde**: S-D cerrado
- **24h**: Acceso continuo
- **Visitas**: L-V 09:00-14:00

## Anti-passback

### Configuración
1. Acceso > Anti-passback
2. Define rutas (entrada/salida)
3. Tipo: Hard (bloquea) o Soft (registra)
4. Tiempo de reset

### Verificación
- Requiere lector de entrada Y salida
- Impide "pasar" tarjeta a otro
- Útil para control de aforo

## Alarmas y eventos

### Tipos de alarma
- Puerta abierta demasiado tiempo
- Intento forzado
- Coacción (código especial)
- Tamper del panel

### Configurar email
1. Sistema > Configuración > Email
2. Servidor SMTP (Gmail, Office365...)
3. Credenciales
4. Destinatarios

## Integración con vídeo

### DVR/NVR compatible
1. Vídeo > Añadir dispositivo
2. Protocolo: RTSP u ONVIF
3. Vincular cámara a puerta
4. Captura en evento de acceso

## Mantenimiento

### Copia de seguridad
1. Sistema > Base de datos > Copia
2. Programa copia automática
3. Guarda en ubicación externa

### Actualización firmware
1. Descarga desde ZKTeco
2. Sistema > Dispositivos > Actualizar
3. Selecciona archivo
4. Espera reinicio

## Troubleshooting

### Lector no responde
- Verifica alimentación
- Comprueba cableado Wiegand
- Reinicia el panel

### Tarjeta no reconocida
- Verifica formato (26/34 bit)
- Comprueba usuario activo
- Revisa horario de acceso

### Puerta no abre
- Test relay desde software
- Verifica cerradero
- Comprueba alimentación cerradero

## Soporte especializado

📞 **+34 637 474 428**
        '
    ]
];

// Buscar el artículo
$articulo = $contenido_articulos[$articulo_id] ?? null;

if (!$articulo) {
    header('Location: ../conocimiento.php');
    exit();
}

$page_title = $articulo['titulo'] . ' | Praxis Seguridad';
$page_description = substr(strip_tags($articulo['contenido']), 0, 160);
$current_page = 'conocimiento';

// Verificar acceso
$requiere_registro = ($articulo['acceso'] === 'registered');
// Por ahora mostramos todo, cuando implementemos auth lo restringiremos

include '../includes/header.php';

// Convertir contenido markdown básico a HTML
function simple_markdown($text) {
    // Procesar tablas primero (antes de otros reemplazos)
    $lines = explode("\n", $text);
    $in_table = false;
    $table_html = '';
    $result_lines = [];
    
    foreach ($lines as $line) {
        $trimmed = trim($line);
        
        // Detectar línea de tabla (empieza y termina con |)
        if (preg_match('/^\|(.+)\|$/', $trimmed)) {
            if (!$in_table) {
                $in_table = true;
                $table_html = '<div class="overflow-x-auto my-6"><table class="w-full border-collapse bg-white rounded-lg overflow-hidden shadow-sm">';
            }
            
            // Ignorar línea separadora (|---|---|)
            if (preg_match('/^\|[\s\-\|]+\|$/', $trimmed)) {
                continue;
            }
            
            // Procesar celdas
            $cells = explode('|', $trimmed);
            $cells = array_filter($cells, function($c) { return trim($c) !== ''; });
            
            // Primera fila es header
            if (strpos($table_html, '<tbody>') === false && strpos($table_html, '<thead>') === false) {
                $table_html .= '<thead class="bg-praxis-black text-white"><tr>';
                foreach ($cells as $cell) {
                    $table_html .= '<th class="px-4 py-3 text-left text-sm font-semibold">' . trim($cell) . '</th>';
                }
                $table_html .= '</tr></thead><tbody>';
            } else {
                $table_html .= '<tr class="border-b border-gray-200 hover:bg-gray-50">';
                foreach ($cells as $cell) {
                    $table_html .= '<td class="px-4 py-3 text-sm text-gray-800">' . trim($cell) . '</td>';
                }
                $table_html .= '</tr>';
            }
        } else {
            // Cerrar tabla si estábamos en una
            if ($in_table) {
                $table_html .= '</tbody></table></div>';
                $result_lines[] = $table_html;
                $table_html = '';
                $in_table = false;
            }
            $result_lines[] = $line;
        }
    }
    
    // Cerrar tabla si quedó abierta
    if ($in_table) {
        $table_html .= '</tbody></table></div>';
        $result_lines[] = $table_html;
    }
    
    $text = implode("\n", $result_lines);
    
    // Headers
    $text = preg_replace('/^### (.+)$/m', '<h3 class="font-heading font-bold text-xl text-gray-900 mt-8 mb-4">$1</h3>', $text);
    $text = preg_replace('/^## (.+)$/m', '<h2 class="font-heading font-bold text-2xl text-gray-900 mt-10 mb-6">$1</h2>', $text);
    
    // Bold
    $text = preg_replace('/\*\*(.+?)\*\*/', '<strong class="text-gray-900">$1</strong>', $text);
    
    // Lists
    $text = preg_replace('/^- (.+)$/m', '<li class="ml-4 text-gray-900 mb-1">$1</li>', $text);
    $text = preg_replace('/^(\d+)\. (.+)$/m', '<li class="ml-4 text-gray-900 mb-1"><span class="font-bold">$1.</span> $2</li>', $text);
    
    // Check marks and X marks
    $text = str_replace('✅', '<span class="text-green-600">✅</span>', $text);
    $text = str_replace('❌', '<span class="text-red-600">❌</span>', $text);
    
    // Paragraphs - color más oscuro
    $text = preg_replace('/\n\n/', '</p><p class="mb-4 text-gray-900 leading-relaxed">', $text);
    
    return '<p class="mb-4 text-gray-900 leading-relaxed">' . $text . '</p>';
}
?>

<!-- Article -->
<article class="pt-24 bg-praxis-light min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-praxis-gray-medium mb-8">
            <a href="../conocimiento.php" class="hover:text-praxis-gold transition-colors">Centro de Conocimiento</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="categoria.php?cat=<?php echo $articulo['categoria_id']; ?>" class="hover:text-praxis-gold transition-colors">
                <?php echo $articulo['categoria']; ?>
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-praxis-black"><?php echo $articulo['titulo']; ?></span>
        </nav>
        
        <!-- Header -->
        <header class="mb-10">
            <span class="inline-block px-3 py-1 bg-praxis-gold/20 text-praxis-gold text-sm rounded-full mb-4">
                <?php echo $articulo['categoria']; ?>
            </span>
            
            <h1 class="font-heading font-extrabold text-3xl md:text-4xl lg:text-5xl text-praxis-black mb-6">
                <?php echo $articulo['titulo']; ?>
            </h1>
            
            <div class="flex flex-wrap items-center gap-4 text-sm text-praxis-gray-medium">
                <span class="flex items-center gap-2">
                    <img src="../images/logo-praxis.png" alt="Juan Luis Palazón" class="w-8 h-8 rounded-full object-contain bg-praxis-black p-1">
                    <?php echo $articulo['autor']; ?>
                </span>
                <span><i class="far fa-calendar mr-1"></i><?php echo date('d M Y', strtotime($articulo['fecha'])); ?></span>
                <span><i class="far fa-clock mr-1"></i><?php echo $articulo['tiempo_lectura']; ?></span>
            </div>
        </header>
        
        <!-- Content -->
        <div class="bg-white rounded-2xl p-8 md:p-12 shadow-lg prose prose-lg max-w-none">
            <?php echo simple_markdown($articulo['contenido']); ?>
        </div>
        
        <!-- Author Box -->
        <div class="bg-praxis-black rounded-2xl p-6 md:p-8 mt-10">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <img src="../images/logo-praxis.png" alt="Juan Luis Palazón" class="w-20 h-20 rounded-2xl object-contain bg-praxis-gray p-2">
                <div class="text-center md:text-left flex-1">
                    <h3 class="font-heading font-bold text-xl text-praxis-white mb-2">Juan Luis Palazón</h3>
                    <p class="text-praxis-gray-light text-sm mb-4">
                        Consultor de seguridad con +15 años de experiencia. Director de Seguridad, DPO certificado y Perito Judicial.
                    </p>
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4">
                        <a href="tel:+34637474428" class="text-praxis-gold hover:text-white transition-colors text-sm">
                            <i class="fas fa-phone mr-1"></i>+34 637 474 428
                        </a>
                        <a href="https://wa.me/34637474428" class="text-praxis-gold hover:text-white transition-colors text-sm">
                            <i class="fab fa-whatsapp mr-1"></i>WhatsApp
                        </a>
                    </div>
                </div>
                <a href="../contacto.php" class="px-6 py-3 bg-praxis-gold text-praxis-black font-heading font-bold rounded-lg hover:bg-white transition-colors whitespace-nowrap">
                    Contactar
                </a>
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="flex items-center justify-between mt-10">
            <a href="categoria.php?cat=<?php echo $articulo['categoria_id']; ?>" class="flex items-center gap-2 text-praxis-gray-medium hover:text-praxis-gold transition-colors">
                <i class="fas fa-arrow-left"></i>
                Volver a <?php echo $articulo['categoria']; ?>
            </a>
            <a href="../conocimiento.php" class="flex items-center gap-2 text-praxis-gray-medium hover:text-praxis-gold transition-colors">
                Ver todas las categorías
                <i class="fas fa-th-large"></i>
            </a>
        </div>
    </div>
</article>

<?php include '../includes/footer.php'; ?>
