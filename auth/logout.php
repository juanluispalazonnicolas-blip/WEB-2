<?php
/**
 * Logout
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Obtener session token
$session_token = $_COOKIE['session_token'] ?? null;

// Logout
if ($session_token) {
    user_logout($session_token);
}

// Destruir sesión PHP si existe
session_start();
session_destroy();

// Redirigir a home
header('Location: /?logout=success');
exit;
