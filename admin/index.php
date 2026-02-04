<?php
/**
 * Panel de Administración
 * Praxis Seguridad
 * 
 * NOTA: Este es un panel básico. En producción, implementar:
 * - Autenticación de admin separada
 * - Roles y permisos
 * - Logs de auditoría
 * - Rate limiting
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Verificar que sea admin (temporal - usar campo admin en BD en producción)
// Por ahora, solo usuario ID 1 es admin
if ($user['id'] !== 1) {
    header('Location: /user/dashboard.php');
    exit;
}

// Obtener estadísticas
$stats = [
    'total_usuarios' => 0,
    'usuarios_verificados' => 0,
    'total_descargas' => 0,
    'recursos_activos' => 0,
    'alertas_activas' => 0,
    'calculos_completos' => 0
];

// Total usuarios
$users_result = supabase_query('users', 'GET', null, 'select=id');
$stats['total_usuarios'] = count($users_result['data'] ?? []);

// Usuarios verificados
$verified_result = supabase_query('users', 'GET', null, 'select=id&email_verificado=eq.true');
$stats['usuarios_verificados'] = count($verified_result['data'] ?? []);

// Total descargas
$downloads_result = supabase_query('descargas_usuario', 'GET', null, 'select=id');
$stats['total_descargas'] = count($downloads_result['data'] ?? []);

// Recursos activos
$resources_result = supabase_query('recursos_premium', 'GET', null, 'select=id&activo=eq.true');
$stats['recursos_activos'] = count($resources_result['data'] ?? []);

// Alertas activas
$alerts_result = supabase_query('alertas_seguridad', 'GET', null, 'select=id&activo=eq.true');
$stats['alertas_activas'] = count($alerts_result['data'] ?? []);

// Cálculos completados
$calc_result = supabase_query('calculadora_resultados', 'GET', null, 'select=id');
$stats['calculos_completos'] = count($calc_result['data'] ?? []);

// Obtener últimos usuarios
$recent_users = supabase_query('users', 'GET', null, 'select=*&order=fecha_registro.desc&limit=10');
$usuarios_recientes = $recent_users['data'] ?? [];

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.admin-container {
    max-width: 1400px;
    margin: 40px auto;
    padding: 0 20px;
}

.page-header {
    background: linear-gradient(135deg, #343a40 0%, #212529 100%);
    color: white;
    padding: 50px 40px;
    border-radius: 16px;
    margin-bottom: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.page-header h1 {
    color: white;
    font-size: 36px;
    margin-bottom: 10px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.stat-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    text-align: center;
}

.stat-icon {
    font-size: 48px;
    margin-bottom: 15px;
}

.stat-value {
    font-size: 42px;
    font-weight: 700;
    color: #343a40;
    margin-bottom: 5px;
}

.stat-label {
    color: #666;
    font-size: 14px;
}

.section-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.section-card h2 {
    color: #1a1a1a;
    font-size: 24px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e0e0e0;
}

.users-table {
    width: 100%;
    border-collapse: collapse;
}

.users-table th {
    background: #f8f9fa;
    padding: 12px;
    text-align: left;
    font-weight: 600;
    color: #495057;
    border-bottom: 2px solid #dee2e6;
}

.users-table td {
    padding: 12px;
    border-bottom: 1px solid #e9ecef;
}

.badge {
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

.badge-success {
    background: #d4edda;
    color: #155724;
}

.badge-warning {
    background: #fff3cd;
    color: #856404;
}

.quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 20px;
}

.action-btn {
    padding: 15px 20px;
    background: #6c757d;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    text-align: center;
    font-weight: 600;
    transition: all 0.3s;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    color: white;
}

.action-btn.primary {
    background: linear-gradient(135deg, #c8102e 0%, #a00d25 100%);
}

.action-btn.success {
    background: #28a745;
}

.action-btn.info {
    background: #17a2b8;
}

.action-btn.warning {
    background: #ffc107;
    color: #1a1a1a;
}
</style>

<div class="admin-container">
    <!-- Header -->
    <div class="page-header">
        <h1>⚙️ Panel de Administración</h1>
        <p>Vista general del sistema</p>
    </div>
    
    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-value"><?php echo $stats['total_usuarios']; ?></div>
            <div class="stat-label">Total Usuarios</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">✅</div>
            <div class="stat-value"><?php echo $stats['usuarios_verificados']; ?></div>
            <div class="stat-label">Verificados</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">⬇️</div>
            <div class="stat-value"><?php echo $stats['total_descargas']; ?></div>
            <div class="stat-label">Descargas</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">📚</div>
            <div class="stat-value"><?php echo $stats['recursos_activos']; ?></div>
            <div class="stat-label">Recursos Activos</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">🚨</div>
            <div class="stat-value"><?php echo $stats['alertas_activas']; ?></div>
            <div class="stat-label">Alertas Activas</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">🧮</div>
            <div class="stat-value"><?php echo $stats['calculos_completos']; ?></div>
            <div class="stat-label">Cálculos Riesgo</div>
        </div>
    </div>
    
    <!-- Acciones Rápidas -->
    <div class="section-card">
        <h2>⚡ Acciones Rápidas</h2>
        <div class="quick-actions">
            <a href="#" class="action-btn primary" onclick="alert('Funcionalidad próximamente')">
                <i class="fas fa-plus"></i> Crear Recurso
            </a>
            <a href="#" class="action-btn success" onclick="alert('Funcionalidad próximamente')">
                <i class="fas fa-bell"></i> Nueva Alerta
            </a>
            <a href="#" class="action-btn info" onclick="alert('Funcionalidad próximamente')">
                <i class="fas fa-envelope"></i> Email Masivo
            </a>
            <a href="#" class="action-btn warning" onclick="alert('Funcionalidad próximamente')">
                <i class="fas fa-file-export"></i> Exportar Datos
            </a>
        </div>
    </div>
    
    <!-- Últimos Usuarios -->
    <div class="section-card">
        <h2>👥 Últimos Usuarios Registrados</h2>
        
        <?php if (!empty($usuarios_recientes)): ?>
            <table class="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha Registro</th>
                        <th>Verificado</th>
                        <th>Nivel</th>
                        <th>Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios_recientes as $u): ?>
                        <tr>
                            <td><?php echo $u['id']; ?></td>
                            <td><?php echo htmlspecialchars($u['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($u['email']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($u['fecha_registro'])); ?></td>
                            <td>
                                <?php if ($u['email_verificado']): ?>
                                    <span class="badge badge-success">✓ Sí</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">⏳ No</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo ucfirst($u['nivel_usuario']); ?></td>
                            <td><?php echo number_format($u['puntos']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: #666; text-align: center; padding: 40px;">No hay usuarios registrados aún</p>
        <?php endif; ?>
    </div>
    
    <!-- Notas de Desarrollo -->
    <div class="section-card" style="background: #fff3cd; border-left: 4px solid #ffc107;">
        <h2>⚠️ Panel Admin - Versión Básica</h2>
        <p style="color: #856404; margin: 0;">
            <strong>Funcionalidades implementadas:</strong> Vista de estadísticas, últimos usuarios<br>
            <strong>Pendiente para producción:</strong>
        </p>
        <ul style="color: #856404; margin-top: 10px;">
            <li>Autenticación de admin separada con roles</li>
            <li>CRUD completo de recursos premium</li>
            <li>CRUD de alertas de seguridad</li>
            <li>Gestión de usuarios (activar/desactivar/eliminar)</li>
            <li>Reportes y analíticas avanzadas</li>
            <li>Logs de auditoría</li>
            <li>Envío de emails masivos</li>
            <li>Gestión de cupones y descuentos</li>
        </ul>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
