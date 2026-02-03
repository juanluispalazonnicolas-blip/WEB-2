<?php
/**
 * Praxis Seguridad - Casos de Éxito
 * Portfolio de proyectos y testimonios
 */

$page_title = 'Casos de Éxito | Proyectos de Consultoría en Seguridad | Praxis Seguridad';
$page_description = 'Descubre cómo hemos ayudado a empresas y particulares a mejorar su seguridad. Casos reales de auditorías, optimizaciones y diseño de sistemas en Murcia.';
$current_page = 'casos-exito';

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
                Nuestro Trabajo
            </p>
            <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-6xl text-praxis-white mb-6 leading-tight">
                Casos de <span class="gradient-text">éxito</span>
            </h1>
            <p class="text-praxis-gray-light text-xl leading-relaxed">
                Cada proyecto es único. Aquí compartimos algunos ejemplos de cómo hemos ayudado a empresas y particulares 
                a mejorar su seguridad de forma real y medible.
            </p>
        </div>
    </div>
    
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-praxis-gold/50 to-transparent"></div>
</section>


<!-- ============================================
     ESTADÍSTICAS
     ============================================ -->
<section class="py-16 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php
            $stats = [
                ['number' => '+50', 'label' => 'Proyectos completados'],
                ['number' => '98%', 'label' => 'Clientes satisfechos'],
                ['number' => '-35%', 'label' => 'Reducción media de costes'],
                ['number' => '+15', 'label' => 'Años de experiencia']
            ];
            foreach ($stats as $stat): ?>
                <div class="text-center">
                    <p class="font-heading font-bold text-3xl md:text-4xl text-praxis-gold mb-2"><?php echo $stat['number']; ?></p>
                    <p class="text-praxis-gray-light text-sm"><?php echo $stat['label']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================
     CASOS DE ÉXITO DESTACADOS
     ============================================ -->
