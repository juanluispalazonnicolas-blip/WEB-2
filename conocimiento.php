<?php
/**
 * Praxis Seguridad - Centro de Conocimiento
 * Portal principal con categorías y artículos
 */

$page_title = 'Centro de Conocimiento | Praxis Seguridad';
$page_description = 'Guías, manuales y recursos técnicos sobre seguridad: CCTV, alarmas, control de accesos, protección de datos y normativa.';
$current_page = 'conocimiento';

include 'includes/header.php';

// Categorías del centro de conocimiento
$categorias = [
    [
        'id' => 'cctv',
        'nombre' => 'CCTV y Videovigilancia',
        'descripcion' => 'Guías de configuración, instalación y normativa de sistemas de videovigilancia',
        'icono' => 'fa-video',
        'color' => 'from-blue-500 to-blue-700',
        'articulos' => 8
    ],
    [
        'id' => 'alarmas',
        'nombre' => 'Sistemas de Alarma',
        'descripcion' => 'Configuración de centrales, detectores, conexión a CRA y mantenimiento',
        'icono' => 'fa-bell',
        'color' => 'from-red-500 to-red-700',
        'articulos' => 6
    ],
    [
        'id' => 'accesos',
        'nombre' => 'Control de Accesos',
        'descripcion' => 'Sistemas biométricos, tarjetas, tornos y cerraduras inteligentes',
        'icono' => 'fa-fingerprint',
        'color' => 'from-green-500 to-green-700',
        'articulos' => 5
    ],
    [
        'id' => 'rgpd',
        'nombre' => 'Protección de Datos',
        'descripcion' => 'Cumplimiento RGPD, obligaciones legales y guías prácticas',
        'icono' => 'fa-shield-halved',
        'color' => 'from-purple-500 to-purple-700',
        'articulos' => 7
    ],
    [
        'id' => 'normativa',
        'nombre' => 'Normativa y Legislación',
        'descripcion' => 'Ley de Seguridad Privada, reglamentos y actualizaciones legales',
        'icono' => 'fa-gavel',
        'color' => 'from-amber-500 to-amber-700',
        'articulos' => 4
    ],
    [
        'id' => 'manuales',
        'nombre' => 'Manuales Técnicos',
        'descripcion' => 'Documentación de productos y guías de instalación',
        'icono' => 'fa-book',
        'color' => 'from-teal-500 to-teal-700',
        'articulos' => 10
    ]
];

// Artículos destacados - IDs deben coincidir con los de articulo.php
$articulos_destacados = [
    [
        'id' => 'guia-rgpd-empresas',
        'titulo' => 'Guía RGPD para empresas: todo lo que debes saber',
        'categoria' => 'Protección de Datos',
        'categoria_id' => 'rgpd',
        'excerpt' => 'Resumen completo del Reglamento General de Protección de Datos y sus obligaciones para empresas.',
        'fecha' => '2024-01-20',
        'acceso' => 'public'
    ],
    [
        'id' => 'elegir-sistema-alarma',
        'titulo' => 'Cómo elegir un sistema de alarma',
        'categoria' => 'Sistemas de Alarma',
        'categoria_id' => 'alarmas',
        'excerpt' => 'Criterios profesionales para seleccionar el sistema de alarma más adecuado según tus necesidades.',
        'fecha' => '2024-01-18',
        'acceso' => 'public'
    ],
    [
        'id' => 'configuracion-nvr-hikvision',
        'titulo' => 'Configuración inicial de NVR Hikvision',
        'categoria' => 'CCTV y Videovigilancia',
        'categoria_id' => 'cctv',
        'excerpt' => 'Guía paso a paso para configurar tu grabador de red Hikvision desde cero.',
        'fecha' => '2024-01-20',
        'acceso' => 'public'
    ],
    [
        'id' => 'detectores-pir-ubicacion',
        'titulo' => 'Detectores PIR: tipos y ubicación correcta',
        'categoria' => 'Sistemas de Alarma',
        'categoria_id' => 'alarmas',
        'excerpt' => 'Evita falsas alarmas con una correcta selección y ubicación de detectores de movimiento.',
        'fecha' => '2024-01-12',
        'acceso' => 'public'
    ]
];
?>

<!-- Hero Section -->
<section class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-praxis-black via-praxis-gray to-praxis-black pt-20">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23C9A24D\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-scale delay-100">
            <div class="w-20 h-20 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-graduation-cap text-praxis-black text-3xl"></i>
            </div>
        </div>
        
        <h1 class="font-heading font-extrabold text-4xl md:text-5xl lg:text-6xl mb-6 animate-on-load delay-200">
            <span class="text-praxis-white">Centro de</span>
            <span class="gradient-text"> Conocimiento</span>
        </h1>
        
        <p class="text-praxis-gray-light text-lg md:text-xl max-w-2xl mx-auto mb-8 animate-on-load delay-300">
            Guías técnicas, manuales y recursos para profesionales de la seguridad. 
            Aprende de expertos con más de 15 años de experiencia.
        </p>
        
        <!-- Buscador -->
        <div class="max-w-xl mx-auto animate-on-load delay-400">
            <form action="conocimiento/buscar.php" method="GET" class="relative">
                <input type="text" name="q" placeholder="Buscar artículos, guías, manuales..." 
                       class="w-full px-6 py-4 pl-14 bg-praxis-gray/50 border border-praxis-gray/50 rounded-xl text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none">
                <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-praxis-gray-light"></i>
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-2 bg-praxis-gold text-praxis-black rounded-lg font-semibold hover:bg-white transition-colors">
                    Buscar
                </button>
            </form>
        </div>
    </div>
</section>


