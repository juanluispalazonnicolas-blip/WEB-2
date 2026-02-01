<?php
/**
 * Praxis Seguridad - Preguntas Frecuentes
 * Página de FAQ optimizada para SEO
 */

$page_title = 'Preguntas Frecuentes sobre Seguridad Privada | FAQ | Praxis Seguridad';
$page_description = 'Resolvemos tus dudas sobre seguridad privada, alarmas, CCTV, vigilancia y protección de datos. Preguntas frecuentes sobre consultoría en seguridad en Murcia.';
$current_page = 'faq';

include 'includes/header.php';
?>

<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="relative pt-32 pb-20 bg-praxis-black overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-full opacity-10">
        <div class="absolute inset-0 bg-gradient-to-l from-praxis-gold/20 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Centro de Ayuda
            </p>
            <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-6xl text-praxis-white mb-6 leading-tight">
                Preguntas <span class="gradient-text">frecuentes</span>
            </h1>
            <p class="text-praxis-gray-light text-xl leading-relaxed">
                Encuentra respuestas a las dudas más comunes sobre seguridad privada, sistemas de alarma, 
                videovigilancia y protección de datos.
            </p>
        </div>
    </div>
    
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-praxis-gold/50 to-transparent"></div>
</section>


<!-- ============================================
     CATEGORÍAS FAQ
     ============================================ -->
<section class="py-12 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#general" class="px-6 py-3 bg-praxis-black/50 rounded-full text-praxis-white hover:bg-praxis-gold hover:text-praxis-black transition-colors font-medium text-sm">
                <i class="fas fa-question-circle mr-2"></i>General
            </a>
            <a href="#alarmas" class="px-6 py-3 bg-praxis-black/50 rounded-full text-praxis-white hover:bg-praxis-gold hover:text-praxis-black transition-colors font-medium text-sm">
                <i class="fas fa-bell mr-2"></i>Alarmas
            </a>
            <a href="#cctv" class="px-6 py-3 bg-praxis-black/50 rounded-full text-praxis-white hover:bg-praxis-gold hover:text-praxis-black transition-colors font-medium text-sm">
                <i class="fas fa-video mr-2"></i>Videovigilancia
            </a>
            <a href="#vigilancia" class="px-6 py-3 bg-praxis-black/50 rounded-full text-praxis-white hover:bg-praxis-gold hover:text-praxis-black transition-colors font-medium text-sm">
                <i class="fas fa-user-shield mr-2"></i>Vigilancia
            </a>
            <a href="#proteccion-datos" class="px-6 py-3 bg-praxis-black/50 rounded-full text-praxis-white hover:bg-praxis-gold hover:text-praxis-black transition-colors font-medium text-sm">
                <i class="fas fa-lock mr-2"></i>Protección de Datos
            </a>
            <a href="#consultoria" class="px-6 py-3 bg-praxis-black/50 rounded-full text-praxis-white hover:bg-praxis-gold hover:text-praxis-black transition-colors font-medium text-sm">
                <i class="fas fa-handshake mr-2"></i>Consultoría
            </a>
        </div>
    </div>
</section>


<!-- ============================================
     FAQ SECTIONS
     ============================================ -->
