<?php
/**
 * Admin Login Page
 */

require_once __DIR__ . '/includes/admin-auth.php';

admin_session_start();

// Si ya está logueado, redirigir a dashboard
if (is_admin_logged_in()) {
    header('Location: /admin/dashboard.php');
    exit();
}

$error_message = '';
$success_message = '';

// Procesar login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $csrf_token = $_POST['csrf_token'] ?? '';
    
    if (!verify_csrf_token($csrf_token)) {
        $error_message = 'Token de seguridad inválido.';
    } else {
        $result = admin_attempt_login($username, $password);
        
        if ($result['success']) {
            $redirect = $_GET['redirect'] ?? '/admin/dashboard.php';
            header('Location: ' . $redirect);
            exit();
        } else {
            $error_message = $result['message'];
        }
    }
}

$csrf_token = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Praxis Seguridad</title>
    
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
    
    <style>
        body {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    
    <div class="w-full max-w-md">
        
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-shield-halved text-praxis-black text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-white mb-2">Panel de Administración</h1>
            <p class="text-gray-400 text-sm">Praxis Seguridad</p>
        </div>
        
        <!-- Login Form -->
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 shadow-2xl border border-white/20">
            
            <?php if ($error_message): ?>
                <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-lg text-red-200 text-sm">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="" class="space-y-6">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-200 mb-2">
                        <i class="fas fa-user mr-2"></i>Usuario
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        required
                        autofocus
                        autocomplete="username"
                        class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-praxis-gold focus:border-transparent"
                        placeholder="admin@praxisseguridad.es">
                </div>
                
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-200 mb-2">
                        <i class="fas fa-lock mr-2"></i>Contraseña
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            autocomplete="current-password"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-praxis-gold focus:border-transparent pr-12">
                        <button 
                            type="button" 
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Submit -->
                <button 
                    type="submit" 
                    name="login"
                    class="w-full py-3 bg-gradient-to-r from-praxis-gold to-praxis-gold-dark text-praxis-black font-bold rounded-lg hover:shadow-lg hover:shadow-praxis-gold/50 transition-all duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </button>
            </form>
            
            <!-- Footer -->
            <div class="mt-6 pt-6 border-t border-white/10 text-center">
                <a href="/" class="text-sm text-gray-400 hover:text-praxis-gold transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Volver al sitio
                </a>
            </div>
        </div>
        
        <!-- Security Notice -->
        <div class="mt-6 text-center text-gray-400 text-xs">
            <i class="fas fa-lock mr-1"></i>
            Conexión segura. Tus credenciales están protegidas.
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
