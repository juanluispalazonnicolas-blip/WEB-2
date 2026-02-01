<?php
/**
 * Praxis Seguridad - Página de Login
 * Sistema de autenticación básico compatible con InfinityFree
 */

session_start();

$page_title = 'Iniciar Sesión | Praxis Seguridad';
$page_description = 'Accede a tu cuenta de Praxis Seguridad para ver contenido exclusivo del Centro de Conocimiento.';
$current_page = 'login';

// Si ya está logueado, redirigir
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: ../conocimiento.php');
    exit();
}

$error = '';
$success = '';

// Procesar login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // Archivo de usuarios (JSON simple)
    $users_file = __DIR__ . '/../data/users.json';
    
    if (file_exists($users_file)) {
        $users = json_decode(file_get_contents($users_file), true) ?? [];
        
        foreach ($users as $user) {
            if ($user['email'] === $email && password_verify($password, $user['password'])) {
                // Login exitoso
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_type'] = $user['type'] ?? 'free';
                
                // Redirigir
                $redirect = $_GET['redirect'] ?? '../conocimiento.php';
                header('Location: ' . $redirect);
                exit();
            }
        }
        
        $error = 'Email o contraseña incorrectos.';
    } else {
        $error = 'Sistema de usuarios no configurado.';
    }
}

include '../includes/header.php';
?>

<!-- Login Section -->
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-praxis-black via-praxis-gray to-praxis-black py-20">
    <div class="max-w-md w-full mx-4">
        
        <!-- Card -->
        <div class="bg-praxis-gray/50 backdrop-blur-xl rounded-2xl p-8 md:p-10 border border-praxis-gray/50 shadow-2xl">
            
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="../index.php">
                    <img src="../images/logo-praxis.png" alt="Praxis Seguridad" class="h-16 mx-auto mb-4">
                </a>
                <h1 class="font-heading font-bold text-2xl text-praxis-white mb-2">
                    Iniciar Sesión
                </h1>
                <p class="text-praxis-gray-light text-sm">
                    Accede al Centro de Conocimiento
                </p>
            </div>
            
            <!-- Mensajes -->
            <?php if ($error): ?>
                <div class="bg-red-500/20 border border-red-500/50 rounded-lg p-4 mb-6">
                    <p class="text-red-400 text-sm"><i class="fas fa-exclamation-circle mr-2"></i><?php echo $error; ?></p>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['registered'])): ?>
                <div class="bg-green-500/20 border border-green-500/50 rounded-lg p-4 mb-6">
                    <p class="text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>Cuenta creada correctamente. Ya puedes iniciar sesión.</p>
                </div>
            <?php endif; ?>
            
            <!-- Form -->
            <form method="POST" class="space-y-5">
                <div>
                    <label class="block text-praxis-gray-light text-sm mb-2">Email</label>
                    <div class="relative">
                        <input type="email" name="email" required
                               class="w-full px-4 py-3 pl-12 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none"
                               placeholder="tu@email.com"
                               value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-praxis-gray-light"></i>
                    </div>
                </div>
                
                <div>
                    <label class="block text-praxis-gray-light text-sm mb-2">Contraseña</label>
                    <div class="relative">
                        <input type="password" name="password" required
                               class="w-full px-4 py-3 pl-12 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none"
                               placeholder="••••••••">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-praxis-gray-light"></i>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-praxis-gray-light cursor-pointer">
                        <input type="checkbox" name="remember" class="mr-2 accent-praxis-gold">
                        Recordarme
                    </label>
                    <a href="#" class="text-sm text-praxis-gold hover:underline">¿Olvidaste tu contraseña?</a>
                </div>
                
                <button type="submit" class="w-full py-4 bg-praxis-gold text-praxis-black font-heading font-bold uppercase tracking-wider rounded-lg hover:bg-white transition-colors">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </button>
            </form>
            
            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-praxis-gray/50"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-praxis-gray/50 text-praxis-gray-light">o</span>
                </div>
            </div>
            
            <!-- Register Link -->
            <p class="text-center text-praxis-gray-light text-sm">
                ¿No tienes cuenta? 
                <a href="register.php" class="text-praxis-gold font-medium hover:underline">
                    Crear cuenta gratis
                </a>
            </p>
        </div>
        
        <!-- Back Link -->
        <p class="text-center mt-6">
            <a href="../conocimiento.php" class="text-praxis-gray-light hover:text-praxis-gold transition-colors text-sm">
                <i class="fas fa-arrow-left mr-1"></i> Volver al Centro de Conocimiento
            </a>
        </p>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