<section class="py-24 bg-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- GENERAL -->
        <div id="general" class="mb-16 scroll-mt-32">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-question-circle text-praxis-gold text-xl"></i>
                </div>
                <h2 class="font-heading font-bold text-2xl text-praxis-white">Preguntas Generales</h2>
            </div>
            
            <?php
            $general_faqs = [
                [
                    'q' => '¿Qué es un consultor en seguridad privada?',
                    'a' => 'Un consultor en seguridad privada es un profesional independiente que asesora a empresas y particulares sobre cómo proteger sus instalaciones, activos y personas de forma eficiente. A diferencia de una empresa instaladora, no vende productos ni servicios de instalación, sino conocimiento técnico y asesoramiento imparcial.'
                ],
                [
                    'q' => '¿Por qué necesito un consultor si ya tengo una empresa de seguridad?',
                    'a' => 'Una empresa de seguridad (instaladora o de vigilancia) tiene un interés comercial en venderte sus servicios. Un consultor independiente evalúa tu situación sin conflicto de interés y te recomienda la mejor solución, aunque eso signifique no contratar nada nuevo o cambiar de proveedor.'
                ],
                [
                    'q' => '¿Cuánto cuesta una consultoría en seguridad?',
                    'a' => 'Depende del alcance del trabajo. Una segunda opinión sobre un presupuesto puede costar desde 75€. Una auditoría completa de una instalación mediana, desde 150€. Un diseño de sistema integral, desde 250€. Siempre proporcionamos presupuesto cerrado antes de empezar.'
                ],
                [
                    'q' => '¿Trabajáis solo en Murcia o también en otras provincias?',
                    'a' => 'Nuestra base está en Murcia y es donde realizamos la mayoría de trabajos presenciales. Para consultorías que no requieren visita física, trabajamos con clientes de toda España. Para auditorías presenciales fuera de Murcia, evaluamos cada caso y presupuestamos los desplazamientos.'
                ],
                [
                    'q' => '¿Qué diferencia hay entre un Director de Seguridad y un consultor?',
                    'a' => 'El Director de Seguridad es una figura regulada por ley (Ley 5/2014 de Seguridad Privada) habilitada para ejercer funciones de dirección de seguridad en empresas. Como consultor, además de esa habilitación, ofrezco servicios externos a múltiples clientes, actuando como asesor independiente en lugar de como empleado interno.'
                ]
            ];
            
            foreach ($general_faqs as $index => $faq): ?>
                <div class="mb-4 bg-praxis-gray/30 rounded-xl border border-praxis-gray/50 overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none" onclick="toggleFaq('general-<?php echo $index; ?>')">
                        <span class="font-heading font-semibold text-praxis-white pr-4" itemprop="name"><?php echo $faq['q']; ?></span>
                        <i class="fas fa-chevron-down text-praxis-gold transition-transform" id="icon-general-<?php echo $index; ?>"></i>
                    </button>
                    <div class="hidden px-6 pb-5" id="content-general-<?php echo $index; ?>" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p class="text-praxis-gray-light" itemprop="text"><?php echo $faq['a']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        
        <!-- ALARMAS -->
        <div id="alarmas" class="mb-16 scroll-mt-32">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-bell text-praxis-gold text-xl"></i>
                </div>
                <h2 class="font-heading font-bold text-2xl text-praxis-white">Sistemas de Alarma</h2>
            </div>
            
            <?php
            $alarmas_faqs = [
                [
                    'q' => '¿Qué alarma es mejor: cableada o inalámbrica?',
                    'a' => 'Depende de la instalación. Las alarmas cableadas son más estables y difíciles de inhibir, pero requieren obra. Las inalámbricas son más flexibles y fáciles de instalar, pero pueden ser vulnerables a inhibidores si no tienen cifrado adecuado. Lo importante no es el tipo, sino que esté bien diseñada e instalada.'
                ],
                [
                    'q' => '¿Qué es una CRA y por qué la necesito?',
                    'a' => 'Una Central Receptora de Alarmas (CRA) es un centro de monitorización que recibe las señales de tu alarma 24/7 y actúa según un protocolo: verifica la alarma, contacta contigo, avisa a la policía si es necesario, envía personal de acuda. Sin CRA, tu alarma solo suena localmente y nadie hace nada.'
                ],
                [
                    'q' => '¿Cuánto cuesta una alarma para una vivienda?',
                    'a' => 'Una alarma básica con conexión a CRA puede costar desde 300-500€ de instalación más una cuota mensual de 30-50€. Sistemas más completos (más detectores, cámaras integradas, acuda incluida) pueden superar los 1.000€ de instalación y 50-80€/mes. Lo importante es que el sistema sea proporcional al riesgo real.'
                ],
                [
                    'q' => '¿Qué hago si mi alarma salta constantemente?',
                    'a' => 'Las falsas alarmas suelen deberse a sensores mal ubicados, mascotas, corrientes de aire o configuración incorrecta. Un técnico debería revisar la instalación. Si el problema persiste, es posible que el sistema no esté bien diseñado para tu espacio. Podemos auditarlo y darte una solución.'
                ],
                [
                    'q' => '¿Puedo instalar yo mismo una alarma?',
                    'a' => 'Puedes instalar un sistema de alarma doméstico sin conexión a CRA. Sin embargo, si quieres conectarlo a una Central Receptora de Alarmas homologada, la instalación debe realizarla una empresa de seguridad autorizada y el sistema debe cumplir los grados de seguridad establecidos por normativa.'
                ],
                [
                    'q' => '¿Qué son los "grados" de una alarma?',
                    'a' => 'Los grados (1 a 4) indican el nivel de seguridad del sistema según la norma EN 50131. Grado 1 es el más básico, Grado 4 el más alto (instalaciones críticas). Para viviendas se suele recomendar Grado 2; para comercios, Grado 2 o 3 según el riesgo. A mayor grado, mayor coste y complejidad.'
                ]
            ];
            
            foreach ($alarmas_faqs as $index => $faq): ?>
                <div class="mb-4 bg-praxis-gray/30 rounded-xl border border-praxis-gray/50 overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none" onclick="toggleFaq('alarmas-<?php echo $index; ?>')">
                        <span class="font-heading font-semibold text-praxis-white pr-4" itemprop="name"><?php echo $faq['q']; ?></span>
                        <i class="fas fa-chevron-down text-praxis-gold transition-transform" id="icon-alarmas-<?php echo $index; ?>"></i>
                    </button>
                    <div class="hidden px-6 pb-5" id="content-alarmas-<?php echo $index; ?>" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p class="text-praxis-gray-light" itemprop="text"><?php echo $faq['a']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        
        <!-- CCTV -->
        <div id="cctv" class="mb-16 scroll-mt-32">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-video text-praxis-gold text-xl"></i>
                </div>
                <h2 class="font-heading font-bold text-2xl text-praxis-white">Videovigilancia (CCTV)</h2>
            </div>
            
            <?php
            $cctv_faqs = [
                [
                    'q' => '¿Es legal grabar con cámaras de seguridad?',
                    'a' => 'Sí, pero con limitaciones. Puedes grabar el interior de tu propiedad y tu fachada. No puedes grabar la vía pública, propiedades de terceros ni zonas comunes sin autorización. Debes cumplir el RGPD: cartel informativo, registro de la actividad, y no conservar las grabaciones más de 30 días salvo incidentes.'
                ],
                [
                    'q' => '¿Cuántos megapíxeles necesitan mis cámaras?',
                    'a' => 'Más megapíxeles no siempre es mejor. Para vigilancia general, 2-4 MP suele ser suficiente. Lo importante es la calidad del sensor, el objetivo, la iluminación IR y la colocación. Una cámara de 2 MP bien ubicada es más útil que una de 8 MP apuntando a ninguna parte.'
                ],
                [
                    'q' => '¿Puedo ver mis cámaras desde el móvil?',
                    'a' => 'Sí, la mayoría de sistemas modernos permiten acceso remoto desde apps móviles. Pero cuidado: esto requiere abrir puertos o usar servicios cloud, lo que puede suponer riesgos de ciberseguridad si no está bien configurado. Asegúrate de usar contraseñas fuertes y firmware actualizado.'
                ],
                [
                    'q' => '¿Qué diferencia hay entre cámaras IP y analógicas?',
                    'a' => 'Las cámaras IP transmiten vídeo por red de datos (Ethernet/WiFi) y ofrecen más resolución y funciones (analítica, audio, etc.). Las analógicas (ahora normalmente HD-CVI, TVI o AHD) usan cable coaxial, son más sencillas y económicas, pero con menos prestaciones. Para nuevas instalaciones, lo habitual es IP.'
                ],
                [
                    'q' => '¿Cuánto tiempo debo guardar las grabaciones?',
                    'a' => 'El RGPD establece un máximo de 30 días para la conservación de grabaciones de videovigilancia, salvo que haya un incidente que justifique conservarlas más tiempo. Si grabas más de 30 días sin motivo, puedes enfrentarte a sanciones.'
                ],
                [
                    'q' => '¿Qué es la analítica de vídeo?',
                    'a' => 'La analítica de vídeo usa algoritmos (a veces IA) para detectar automáticamente eventos: intrusión, cruce de línea, merodeo, reconocimiento facial, conteo de personas, etc. Bien configurada, reduce falsas alarmas y permite respuestas más rápidas. Mal configurada, genera muchos avisos inútiles.'
                ]
            ];
            
            foreach ($cctv_faqs as $index => $faq): ?>
                <div class="mb-4 bg-praxis-gray/30 rounded-xl border border-praxis-gray/50 overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none" onclick="toggleFaq('cctv-<?php echo $index; ?>')">
                        <span class="font-heading font-semibold text-praxis-white pr-4" itemprop="name"><?php echo $faq['q']; ?></span>
                        <i class="fas fa-chevron-down text-praxis-gold transition-transform" id="icon-cctv-<?php echo $index; ?>"></i>
                    </button>
                    <div class="hidden px-6 pb-5" id="content-cctv-<?php echo $index; ?>" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p class="text-praxis-gray-light" itemprop="text"><?php echo $faq['a']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        
        <!-- VIGILANCIA -->
        <div id="vigilancia" class="mb-16 scroll-mt-32">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-shield text-praxis-gold text-xl"></i>
                </div>
                <h2 class="font-heading font-bold text-2xl text-praxis-white">Vigilancia y Personal de Seguridad</h2>
            </div>
            
            <?php
            $vigilancia_faqs = [
                [
                    'q' => '¿Qué diferencia hay entre un vigilante de seguridad y un guardia?',
                    'a' => 'El término correcto es "vigilante de seguridad privada". Es una profesión regulada que requiere habilitación oficial del Ministerio del Interior. Un "guardia" sin habilitación no puede ejercer funciones de seguridad privada legalmente. Contratar personal no habilitado puede acarrear sanciones graves.'
                ],
                [
                    'q' => '¿Cuánto cuesta contratar un vigilante de seguridad?',
                    'a' => 'El coste de un puesto de vigilancia 24/7 (24 horas, 365 días) suele rondar los 80.000-100.000€/año incluyendo todos los costes. Un servicio nocturno (12h) puede costar la mitad aproximadamente. Los precios varían según la empresa, la provincia y los servicios adicionales incluidos.'
                ],
                [
                    'q' => '¿Qué es un servicio de acuda?',
                    'a' => 'Es un servicio de respuesta a alarmas. Cuando tu alarma salta y la CRA no puede verificar queda claro, envían a un vigilante (servicio de acuda) para comprobar in situ qué ha pasado. Es más rápido y barato que tener un vigilante fijo, pero solo actúa ante incidentes.'
                ],
                [
                    'q' => '¿Puede un vigilante detener a alguien?',
                    'a' => 'Un vigilante puede realizar una "detención ciudadana" (como cualquier persona) si presencia un delito flagrante, reteniendo al delincuente para entregarlo inmediatamente a las Fuerzas de Seguridad. No tiene más atribuciones que un ciudadano normal en este aspecto.'
                ],
                [
                    'q' => '¿Qué es un auxiliar de servicios?',
                    'a' => 'Los auxiliares de servicios (antes llamados "controladores de accesos") realizan funciones de control de entrada, recepción, gestión de llaves, etc. No requieren habilitación de seguridad privada porque sus funciones no incluyen vigilancia ni protección. Son más económicos pero con atribuciones limitadas.'
                ]
            ];
            
            foreach ($vigilancia_faqs as $index => $faq): ?>
                <div class="mb-4 bg-praxis-gray/30 rounded-xl border border-praxis-gray/50 overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none" onclick="toggleFaq('vigilancia-<?php echo $index; ?>')">
                        <span class="font-heading font-semibold text-praxis-white pr-4" itemprop="name"><?php echo $faq['q']; ?></span>
                        <i class="fas fa-chevron-down text-praxis-gold transition-transform" id="icon-vigilancia-<?php echo $index; ?>"></i>
                    </button>
                    <div class="hidden px-6 pb-5" id="content-vigilancia-<?php echo $index; ?>" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p class="text-praxis-gray-light" itemprop="text"><?php echo $faq['a']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        
        <!-- PROTECCIÓN DE DATOS -->
        <div id="proteccion-datos" class="mb-16 scroll-mt-32">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-lock text-praxis-gold text-xl"></i>
                </div>
                <h2 class="font-heading font-bold text-2xl text-praxis-white">Protección de Datos (RGPD)</h2>
            </div>
            
            <?php
            $rgpd_faqs = [
                [
                    'q' => '¿Qué es el RGPD y me afecta?',
                    'a' => 'El Reglamento General de Protección de Datos (RGPD) es la normativa europea que regula el tratamiento de datos personales. Te afecta si recopilas, almacenas o tratas cualquier dato personal: nombres, emails, imágenes de videovigilancia, datos de clientes, empleados, etc. Prácticamente todas las empresas deben cumplirlo.'
                ],
                [
                    'q' => '¿Necesito un Delegado de Protección de Datos (DPO)?',
                    'a' => 'Es obligatorio designar un DPO si: tratas datos a gran escala, tratas categorías especiales de datos (salud, religión, orientación sexual...), eres un organismo público, o realizas observación sistemática de personas. Aunque no sea obligatorio, muchas empresas optan por tener uno para garantizar el cumplimiento.'
                ],
                [
                    'q' => '¿Qué sanciones hay por incumplir el RGPD?',
                    'a' => 'Las sanciones pueden llegar hasta 20 millones de euros o el 4% de la facturación global anual. En la práctica, la AEPD impone sanciones proporcionales: desde apercibimientos hasta multas de decenas o cientos de miles de euros según la gravedad y la intencionalidad.'
                ],
                [
                    'q' => '¿Basta con poner un banner de cookies?',
                    'a' => 'No. El RGPD va mucho más allá: registro de actividades de tratamiento, contratos con encargados, políticas de privacidad, medidas de seguridad, gestión de derechos de los interesados, análisis de riesgos, etc. Las cookies son solo una pequeña parte del cumplimiento.'
                ],
                [
                    'q' => '¿Cuánto cuesta adecuarse al RGPD?',
                    'a' => 'Depende del tamaño y complejidad de la empresa. Una pyme típica puede adecuarse con una inversión inicial de 500-2.000€ más mantenimiento anual. Empresas más complejas o con datos sensibles pueden requerir inversiones mayores. Lo importante es hacerlo bien, no barato.'
                ],
                [
                    'q' => '¿Qué relación tiene el RGPD con las cámaras de seguridad?',
                    'a' => 'Las grabaciones de videovigilancia son datos personales. Por tanto, debes: informar con cartel visible, registrar la actividad de tratamiento, no conservar más de 30 días, garantizar acceso solo a personal autorizado, tener contrato con la empresa mantenedora, y atender los derechos de los afectados.'
                ]
            ];
            
            foreach ($rgpd_faqs as $index => $faq): ?>
                <div class="mb-4 bg-praxis-gray/30 rounded-xl border border-praxis-gray/50 overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none" onclick="toggleFaq('rgpd-<?php echo $index; ?>')">
                        <span class="font-heading font-semibold text-praxis-white pr-4" itemprop="name"><?php echo $faq['q']; ?></span>
                        <i class="fas fa-chevron-down text-praxis-gold transition-transform" id="icon-rgpd-<?php echo $index; ?>"></i>
                    </button>
                    <div class="hidden px-6 pb-5" id="content-rgpd-<?php echo $index; ?>" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p class="text-praxis-gray-light" itemprop="text"><?php echo $faq['a']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        
        <!-- CONSULTORÍA -->
        <div id="consultoria" class="mb-16 scroll-mt-32">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-praxis-gold/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-handshake text-praxis-gold text-xl"></i>
                </div>
                <h2 class="font-heading font-bold text-2xl text-praxis-white">Sobre Nuestros Servicios</h2>
            </div>
            
            <?php
            $consultoria_faqs = [
                [
                    'q' => '¿Cómo funciona una consultoría con Praxis Seguridad?',
                    'a' => 'El proceso es sencillo: 1) Nos cuentas tu situación por teléfono o email. 2) Evaluamos si podemos ayudarte y te damos un presupuesto cerrado. 3) Si aceptas, realizamos el trabajo acordado (visita, análisis, informe). 4) Te entregamos las conclusiones y recomendaciones. Sin sorpresas, sin compromisos adicionales.'
                ],
                [
                    'q' => '¿Instaláis alarmas o cámaras?',
                    'a' => 'No. No vendemos ni instalamos equipos. Nuestro trabajo es asesorar: evaluar qué necesitas, diseñar la solución óptima y supervisar (si lo deseas) la instalación que realice otro. Esto garantiza que nuestras recomendaciones son imparciales y no están influidas por intereses comerciales.'
                ],
                [
                    'q' => '¿Podéis recomendar empresas instaladoras?',
                    'a' => 'Podemos orientarte sobre qué buscar en una empresa instaladora y qué preguntas hacer. Sin embargo, no hacemos recomendaciones directas de empresas concretas para mantener nuestra independencia. Si diseñamos tu sistema, te damos un pliego técnico que puedes usar para solicitar presupuestos comparables.'
                ],
                [
                    'q' => '¿Qué pasa después de la consultoría?',
                    'a' => 'Te entregamos un informe completo con nuestras conclusiones y recomendaciones. A partir de ahí, tú decides qué hacer. Si necesitas ayuda para implementar las recomendaciones (supervisar una instalación, negociar con un proveedor, etc.), podemos ayudarte con un servicio adicional.'
                ],
                [
                    'q' => '¿Ofrecéis servicios de mantenimiento continuado?',
                    'a' => 'Para el servicio de DPO externo, sí ofrecemos un servicio de acompañamiento continuado con cuota mensual. Para el resto de servicios, trabajamos por proyecto. Si después de un tiempo necesitas una nueva auditoría o actualización, estaremos encantados de ayudarte de nuevo.'
                ],
                [
                    'q' => '¿Cómo puedo contactar con vosotros?',
                    'a' => 'Puedes llamarnos al +34 637 474 428, enviarnos un email desde el formulario de contacto, o escribirnos por WhatsApp. Respondemos en menos de 24 horas laborables. Si prefieres, también podemos agendar una videollamada para conocernos.'
                ]
            ];
            
            foreach ($consultoria_faqs as $index => $faq): ?>
                <div class="mb-4 bg-praxis-gray/30 rounded-xl border border-praxis-gray/50 overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none" onclick="toggleFaq('consultoria-<?php echo $index; ?>')">
                        <span class="font-heading font-semibold text-praxis-white pr-4" itemprop="name"><?php echo $faq['q']; ?></span>
                        <i class="fas fa-chevron-down text-praxis-gold transition-transform" id="icon-consultoria-<?php echo $index; ?>"></i>
                    </button>
                    <div class="hidden px-6 pb-5" id="content-consultoria-<?php echo $index; ?>" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p class="text-praxis-gray-light" itemprop="text"><?php echo $faq['a']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</section>

<script>
function toggleFaq(id) {
    const content = document.getElementById('content-' + id);
    const icon = document.getElementById('icon-' + id);
    
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}
</script>


<!-- ============================================
     CTA
     ============================================ -->
<section class="py-24 bg-gradient-to-b from-praxis-black to-praxis-gray">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
            ¿No encuentras tu pregunta?
        </h2>
        <p class="text-praxis-gray-light text-lg mb-10 max-w-2xl mx-auto">
            Estamos aquí para ayudarte. Contacta con nosotros y resolveremos todas tus dudas de forma personalizada.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="contacto.php" class="btn-gold px-10 py-5 rounded-lg text-praxis-black font-heading font-bold uppercase tracking-wider">
                <i class="fas fa-envelope mr-2"></i>Contactar
            </a>
            <a href="tel:+34637474428" class="flex items-center text-praxis-gray-light hover:text-praxis-gold transition-colors">
                <i class="fas fa-phone mr-3 text-praxis-gold"></i>
                <span class="font-medium">+34 637 474 428</span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
