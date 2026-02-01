<?php
/**
 * Praxis Seguridad - Categoría de Conocimiento
 * Muestra artículos de una categoría específica
 */

// Obtener categoría de la URL
$cat_id = $_GET['cat'] ?? 'cctv';

// Base de datos de categorías (editable manualmente)
$categorias = [
    'cctv' => [
        'nombre' => 'CCTV y Videovigilancia',
        'descripcion' => 'Guías de configuración, instalación y normativa de sistemas de videovigilancia',
        'icono' => 'fa-video',
        'color' => 'from-blue-500 to-blue-700'
    ],
    'alarmas' => [
        'nombre' => 'Sistemas de Alarma',
        'descripcion' => 'Configuración de centrales, detectores, conexión a CRA y mantenimiento',
        'icono' => 'fa-bell',
        'color' => 'from-red-500 to-red-700'
    ],
    'accesos' => [
        'nombre' => 'Control de Accesos',
        'descripcion' => 'Sistemas biométricos, tarjetas, tornos y cerraduras inteligentes',
        'icono' => 'fa-fingerprint',
        'color' => 'from-green-500 to-green-700'
    ],
    'rgpd' => [
        'nombre' => 'Protección de Datos',
        'descripcion' => 'Cumplimiento RGPD, obligaciones legales y guías prácticas',
        'icono' => 'fa-shield-halved',
        'color' => 'from-purple-500 to-purple-700'
    ],
    'normativa' => [
        'nombre' => 'Normativa y Legislación',
        'descripcion' => 'Ley de Seguridad Privada, reglamentos y actualizaciones legales',
        'icono' => 'fa-gavel',
        'color' => 'from-amber-500 to-amber-700'
    ],
    'manuales' => [
        'nombre' => 'Manuales Técnicos',
        'descripcion' => 'Documentación de productos y guías de instalación',
        'icono' => 'fa-book',
        'color' => 'from-teal-500 to-teal-700'
    ]
];

// Verificar si la categoría existe
if (!isset($categorias[$cat_id])) {
    header('Location: ../conocimiento.php');
    exit();
}

$categoria = $categorias[$cat_id];