<section class="py-24 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Proyectos Destacados
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                Resultados que <span class="gradient-text">hablan por sí solos</span>
            </h2>
        </div>
        
        <?php
        $cases = [
            [
                'title' => 'Auditoría integral para cadena hotelera',
                'client' => 'Grupo Hotelero Regional',
                'sector' => 'Hostelería',
                'sector_icon' => 'fa-hotel',
                'sector_color' => 'blue',
                'challenge' => 'Una cadena de 5 hoteles en la Costa Cálida estaba pagando más de 180.000€ anuales en servicios de seguridad sin tener claro si la inversión era proporcional al riesgo real.',
                'solution' => 'Realizamos una auditoría completa de todas las instalaciones, analizando sistemas de CCTV, control de accesos, procedimientos del personal y contratos con proveedores. Detectamos sistemas duplicados, cámaras mal ubicadas y servicios de vigilancia en horarios innecesarios.',
                'results' => [
                    'Reducción del 28% en costes anuales de seguridad',
                    'Mejora del 40% en cobertura real de CCTV',
                    'Eliminación de 3 contratos redundantes',
                    'Nuevo protocolo de seguridad unificado'
                ],
                'quote' => 'Pensábamos que estábamos bien protegidos porque gastábamos mucho. La auditoría nos demostró que estábamos tirando dinero en cosas que no servían.',
                'quote_author' => 'Director de Operaciones',
                'image' => 'https://images.pexels.com/photos/261102/pexels-photo-261102.jpeg?auto=compress&cs=tinysrgb&w=800'
            ],
            [
                'title' => 'Diseño de sistema para nave industrial',
                'client' => 'Empresa de Logística',
                'sector' => 'Logística',
                'sector_icon' => 'fa-warehouse',
                'sector_color' => 'amber',
                'challenge' => 'Una empresa de logística con una nave de 8.000m² había recibido 3 presupuestos de alarmas muy diferentes entre sí (desde 15.000€ hasta 45.000€) y no sabía cuál elegir ni si alguno era realmente adecuado.',
                'solution' => 'Analizamos las necesidades reales: flujos de mercancía, turnos de trabajo, puntos de acceso, historial de incidencias. Diseñamos un sistema a medida y redactamos un pliego técnico para que pudieran solicitar presupuestos comparables.',
                'results' => [
                    'Sistema óptimo por 22.000€',
                    'Ahorro de 23.000€ respecto al presupuesto más caro',
                    'Cobertura completa sin puntos ciegos',
                    'Integración con CRA local'
                ],
                'quote' => 'Sin el asesoramiento, habríamos contratado el más barato pensando que ahorrábamos. Habría sido un desastre.',
                'quote_author' => 'Gerente de Operaciones',
                'image' => 'https://images.pexels.com/photos/1427541/pexels-photo-1427541.jpeg?auto=compress&cs=tinysrgb&w=800'
            ],
            [
                'title' => 'Optimización para empresa de seguridad',
                'client' => 'Empresa de Vigilancia',
                'sector' => 'Seguridad Privada',
                'sector_icon' => 'fa-user-shield',
                'sector_color' => 'purple',
                'challenge' => 'Una empresa de seguridad con 40 vigilantes tenía problemas de rentabilidad. Los márgenes eran cada vez más ajustados y la rotación de personal superaba el 35% anual.',
                'solution' => 'Realizamos una auditoría operativa completa: analizamos contratos, rutas de acuda, procedimientos, formación del personal y satisfacción de clientes. Identificamos ineficiencias en planificación y puntos de mejora en la gestión de personal.',
                'results' => [
                    'Reducción de rotación al 18%',
                    'Mejora del margen bruto en 6 puntos',
                    'Optimización de rutas de acuda (-25% km)',
                    'Nuevo sistema de incentivos'
                ],
                'quote' => 'Estábamos tan metidos en el día a día que no veíamos los problemas estructurales. La consultoría nos abrió los ojos.',
                'quote_author' => 'Director General',
                'image' => 'https://images.pexels.com/photos/8369517/pexels-photo-8369517.jpeg?auto=compress&cs=tinysrgb&w=800'
            ],
            [
                'title' => 'Peritaje judicial en robo con fuerza',
                'client' => 'Comercio Minorista',
                'sector' => 'Retail',
                'sector_icon' => 'fa-store',
                'sector_color' => 'green',
                'challenge' => 'Un comercio sufrió un robo y la aseguradora rechazaba cubrir el siniestro alegando que el sistema de alarma no funcionaba correctamente. El propietario aseguraba que sí.',
                'solution' => 'Elaboramos un informe pericial técnico analizando el sistema de alarma, los registros de eventos, el contrato de mantenimiento y las evidencias del robo. Determinamos que el sistema funcionaba correctamente pero la CRA no actuó según protocolo.',
                'results' => [
                    'Informe pericial presentado en juicio',
                    'Sentencia favorable al comerciante',
                    'Indemnización completa del seguro',
                    'Reclamación a la CRA por negligencia'
                ],
                'quote' => 'Sin el informe pericial, habría perdido el juicio y 80.000€. La inversión en el peritaje fue la mejor decisión.',
                'quote_author' => 'Propietario del comercio',
                'image' => 'https://images.pexels.com/photos/5668859/pexels-photo-5668859.jpeg?auto=compress&cs=tinysrgb&w=800'
            ],
            [
                'title' => 'Implantación DPO para clínica médica',
                'client' => 'Centro Médico Privado',
                'sector' => 'Sanidad',
                'sector_icon' => 'fa-hospital',
                'sector_color' => 'red',
                'challenge' => 'Una clínica con 15 empleados necesitaba cumplir con el RGPD pero no sabía por dónde empezar. Manejaban datos de salud (categoría especial) y temían una inspección de la AEPD.',
                'solution' => 'Realizamos una auditoría de cumplimiento, identificamos todos los tratamientos de datos, implementamos las medidas técnicas y organizativas necesarias, y formamos al personal. Asumimos el rol de DPO externo.',
                'results' => [
                    'Cumplimiento RGPD completo',
                    'Registro de actividades de tratamiento',
                    'Políticas de privacidad actualizadas',
                    'Formación a todo el personal'
                ],
                'quote' => 'Pensábamos que el RGPD era solo poner un banner de cookies. Ahora entendemos que proteger los datos de nuestros pacientes es fundamental.',
                'quote_author' => 'Directora Médica',
                'image' => 'https://images.pexels.com/photos/3259624/pexels-photo-3259624.jpeg?auto=compress&cs=tinysrgb&w=800'
            ]
        ];
        
        foreach ($cases as $index => $case):
            $isEven = $index % 2 === 0;
            $colorClasses = [
                'blue' => 'bg-blue-500/10 text-blue-400 border-blue-500/30',
                'amber' => 'bg-amber-500/10 text-amber-400 border-amber-500/30',
                'purple' => 'bg-purple-500/10 text-purple-400 border-purple-500/30',
                'green' => 'bg-green-500/10 text-green-400 border-green-500/30',
                'red' => 'bg-red-500/10 text-red-400 border-red-500/30'
            ];
            $colorClass = $colorClasses[$case['sector_color']];
        ?>
        
        <div class="mb-20 last:mb-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                
                <!-- Image -->
                <div class="<?php echo $isEven ? 'lg:order-1' : 'lg:order-2'; ?>">
                    <div class="relative sticky top-24">
                        <div class="aspect-video rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo $case['image']; ?>" 
                                 alt="<?php echo $case['title']; ?>" 
                                 class="w-full h-full object-cover">
                        </div>
                        <!-- Quote overlay -->
                        <div class="mt-6 p-6 bg-praxis-gray/50 rounded-xl border border-praxis-gold/20">
                            <i class="fas fa-quote-left text-praxis-gold text-2xl mb-4"></i>
                            <p class="text-praxis-gray-light italic mb-4"><?php echo $case['quote']; ?></p>
                            <p class="text-praxis-gold text-sm font-medium">— <?php echo $case['quote_author']; ?>, <?php echo $case['client']; ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="<?php echo $isEven ? 'lg:order-2' : 'lg:order-1'; ?>">
                    <!-- Sector badge -->
                    <div class="inline-flex items-center px-3 py-1 <?php echo $colorClass; ?> border rounded-full text-xs font-medium mb-4">
                        <i class="fas <?php echo $case['sector_icon']; ?> mr-2"></i>
                        <?php echo $case['sector']; ?>
                    </div>
                    
                    <h3 class="font-heading font-bold text-2xl md:text-3xl text-praxis-white mb-2">
                        <?php echo $case['title']; ?>
                    </h3>
                    
                    <p class="text-praxis-gold font-medium mb-6">
                        <?php echo $case['client']; ?>
                    </p>
                    
                    <!-- Challenge -->
                    <div class="mb-6">
                        <h4 class="font-heading font-semibold text-lg text-praxis-white mb-3 flex items-center gap-2">
                            <i class="fas fa-triangle-exclamation text-red-400"></i> El reto
                        </h4>
                        <p class="text-praxis-gray-light leading-relaxed">
                            <?php echo $case['challenge']; ?>
                        </p>
                    </div>
                    
                    <!-- Solution -->
                    <div class="mb-6">
                        <h4 class="font-heading font-semibold text-lg text-praxis-white mb-3 flex items-center gap-2">
                            <i class="fas fa-lightbulb text-amber-400"></i> Nuestra solución
                        </h4>
                        <p class="text-praxis-gray-light leading-relaxed">
                            <?php echo $case['solution']; ?>
                        </p>
                    </div>
                    
                    <!-- Results -->
                    <div class="p-6 bg-praxis-gold/5 border border-praxis-gold/20 rounded-xl">
                        <h4 class="font-heading font-semibold text-lg text-praxis-white mb-4 flex items-center gap-2">
                            <i class="fas fa-chart-line text-green-400"></i> Resultados
                        </h4>
                        <ul class="space-y-3">
                            <?php foreach ($case['results'] as $result): ?>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check text-praxis-gold mt-1"></i>
                                    <span class="text-praxis-gray-light"><?php echo $result; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <?php if ($index < count($cases) - 1): ?>
                <div class="mt-20 h-px bg-gradient-to-r from-transparent via-praxis-gold/30 to-transparent"></div>
            <?php endif; ?>
        </div>
        
        <?php endforeach; ?>
        
    </div>
