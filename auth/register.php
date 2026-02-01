<?php
/**
 * Praxis Seguridad - Página de Registro
 * Sistema de registro básico compatible con InfinityFree
 */

session_start();

$page_title = 'Crear Cuenta | Praxis Seguridad';
$page_description = 'Regístrate gratis para acceder a contenido exclusivo del Centro de Conocimiento de Praxis Seguridad.';
$current_page = 'register';

// Si ya está logueado, redirigir
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: ../conocimiento.php');
    exit();
}

$error = '';
$success = '';

// Procesar registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $user_type = $_POST['user_type'] ?? 'particular';
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    $terms = isset($_POST['terms']);
    
    // Validaciones
    if (empty($name) || empty($email) || empty($password)) {
        $error = 'Todos los campos obligatorios deben estar completos.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'El email no es válido.';
    } elseif (strlen($password) < 8) {
        $error = 'La contraseña debe tener al menos 8 caracteres.';
    } elseif ($password !== $password_confirm) {
        $error = 'Las contraseñas no coinciden.';
    } elseif (!$terms) {
        $error = 'Debes aceptar los términos y condiciones.';
    } else {
        // Directorio de datos
        $data_dir = __DIR__ . '/../data';
        if (!is_dir($data_dir)) {
            mkdir($data_dir, 0755, true);
        }
        
        $users_file = $data_dir . '/users.json';
        $users = [];
        
        if (file_exists($users_file)) {
            $users = json_decode(file_get_contents($users_file), true) ?? [];
        }
        
        // Verificar si el email ya existe
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                $error = 'Este email ya está registrado.';
                break;
            }
        }
        
        if (empty($error)) {
            // Crear nuevo usuario
            $users[] = [
                'id' => uniqid('user_'),
                'name' => $name,
                'email' => $email,
                'company' => $company,
                'user_type' => $user_type,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'subscription' => 'free',
                'created_at' => date('c'),
                'last_login' => null
            ];
            
            // Guardar
            file_put_contents($users_file, json_encode($users, JSON_PRETTY_PRINT));
            
            // Redirigir al login
            header('Location: login.php?registered=1');
            exit();
        }
    }
}

include '../includes/header.php';
?>

<!-- Register Section -->
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
                    Crear Cuenta Gratis
                </h1>
                <p class="text-praxis-gray-light text-sm">
                    Accede a guías exclusivas y manuales técnicos
                </p>
            </div>
            
            <!-- Benefits -->
            <div class="bg-praxis-gold/10 rounded-lg p-4 mb-6">
                <p class="text-praxis-gold text-sm font-medium mb-2">Al registrarte obtienes:</p>
                <ul class="space-y-1 text-xs text-praxis-gray-light">
                    <li><i class="fas fa-check text-praxis-gold mr-2"></i>Acceso a guías avanzadas</li>
                    <li><i class="fas fa-check text-praxis-gold mr-2"></i>Manuales técnicos en PDF</li>
                    <li><i class="fas fa-check text-praxis-gold mr-2"></i>Newsletter con novedades del sector</li>
                </ul>
            </div>
            
            <!-- Mensajes -->
            <?php if ($error): ?>
                <div class="bg-red-500/20 border border-red-500/50 rounded-lg p-4 mb-6">
                    <p class="text-red-400 text-sm"><i class="fas fa-exclamation-circle mr-2"></i><?php echo $error; ?></p>
                </div>
            <?php endif; ?>
            
            <!-- Form -->
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-praxis-gray-light text-sm mb-2">Nombre completo *</label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-3 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none"
                           placeholder="Tu nombre"
                           value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
                </div>
                
                <div>
                    <label class="block text-praxis-gray-light text-sm mb-2">Email *</label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-3 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none"
                           placeholder="tu@email.com"
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>
                
                <div>
                    <label class="block text-praxis-gray-light text-sm mb-2">Empresa (opcional)</label>
                    <input type="text" name="company"
                           class="w-full px-4 py-3 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none"
                           placeholder="Nombre de tu empresa"
                           value="<?php echo htmlspecialchars($_POST['company'] ?? ''); ?>">
                </div>
                
                <div>
                    <label class="block text-praxis-gray-light text-sm mb-2">Tipo de usuario</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="flex items-center justify-center gap-2 px-4 py-3 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg cursor-pointer hover:border-praxis-gold transition-colors">
                            <input type="radio" name="user_type" value="particular" checked class="accent-praxis-gold">
                            <i class="fas fa-user text-praxis-gold"></i>
                            <span class="text-praxis-white text-sm">Particular</span>
                        </label>
                        <label class="flex items-center justify-center gap-2 px-4 py-3 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg cursor-pointer hover:border-praxis-gold transition-colors">
                            <input type="radio" name="user_type" value="empresa" class="accent-praxis-gold">
                            <i class="fas fa-building text-praxis-gold"></i>
                            <span class="text-praxis-white text-sm">Empresa</span>
                        </label>
                    </div>
                </div>
                
                <div>
                    <label class="block text-praxis-gray-light text-sm mb-2">Contraseña * (mín. 8 caracteres)</label>
                    <input type="password" name="password" required minlength="8"
                           class="w-full px-4 py-3 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none"
                           placeholder="••••••••">
                </div>
                
                <div>
                    <label class="block text-praxis-gray-light text-sm mb-2">Confirmar contraseña *</label>
                    <input type="password" name="password_confirm" required
                           class="w-full px-4 py-3 bg-praxis-black/50 border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-light focus:border-praxis-gold focus:outline-none"
                           placeholder="••••••••">
                </div>
                
                <div>
                    <label class="flex items-start gap-2 text-sm text-praxis-gray-light cursor-pointer">
                        <input type="checkbox" name="terms" required class="mt-1 accent-praxis-gold">
                        <span>Acepto la <a href="#" class="text-praxis-gold hover:underline">política de privacidad</a> y los <a href="#" class="text-praxis-gold hover:underline">términos de uso</a></span>
                    </label>
                </div>
                
                <button type="submit" class="w-full py-4 bg-praxis-gold text-praxis-black font-heading font-bold uppercase tracking-wider rounded-lg hover:bg-white transition-colors">
                    <i class="fas fa-user-plus mr-2"></i>Crear Cuenta
                </button>
            </form>
            
            <!-- Login Link -->
            <p class="text-center text-praxis-gray-light text-sm mt-6">
                ¿Ya tienes cuenta? 
                <a href="login.php" class="text-praxis-gold font-medium hover:underline">
                    Iniciar sesión
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