// ========================================
// ARTÍCULOS POR CATEGORÍA (EDITABLES MANUALMENTE)
// Añade aquí tus artículos siguiendo el formato
// ========================================
$articulos_por_categoria = [
    'cctv' => [
        [
            'id' => 'configuracion-nvr-hikvision',
            'titulo' => 'Configuración inicial de NVR Hikvision',
            'excerpt' => 'Guía paso a paso para configurar tu grabador de red Hikvision desde cero: red, usuarios, cámaras y almacenamiento.',
            'fecha' => '2024-01-20',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '8 min'
        ],
        [
            'id' => 'tipos-camaras-seguridad',
            'titulo' => 'Tipos de cámaras de seguridad: guía completa',
            'excerpt' => 'Diferencias entre cámaras IP, analógicas HD, domo, bullet, PTZ y térmicas. Cuál elegir según tu necesidad.',
            'fecha' => '2024-01-18',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '10 min'
        ],
        [
            'id' => 'rgpd-videovigilancia',
            'titulo' => 'RGPD y videovigilancia: obligaciones legales',
            'excerpt' => 'Todo lo que necesitas saber para cumplir con la normativa de protección de datos al instalar cámaras.',
            'fecha' => '2024-01-15',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '12 min'
        ],
        [
            'id' => 'almacenamiento-grabaciones',
            'titulo' => 'Almacenamiento de grabaciones: discos duros y NAS',
            'excerpt' => 'Cómo calcular el espacio necesario, tipos de discos recomendados y configuración de NAS para CCTV.',
            'fecha' => '2024-01-10',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '7 min'
        ],
        [
            'id' => 'configuracion-safire-smart',
            'titulo' => 'Guía de configuración Safire Smart CCTV',
            'excerpt' => 'Instalación y configuración inicial de sistemas CCTV Safire Smart: plataforma, requisitos y puesta en marcha.',
            'fecha' => '2024-01-05',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '15 min'
        ],
        [
            'id' => 'uniview-gama-easy',
            'titulo' => 'Uniview CCTV gama "Easy": características y configuración',
            'excerpt' => 'Análisis de la gama Easy de Uniview: productos, nomenclatura y guía de configuración básica.',
            'fecha' => '2024-01-01',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '10 min'
        ],
        [
            'id' => 'securikit-instalacion',
            'titulo' => 'Instalación sistema Securikit CCTV Smart',
            'excerpt' => 'Tutorial completo de instalación de Securikit: cámaras preconfiguradas para una puesta en marcha rápida.',
            'fecha' => '2023-12-28',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '8 min'
        ],
        [
            'id' => 'problemas-comunes-cctv',
            'titulo' => 'Problemas comunes en CCTV y cómo solucionarlos',
            'excerpt' => 'Troubleshooting: imagen borrosa, sin señal, interferencias, pérdida de grabaciones y más.',
            'fecha' => '2023-12-20',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '11 min'
        ]
    ],
    'alarmas' => [
        [
            'id' => 'elegir-sistema-alarma',
            'titulo' => 'Cómo elegir un sistema de alarma',
            'excerpt' => 'Criterios profesionales para seleccionar el sistema de alarma más adecuado según tus necesidades y presupuesto.',
            'fecha' => '2024-01-18',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '9 min'
        ],
        [
            'id' => 'detectores-pir-ubicacion',
            'titulo' => 'Detectores PIR: tipos y ubicación correcta',
            'excerpt' => 'Evita falsas alarmas con una correcta selección y ubicación de detectores de movimiento.',
            'fecha' => '2024-01-12',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '7 min'
        ],
        [
            'id' => 'conexion-cra',
            'titulo' => 'Conexión a Central Receptora de Alarmas (CRA)',
            'excerpt' => 'Qué es una CRA, cómo funciona, requisitos técnicos y obligaciones legales de conexión.',
            'fecha' => '2024-01-08',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '10 min'
        ],
        [
            'id' => 'alarmbox-x-security',
            'titulo' => 'Configuración ALARMBOX en grabadores X-Security',
            'excerpt' => 'Guía detallada para configurar ALARMBOX con XVR X-Security: acceso, vinculación y notificaciones.',
            'fecha' => '2024-01-05',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '12 min'
        ],
        [
            'id' => 'mantenimiento-alarmas',
            'titulo' => 'Mantenimiento preventivo de sistemas de alarma',
            'excerpt' => 'Checklist de mantenimiento: baterías, sensores, comunicaciones y pruebas periódicas.',
            'fecha' => '2023-12-28',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '6 min'
        ],
        [
            'id' => 'falsas-alarmas',
            'titulo' => 'Falsas alarmas: causas y soluciones',
            'excerpt' => 'Por qué se producen las falsas alarmas, cómo identificar la causa y qué hacer para evitarlas.',
            'fecha' => '2023-12-20',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '8 min'
        ]
    ],
    'accesos' => [
        [
            'id' => 'tipos-control-accesos',
            'titulo' => 'Tipos de sistemas de control de accesos',
            'excerpt' => 'Comparativa completa: tarjetas RFID, códigos PIN, biométricos, Bluetooth y sistemas híbridos.',
            'fecha' => '2024-01-15',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '10 min'
        ],
        [
            'id' => 'biometricos-huella-facial',
            'titulo' => 'Sistemas biométricos: huella vs reconocimiento facial',
            'excerpt' => 'Ventajas e inconvenientes de cada tecnología, casos de uso y normativa aplicable.',
            'fecha' => '2024-01-10',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '8 min'
        ],
        [
            'id' => 'hikvision-control-accesos',
            'titulo' => 'Gama de control de accesos Hikvision',
            'excerpt' => 'Controladores, terminales standalone, lectores, tornos y accesorios de la marca Hikvision.',
            'fecha' => '2024-01-05',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '12 min'
        ],
        [
            'id' => 'cerraduras-inteligentes',
            'titulo' => 'Cerraduras inteligentes: Tedee, Ezviz y más',
            'excerpt' => 'Análisis de cerraduras smart para hogar y empresa: instalación, app y compatibilidad.',
            'fecha' => '2023-12-28',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '9 min'
        ],
        [
            'id' => 'control-presencia',
            'titulo' => 'Control de presencia y fichaje: normativa laboral',
            'excerpt' => 'Obligaciones legales de fichaje, sistemas disponibles y cómo cumplir con la normativa.',
            'fecha' => '2023-12-20',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '7 min'
        ]
    ],
    'rgpd' => [
        [
            'id' => 'guia-rgpd-empresas',
            'titulo' => 'Guía RGPD para empresas: todo lo que debes saber',
            'excerpt' => 'Resumen completo del Reglamento General de Protección de Datos y sus obligaciones para empresas.',
            'fecha' => '2024-01-20',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '15 min'
        ],
        [
            'id' => 'cuando-necesitas-dpo',
            'titulo' => '¿Cuándo necesitas un Delegado de Protección de Datos (DPO)?',
            'excerpt' => 'Supuestos obligatorios, funciones del DPO y opciones: interno, externo o DPO as a Service.',
            'fecha' => '2024-01-15',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '8 min'
        ],
        [
            'id' => 'derechos-arco-arcol',
            'titulo' => 'Derechos ARCO y ARCOL explicados',
            'excerpt' => 'Acceso, Rectificación, Cancelación, Oposición, Limitación: qué son y cómo gestionarlos.',
            'fecha' => '2024-01-10',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '10 min'
        ],
        [
            'id' => 'registro-actividades-tratamiento',
            'titulo' => 'Registro de Actividades de Tratamiento (RAT)',
            'excerpt' => 'Qué es, quién debe tenerlo, qué información incluir y plantilla descargable.',
            'fecha' => '2024-01-05',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '9 min'
        ],
        [
            'id' => 'brechas-seguridad-notificacion',
            'titulo' => 'Brechas de seguridad: cuándo y cómo notificar',
            'excerpt' => 'Procedimiento de notificación a la AEPD y a los afectados en caso de violación de datos.',
            'fecha' => '2023-12-28',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '7 min'
        ],
        [
            'id' => 'videovigilancia-rgpd-completo',
            'titulo' => 'Videovigilancia y RGPD: guía completa',
            'excerpt' => 'Carteles, registro AEPD, información a empleados, plazos de conservación y más.',
            'fecha' => '2023-12-20',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '14 min'
        ],
        [
            'id' => 'sanciones-aepd',
            'titulo' => 'Sanciones AEPD: casos reales y cómo evitarlas',
            'excerpt' => 'Análisis de sanciones recientes, motivos más comunes y medidas preventivas.',
            'fecha' => '2023-12-15',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '11 min'
        ]
    ],
    'normativa' => [
        [
            'id' => 'ley-seguridad-privada',
            'titulo' => 'Ley 5/2014 de Seguridad Privada: resumen',
            'excerpt' => 'Principales aspectos de la Ley de Seguridad Privada que afectan a empresas y particulares.',
            'fecha' => '2024-01-15',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '12 min'
        ],
        [
            'id' => 'reglamento-seguridad-privada',
            'titulo' => 'Reglamento de Seguridad Privada (RD 2364/1994)',
            'excerpt' => 'Desarrollo reglamentario: medidas de seguridad obligatorias por tipo de establecimiento.',
            'fecha' => '2024-01-10',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '10 min'
        ],
        [
            'id' => 'grados-seguridad',
            'titulo' => 'Grados de seguridad: 1, 2, 3 y 4',
            'excerpt' => 'Qué significa cada grado, qué instalaciones lo requieren y equipos homologados.',
            'fecha' => '2024-01-05',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '8 min'
        ],
        [
            'id' => 'comunicacion-instalaciones-policia',
            'titulo' => 'Comunicación de instalaciones de seguridad',
            'excerpt' => 'Obligación de comunicar instalaciones de alarmas: cuándo, cómo y multas por incumplimiento.',
            'fecha' => '2023-12-20',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '6 min'
        ]
    ],
    'manuales' => [
        [
            'id' => 'manual-hikvision-nvr',
            'titulo' => 'Manual NVR Hikvision Serie DS-7600',
            'excerpt' => 'Documentación completa: especificaciones, instalación, configuración y troubleshooting.',
            'fecha' => '2024-01-15',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '20 min'
        ],
        [
            'id' => 'manual-ajax-hub',
            'titulo' => 'Manual Ajax Hub y Hub Plus',
            'excerpt' => 'Guía de configuración del panel de alarma Ajax: emparejamiento, zonas y notificaciones.',
            'fecha' => '2024-01-10',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '15 min'
        ],
        [
            'id' => 'guia-rapida-dahua',
            'titulo' => 'Guía rápida DVR/NVR Dahua',
            'excerpt' => 'Configuración inicial en 10 pasos: acceso web, añadir cámaras, grabación y visualización remota.',
            'fecha' => '2024-01-05',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '8 min'
        ],
        [
            'id' => 'configuracion-ezviz-app',
            'titulo' => 'Configuración app Ezviz: guía completa',
            'excerpt' => 'Desde crear cuenta hasta configurar notificaciones, grabación en nube y compartir dispositivos.',
            'fecha' => '2023-12-28',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'public',
            'tiempo_lectura' => '10 min'
        ],
        [
            'id' => 'manual-zkteco-control-acceso',
            'titulo' => 'Manual ZKTeco Control de Acceso Atlas',
            'excerpt' => 'Configuración de controladores Atlas: lectores, puertas, horarios y usuarios.',
            'fecha' => '2023-12-20',
            'autor' => 'Juan Luis Palazón',
            'acceso' => 'registered',
            'tiempo_lectura' => '18 min'
        ]
    ]
];

