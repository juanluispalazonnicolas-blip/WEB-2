<?php
/**
 * Admin - Gestión de Suscriptores
 */

require_once __DIR__ . '/includes/admin-auth.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/includes/admin-config.php';

// Requerir login
require_admin_login();

$page_title = 'Suscriptores Newsletter';
$page_subtitle = 'Gestión completa de la base de datos';

// ==================================
// EXPORTAR CSV
// ==================================
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    // Obtener TODOS los suscriptores
    $all_suscriptores = supabase_query('newsletter_subscribers', [
        'select' => 'email,subscribed_at,confirmed,unsubscribed_at',
        'order' => 'subscribed_at.desc',
        'limit' => 10000 // Máximo razonable
    ]);
    
    // Headers para descarga
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . ADMIN_EXPORT_FILENAME . '-' . date('Y-m-d') . '.csv"');
    
    // BOM para Excel UTF-8
    echo "\xEF\xBB\xBF";
    
    // Crear CSV
    $output = fopen('php://output', 'w');
    
    // Headers
    fputcsv($output, ['Email', 'Fecha Suscripción', 'Confirmado', 'Fecha Baja']);
    
    // Datos
    foreach ($all_suscriptores as $sub) {
        fputcsv($output, [
            $sub['email'],
            date('d/m/Y H:i', strtotime($sub['subscribed_at'])),
            $sub['confirmed'] ? 'Sí' : 'No',
            $sub['unsubscribed_at'] ? date('d/m/Y H:i', strtotime($sub['unsubscribed_at'])) : '-'
        ]);
    }
    
    fclose($output);
    exit();
}

// ==================================
// FILTROS Y BÚSQUEDA
// ==================================
$filtro_estado = $_GET['estado'] ?? 'todos';
$buscar = $_GET['q'] ?? '';
$pagina = max(1, intval($_GET['pagina'] ?? 1));
$por_pagina = ADMIN_ITEMS_PER_PAGE;
$offset = ($pagina - 1) * $por_pagina;

// Construir query
$query_params = [
    'select' => 'id,email,subscribed_at,confirmed,confirmation_token,unsubscribed_at',
    'order' => 'subscribed_at.desc',
    'limit' => $por_pagina,
    'offset' => $offset
];

// Filtro por estado
if ($filtro_estado === 'confirmados') {
    $query_params['confirmed'] = 'eq.true';
    $query_params['unsubscribed_at'] = 'is.null';
} elseif ($filtro_estado === 'pendientes') {
    $query_params['confirmed'] = 'eq.false';
} elseif ($filtro_estado === 'cancelados') {
    $query_params['unsubscribed_at'] = 'not.is.null';
}

// Búsqueda por email
if (!empty($buscar)) {
    $query_params['email'] = 'ilike.*' . $buscar . '*';
}

// Obtener suscriptores
$suscriptores = supabase_query('newsletter_subscribers', $query_params);

// Total para paginación (query separado para count)
$count_params = ['select' => 'id', 'count' => 'exact'];
if ($filtro_estado === 'confirmados') {
    $count_params['confirmed'] = 'eq.true';
    $count_params['unsubscribed_at'] = 'is.null';
} elseif ($filtro_estado === 'pendientes') {
    $count_params['confirmed'] = 'eq.false';
} elseif ($filtro_estado === 'cancelados') {
    $count_params['unsubscribed_at'] = 'not.is.null';
}
if (!empty($buscar)) {
    $count_params['email'] = 'ilike.*' . $buscar . '*';
}
$total_query = supabase_query('newsletter_subscribers', $count_params);
$total_registros = $total_query['count'] ?? 0;
$total_paginas = ceil($total_registros / $por_pagina);

include __DIR__ . '/includes/admin-header.php';
?>

<!-- Filtros y Búsqueda -->
<div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 mb-6">
    <form method="GET" action="" class="flex flex-col md:flex-row gap-4">
        
        <!-- Búsqueda -->
        <div class="flex-1">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input 
                    type="text" 
                    name="q" 
                    value="<?php echo htmlspecialchars($buscar); ?>"
                    placeholder="Buscar por email..." 
                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>
        
        <!-- Filtro Estado -->
        <select name="estado" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="todos" <?php echo $filtro_estado === 'todos' ? 'selected' : ''; ?>>Todos</option>
            <option value="confirmados" <?php echo $filtro_estado === 'confirmados' ? 'selected' : ''; ?>>Confirmados</option>
            <option value="pendientes" <?php echo $filtro_estado === 'pendientes' ? 'selected' : ''; ?>>Pendientes</option>
            <option value="cancelados" <?php echo $filtro_estado === 'cancelados' ? 'selected' : ''; ?>>Cancelados</option>
        </select>
        
        <!-- Botones -->
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
            <i class="fas fa-filter mr-2"></i>Filtrar
        </button>
        
        <a href="/admin/suscriptores.php?export=csv<?php echo $filtro_estado !== 'todos' ? '&estado=' . $filtro_estado : ''; echo !empty($buscar) ? '&q=' . urlencode($buscar) : ''; ?>" 
           class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-medium text-center">
            <i class="fas fa-download mr-2"></i>Exportar CSV
        </a>
    </form>
