<?php
/**
 * Mis Cotizaciones Guardadas
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Obtener cotizaciones del usuario
$cotizaciones_result = supabase_query(
    'cotizaciones_guardadas',
    'GET',
    null,
    'select=*&user_id=eq.' . $user['id'] . '&order=fecha_guardado.desc'
);

$cotizaciones = $cotizaciones_result['data'] ?? [];

// Eliminar cotización si se solicita
if (isset($_GET['eliminar'])) {
    $id_eliminar = intval($_GET['eliminar']);
    supabase_query(
        'cotizaciones_guardadas',
        'DELETE',
        null,
        'id=eq.' . $id_eliminar . '&user_id=eq.' . $user['id']
    );
    header('Location: /user/cotizaciones.php?deleted=1');
    exit;
}

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.cotizaciones-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.page-header {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
    color: white;
    padding: 50px 40px;
    border-radius: 16px;
    margin-bottom: 40px;
    box-shadow: 0 4px 20px rgba(23, 162, 184, 0.2);
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

.cotizacion-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    margin-bottom: 25px;
    transition: all 0.3s;
    border-left: 5px solid #17a2b8;
}

.cotizacion-card:hover {
    transform: translateX(4px);
    box-shadow: 0 6px 25px rgba(0,0,0,0.15);
}

.cotizacion-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e0e0e0;
}

.cotizacion-info h3 {
    color: #1a1a1a;
    font-size: 22px;
    margin: 0 0 10px 0;
}

.cotizacion-fecha {
    color: #666;
    font-size: 14px;
}

.cotizacion-precio {
    font-size: 32px;
    font-weight: 700;
    color: #c8102e;
}

.cotizacion-body {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}

.detalle-item {
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.detalle-item .label {
    color: #666;
    font-size: 13px;
    margin-bottom: 5px;
}

.detalle-item .value {
    color: #1a1a1a;
    font-size: 16px;
    font-weight: 600;
}

.cotizacion-footer {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    align-items: center;
}

.btn-action {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.btn-primary {
    background: linear-gradient(135deg, #c8102e 0%, #a00d25 100%);
    color: white;
}

.btn-secondary {
    background: #6c757d;
    color: white;
}

.btn-danger {
    background: #dc3545;
    color: white;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    color: white;
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
    margin-bottom: 15px;
}

.empty-state p {
    color: #999;
    font-size: 16px;
    margin-bottom: 25px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 25px;
    border: 1px solid #c3e6cb;
}

@media (max-width: 768px) {
    .cotizacion-header {
        flex-direction: column;
    }
    
    .cotizacion-footer {
        flex-direction: column;
    }
    
    .btn-action {
        width: 100%;
    }
}
</style>

<div class="cotizaciones-container">
    <!-- Header -->
    <div class="page-header">
        <h1>💼 Mis Cotizaciones</h1>
        <p>Revisa y compara tus presupuestos guardados</p>
    </div>
    
    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> Cotización eliminada correctamente
        </div>
    <?php endif; ?>
    
    <!-- Cotizaciones -->
    <?php if (!empty($cotizaciones)): ?>
        <?php foreach ($cotizaciones as $cot): 
            $datos = json_decode($cot['datos_cotizacion'], true);
        ?>
        
        <div class="cotizacion-card">
            <div class="cotizacion-header">
                <div class="cotizacion-info">
                    <h3>
                        <?php 
                        $tipo_icons = [
                            'alarma_hogar' => '🏠',
                            'alarma_negocio' => '🏪',
                            'camaras_vigilancia' => '📹',
                            'control_acceso' => '🔐',
                            'otro' => '📋'
                        ];
                        echo ($tipo_icons[$cot['tipo_servicio']] ?? '📋') . ' ';
                        echo ucfirst(str_replace('_', ' ', $cot['tipo_servicio']));
                        ?>
                    </h3>
                    <div class="cotizacion-fecha">
                        Guardado el <?php echo date('d/m/Y H:i', strtotime($cot['fecha_guardado'])); ?>
                    </div>
                </div>
                
                <div class="cotizacion-precio">
                    <?php echo number_format($cot['precio_estimado'], 2); ?>€
                </div>
            </div>
            
            <div class="cotizacion-body">
                <?php if (isset($datos['tipo_propiedad'])): ?>
                    <div class="detalle-item">
                        <div class="label">Tipo de Propiedad</div>
                        <div class="value"><?php echo ucfirst($datos['tipo_propiedad']); ?></div>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($datos['superficie'])): ?>
                    <div class="detalle-item">
                        <div class="label">Superficie</div>
                        <div class="value"><?php echo $datos['superficie']; ?> m²</div>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($datos['num_sensores'])): ?>
                    <div class="detalle-item">
                        <div class="label">Sensores</div>
                        <div class="value"><?php echo $datos['num_sensores']; ?> unidades</div>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($datos['incluye_camaras'])): ?>
                    <div class="detalle-item">
                        <div class="label">Cámaras</div>
                        <div class="value"><?php echo $datos['incluye_camaras'] ? 'Sí' : 'No'; ?></div>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($datos['monitorizado'])): ?>
                    <div class="detalle-item">
                        <div class="label">Monitorizado 24/7</div>
                        <div class="value"><?php echo $datos['monitorizado'] ? 'Sí' : 'No'; ?></div>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($cot['notas'])): ?>
                <div style="padding: 15px; background: #fff3cd; border-radius: 8px; margin-bottom: 20px;">
                    <strong>📝 Notas:</strong><br>
                    <?php echo nl2br(htmlspecialchars($cot['notas'])); ?>
                </div>
            <?php endif; ?>
            
            <div class="cotizacion-footer">
                <a href="/pedido.php?load_quote=<?php echo $cot['id']; ?>" class="btn-action btn-primary">
                    <i class="fas fa-edit"></i> Modificar
                </a>
                <a href="/pedido.php?quote_id=<?php echo $cot['id']; ?>" class="btn-action btn-secondary">
                    <i class="fas fa-shopping-cart"></i> Contratar
                </a>
                <a href="/user/cotizaciones.php?eliminar=<?php echo $cot['id']; ?>" 
                   class="btn-action btn-danger"
                   onclick="return confirm('¿Eliminar esta cotización?')">
                    <i class="fas fa-trash"></i> Eliminar
                </a>
            </div>
        </div>
        
        <?php endforeach; ?>
        
    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-file-invoice"></i>
            <h3>No tienes cotizaciones guardadas</h3>
            <p>Crea una cotización personalizada y guárdala para revisarla más tarde</p>
            <a href="/pedido.php" class="btn-action btn-primary" style="display: inline-block; margin-top: 20px;">
                <i class="fas fa-plus"></i> Crear Cotización
            </a>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
