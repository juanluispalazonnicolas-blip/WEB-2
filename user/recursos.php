<?php
/**
 * Biblioteca de Recursos Premium
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Filtros
$categoria = $_GET['categoria'] ?? 'todas';
$tipo = $_GET['tipo'] ?? 'todos';
$buscar = $_GET['buscar'] ?? '';

// Construir query de Supabase
$filters = 'activo=eq.true';

if ($categoria !== 'todas') {
    $filters .= '&categoria=eq.' . urlencode($categoria);
}

if ($tipo !== 'todos') {
    $filters .= '&tipo=eq.' . urlencode($tipo);
}

if (!empty($buscar)) {
    $filters .= '&titulo=ilike.*' . urlencode($buscar) . '*';
}

// Obtener recursos
$recursos_result = supabase_query(
    'recursos_premium',
    'GET',
    null,
    'select=*&' . $filters . '&order=orden.asc,fecha_creacion.desc'
);

$recursos = $recursos_result['data'] ?? [];

// Obtener mis descargas
$descargas_result = supabase_query(
    'descargas_usuario',
    'GET',
    null,
    'select=recurso_id&user_id=eq.' . $user['id']
);

$mis_descargas = array_column($descargas_result['data'] ?? [], 'recurso_id');

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.recursos-container {
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

.filters-section {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.filters-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    align-items: end;
}

.filter-group label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 600;
    font-size: 14px;
}

.filter-select,
.filter-input {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s;
}

.filter-select:focus,
.filter-input:focus {
    outline: none;
    border-color: #6f42c1;
    box-shadow: 0 0 0 3px rgba(111, 66, 193, 0.1);
}

.btn-filter {
    padding: 12px 24px;
    background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-filter:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(111, 66, 193, 0.3);
}

.recursos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.recurso-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s;
    display: flex;
    flex-direction: column;
}

.recurso-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.recurso-header {
    padding: 25px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-bottom: 3px solid #6f42c1;
}

.recurso-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    margin-bottom: 15px;
}

.recurso-icon.pdf {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

.recurso-icon.video {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
}

.recurso-icon.excel {
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
}

.recurso-icon.webinar {
    background: linear-gradient(135deg, #fd7e14 0%, #dc6502 100%);
}

.recurso-body {
    padding: 25px;
    flex-grow: 1;
}

.recurso-card h3 {
    color: #1a1a1a;
    font-size: 20px;
    margin-bottom: 12px;
    font-weight: 700;
    line-height: 1.3;
}

.recurso-card .categoria-badge {
    display: inline-block;
    padding: 4px 12px;
    background: #e9ecef;
    color: #495057;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 12px;
}

.recurso-card .descripcion {
    color: #666;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.recurso-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    padding-top: 15px;
    border-top: 1px solid #e0e0e0;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #666;
    font-size: 13px;
}

.meta-item i {
    color: #6f42c1;
}

.recurso-footer {
    padding: 0 25px 25px;
}

.btn-download {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
}

.btn-download:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
    color: white;
}

.btn-download.downloaded {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
}

.btn-download.premium {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
}

.nivel-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
    color: #1a1a1a;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    margin-left: 10px;
}

.empty-state {
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.empty-state i {
    font-size: 80px;
    color: #e0e0e0;
    margin-bottom: 20px;
}

.empty-state h3 {
    color: #666;
    font-size: 24px;
    margin-bottom: 10px;
}

.empty-state p {
    color: #999;
    font-size: 16px;
}

.stats-banner {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    padding: 20px 30px;
    border-radius: 12px;
    border-left: 4px solid #ffc107;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.stats-banner .stat {
    display: flex;
    align-items: center;
    gap: 10px;
}

.stats-banner .stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.stats-banner .stat-info h4 {
    margin: 0 0 5px 0;
    color: #1a1a1a;
    font-size: 24px;
    font-weight: 700;
}

.stats-banner .stat-info p {
    margin: 0;
    color: #666;
    font-size: 14px;
}

@media (max-width: 768px) {
    .page-header h1 {
        font-size: 28px;
    }
    
    .recursos-grid {
        grid-template-columns: 1fr;
    }
    
    .filters-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="recursos-container">
    <!-- Header -->
    <div class="page-header">
        <h1>📚 Recursos Premium</h1>
        <p>Accede a guías exclusivas, webinars, templates y más contenido de valor</p>
    </div>
    
    <!-- Stats Banner -->
    <div class="stats-banner">
        <div class="stat">
            <div class="stat-icon">📦</div>
            <div class="stat-info">
                <h4><?php echo count($recursos); ?></h4>
                <p>Recursos disponibles</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat-icon">⬇️</div>
            <div class="stat-info">
                <h4><?php echo count($mis_descargas); ?></h4>
                <p>Recursos descargados</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat-icon">🎁</div>
            <div class="stat-info">
                <h4>100%</h4>
                <p>Gratis para miembros</p>
            </div>
        </div>
    </div>
    
    <!-- Filtros -->
    <div class="filters-section">
        <form method="GET" action="/user/recursos.php">
            <div class="filters-grid">
                <div class="filter-group">
                    <label>Categoría</label>
                    <select name="categoria" class="filter-select">
                        <option value="todas" <?php echo $categoria === 'todas' ? 'selected' : ''; ?>>Todas las categorías</option>
                        <option value="guias" <?php echo $categoria === 'guias' ? 'selected' : ''; ?>>Guías</option>
                        <option value="plantillas" <?php echo $categoria === 'plantillas' ? 'selected' : ''; ?>>Plantillas</option>
                        <option value="webinars" <?php echo $categoria === 'webinars' ? 'selected' : ''; ?>>Webinars</option>
                        <option value="checklist" <?php echo $categoria === 'checklist' ? 'selected' : ''; ?>>Checklists</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label>Tipo de Archivo</label>
                    <select name="tipo" class="filter-select">
                        <option value="todos" <?php echo $tipo === 'todos' ? 'selected' : ''; ?>>Todos los tipos</option>
                        <option value="pdf" <?php echo $tipo === 'pdf' ? 'selected' : ''; ?>>PDF</option>
                        <option value="video" <?php echo $tipo === 'video' ? 'selected' : ''; ?>>Video</option>
                        <option value="excel" <?php echo $tipo === 'excel' ? 'selected' : ''; ?>>Excel</option>
                        <option value="webinar" <?php echo $tipo === 'webinar' ? 'selected' : ''; ?>>Webinar</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label>Buscar</label>
                    <input type="text" name="buscar" class="filter-input" placeholder="Buscar recursos..." value="<?php echo htmlspecialchars($buscar); ?>">
                </div>
                
                <div class="filter-group">
                    <button type="submit" class="btn-filter">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Recursos Grid -->
    <?php if (!empty($recursos)): ?>
        <div class="recursos-grid">
            <?php foreach ($recursos as $recurso): ?>
                <?php
                $icon_class = $recurso['tipo'];
                $icon_emoji = [
                    'pdf' => '📄',
                    'video' => '🎥',
                    'excel' => '📊',
                    'webinar' => '🎓'
                ];
                
                $size_readable = '';
                if ($recurso['tamano_mb'] < 1) {
                    $size_readable = round($recurso['tamano_mb'] * 1024) . ' KB';
                } else {
                    $size_readable = $recurso['tamano_mb'] . ' MB';
                }
                
                $ya_descargado = in_array($recurso['id'], $mis_descargas);
                $es_premium = ($recurso['nivel_requerido'] !== 'registrado');
                $puede_descargar = true;
                
                if ($es_premium && $user['nivel'] === 'registrado') {
                    $puede_descargar = false;
                }
                ?>
                
                <div class="recurso-card">
                    <div class="recurso-header">
                        <div class="recurso-icon <?php echo $icon_class; ?>">
                            <?php echo $icon_emoji[$recurso['tipo']] ?? '📦'; ?>
                        </div>
                    </div>
                    
                    <div class="recurso-body">
                        <span class="categoria-badge"><?php echo ucfirst($recurso['categoria']); ?></span>
                        
                        <h3>
                            <?php echo htmlspecialchars($recurso['titulo']); ?>
                            <?php if ($es_premium): ?>
                                <span class="nivel-badge">
                                    💎 <?php echo ucfirst($recurso['nivel_requerido']); ?>
                                </span>
                            <?php endif; ?>
                        </h3>
                        
                        <p class="descripcion">
                            <?php echo htmlspecialchars($recurso['descripcion'] ?? ''); ?>
                        </p>
                        
                        <div class="recurso-meta">
                            <div class="meta-item">
                                <i class="fas fa-file"></i>
                                <span><?php echo strtoupper($recurso['tipo']); ?></span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-hdd"></i>
                                <span><?php echo $size_readable; ?></span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-download"></i>
                                <span><?php echo number_format($recurso['descargas']); ?> descargas</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="recurso-footer">
                        <?php if (!$puede_descargar): ?>
                            <button class="btn-download premium" disabled>
                                <i class="fas fa-lock"></i> Requiere nivel <?php echo ucfirst($recurso['nivel_requerido']); ?>
                            </button>
                        <?php else: ?>
                            <a href="/user/download-recurso.php?id=<?php echo $recurso['id']; ?>" 
                               class="btn-download <?php echo $ya_descargado ? 'downloaded' : ''; ?>"
                               <?php echo $recurso['tipo'] === 'video' ? 'target="_blank"' : 'download'; ?>>
                                <i class="fas fa-<?php echo $ya_descargado ? 'check' : 'download'; ?>"></i>
                                <?php echo $ya_descargado ? 'Descargado' : 'Descargar Gratis'; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-folder-open"></i>
            <h3>No se encontraron recursos</h3>
            <p>Intenta cambiar los filtros de búsqueda</p>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
