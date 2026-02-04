<?php
/**
 * Alertas de Seguridad
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Obtener ciudad/provincia del usuario para filtrado personalizado
$user_data = supabase_query(
    'users',
    'GET',
    null,
    'select=ciudad,provincia&id=eq.' . $user['id']
);

$user_ciudad = $user_data['data'][0]['ciudad'] ?? null;
$user_provincia = $user_data['data'][0]['provincia'] ?? null;

// Filtros
$tipo = $_GET['tipo'] ?? 'todos';
$urgencia = $_GET['urgencia'] ?? 'todas';

// Construir query
$filters = 'activo=eq.true';

if ($tipo !== 'todos') {
    $filters .= '&tipo_alerta=eq.' . urlencode($tipo);
}

if ($urgencia !== 'todas') {
    $filters .= '&nivel_urgencia=eq.' . urlencode($urgencia);
}

// Obtener todas las alertas
$alertas_result = supabase_query(
    'alertas_seguridad',
    'GET',
    null,
    'select=*&' . $filters . '&order=nivel_urgencia.desc,fecha_inicio.desc'
);

$alertas = $alertas_result['data'] ?? [];

// Filtrar por zona (Supabase no soporta array contains en REST API simple)
$alertas_filtradas = [];
foreach ($alertas as $alerta) {
    $zonas = $alerta['zona_afectada'] ?? [];
    
    // Si no hay zonas específicas, mostrar a todos
    if (empty($zonas) || in_array('Nacional', $zonas)) {
        $alertas_filtradas[] = $alerta;
        continue;
    }
    
    // Si coincide con ciudad o provincia del usuario
    if ($user_ciudad && in_array($user_ciudad, $zonas)) {
        $alertas_filtradas[] = $alerta;
        continue;
    }
    
    if ($user_provincia && in_array($user_provincia, $zonas)) {
        $alertas_filtradas[] = $alerta;
        continue;
    }
}

// Obtener alertas leídas por el usuario
$leidas_result = supabase_query(
    'alertas_leidas',
    'GET',
    null,
    'select=alerta_id&user_id=eq.' . $user['id']
);

$alertas_leidas = array_column($leidas_result['data'] ?? [], 'alerta_id');

// Marcar alerta como leída si viene el parámetro
if (isset($_GET['mark_read'])) {
    $alerta_id = intval($_GET['mark_read']);
    
    // Verificar que no esté ya leída
    if (!in_array($alerta_id, $alertas_leidas)) {
        $read_data = [
            'user_id' => $user['id'],
            'alerta_id' => $alerta_id,
            'ip_address' => auth_get_user_ip()
        ];
        
        supabase_query('alertas_leidas', 'POST', $read_data);
        
        // Refresh para actualizar la lista
        header('Location: /user/alertas.php');
        exit;
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.alertas-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.page-header {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
    padding: 50px 40px;
    border-radius: 16px;
    margin-bottom: 40px;
    box-shadow: 0 4px 20px rgba(220, 53, 69, 0.2);
}

.page-header h1 {
    color: white;
    font-size: 36px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.page-header p {
    color: rgba(255,255,255,0.9);
    font-size: 18px;
    margin: 0;
}

.stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-box {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    display: flex;
    align-items: center;
    gap: 20px;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
}

.stat-icon.red {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

.stat-icon.blue {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
}

.stat-icon.green {
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
}

.stat-content h3 {
    margin: 0 0 5px 0;
    color: #1a1a1a;
    font-size: 28px;
    font-weight: 700;
}

.stat-content p {
    margin: 0;
    color: #666;
    font-size: 14px;
}

.filters-section {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.filters-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    align-items: end;
}

.filter-group label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 600;
    font-size: 14px;
}

.filter-select {
    width: 100%;
    padding: 10px 14px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 15px;
}

.btn-filter {
    padding: 10px 20px;
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
}

.alertas-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.alerta-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s;
    border-left: 6px solid #e0e0e0;
}

.alerta-card.alta {
    border-left-color: #dc3545;
}

.alerta-card.media {
    border-left-color: #ffc107;
}

.alerta-card.baja {
    border-left-color: #17a2b8;
}

.alerta-card:hover {
    transform: translateX(4px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.alerta-card.leida {
    opacity: 0.6;
}

.alerta-header {
    padding: 25px;
    display: flex;
    align-items: flex-start;
    gap: 20px;
    background: #f8f9fa;
}

.alerta-icon-big {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    flex-shrink: 0;
}

.alerta-icon-big.estafa {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

.alerta-icon-big.normativa {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
}

.alerta-icon-big.oferta {
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
}

.alerta-icon-big.seguridad {
    background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
}

.alerta-icon-big.general {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
}

.alerta-title-section {
    flex-grow: 1;
}

.alerta-title-section h3 {
    margin: 0 0 10px 0;
    color: #1a1a1a;
    font-size: 22px;
    font-weight: 700;
}

.alerta-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 10px;
}

.badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.badge.alta {
    background: #dc3545;
    color: white;
}

.badge.media {
    background: #ffc107;
    color: #1a1a1a;
}

.badge.baja {
    background: #17a2b8;
    color: white;
}

.badge.tipo {
    background: #e9ecef;
    color: #495057;
}

.badge.zona {
    background: #d1ecf1;
    color: #0c5460;
}

.alerta-meta {
    color: #666;
    font-size: 13px;
}

.alerta-body {
    padding: 25px;
}

.alerta-body p {
    color: #666;
    font-size: 16px;
    line-height: 1.7;
    margin: 0 0 20px 0;
}

.alerta-footer {
    padding: 20px 25px;
    background: #f8f9fa;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.alerta-date {
    color: #666;
    font-size: 14px;
}

.btn-mark-read {
    padding: 8px 20px;
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-mark-read:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    color: white;
}

.badge-leida {
    padding: 6px 14px;
    background: #6c757d;
    color: white;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}

.empty-state {
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: 12px;
}

.empty-state i {
    font-size: 80px;
    color: #e0e0e0;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .page-header h1 {
        font-size: 28px;
    }
    
    .alerta-header {
        flex-direction: column;
    }
}
</style>

<div class="alertas-container">
    <!-- Header -->
    <div class="page-header">
        <h1><i class="fas fa-exclamation-triangle"></i> Alertas de Seguridad</h1>
        <p>Mantente informado sobre estafas, normativas y novedades<?php echo $user_ciudad ? " en {$user_ciudad}" : ''; ?></p>
    </div>
    
    <!-- Stats -->
    <div class="stats-row">
        <div class="stat-box">
            <div class="stat-icon red">🚨</div>
            <div class="stat-content">
                <h3><?php echo count($alertas_filtradas); ?></h3>
                <p>Alertas activas</p>
            </div>
        </div>
        
        <div class="stat-box">
            <div class="stat-icon blue">👁️</div>
            <div class="stat-content">
                <h3><?php echo count($alertas_leidas); ?></h3>
                <p>Alertas leídas</p>
            </div>
        </div>
        
        <div class="stat-box">
            <div class="stat-icon green">📍</div>
            <div class="stat-content">
                <h3><?php echo $user_ciudad ?? 'No definida'; ?></h3>
                <p>Tu ubicación</p>
            </div>
        </div>
    </div>
    
    <!-- Filtros -->
    <div class="filters-section">
        <form method="GET" action="/user/alertas.php">
            <div class="filters-grid">
                <div class="filter-group">
                    <label>Tipo de Alerta</label>
                    <select name="tipo" class="filter-select">
                        <option value="todos" <?php echo $tipo === 'todos' ? 'selected' : ''; ?>>Todos</option>
                        <option value="estafa" <?php echo $tipo === 'estafa' ? 'selected' : ''; ?>>🚨 Estafas</option>
                        <option value="normativa" <?php echo $tipo === 'normativa' ? 'selected' : ''; ?>>📋 Normativas</option>
                        <option value="oferta" <?php echo $tipo === 'oferta' ? 'selected' : ''; ?>>🎁 Ofertas</option>
                        <option value="seguridad" <?php echo $tipo === 'seguridad' ? 'selected' : ''; ?>>🔒 Seguridad</option>
                        <option value="general" <?php echo $tipo === 'general' ? 'selected' : ''; ?>>ℹ️ General</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label>Nivel de Urgencia</label>
                    <select name="urgencia" class="filter-select">
                        <option value="todas" <?php echo $urgencia === 'todas' ? 'selected' : ''; ?>>Todas</option>
                        <option value="alta" <?php echo $urgencia === 'alta' ? 'selected' : ''; ?>>🔴 Alta</option>
                        <option value="media" <?php echo $urgencia === 'media' ? 'selected' : ''; ?>>🟡 Media</option>
                        <option value="baja" <?php echo $urgencia === 'baja' ? 'selected' : ''; ?>>🔵 Baja</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <button type="submit" class="btn-filter">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Alertas List -->
    <?php if (!empty($alertas_filtradas)): ?>
        <div class="alertas-list">
            <?php foreach ($alertas_filtradas as $alerta): ?>
                <?php
                $icon_map = [
                    'estafa' => '🚨',
                    'normativa' => '📋',
                    'oferta' => '🎁',
                    'seguridad' => '🔒',
                    'general' => 'ℹ️'
                ];
                
                $urgencia_text = [
                    'alta' => '🔴 Alta',
                    'media' => '🟡 Media',
                    'baja' => '🔵 Baja'
                ];
                
                $es_leida = in_array($alerta['id'], $alertas_leidas);
                ?>
                
                <div class="alerta-card <?php echo $alerta['nivel_urgencia']; ?> <?php echo $es_leida ? 'leida' : ''; ?>">
                    <div class="alerta-header">
                        <div class="alerta-icon-big <?php echo $alerta['tipo_alerta']; ?>">
                            <?php echo $icon_map[$alerta['tipo_alerta']] ?? 'ℹ️'; ?>
                        </div>
                        
                        <div class="alerta-title-section">
                            <div class="alerta-badges">
                                <span class="badge <?php echo $alerta['nivel_urgencia']; ?>">
                                    <?php echo $urgencia_text[$alerta['nivel_urgencia']]; ?>
                                </span>
                                <span class="badge tipo">
                                    <?php echo ucfirst($alerta['tipo_alerta']); ?>
                                </span>
                                <?php if (!empty($alerta['zona_afectada'])): ?>
                                    <span class="badge zona">
                                        📍 <?php echo implode(', ', array_slice($alerta['zona_afectada'], 0, 2)); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <h3><?php echo htmlspecialchars($alerta['titulo']); ?></h3>
                            
                            <div class="alerta-meta">
                                Publicado: <?php echo date('d/m/Y H:i', strtotime($alerta['fecha_inicio'])); ?>
                                <?php if ($alerta['fecha_fin']): ?>
                                    • Válido hasta: <?php echo date('d/m/Y', strtotime($alerta['fecha_fin'])); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alerta-body">
                        <p><?php echo nl2br(htmlspecialchars($alerta['descripcion'])); ?></p>
                        
                        <?php if ($alerta['link_info']): ?>
                            <a href="<?php echo htmlspecialchars($alerta['link_info']); ?>" 
                               target="_blank" 
                               style="color: #c8102e; font-weight: 600;">
                                Más información <i class="fas fa-external-link-alt"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="alerta-footer">
                        <div class="alerta-date">
                            <i class="fas fa-calendar"></i>
                            <?php echo date('d M Y', strtotime($alerta['fecha_inicio'])); ?>
                        </div>
                        
                        <?php if ($es_leida): ?>
                            <span class="badge-leida">
                                <i class="fas fa-check"></i> Leída
                            </span>
                        <?php else: ?>
                            <a href="/user/alertas.php?mark_read=<?php echo $alerta['id']; ?>" class="btn-mark-read">
                                <i class="fas fa-check"></i> Marcar como leída
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-bell-slash"></i>
            <h3>No hay alertas activas</h3>
            <p>No hay alertas que coincidan con tus filtros</p>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
