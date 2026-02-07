<?php
/**
 * Admin Logout
 */

require_once __DIR__ . '/includes/admin-auth.php';

admin_logout();

header('Location: /admin/login.php');
exit();
