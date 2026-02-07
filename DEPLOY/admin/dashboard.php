<?php
/**
 * Dashboard Admin - Newsletter Analytics
 */

require_once __DIR__ . '/includes/admin-auth.php';
require_once __DIR__ . '/../includes/db.php';

// Requerir login
require_admin_login();

$page_title = 'Dashboard';
$page_subtitle = 'Vista general del newsletter';

// ==================================
// OBTENER ESTADÍSTICAS
// ==================================

// Total suscriptores
$total_query = supabase_query('newsletter_subscribers', [
    'select' => 'id',
    'count' => 'exact'
]);
$total_suscriptores = $total_query['count'] ?? 0;

// Confirmados
$confirmados_query = supabase_query('newsletter_subscribers', [
    'select' => 'id',
    'confirmed' => 'eq.true',
    'count' => 'exact'
]);
$confirmados = $confirmados_query['count'] ?? 0;

// Pendientes
$pendientes = $total_suscriptores - $confirmados;

// Tasa de confirmación
$tasa_confirmacion = $total_suscriptores > 0 ? round(($confirmados / $total_suscriptores) * 100, 1) : 0;

// Nuevos últimos 7 días
$fecha_7dias = date('Y-m-d\TH:i:s', strtotime('-7 days'));
$nuevos_7dias_query = supabase_query('newsletter_subscribers', [
    'select' => 'id',
    'subscribed_at' => 'gte.' . $fecha_7dias,
    'count' => 'exact'
]);
$nuevos_7dias = $nuevos_7dias_query['count'] ?? 0;

// Nuevos últimos 30 días
$fecha_30dias = date('Y-m-d\TH:i:s', strtotime('-30 days'));
$nuevos_30dias_query = supabase_query('newsletter_subscribers', [
    'select' => 'id',
    'subscribed_at' => 'gte.' . $fecha_30dias,
    'count' => 'exact'
]);
$nuevos_30dias = $nuevos_30dias_query['count'] ?? 0;

// Últimos 10 suscriptores
$ultimos_suscriptores = supabase_query('newsletter_subscribers', [
    'select' => 'email,subscribed_at,confirmed,confirmation_token',
    'order' => 'subscribed_at.desc',
    'limit' => 10
]);

include __DIR__ . '/includes/admin-header.php';
?>

<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Total Suscriptores -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
            <span class="text-2xl font-bold text-gray-800"><?php echo number_format($total_suscriptores); ?></span>
        </div>
        <h3 class="text-sm font-medium text-gray-600">Total Suscriptores</h3>
        <p class="text-xs text-gray-400 mt-1">Todos los registros</p>
    </div>
    
    <!-- Confirmados -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <span class="text-2xl font-bold text-gray-800"><?php echo number_format($confirmados); ?></span>
        </div>
        <h3 class="text-sm font-medium text-gray-600">Confirmados</h3>
        <p class="text-xs text-green-600 mt-1 font-medium"><?php echo $tasa_confirmacion; ?>% tasa confirmación</p>
    </div>
    
    <!-- Pendientes -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-clock text-amber-600 text-xl"></i>
            </div>
            <span class="text-2xl font-bold text-gray-800"><?php echo number_format($pendientes); ?></span>
        </div>
        <h3 class="text-sm font-medium text-gray-600">Pendientes</h3>
        <p class="text-xs text-gray-400 mt-1">Sin confirmar email</p>
    </div>
    
    <!-- Nuevos (7 días) -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-chart-line text-purple-600 text-xl"></i>
            </div>
            <span class="text-2xl font-bold text-gray-800"><?php echo number_format($nuevos_7dias); ?></span>
        </div>
        <h3 class="text-sm font-medium text-gray-600">Últimos 7 días</h3>
        <p class="text-xs text-gray-400 mt-1"><?php echo number_format($nuevos_30dias); ?> en 30 días</p>
    </div>
</div>