</section>


<!-- ============================================
     SECTORES
     ============================================ -->
<section class="py-24 bg-praxis-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-4">
                Experiencia Multisectorial
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                Sectores en los que <span class="gradient-text">hemos trabajado</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <?php
            $sectors = [
                ['icon' => 'fa-hotel', 'name' => 'Hostelería'],
                ['icon' => 'fa-warehouse', 'name' => 'Logística'],
                ['icon' => 'fa-store', 'name' => 'Retail'],
                ['icon' => 'fa-industry', 'name' => 'Industria'],
                ['icon' => 'fa-hospital', 'name' => 'Sanidad'],
                ['icon' => 'fa-building', 'name' => 'Oficinas'],
                ['icon' => 'fa-graduation-cap', 'name' => 'Educación'],
                ['icon' => 'fa-home', 'name' => 'Residencial'],
                ['icon' => 'fa-user-shield', 'name' => 'Seguridad'],
                ['icon' => 'fa-car', 'name' => 'Automoción'],
                ['icon' => 'fa-utensils', 'name' => 'Restauración'],
                ['icon' => 'fa-landmark', 'name' => 'Instituciones']
            ];
            foreach ($sectors as $sector): ?>
                <div class="text-center p-6 bg-praxis-black/50 rounded-xl border border-praxis-gray/50 hover:border-praxis-gold/30 transition-colors">
                    <i class="fas <?php echo $sector['icon']; ?> text-praxis-gold text-2xl mb-3"></i>
                    <p class="text-praxis-gray-light text-sm"><?php echo $sector['name']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================
     CTA
     ============================================ -->
<section class="py-24 bg-gradient-to-b from-praxis-gray to-praxis-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white mb-6">
            ¿Quieres ser el próximo <span class="gradient-text">caso de éxito</span>?
        </h2>
        <p class="text-praxis-gray-light text-lg mb-10 max-w-2xl mx-auto">
            Cuéntame tu situación y veamos cómo puedo ayudarte a mejorar tu seguridad de forma real y medible.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="contacto.php" class="btn-gold px-10 py-5 rounded-lg text-praxis-black font-heading font-bold uppercase tracking-wider">
                <i class="fas fa-comments mr-2"></i>Solicitar Consultoría
            </a>
            <a href="tel:+34637474428" class="flex items-center text-praxis-gray-light hover:text-praxis-gold transition-colors">
                <i class="fas fa-phone mr-3 text-praxis-gold"></i>
                <span class="font-medium">+34 637 474 428</span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
