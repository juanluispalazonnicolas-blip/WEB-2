<?php
/**
 * Política de Privacidad
 * Praxis Seguridad
 */

// Set the page title, description
$page_title = "Política de Privacidad | Praxis Seguridad";
$page_description = "Política de privacidad y protección de datos personales de Praxis Seguridad, conforme al RGPD y LOPD.";
$page_keywords = "política privacidad, protección datos, RGPD, LOPD, Praxis Seguridad";
$show_consultation_box = false;

// Include header
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-praxis-black via-praxis-gray-dark to-praxis-black py-24 overflow-hidden">
    <div class="absolute inset-0 bg-dot-pattern opacity-10"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-praxis-gold/10 rounded-2xl mb-6">
                <i class="fas fa-shield-alt text-4xl text-praxis-gold"></i>
            </div>
            <h1 class="text-4xl md:text-5xl font-heading font-bold text-praxis-white mb-6">
                Política de Privacidad
            </h1>
            <p class="text-xl text-praxis-gray-light max-w-2xl mx-auto">
                En Praxis Seguridad protegemos tus datos personales con el máximo rigor y transparencia
            </p>
            <p class="text-sm text-praxis-gray-medium mt-4">
                Última actualización: <?php echo date('d/m/Y'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Introduction -->
        <div class="prose prose-lg max-w-none mb-12">
            <p class="text-praxis-gray text-lg leading-relaxed">
                En cumplimiento del Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016 relativo a la protección de las personas físicas (RGPD), 
                y la Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales (LOPDGDD), 
                <strong>Juan Luis Palazón Nicolás</strong> informa a los usuarios del sitio web <strong>praxisseguridad.es</strong> acerca del tratamiento de los datos personales que voluntariamente hayan facilitado durante el proceso de registro y navegación de la página web.
            </p>
        </div>

        <!-- Sections -->
        <div class="space-y-12">
            
            <!-- 1. Responsable -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    1. Responsable del Tratamiento
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p><strong>Identidad:</strong> Juan Luis Palazón Nicolás</p>
                    <p><strong>Nombre comercial:</strong> Praxis Seguridad</p>
                    <p><strong>NIF:</strong> 48692296Y</p>
                    <p><strong>Domicilio:</strong> Santomera, Región de Murcia, España</p>
                    <p><strong>Email:</strong> <a href="mailto:info@praxisseguridad.es" class="text-praxis-red hover:underline">info@praxisseguridad.es</a></p>
                    <p><strong>Teléfono:</strong> <a href="tel:+34637474428" class="text-praxis-red hover:underline">+34 637 474 428</a></p>
                    <p><strong>Web:</strong> <a href="https://praxisseguridad.es" class="text-praxis-red hover:underline">praxisseguridad.es</a></p>
                </div>
            </div>

            <!-- 2. Finalidad -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    2. Finalidad del Tratamiento
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>Los datos personales que nos facilite serán tratados con las siguientes finalidades:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Gestionar y dar respuesta a las solicitudes de información o consultas realizadas</li>
                        <li>Enviar comunicaciones comerciales sobre productos y servicios de seguridad</li>
                        <li>Gestionar los servicios contratados (auditorías, instalaciones, consultorías)</li>
                        <li>Gestión de usuarios registrados en la plataforma</li>
                        <li>Envío de newsletters y contenido de valor sobre seguridad privada</li>
                        <li>Cumplimiento de obligaciones legales</li>
                        <li>Elaboración de presupuestos personalizados</li>
                        <li>Análisis y mejora de nuestros servicios</li>
                    </ul>
                </div>
            </div>

            <!-- 3. Legitimación -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    3. Legitimación
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>La base legal para el tratamiento de sus datos es:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li><strong>Consentimiento del interesado:</strong> Al facilitar sus datos a través de formularios de contacto, registro o newsletter</li>
                        <li><strong>Ejecución de un contrato:</strong> Para la prestación de servicios contratados</li>
                        <li><strong>Interés legítimo:</strong> Para el envío de comunicaciones comerciales a clientes actuales</li>
                        <li><strong>Cumplimiento legal:</strong> Obligaciones fiscales y contables</li>
                    </ul>
                </div>
            </div>

            <!-- 4. Destinatarios -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    4. Destinatarios de los Datos
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>Sus datos personales no serán cedidos a terceros, salvo obligación legal.</p>
                    <p>Para la prestación de servicios, Praxis Seguridad puede compartir datos con:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Proveedores de servicios de alojamiento web (hosting)</li>
                        <li>Plataformas de email marketing (con garantías RGPD)</li>
                        <li>Servicios de gestión y análisis web</li>
                        <li>Proveedores de servicios de seguridad técnica</li>
                        <li>Asesoría fiscal y contable</li>
                    </ul>
                    <p>Todos los proveedores cumplen con el RGPD y tienen establecidas las medidas de seguridad adecuadas.</p>
                </div>
            </div>

            <!-- 5. Conservación -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    5. Conservación de los Datos
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>Los datos personales se conservarán:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li><strong>Consultas/Presupuestos:</strong> Hasta que se resuelva su solicitud y durante los plazos legales aplicables</li>
                        <li><strong>Clientes:</strong> Durante la relación contractual y hasta 10 años después por obligaciones fiscales</li>
                        <li><strong>Newsletter:</strong> Hasta que solicite la baja o revoque el consentimiento</li>
                        <li><strong>Usuarios registrados:</strong> Mientras mantenga su cuenta activa</li>
                    </ul>
                    <p>Transcurridos estos plazos, los datos serán eliminados o anonimizados.</p>
                </div>
            </div>

            <!-- 6. Derechos -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    6. Derechos del Usuario
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>Como usuario, usted tiene derecho a:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li><strong>Acceso:</strong> Conocer qué datos tratamos sobre usted</li>
                        <li><strong>Rectificación:</strong> Modificar datos inexactos o incompletos</li>
                        <li><strong>Supresión:</strong> Solicitar la eliminación de sus datos</li>
                        <li><strong>Oposición:</strong> Oponerse al tratamiento de sus datos</li>
                        <li><strong>Limitación:</strong> Solicitar la limitación del tratamiento</li>
                        <li><strong>Portabilidad:</strong> Recibir sus datos en formato estructurado</li>
                        <li><strong>Revocación del consentimiento:</strong> En cualquier momento</li>
                    </ul>
                    
                    <div class="bg-praxis-gold/10 p-6 rounded-lg mt-6">
                        <p class="font-semibold text-praxis-black mb-3">¿Cómo ejercer sus derechos?</p>
                        <p>Puede ejercer sus derechos mediante comunicación escrita dirigida a:</p>
                        <p class="mt-2"><strong>Email:</strong> <a href="mailto:info@praxisseguridad.es" class="text-praxis-red hover:underline">info@praxisseguridad.es</a></p>
                        <p><strong>Asunto:</strong> "Ejercicio de derechos RGPD - [Tipo de derecho]"</p>
                        <p class="mt-3 text-sm">Debe incluir fotocopia de su DNI o documento identificativo equivalente.</p>
                    </div>

                    <p class="mt-6">
                        <strong>Derecho a reclamar:</strong> Puede presentar una reclamación ante la Agencia Española de Protección de Datos (AEPD) 
                        en <a href="https://www.aepd.es" target="_blank" class="text-praxis-red hover:underline">www.aepd.es</a> 
                        si considera que el tratamiento no se ajusta a la normativa vigente.
                    </p>
                </div>
            </div>

            <!-- 7. Seguridad -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    7. Medidas de Seguridad
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>Praxis Seguridad ha adoptado las medidas técnicas y organizativas necesarias para garantizar la seguridad de los datos personales y evitar su alteración, pérdida, tratamiento o acceso no autorizado:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Cifrado SSL/TLS en todas las comunicaciones</li>
                        <li>Servidores seguros con protección firewall</li>
                        <li>Copias de seguridad periódicas</li>
                        <li>Acceso restringido a datos personales</li>
                        <li>Políticas de contraseñas robustas</li>
                        <li>Actualización constante de sistemas de seguridad</li>
                    </ul>
                </div>
            </div>

            <!-- 8. Cookies -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    8. Cookies
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>Este sitio web utiliza cookies propias y de terceros para mejorar la experiencia de usuario y ofrecer contenidos adaptados a sus intereses.</p>
                    <p>Puede encontrar información detallada sobre las cookies que utilizamos, su finalidad y cómo gestionarlas en nuestra <a href="#" class="text-praxis-red hover:underline">Política de Cookies</a>.</p>
                </div>
            </div>

            <!-- 9. Menores -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    9. Menores de Edad
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>Los servicios de Praxis Seguridad están dirigidos a mayores de 18 años. No recopilamos intencionadamente información de menores de edad.</p>
                    <p>Si detectamos que hemos recibido datos de un menor sin consentimiento parental, procederemos a su eliminación inmediata.</p>
                </div>
            </div>

            <!-- 10. Modificaciones -->
            <div class="border-l-4 border-praxis-gold pl-6">
                <h2 class="text-2xl font-heading font-bold text-praxis-black mb-4">
                    10. Modificaciones
                </h2>
                <div class="space-y-3 text-praxis-gray">
                    <p>Praxis Seguridad se reserva el derecho de modificar la presente Política de Privacidad para adaptarla a novedades legislativas o jurisprudenciales, así como a prácticas de la industria.</p>
                    <p>Cualquier modificación será publicada en esta página con suficiente antelación a su aplicación.</p>
                </div>
            </div>

        </div>

        <!-- Contact Box -->
        <div class="mt-16 bg-gradient-to-br from-praxis-gold/10 to-praxis-red/5 border border-praxis-gold/30 rounded-2xl p-8">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <i class="fas fa-envelope text-3xl text-praxis-gold"></i>
                </div>
                <div>
                    <h3 class="text-xl font-heading font-bold text-praxis-black mb-3">
                        ¿Tienes dudas sobre tus datos?
                    </h3>
                    <p class="text-praxis-gray mb-4">
                        Si tienes cualquier pregunta sobre cómo tratamos tus datos personales, no dudes en contactarnos.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="mailto:info@praxisseguridad.es" class="inline-flex items-center px-6 py-3 bg-praxis-red text-white rounded-lg hover:bg-praxis-red/90 transition-colors">
                            <i class="fas fa-envelope mr-2"></i>
                            Contactar
                        </a>
                        <a href="<?php echo $base_url; ?>contacto.php" class="inline-flex items-center px-6 py-3 border-2 border-praxis-gold text-praxis-black rounded-lg hover:bg-praxis-gold transition-colors">
                            Formulario de contacto
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
