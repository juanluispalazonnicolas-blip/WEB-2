<?php
/**
 * Página de confirmación de solicitud de contacto
 */

$page_title = 'Solicitud Enviada | Praxis Seguridad';
$current_page = 'contacto';

include 'includes/header.php';
?>

<section class="relative min-h-screen flex items-center bg-praxis-black overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-gradient-to-b from-praxis-gold/20 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-32 text-center">
        
        <!-- Icono de éxito -->
        <div class="mb-8">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center">
                <i class="fas fa-check text-4xl text-white"></i>
            </div>
        </div>
        
        <h1 class="font-heading font-extrabold text-3xl md:text-4xl text-praxis-white mb-6">
            ¡Solicitud Enviada!
        </h1>
        
        <p class="text-xl text-praxis-gray-light mb-8 max-w-xl mx-auto">
            Hemos recibido tu solicitud correctamente. 
            <strong class="text-praxis-white">Te contactaremos en menos de 24 horas.</strong>
        </p>
        
        <div class="bg-praxis-gray-dark/50 rounded-2xl p-8 mb-8 text-left max-w-md mx-auto">
            <h2 class="font-heading font-bold text-lg text-praxis-white mb-4 flex items-center gap-2">
                <i class="fas fa-clock text-praxis-gold"></i>
                ¿Qué pasa ahora?
            </h2>
            <ul class="space-y-3 text-praxis-gray-light">
                <li class="flex items-start gap-3">
                    <span class="w-6 h-6 bg-praxis-gold/20 rounded-full flex items-center justify-center flex-shrink-0 text-praxis-gold text-sm font-bold">1</span>
                    <span>Revisamos tu solicitud</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-6 h-6 bg-praxis-gold/20 rounded-full flex items-center justify-center flex-shrink-0 text-praxis-gold text-sm font-bold">2</span>
                    <span>Te contactamos por teléfono o email</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-6 h-6 bg-praxis-gold/20 rounded-full flex items-center justify-center flex-shrink-0 text-praxis-gold text-sm font-bold">3</span>
                    <span>Agendamos una reunión (presencial u online)</span>
                </li>
            </ul>
        </div>
        
        <div class="flex flex-wrap justify-center gap-4">
            <a href="index.php" class="px-8 py-4 bg-praxis-gray text-praxis-white rounded-xl font-semibold hover:bg-praxis-gray-dark transition-colors">
                <i class="fas fa-home mr-2"></i>Volver al inicio
            </a>
            <a href="conocimiento.php" class="btn-gold px-8 py-4 rounded-xl text-praxis-black font-semibold">
                <i class="fas fa-book mr-2"></i>Centro de Conocimiento
            </a>
        </div>
        
        <p class="mt-8 text-praxis-gray-light text-sm">
            ¿Tienes prisa? Llámanos directamente: 
            <a href="tel:+34637474428" class="text-praxis-gold hover:underline font-semibold">+34 637 474 428</a>
        </p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