<!-- Categorías -->
<section class="py-20 bg-praxis-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-3">
                Explora por tema
            </p>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-black">
                Categorías
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($categorias as $cat): ?>
                <a href="conocimiento/categoria.php?cat=<?php echo $cat['id']; ?>" 
                   class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br <?php echo $cat['color']; ?> rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas <?php echo $cat['icono']; ?> text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-heading font-bold text-lg text-praxis-black mb-2 group-hover:text-praxis-gold transition-colors">
                                <?php echo $cat['nombre']; ?>
                            </h3>
                            <p class="text-praxis-gray-medium text-sm mb-3">
                                <?php echo $cat['descripcion']; ?>
                            </p>
                            <span class="text-xs text-praxis-gold font-medium">
                                <?php echo $cat['articulos']; ?> artículos →
                            </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Artículos Destacados -->
<section class="py-20 bg-praxis-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-12">
            <div>
                <p class="text-praxis-gold font-heading font-medium text-sm uppercase tracking-wider mb-3">
                    Lo más reciente
                </p>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-praxis-white">
                    Artículos Destacados
                </h2>
            </div>
            <a href="conocimiento/todos.php" class="hidden md:flex items-center gap-2 text-praxis-gold hover:text-white transition-colors">
                Ver todos <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($articulos_destacados as $articulo): ?>
                <article class="bg-praxis-gray/30 rounded-2xl p-6 border border-praxis-gray/30 hover:border-praxis-gold/50 transition-colors group">
                    <div class="flex items-start justify-between mb-4">
                        <span class="px-3 py-1 bg-praxis-gold/20 text-praxis-gold text-xs rounded-full">
                            <?php echo $articulo['categoria']; ?>
                        </span>
                        <?php if ($articulo['acceso'] === 'registered'): ?>
                            <span class="flex items-center gap-1 text-xs text-praxis-gray-light">
                                <i class="fas fa-lock"></i> Registro
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="font-heading font-bold text-xl text-praxis-white mb-3 group-hover:text-praxis-gold transition-colors">
                        <a href="conocimiento/articulo.php?id=<?php echo strtolower(str_replace(' ', '-', $articulo['titulo'])); ?>">
                            <?php echo $articulo['titulo']; ?>
                        </a>
                    </h3>
                    
                    <p class="text-praxis-gray-light text-sm mb-4">
                        <?php echo $articulo['excerpt']; ?>
                    </p>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-praxis-gray-medium">
                            <i class="far fa-calendar mr-1"></i>
                            <?php echo date('d M Y', strtotime($articulo['fecha'])); ?>
                        </span>
                        <a href="conocimiento/articulo.php?cat=<?php echo $articulo['categoria_id']; ?>&id=<?php echo strtolower(str_replace(' ', '-', $articulo['titulo'])); ?>" 
                           class="text-praxis-gold text-sm font-medium hover:underline">
                            Leer más →
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-8 md:hidden">
            <a href="conocimiento/todos.php" class="inline-flex items-center gap-2 text-praxis-gold hover:text-white transition-colors">
                Ver todos los artículos <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>


<!-- CTA Registro -->
<section class="py-16 bg-gradient-to-r from-praxis-gold to-praxis-gold-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="w-16 h-16 bg-praxis-black rounded-2xl flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-user-plus text-praxis-gold text-2xl"></i>
        </div>
        
        <h2 class="font-heading font-bold text-3xl text-praxis-black mb-4">
            Accede a todo el contenido
        </h2>
        <p class="text-praxis-black/80 text-lg mb-8 max-w-2xl mx-auto">
            Regístrate gratis para desbloquear guías avanzadas, manuales en PDF y recibir actualizaciones del sector.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="auth/register.php" class="px-8 py-4 bg-praxis-black text-praxis-gold font-heading font-bold uppercase tracking-wider rounded-lg hover:bg-praxis-gray transition-colors">
                <i class="fas fa-user-plus mr-2"></i>Crear Cuenta Gratis
            </a>
            <a href="auth/login.php" class="px-8 py-4 border-2 border-praxis-black text-praxis-black font-heading font-semibold rounded-lg hover:bg-praxis-black hover:text-praxis-gold transition-colors">
                Ya tengo cuenta
            </a>
        </div>
    </div>
</section>


<!-- Recursos Adicionales -->
<section class="py-20 bg-praxis-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="font-heading font-bold text-3xl text-praxis-black mb-4">
                Recursos Externos
            </h2>
            <p class="text-praxis-gray-medium max-w-2xl mx-auto">
                Enlaces útiles a documentación oficial de fabricantes y normativa
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Visiotech -->
            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-external-link-alt text-blue-600"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-praxis-black mb-2">Visiotech Security</h3>
                <p class="text-praxis-gray-medium text-sm mb-4">Centro de soporte con manuales y guías de configuración.</p>
                <a href="https://support.visiotechsecurity.com/hc/es" target="_blank" class="text-blue-600 text-sm hover:underline">
                    Visitar portal →
                </a>
            </div>
            
            <!-- ByDemes -->
            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-external-link-alt text-green-600"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-praxis-black mb-2">By Demes Group</h3>
                <p class="text-praxis-gray-medium text-sm mb-4">Centro de descargas con documentación técnica y comercial.</p>
                <a href="https://bydemes.com/es/soporte/centro-de-descargas" target="_blank" class="text-green-600 text-sm hover:underline">
                    Visitar portal →
                </a>
            </div>
            
            <!-- Securimport -->
            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-external-link-alt text-purple-600"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-praxis-black mb-2">Securimport University</h3>
                <p class="text-praxis-gray-medium text-sm mb-4">Formación y recursos sobre CCTV, alarmas y networking.</p>
                <a href="https://www.securimport.com/blog/university-securimport-1" target="_blank" class="text-purple-600 text-sm hover:underline">
                    Visitar portal →
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
