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
    // Headers
    $text = preg_replace('/^### (.+)$/m', '<h3 class="font-heading font-bold text-xl text-praxis-black mt-8 mb-4">$1</h3>', $text);
    $text = preg_replace('/^## (.+)$/m', '<h2 class="font-heading font-bold text-2xl text-praxis-black mt-10 mb-6">$1</h2>', $text);
    
    // Bold
    $text = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text);
    
    // Lists
    $text = preg_replace('/^- (.+)$/m', '<li class="ml-4">$1</li>', $text);
    $text = preg_replace('/^(\d+)\. (.+)$/m', '<li class="ml-4"><span class="font-bold">$1.</span> $2</li>', $text);
    
    // Check marks and X marks
    $text = str_replace('✅', '<span class="text-green-600">✅</span>', $text);
    $text = str_replace('❌', '<span class="text-red-600">❌</span>', $text);
    
    // Tables (basic)
    $text = preg_replace('/\|(.+)\|/m', '<div class="overflow-x-auto"><table class="w-full border-collapse">$1</table></div>', $text);
    
    // Paragraphs
    $text = preg_replace('/\n\n/', '</p><p class="mb-4 text-praxis-gray-medium leading-relaxed">', $text);
    
    return '<p class="mb-4 text-praxis-gray-medium leading-relaxed">' . $text . '</p>';
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