<!-- Gráficos y Tabla -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <!-- Gráfico Evolución -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-gray-800 mb-4">
            <i class="fas fa-chart-area mr-2 text-blue-600"></i>
            Evolución Suscriptores
        </h3>
        <div class="h-64">
            <canvas id="chartEvolucion"></canvas>
        </div>
        <p class="text-xs text-gray-400 mt-4 text-center">Últimos 30 días</p>
    </div>
    
    <!-- Gráfico Estado -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-gray-800 mb-4">
            <i class="fas fa-chart-pie mr-2 text-green-600"></i>
            Estado Suscripciones
        </h3>
        <div class="h-64 flex items-center justify-center">
            <canvas id="chartEstado"></canvas>
        </div>
    </div>
</div>

<!-- Últimos Suscriptores -->
<div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 mt-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold text-gray-800">
            <i class="fas fa-clock mr-2 text-gray-600"></i>
            Últimas Suscripciones
        </h3>
        <a href="/admin/suscriptores.php" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
            Ver todos →
        </a>
    </div>
    
    <?php if (empty($ultimos_suscriptores)): ?>
        <div class="text-center py-12 text-gray-400">
            <i class="fas fa-inbox text-4xl mb-4"></i>
            <p>No hay suscriptores aún</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Fecha</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($ultimos_suscriptores as $sub): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-800">
                                <i class="far fa-envelope mr-2 text-gray-400"></i>
                                <?php echo htmlspecialchars($sub['email']); ?>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">
                                <?php echo date('d/m/Y H:i', strtotime($sub['subscribed_at'])); ?>
                            </td>
                            <td class="px-4 py-3">
                                <?php if ($sub['confirmed']): ?>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        <i class="fas fa-check mr-1"></i>Confirmado
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                                        <i class="fas fa-clock mr-1"></i>Pendiente
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
    <a href="/admin/suscriptores.php" class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 hover:bg-blue-100 transition-colors group">
        <i class="fas fa-users text-2xl text-blue-600 mb-3"></i>
        <h4 class="font-bold text-gray-800 mb-1">Gestionar Suscriptores</h4>
        <p class="text-sm text-gray-600">Ver lista completa y exportar</p>
    </a>
    
    <a href="/admin/campanas.php" class="bg-purple-50 border-2 border-purple-200 rounded-xl p-6 hover:bg-purple-100 transition-colors group">
        <i class="fas fa-paper-plane text-2xl text-purple-600 mb-3"></i>
        <h4 class="font-bold text-gray-800 mb-1">Nueva Campaña</h4>
        <p class="text-sm text-gray-600">Enviar newsletter a suscriptores</p>
    </a>
    
    <a href="/admin/suscriptores.php?export=csv" class="bg-green-50 border-2 border-green-200 rounded-xl p-6 hover:bg-green-100 transition-colors group">
        <i class="fas fa-download text-2xl text-green-600 mb-3"></i>
        <h4 class="font-bold text-gray-800 mb-1">Exportar CSV</h4>
        <p class="text-sm text-gray-600">Descargar base de datos</p>
    </a>
</div>

<script>
// Gráfico Evolución (simulado - en producción usar datos reales)
const ctxEvolucion = document.getElementById('chartEvolucion').getContext('2d');
new Chart(ctxEvolucion, {
    type: 'line',
    data: {
        labels: ['24 días', '21 días', '18 días', '15 días', '12 días', '9 días', '6 días', '3 días', 'Hoy'],
        datasets: [{
            label: 'Suscriptores',
            data: [0, 0, 0, 0, 0, <?php echo max(0, $confirmados - 3); ?>, <?php echo max(0, $confirmados - 2); ?>, <?php echo max(0, $confirmados - 1); ?>, <?php echo $confirmados; ?>],
            borderColor: '#3B82F6',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});

// Gráfico Estado
const ctxEstado = document.getElementById('chartEstado').getContext('2d');
new Chart(ctxEstado, {
    type: 'doughnut',
    data: {
        labels: ['Confirmados', 'Pendientes'],
        datasets: [{
            data: [<?php echo $confirmados; ?>, <?php echo $pendientes; ?>],
            backgroundColor: ['#10B981', '#F59E0B'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

<?php include __DIR__ . '/includes/admin-footer.php'; ?>
