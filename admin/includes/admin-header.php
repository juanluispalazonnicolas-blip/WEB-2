<?php
/**
 * Admin Header
 * Header común para todas las páginas del admin
 */

if (!defined('ADMIN_HEADER_LOADED')) {
    define('ADMIN_HEADER_LOADED', true);
}

$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Admin Panel'; ?> | Praxis Seguridad</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'praxis-black': '#1a1a1a',
                        'praxis-gray': '#2d2d2d',
                        'praxis-gold': '#C9A24D',
                        'praxis-gold-dark': '#A68539',
                        'praxis-light': '#f8f8f8'
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50">
    
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-praxis-black shadow-xl z-50">
        
        <!-- Logo -->
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-lg flex items-center justify-center">
                    <i class="fas fa-shield-halved text-praxis-black"></i>
                </div>
                <div>
                    <h1 class="text-white font-bold text-lg">Praxis Admin</h1>
                    <p class="text-gray-400 text-xs">Panel de Control</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="p-4 space-y-2">
            <a href="/admin/dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-white/10 hover:text-praxis-gold transition-colors <?php echo $current_page === 'dashboard' ? 'bg-white/10 text-praxis-gold' : ''; ?>">
                <i class="fas fa-chart-line w-5"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="/admin/suscriptores.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-white/10 hover:text-praxis-gold transition-colors <?php echo $current_page === 'suscriptores' ? 'bg-white/10 text-praxis-gold' : ''; ?>">
                <i class="fas fa-users w-5"></i>
                <span>Suscriptores</span>
            </a>
            
            <a href="/admin/campanas.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-white/10 hover:text-praxis-gold transition-colors <?php echo $current_page === 'campanas' ? 'bg-white/10 text-praxis-gold' : ''; ?>">
                <i class="fas fa-paper-plane w-5"></i>
                <span>Campañas</span>
            </a>
            
            <div class="my-4 border-t border-white/10"></div>
            
            <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-white/10 hover:text-white transition-colors">
                <i class="fas fa-external-link-alt w-5"></i>
                <span>Ver Sitio</span>
            </a>
        </nav>
        
        <!-- User Info & Logout -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-praxis-gold/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user text-praxis-gold text-sm"></i>
                    </div>
                    <div class="text-xs">
                        <p class="text-white font-medium">Admin</p>
                        <p class="text-gray-400">Conectado</p>
                    </div>
                </div>
                <a href="/admin/logout.php" class="text-gray-400 hover:text-red-400 transition-colors" title="Cerrar Sesión">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </aside>
    
    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        
        <!-- Top Bar -->
        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-40">
            <div class="px-8 py-4 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800"><?php echo $page_title ?? 'Admin Panel'; ?></h2>
                    <?php if (isset($page_subtitle)): ?>
                        <p class="text-sm text-gray-500 mt-1"><?php echo $page_subtitle; ?></p>
                    <?php endif; ?>
                </div>
                <div class="text-sm text-gray-500">
                    <i class="far fa-calendar mr-2"></i>
                    <?php echo date('d M Y, H:i'); ?>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
        <main class="p-8">