// Obtener artículos de la categoría actual
$articulos = $articulos_por_categoria[$cat_id] ?? [];

$page_title = $categoria['nombre'] . ' | Centro de Conocimiento | Praxis Seguridad';
$page_description = $categoria['descripcion'];
$current_page = 'conocimiento';

include '../includes/header.php';
?>

<!-- Hero -->
<section class="relative min-h-[40vh] flex items-center bg-gradient-to-br from-praxis-black via-praxis-gray to-praxis-black pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-6">
            <a href="../conocimiento.php" class="text-praxis-gray-light hover:text-praxis-gold transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Centro de Conocimiento
            </a>
        </div>
        
        <div class="flex items-center gap-6">
            <div class="w-20 h-20 bg-gradient-to-br <?php echo $categoria['color']; ?> rounded-2xl flex items-center justify-center flex-shrink-0">
                <i class="fas <?php echo $categoria['icono']; ?> text-white text-3xl"></i>
            </div>
            <div>
                <h1 class="font-heading font-extrabold text-3xl md:text-4xl lg:text-5xl text-praxis-white mb-3">
                    <?php echo $categoria['nombre']; ?>
                </h1>
                <p class="text-praxis-gray-light text-lg max-w-2xl">
                    <?php echo $categoria['descripcion']; ?>
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Lista de Artículos -->
<section class="py-16 bg-praxis-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-8">
            <p class="text-praxis-gray-medium">
                <?php echo count($articulos); ?> artículos
            </p>
            <div class="flex items-center gap-2">
                <span class="text-sm text-praxis-gray-medium">Ordenar:</span>
                <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm">
                    <option>Más recientes</option>
                    <option>Más antiguos</option>
                    <option>A-Z</option>
                </select>
            </div>
        </div>
        
        <?php if (empty($articulos)): ?>
            <div class="text-center py-16">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-folder-open text-gray-400 text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-xl text-praxis-gray mb-2">No hay artículos aún</h3>
                <p class="text-praxis-gray-medium">Pronto añadiremos contenido a esta categoría.</p>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($articulos as $articulo): ?>
                    <article class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-praxis-gold/30 transition-all group">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <?php if ($articulo['acceso'] === 'registered'): ?>
                                        <span class="flex items-center gap-1 px-2 py-1 bg-amber-100 text-amber-700 text-xs rounded-full">
                                            <i class="fas fa-lock text-[10px]"></i> Registro
                                        </span>
                                    <?php endif; ?>
                                    <span class="text-xs text-praxis-gray-medium">
                                        <i class="far fa-clock mr-1"></i><?php echo $articulo['tiempo_lectura']; ?>
                                    </span>
                                </div>
                                
                                <h3 class="font-heading font-bold text-lg text-praxis-black mb-2 group-hover:text-praxis-gold transition-colors">
                                    <a href="articulo.php?cat=<?php echo $cat_id; ?>&id=<?php echo $articulo['id']; ?>">
                                        <?php echo $articulo['titulo']; ?>
                                    </a>
                                </h3>
                                
                                <p class="text-praxis-gray-medium text-sm mb-3">
                                    <?php echo $articulo['excerpt']; ?>
                                </p>
                                
                                <div class="flex items-center gap-4 text-xs text-praxis-gray-medium">
                                    <span><i class="far fa-user mr-1"></i><?php echo $articulo['autor']; ?></span>
                                    <span><i class="far fa-calendar mr-1"></i><?php echo date('d M Y', strtotime($articulo['fecha'])); ?></span>
                                </div>
                            </div>
                            
                            <div class="flex-shrink-0">
                                <a href="articulo.php?cat=<?php echo $cat_id; ?>&id=<?php echo $articulo['id']; ?>" 
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-praxis-gold/10 text-praxis-gold rounded-lg hover:bg-praxis-gold hover:text-praxis-black transition-colors font-medium text-sm">
                                    Leer <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>


<!-- CTA -->
<section class="py-12 bg-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-2xl text-praxis-white mb-4">
            ¿No encuentras lo que buscas?
        </h2>
        <p class="text-praxis-gray-light mb-6">
            Pregunta al chatbot o contacta directamente con nosotros.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="../contacto.php" class="px-6 py-3 bg-praxis-gold text-praxis-black font-heading font-bold rounded-lg hover:bg-white transition-colors">
                Contactar
            </a>
            <a href="../conocimiento.php" class="px-6 py-3 border border-praxis-gray text-praxis-gray-light rounded-lg hover:border-praxis-gold hover:text-praxis-gold transition-colors">
                Ver todas las categorías
            </a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
