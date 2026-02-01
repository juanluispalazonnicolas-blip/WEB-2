<?php
/**
 * Praxis Seguridad - Header
 * Cabecera reutilizable con navegación y meta tags
 */

// Variables por defecto si no están definidas
$page_title = $page_title ?? 'Praxis Seguridad | Consultoría Estratégica en Seguridad Privada';
$page_description = $page_description ?? 'Consultoría estratégica en seguridad privada en Murcia. Auditorías, diseño de sistemas, optimización y servicios de vigilancia.';
$current_page = $current_page ?? 'inicio';

// Calcular la ruta base según el directorio actual
$base_url = '';
$current_dir = dirname($_SERVER['PHP_SELF']);
if (strpos($current_dir, '/conocimiento') !== false || strpos($current_dir, '/auth') !== false) {
    $base_url = '../';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="seguridad privada, consultoría seguridad, Murcia, Santomera, auditoría seguridad, alarmas, vigilancia">
    <meta name="author" content="Praxis Seguridad">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_ES">
    
    <title><?php echo htmlspecialchars($page_title); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'praxis': {
                            'black': '#0B0E11',
                            'gold': '#C9A24D',
                            'gold-light': '#D6B66A',
                            'gold-dark': '#8F6B2E',
                            'gray': '#1E2329',
                            'gray-light': '#B8BDC5',
                            'gray-medium': '#8A9099',
                            'white': '#F5F7FA',
                            'light': '#F2F4F7',
                        }
                    },
                    fontFamily: {
                        'heading': ['Montserrat', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Custom Styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0B0E11;
            color: #F5F7FA;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #C9A24D 0%, #D6B66A 50%, #C9A24D 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Gold gradient button */
        .btn-gold {
            background: linear-gradient(135deg, #C9A24D 0%, #8F6B2E 100%);
            transition: all 0.3s ease;
        }
        
        .btn-gold:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(201, 162, 77, 0.3);
        }
        
        /* Card hover effect */
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            border-color: rgba(201, 162, 77, 0.5);
        }
        
        /* Header blur effect */
        .header-blur {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        
        /* Mobile menu animation */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }
        
        .mobile-menu.active {
            transform: translateX(0);
        }
        
        /* Hamburger animation */
        .hamburger span {
            transition: all 0.3s ease;
        }
        
        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }
        
        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }
        
        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }
        
        /* Decorative line */
        .line-gradient {
            background: linear-gradient(90deg, transparent, #C9A24D, transparent);
        }
        
        /* Active nav link */
        .nav-link.active {
            color: #C9A24D;
        }
        
        /* Scroll smooth */
        html {
            scroll-behavior: smooth;
        }
        
        /* ========================================
           ANIMACIONES DE ENTRADA
           ======================================== */
        
        /* Loader/Splash screen */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #0B0E11;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loader-logo {
            animation: pulse-glow 1.5s ease-in-out infinite;
        }
        
        @keyframes pulse-glow {
            0%, 100% { 
                transform: scale(1);
                filter: drop-shadow(0 0 10px rgba(201, 162, 77, 0.5));
            }
            50% { 
                transform: scale(1.05);
                filter: drop-shadow(0 0 30px rgba(201, 162, 77, 0.8));
            }
        }
        
        /* Fade in up animation */
        .animate-on-load {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1.5s ease, transform 1.5s ease;
        }
        
        .animate-on-load.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Fade in from left */
        .animate-from-left {
            opacity: 0;
            transform: translateX(-60px);
            transition: opacity 1.5s ease, transform 1.5s ease;
        }
        
        .animate-from-left.animated {
            opacity: 1;
            transform: translateX(0);
        }
        
        /* Fade in from right */
        .animate-from-right {
            opacity: 0;
            transform: translateX(60px);
            transition: opacity 1.5s ease, transform 1.5s ease;
        }
        
        .animate-from-right.animated {
            opacity: 1;
            transform: translateX(0);
        }
        
        /* Scale in animation */
        .animate-scale {
            opacity: 0;
            transform: scale(0.8);
            transition: opacity 1.2s ease, transform 1.2s ease;
        }
        
        .animate-scale.animated {
            opacity: 1;
            transform: scale(1);
        }
        
        /* Stagger delay classes - LENTAS para entrada suave */
        .delay-100 { transition-delay: 0.3s; }
        .delay-200 { transition-delay: 0.6s; }
        .delay-300 { transition-delay: 0.9s; }
        .delay-400 { transition-delay: 1.2s; }
        .delay-500 { transition-delay: 1.5s; }
        .delay-600 { transition-delay: 1.8s; }
        .delay-700 { transition-delay: 2.1s; }
        .delay-800 { transition-delay: 2.4s; }
        
        /* Text reveal animation */
        .text-reveal {
            overflow: hidden;
        }
        
        .text-reveal span {
            display: inline-block;
            transform: translateY(100%);
            transition: transform 0.8s cubic-bezier(0.77, 0, 0.175, 1);
        }
        
        .text-reveal.animated span {
            transform: translateY(0);
        }
        
        /* Shimmer effect for buttons */
        .btn-shimmer {
            position: relative;
            overflow: hidden;
        }
        
        .btn-shimmer::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to right,
                rgba(255,255,255,0) 0%,
                rgba(255,255,255,0.3) 50%,
                rgba(255,255,255,0) 100%
            );
            transform: rotate(30deg);
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%) rotate(30deg); }
            100% { transform: translateX(100%) rotate(30deg); }
        }
        
        /* Floating animation for decorative elements */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        /* Rotate animation */
        .animate-slow-spin {
            animation: slow-spin 20s linear infinite;
        }
        
        @keyframes slow-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Typing cursor effect */
        .typing-cursor::after {
            content: '|';
            animation: blink 1s step-end infinite;
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        
        /* Background parallax effect */
        .parallax-bg {
            transition: transform 0.1s ease-out;
        }
    </style>
</head>
<body class="bg-praxis-black text-praxis-white antialiased">
    
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 header-blur bg-praxis-black/80 border-b border-praxis-gray/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <a href="<?php echo $base_url; ?>index.php" class="flex items-center space-x-3 group">
                    <img src="<?php echo $base_url; ?>images/logo-praxis.png" alt="Praxis Seguridad Logo" class="h-14 w-auto drop-shadow-lg">
                    <div class="flex flex-col">
                        <span class="text-xl font-heading font-bold text-praxis-white group-hover:text-praxis-gold transition-colors tracking-wide">PRAXIS</span>
                        <span class="text-sm font-heading font-semibold text-praxis-gold tracking-widest">SEGURIDAD</span>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="<?php echo $base_url; ?>index.php" class="nav-link text-sm font-medium uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'inicio' ? 'active' : ''; ?>">
                        Inicio
                    </a>
                    
                    <!-- Servicios Dropdown -->
                    <div class="relative group">
                        <a href="<?php echo $base_url; ?>servicios.php" class="nav-link text-sm font-medium uppercase tracking-wider hover:text-praxis-gold transition-colors flex items-center gap-1 <?php echo $current_page === 'servicios' ? 'active' : ''; ?>">
                            Servicios
                            <i class="fas fa-chevron-down text-xs group-hover:rotate-180 transition-transform"></i>
                        </a>
                        <!-- Dropdown Menu -->
                        <div class="absolute top-full left-0 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="bg-praxis-black border border-praxis-gold/20 rounded-xl shadow-2xl py-2 min-w-[280px]">
                                <a href="<?php echo $base_url; ?>servicios.php#consultoria" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-chess-queen text-praxis-gold w-5"></i>
                                    <span class="text-praxis-white text-sm">Consultoría Estratégica</span>
                                </a>
                                <a href="<?php echo $base_url; ?>servicios.php#auditoria" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-magnifying-glass-chart text-praxis-gold w-5"></i>
                                    <span class="text-praxis-white text-sm">Auditoría de Riesgos</span>
                                </a>
                                <a href="<?php echo $base_url; ?>servicios.php#peritaje" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-gavel text-praxis-gold w-5"></i>
                                    <span class="text-praxis-white text-sm">Peritaje Judicial</span>
                                </a>
                                <a href="<?php echo $base_url; ?>servicios.php#sistemas" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-sitemap text-praxis-gold w-5"></i>
                                    <span class="text-praxis-white text-sm">Diseño de Sistemas</span>
                                </a>
                                <a href="<?php echo $base_url; ?>servicios.php#optimizacion" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-gears text-praxis-gold w-5"></i>
                                    <span class="text-praxis-white text-sm">Optimización</span>
                                </a>
                                <a href="<?php echo $base_url; ?>servicios.php#vigilancia" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-user-shield text-praxis-gold w-5"></i>
                                    <span class="text-praxis-white text-sm">Vigilancia y Auxiliares</span>
                                </a>
                                <a href="<?php echo $base_url; ?>servicios.php#dpo" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-shield-halved text-praxis-gold w-5"></i>
                                    <span class="text-praxis-white text-sm">Protección de Datos (DPO)</span>
                                </a>
                                <a href="<?php echo $base_url; ?>servicios.php#tecnologia" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-microchip text-praxis-gold w-5"></i>
                                    <span class="text-praxis-white text-sm">Tecnología e IA</span>
                                </a>
                                <!-- Separador -->
                                <div class="h-px bg-praxis-gold/20 my-2 mx-4"></div>
                                <a href="<?php echo $base_url; ?>empresas-seguridad.php" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-building text-blue-400 w-5"></i>
                                    <span class="text-praxis-white text-sm">Para Empresas de Seguridad</span>
                                </a>
                                <a href="<?php echo $base_url; ?>clientes.php" class="flex items-center gap-3 px-4 py-3 hover:bg-praxis-gold/10 transition-colors">
                                    <i class="fas fa-home text-green-400 w-5"></i>
                                    <span class="text-praxis-white text-sm">Para Particulares y Empresas</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="<?php echo $base_url; ?>sobre-mi.php" class="nav-link text-sm font-medium uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'sobre-mi' ? 'active' : ''; ?>">
                        Sobre Mí
                    </a>
                    
                    <a href="<?php echo $base_url; ?>casos-exito.php" class="nav-link text-sm font-medium uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'casos-exito' ? 'active' : ''; ?>">
                        Casos de Éxito
                    </a>
                    
                    <a href="<?php echo $base_url; ?>faq.php" class="nav-link text-sm font-medium uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'faq' ? 'active' : ''; ?>">
                        FAQ
                    </a>
                    
                    <a href="<?php echo $base_url; ?>conocimiento.php" class="nav-link text-sm font-medium uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'conocimiento' ? 'active' : ''; ?>">
                        <i class="fas fa-graduation-cap mr-1"></i>Conocimiento
                    </a>
                    
                    <a href="<?php echo $base_url; ?>contacto.php" class="nav-link text-sm font-medium uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'contacto' ? 'active' : ''; ?>">
                        Contacto
                    </a>
                    <a href="<?php echo $base_url; ?>contacto.php" class="btn-gold px-6 py-3 rounded-lg text-praxis-black font-heading font-semibold text-sm uppercase tracking-wider">
                        Solicitar Consultoría
                    </a>
                </nav>
                
                <!-- Mobile Menu Button -->
                <button class="lg:hidden hamburger flex flex-col justify-center items-center w-10 h-10" onclick="toggleMobileMenu()">
                    <span class="block w-6 h-0.5 bg-praxis-white mb-1.5"></span>
                    <span class="block w-6 h-0.5 bg-praxis-white mb-1.5"></span>
                    <span class="block w-6 h-0.5 bg-praxis-white"></span>
                </button>
            </div>
        </div>
        
        <!-- Decorative line -->
        <div class="h-px line-gradient"></div>
    </header>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu fixed inset-0 z-40 lg:hidden">
        <div class="absolute inset-0 bg-praxis-black/95 header-blur"></div>
        <div class="relative h-full flex flex-col items-center justify-center space-y-8">
            <a href="<?php echo $base_url; ?>index.php" class="text-2xl font-heading font-bold uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'inicio' ? 'text-praxis-gold' : ''; ?>">
                Inicio
            </a>
            <a href="<?php echo $base_url; ?>servicios.php" class="text-2xl font-heading font-bold uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'servicios' ? 'text-praxis-gold' : ''; ?>">
                Servicios
            </a>
            <a href="<?php echo $base_url; ?>sobre-mi.php" class="text-2xl font-heading font-bold uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'sobre-mi' ? 'text-praxis-gold' : ''; ?>">
                Sobre Mí
            </a>
            <a href="<?php echo $base_url; ?>casos-exito.php" class="text-2xl font-heading font-bold uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'casos-exito' ? 'text-praxis-gold' : ''; ?>">
                Casos de Éxito
            </a>
            <a href="<?php echo $base_url; ?>faq.php" class="text-2xl font-heading font-bold uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'faq' ? 'text-praxis-gold' : ''; ?>">
                FAQ
            </a>
            <a href="<?php echo $base_url; ?>contacto.php" class="text-2xl font-heading font-bold uppercase tracking-wider hover:text-praxis-gold transition-colors <?php echo $current_page === 'contacto' ? 'text-praxis-gold' : ''; ?>">
                Contacto
            </a>
            <a href="<?php echo $base_url; ?>contacto.php" class="btn-gold px-8 py-4 rounded-lg text-praxis-black font-heading font-semibold text-lg uppercase tracking-wider mt-8">
                Solicitar Consultoría
            </a>
        </div>
    </div>
    
    <script>
        function toggleMobileMenu() {
            const menu = document.querySelector('.mobile-menu');
            const hamburger = document.querySelector('.hamburger');
            menu.classList.toggle('active');
            hamburger.classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');
        }
    </script>
    
    <!-- Main Content -->
    <main>
