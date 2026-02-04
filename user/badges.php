<?php
/**
 * Mis Logros - Badges y Puntos
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Obtener badges del usuario
$badges = user_get_badges($user['id']);

// Obtener todos los badges disponibles
global $BADGES_CONFIG;

// Obtener stats del usuario
$stats = user_get_stats($user['id']);

// Calcular progreso
$badges_obtenidos = count($badges);
$badges_totales = count($BADGES_CONFIG);
$progreso = ($badges_totales > 0) ? round(($badges_obtenidos / $badges_totales) * 100) : 0;

// Obtener recompensas disponibles
global $PUNTOS_RECOMPENSAS;
$puntos_usuario = $user['puntos'];

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.badges-container {
    max-width: 1400px;
    margin: 40px auto;
    padding: 0 20px;
}

.page-header {
    background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
    color: white;
    padding: 50px 40px;
    border-radius: 16px;
    margin-bottom: 40px;
    box-shadow: 0 4px 20px rgba(111, 66, 193, 0.2);
}

.page-header h1 {
    color: white;
    font-size: 36px;
    margin-bottom: 15px;
}

.page-header p {
    color: rgba(255,255,255,0.9);
    font-size: 18px;
    margin: 0;
}

.stats-banner {
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

.stat-card .icon {
    font-size: 48px;
    margin-bottom: 15px;
}

.stat-card .value {
    font-size: 36px;
    font-weight: 700;
    color: #6f42c1;
    margin-bottom: 5px;
}

.stat-card .label {
    color: #666;
    font-size: 14px;
}

.progress-section {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 40px;
}

.progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.progress-header h2 {
    color: #1a1a1a;
    font-size: 24px;
    margin: 0;
}

.progress-percentage {
    font-size: 32px;
    font-weight: 700;
    color: #6f42c1;
}

.progress-bar {
    height: 30px;
    background: #e0e0e0;
    border-radius: 15px;
    overflow: hidden;
    position: relative;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
    border-radius: 15px;
    transition: width 0.3s;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-right: 15px;
    color: white;
    font-weight: 600;
    font-size: 14px;
}

.section-title {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e0e0e0;
}

.badges-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.badge-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    text-align: center;
    transition: all 0.3s;
    border: 3px solid transparent;
}

.badge-card.obtenido {
    border-color: #28a745;
}

.badge-card.bloqueado {
    opacity: 0.5;
    filter: grayscale(80%);
}

.badge-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.badge-icon-big {
    font-size: 80px;
    margin-bottom: 20px;
}

.badge-name {
    font-size: 20px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 10px;
}

.badge-description {
    color: #666;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.badge-points {
    display: inline-block;
    padding: 8px 16px;
    background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
    color: #1a1a1a;
    border-radius: 20px;
    font-weight: 700;
    font-size: 14px;
}

.badge-date {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #e0e0e0;
    color: #999;
    font-size: 13px;
}

.badge-status {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    margin-top: 10px;
}

.badge-status.obtenido {
    background: #d4edda;
    color: #155724;
}

.badge-status.bloqueado {
    background: #e9ecef;
    color: #6c757d;
}

.recompensas-section {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.recompensas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 25px;
}

.recompensa-card {
    background: linear-gradient(135deg, #fff9e6 0%, #fff3cd 100%);
    padding: 25px;
    border-radius: 12px;
    border-left: 4px solid #ffc107;
    position: relative;
}

.recompensa-card.disponible {
    border-left-color: #28a745;
    background: linear-gradient(135deg, #e6ffe6 0%, #d4edda 100%);
}

.recompensa-icon {
    font-size: 40px;
    margin-bottom: 15px;
}

.recompensa-card h3 {
    color: #1a1a1a;
    font-size: 20px;
    margin-bottom: 10px;
}

.recompensa-cost {
    font-size: 24px;
    font-weight: 700;
    color: #ffc107;
    margin-bottom: 15px;
}

.recompensa-cost.disponible {
    color: #28a745;
}

.btn-canjear {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-canjear:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
}

.btn-canjear:disabled {
    background: #6c757d;
    cursor: not-allowed;
    transform: none;
}

.puntos-display {
    background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
    padding: 15px 25px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 20px;
    font-weight: 700;
    color: #1a1a1a;
}

@media (max-width: 768px) {
    .badges-grid,
    .recompensas-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="badges-container">
    <!-- Header -->
    <div class="page-header">
        <h1>🏆 Mis Logros</h1>
        <p>Badges, puntos y recompensas por tu actividad</p>
    </div>
    
    <!-- Stats -->
    <div class="stats-banner">
        <div class="stat-card">
            <div class="icon">🏆</div>
            <div class="value"><?php echo $badges_obtenidos; ?>/<?php echo $badges_totales; ?></div>
            <div class="label">Badges Obtenidos</div>
        </div>
        
        <div class="stat-card">
            <div class="icon">⭐</div>
            <div class="value"><?php echo number_format($puntos_usuario); ?></div>
            <div class="label">Puntos Totales</div>
        </div>
        
        <div class="stat-card">
            <div class="icon">📊</div>
            <div class="value"><?php echo $progreso; ?>%</div>
            <div class="label">Completado</div>
        </div>
    </div>
    
    <!-- Progreso -->
    <div class="progress-section">
        <div class="progress-header">
            <h2>Progreso General</h2>
            <span class="progress-percentage"><?php echo $progreso; ?>%</span>
        </div>
        <div class="progress-bar">
            <div class="progress-fill" style="width: <?php echo $progreso; ?>%;">
                <?php echo $badges_obtenidos; ?> de <?php echo $badges_totales; ?>
            </div>
        </div>
    </div>
    
    <!-- Badges -->
    <h2 class="section-title">🎖️ Todos los Badges</h2>
    
    <div class="badges-grid">
        <?php
        $badges_obtenidos_ids = array_column($badges, 'badge_tipo');
        
        foreach ($BADGES_CONFIG as $tipo => $config):
            $obtenido = in_array($tipo, $badges_obtenidos_ids);
            $badge_data = null;
            
            if ($obtenido) {
                foreach ($badges as $b) {
                    if ($b['badge_tipo'] === $tipo) {
                        $badge_data = $b;
                        break;
                    }
                }
            }
        ?>
        
        <div class="badge-card <?php echo $obtenido ? 'obtenido' : 'bloqueado'; ?>">
            <div class="badge-icon-big"><?php echo $config['icono']; ?></div>
            <div class="badge-name"><?php echo $config['nombre']; ?></div>
            <div class="badge-description"><?php echo $config['descripcion']; ?></div>
            <div class="badge-points">+<?php echo $config['puntos']; ?> puntos</div>
            
            <?php if ($obtenido): ?>
                <div class="badge-date">
                    Obtenido el <?php echo date('d/m/Y', strtotime($badge_data['fecha_obtencion'])); ?>
                </div>
                <span class="badge-status obtenido">✓ Desbloqueado</span>
            <?php else: ?>
                <span class="badge-status bloqueado">🔒 Bloqueado</span>
            <?php endif; ?>
        </div>
        
        <?php endforeach; ?>
    </div>
    
    <!-- Recompensas -->
    <div class="recompensas-section">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 class="section-title" style="margin: 0; border: none; padding: 0;">🎁 Canjear Puntos</h2>
            <div class="puntos-display">
                <i class="fas fa-coins"></i> <?php echo number_format($puntos_usuario); ?> puntos
            </div>
        </div>
        
        <div class="recompensas-grid">
            <?php foreach ($PUNTOS_RECOMPENSAS as $costo => $recompensa): 
                $disponible = $puntos_usuario >= $costo;
            ?>
            
            <div class="recompensa-card <?php echo $disponible ? 'disponible' : ''; ?>">
                <div class="recompensa-icon">
                    <?php
                    $icons = [
                        'descuento' => '💰',
                        'accesorio' => '🎁',
                        'garantia' => '🛡️'
                    ];
                    echo $icons[$recompensa['tipo']] ?? '🎁';
                    ?>
                </div>
                
                <h3><?php echo $recompensa['descripcion']; ?></h3>
                
                <div class="recompensa-cost <?php echo $disponible ? 'disponible' : ''; ?>">
                    <?php echo number_format($costo); ?> puntos
                </div>
                
                <button class="btn-canjear" 
                        <?php echo !$disponible ? 'disabled' : ''; ?>
                        onclick="<?php echo $disponible ? "alert('Funcionalidad próximamente: canjear puntos')" : ''; ?>">
                    <?php echo $disponible ? '✓ Canjear Ahora' : '🔒 Puntos Insuficientes'; ?>
                </button>
                
                <?php if (!$disponible): ?>
                    <div style="margin-top: 10px; text-align: center; color: #666; font-size: 13px;">
                        Te faltan <?php echo number_format($costo - $puntos_usuario); ?> puntos
                    </div>
                <?php endif; ?>
            </div>
            
            <?php endforeach; ?>
        </div>
        
        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3 style="margin: 0 0 10px 0; color: #1a1a1a;">💡 ¿Cómo ganar más puntos?</h3>
            <ul style="margin: 0; padding-left: 20px; color: #666;">
                <li>Completa tu perfil</li>
                <li>Verifica tu email (+20 pts)</li>
                <li>Descarga 3 recursos (+30 pts)</li>
                <li>Completa la calculadora de riesgo (+50 pts)</li>
                <li>Realiza tu primera compra (+100 pts)</li>
                <li>Refiere amigos (+200 pts por referido)</li>
            </ul>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