</div>

<!-- Resultados -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <!-- Header -->
    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-800">Lista de Suscriptores</h3>
            <p class="text-sm text-gray-600 mt-1">
                Mostrando <?php echo number_format(count($suscriptores)); ?> de <?php echo number_format($total_registros); ?> registros
            </p>
        </div>
        <div class="text-sm text-gray-500">
            Página <?php echo $pagina; ?> de <?php echo $total_paginas; ?>
        </div>
    </div>
    
    <!-- Tabla -->
    <?php if (empty($suscriptores)): ?>
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-inbox text-5xl mb-4"></i>
            <p class="text-lg font-medium">No se encontraron suscriptores</p>
            <p class="text-sm mt-2">Prueba con otros filtros o búsqueda</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Fecha Suscripción</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Estado</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($suscriptores as $sub): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            
                            <!-- Email -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <i class="far fa-envelope text-gray-400"></i>
                                    <span class="text-sm text-gray-800 font-medium"><?php echo htmlspecialchars($sub['email']); ?></span>
                                </div>
                            </td>
                            
                            <!-- Fecha -->
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <?php echo date('d/m/Y H:i', strtotime($sub['subscribed_at'])); ?>
                            </td>
                            
                            <!-- Estado -->
                            <td class="px-6 py-4">
                                <?php if ($sub['unsubscribed_at']): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                        <i class="fas fa-ban mr-1"></i>Cancelado
                                    </span>
                                <?php elseif ($sub['confirmed']): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        <i class="fas fa-check-circle mr-1"></i>Confirmado
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                                        <i class="fas fa-clock mr-1"></i>Pendiente
                                    </span>
                                <?php endif; ?>
                            </td>
                            
                            <!-- Acciones -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <?php if (!$sub['confirmed'] && !$sub['unsubscribed_at']): ?>
                                        <button 
                                            onclick="reenviarConfirmacion('<?php echo htmlspecialchars($sub['email']); ?>')"
                                            class="text-blue-600 hover:text-blue-700 text-sm font-medium"
                                            title="Reenviar email confirmación">
                                            <i class="fas fa-paper-plane mr-1"></i>Reenviar
                                        </button>
                                    <?php endif; ?>
                                    
                                    <button 
                                        onclick="verDetalles('<?php echo htmlspecialchars($sub['email']); ?>')"
                                        class="text-gray-600 hover:text-gray-700"
                                        title="Ver detalles">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
    
    <!-- Paginación -->
    <?php if ($total_paginas > 1): ?>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Mostrando <?php echo (($pagina - 1) * $por_pagina) + 1; ?> - <?php echo min($pagina * $por_pagina, $total_registros); ?> de <?php echo number_format($total_registros); ?>
            </div>
            
            <div class="flex gap-2">
                <?php if ($pagina > 1): ?>
                    <a href="?pagina=<?php echo $pagina - 1; ?><?php echo $filtro_estado !== 'todos' ? '&estado=' . $filtro_estado : ''; ?><?php echo !empty($buscar) ? '&q=' . urlencode($buscar) : ''; ?>" 
                       class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                <?php endif; ?>
                
                <span class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium">
                    <?php echo $pagina; ?>
                </span>
                
                <?php if ($pagina < $total_paginas): ?>
                    <a href="?pagina=<?php echo $pagina + 1; ?><?php echo $filtro_estado !== 'todos' ? '&estado=' . $filtro_estado : ''; ?><?php echo !empty($buscar) ? '&q=' . urlencode($buscar) : ''; ?>" 
                       class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
function reenviarConfirmacion(email) {
    if (confirm('¿Reenviar email de confirmación a ' + email + '?')) {
        // TODO: Implementar endpoint para reenvío
        alert('Funcionalidad en desarrollo');
    }
}

function verDetalles(email) {
    alert('Detalles de: ' + email + '\n\nEsta funcionalidad se puede expandir con un modal.');
}
</script>

<?php include __DIR__ . '/includes/admin-footer.php'; ?>
