<?php
/**
 * Dashboard de Usuario
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Obtener estadísticas
$stats = user_get_stats($user['id']);

// Obtener badges
$badges = user_get_badges($user['id']);

// Obtener alertas recientes
$alertas_result = supabase_query(
    'alertas_seguridad',
    'GET',
    null,
    'select=id,titulo,tipo_alerta,nivel_urgencia,fecha_inicio&activo=eq.true&order=fecha_inicio.desc&limit=5'
);
$alertas = $alertas_result['data'] ?? [];

// Obtener recursos premium
$recursos_result = supabase_query(
    'recursos_premium',
    'GET',
    null,
    'select=id,titulo,tipo,categoria,descargas&activo=eq.true&order=orden.asc&limit=6'
);
$recursos = $recursos_result['data'] ?? [];

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.dashboard-container {
    max-width: 1400px;
    margin: 40px auto;
    padding: 0 20px;
}

.dashboard-header {
    background: linear-gradient(135deg, #c8102e 0%, #a00d25 100%);
    color: white;
    padding: 40px;
    border-radius: 16px;
    margin-bottom: 40px;
    box-shadow: 0 4px 20px rgba(200, 16, 46, 0.2);
}

.dashboard-header h1 {
    color: white;
    font-size: 32px;
    margin-bottom: 10px;
}

.dashboard-header .user-info {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.user-level-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.2);
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
}

.user-points {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.2);
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
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
    transition: all 0.3s;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
}

.stat-card .stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 15px;
}

.stat-card.blue .stat-icon {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
    color: white;
}

.stat-card.green .stat-icon {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
}

.stat-card.purple .stat-icon {
    background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
    color: white;
}

.stat-card.orange .stat-icon {
    background: linear-gradient(135deg, #fd7e14 0%, #dc6502 100%);
    color: white;
}

.stat-card h3 {
    color: #666;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-card .stat-value {
    font-size: 36px;
    font-weight: 700;
    color: #1a1a1a;
}

.quick-actions {
    margin-bottom: 40px;
}

.section-title {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.action-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    text-decoration: none;
    color: inherit;
    transition: all 0.3s;
    border-left: 4px solid #c8102e;
}

.action-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    color: inherit;
}

.action-card .action-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #c8102e 0%, #a00d25 100%);
    color: white;
}

.action-card h3 {
    color: #1a1a1a;
    font-size: 20px;
    margin-bottom: 10px;
    font-weight: 600;
}

.action-card p {
    color: #666;
    font-size: 14px;
    margin: 0;
    line-height: 1.6;
}

.badges-section {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 40px;
}

.badges-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 20px;
}

.badge-item {
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    text-align: center;
    transition: all 0.3s;
}

.badge-item:hover {
    background: #e9ecef;
    transform: scale(1.05);
}

.badge-item .badge-icon {
    font-size: 40px;
    margin-bottom: 10px;
}

.badge-item .badge-name {
    font-weight: 600;
    color: #1a1a1a;
    font-size: 14px;
    margin-bottom: 5px;
}

.badge-item .badge-points {
    color: #28a745;
    font-size: 12px;
    font-weight: 600;
}

.badge-item .badge-date {
    color: #999;
    font-size: 11px;
}

.recursos-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.recurso-card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    transition: all 0.3s;
}

.recurso-card:hover {
    border-color: #c8102e;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.recurso-card h4 {
    color: #1a1a1a;
    font-size: 16px;
    margin-bottom: 10px;
    font-weight: 600;
}

.recurso-meta {
    display: flex;
    gap: 15px;
    font-size: 12px;
    color: #666;
    margin-bottom: 15px;
}

.btn-download {
    display: inline-block;
    padding: 10px 20px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-download:hover {
    background: #218838;
    color: white;
}

.alertas-list {
    margin-top: 20px;
}

.alerta-item {
    padding: 15px 20px;
    background: white;
    border-left: 4px solid #ffc107;
    margin-bottom: 10px;
    border-radius: 4px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.alerta-item.alta {
    border-left-color: #dc3545;
}

.alerta-item.media {
    border-left-color: #ffc107;
}

.alerta-item.baja {
    border-left-color: #17a2b8;
}

.alerta-item .alerta-icon {
    font-size: 24px;
}

.alerta-item .alerta-content h4 {
    margin: 0 0 5px 0;
    color: #1a1a1a;
    font-size: 16px;
    font-weight: 600;
}

.alerta-item .alerta-meta {
    font-size: 12px;
    color: #666;
}

@media (max-width: 768px) {
    .dashboard-header h1 {
        font-size: 24px;
    }
    
    .stats-grid,
    .actions-grid,
    .recursos-list {
        grid-template-columns: 1fr;
    }
    
    .badges-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header">
        <h1>¡Hola, <?php echo htmlspecialchars($user['nombre']); ?>! 👋</h1>
        <div class="user-info">
            <span class="user-level-badge">
                <?php
                $nivel_icon = [
                    'registrado' => '🎯',
                    'cliente' => '⭐',
                    'premium' => '💎'
                ];
                echo $nivel_icon[$user['nivel']] ?? '🎯';
                ?>
                <?php echo ucfirst($user['nivel']); ?>
            </span>
            <span class="user-points">
                <i class="fas fa-coins"></i> <?php echo number_format($user['puntos']); ?> Puntos
            </span>
            <span style="opacity: 0.8;">
                <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($user['email']); ?>
            </span>
        </div>
    </div>
    
    <!-- Estadísticas -->
    <div class="stats-grid">
        <div class="stat-card blue">
            <div class="stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <h3>Cotizaciones</h3>
            <div class="stat-value"><?php echo number_format($stats['total_cotizaciones'] ?? 0); ?></div>
        </div>
        
        <div class="stat-card green">
            <div class="stat-icon">
                <i class="fas fa-download"></i>
            </div>
            <h3>Recursos Descargados</h3>
            <div class="stat-value"><?php echo number_format($stats['total_descargas'] ?? 0); ?></div>
        </div>
        
        <div class="stat-card purple">
            <div class="stat-icon">
                <i class="fas fa-trophy"></i>
            </div>
            <h3>Badges Obtenidos</h3>
            <div class="stat-value"><?php echo number_format($stats['total_badges'] ?? 0); ?></div>
        </div>
        
        <div class="stat-card orange">
            <div class="stat-icon">
                <i class="fas fa-coins"></i>
            </div>
            <h3>Puntos Acumulados</h3>
            <div class="stat-value"><?php echo number_format($stats['puntos_totales'] ?? 0); ?></div>
        </div>
    </div>
    
    <!-- Acciones Rápidas -->
    <div class="quick-actions">
        <h2 class="section-title">
            <i class="fas fa-bolt"></i> Acciones Rápidas
        </h2>
        
        <div class="actions-grid">
            <a href="/user/calculadora-riesgo.php" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <h3>Calculadora de Riesgo</h3>
                <p>Evalúa el nivel de seguridad de tu propiedad y obtén recomendaciones personalizadas</p>
            </a>
            
            <a href="/user/recursos.php" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h3>Recursos Premium</h3>
                <p>Descarga guías PDF, webinars y templates exclusivos totalmente gratis</p>
            </a>
            
            <a href="/user/cotizaciones.php" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-save"></i>
                </div>
                <h3>Mis Cotizaciones</h3>
                <p>Guarda y compara diferentes configuraciones de sistemas de alarma</p>
            </a>
            
            <a href="/user/alertas.php" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Alertas de Seguridad</h3>
                <p>Mantente informado sobre estafas y novedades en tu zona</p>
            </a>
            
            <a href="/pedido.php" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>Realizar Pedido</h3>
                <p>Configura y compra tu sistema de alarma con descuento exclusivo del 5%</p>
            </a>
            
            <a href="/user/perfil.php" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-cog"></i>
                </div>
                <h3>Mi Perfil</h3>
                <p>Actualiza tus datos personales y preferencias de notificación</p>
            </a>
        </div>
    </div>
    
    <!-- Badges -->
    <?php if (!empty($badges)): ?>
    <div class="badges-section">
        <h2 class="section-title">
            <i class="fas fa-trophy"></i> Mis Logros
        </h2>
        
        <div class="badges-grid">
            <?php foreach ($badges as $badge): ?>
            <div class="badge-item">
                <div class="badge-icon"><?php echo $badge['badge_icono'] ?? '🏆'; ?></div>
                <div class="badge-name"><?php echo htmlspecialchars($badge['badge_nombre']); ?></div>
                <div class="badge-points">+<?php echo $badge['puntos_otorgados']; ?> puntos</div>
                <div class="badge-date"><?php echo date('d/m/Y', strtotime($badge['fecha_obtencion'])); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div style="margin-top: 20px; text-align: center;">
            <a href="/user/badges.php" style="color: #c8102e; font-weight: 600;">
                Ver todos los logros <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Recursos Destacados -->
    <div class="badges-section">
        <h2 class="section-title">
            <i class="fas fa-star"></i> Recursos Destacados
        </h2>
        
        <div class="recursos-list">
            <?php foreach (array_slice($recursos, 0, 3) as $recurso): ?>
            <div class="recurso-card">
                <h4><?php echo htmlspecialchars($recurso['titulo']); ?></h4>
                <div class="recurso-meta">
                    <span><i class="fas fa-file-<?php echo $recurso['tipo'] === 'pdf' ? 'pdf' : 'video'; ?>"></i> <?php echo strtoupper($recurso['tipo']); ?></span>
                    <span><i class="fas fa-download"></i> <?php echo number_format($recurso['descargas']); ?> descargas</span>
                </div>
                <a href="/user/recursos.php?download=<?php echo $recurso['id']; ?>" class="btn-download">
                    <i class="fas fa-download"></i> Descargar
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div style="margin-top: 20px; text-align: center;">
            <a href="/user/recursos.php" style="color: #c8102e; font-weight: 600;">
                Ver todos los recursos <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    
    <!-- Alertas Recientes -->
    <?php if (!empty($alertas)): ?>
    <div class="badges-section">
        <h2 class="section-title">
            <i class="fas fa-exclamation-triangle"></i> Alertas Recientes
        </h2>
        
        <div class="alertas-list">
            <?php foreach (array_slice($alertas, 0, 3) as $alerta): ?>
            <div class="alerta-item <?php echo $alerta['nivel_urgencia']; ?>">
                <div class="alerta-icon">
                    <?php
                    $icons = [
                        'estafa' => '🚨',
                        'normativa' => '📋',
                        'oferta' => '🎁',
                        'seguridad' => '🔒',
                        'general' => 'ℹ️'
                    ];
                    echo $icons[$alerta['tipo_alerta']] ?? 'ℹ️';
                    ?>
                </div>
                <div class="alerta-content">
                    <h4><?php echo htmlspecialchars($alerta['titulo']); ?></h4>
                    <div class="alerta-meta">
                        <span><?php echo ucfirst($alerta['tipo_alerta']); ?></span> • 
                        <span><?php echo date('d/m/Y', strtotime($alerta['fecha_inicio'])); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div style="margin-top: 20px; text-align: center;">
            <a href="/user/alertas.php" style="color: #c8102e; font-weight: 600;">
                Ver todas las alertas <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
