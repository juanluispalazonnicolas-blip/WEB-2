<?php
/**
 * Perfil de Usuario
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Obtener datos completos del usuario
$user_data_result = supabase_query(
    'users',
    'GET',
    null,
    'select=*&id=eq.' . $user['id']
);

$user_data = $user_data_result['data'][0] ?? null;

if (!$user_data) {
    header('Location: /user/dashboard.php');
    exit;
}

// Procesar actualización
$success = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $update_data = [];
    
    // Campos editables
    if (isset($_POST['nombre'])) {
        $update_data['nombre'] = auth_sanitize($_POST['nombre']);
    }
    
    if (isset($_POST['apellidos'])) {
        $update_data['apellidos'] = auth_sanitize($_POST['apellidos']);
    }
    
    if (isset($_POST['telefono'])) {
        $telefono = auth_sanitize($_POST['telefono']);
        if (!empty($telefono) && !auth_validate_phone($telefono)) {
            $error = 'Teléfono inválido';
        } else {
            $update_data['telefono'] = $telefono;
        }
    }
    
    if (isset($_POST['ciudad'])) {
        $update_data['ciudad'] = auth_sanitize($_POST['ciudad']);
    }
    
    if (isset($_POST['provincia'])) {
        $update_data['provincia'] = auth_sanitize($_POST['provincia']);
    }
    
    if (isset($_POST['codigo_postal'])) {
        $cp = auth_sanitize($_POST['codigo_postal']);
        if (!empty($cp) && !auth_validate_postal_code($cp)) {
            $error = 'Código postal inválido';
        } else {
            $update_data['codigo_postal'] = $cp;
        }
    }
    
    if (isset($_POST['tipo_propiedad'])) {
        $update_data['tipo_propiedad'] = $_POST['tipo_propiedad'];
    }
    
    if (isset($_POST['preferencias_contacto'])) {
        $update_data['preferencias_contacto'] = $_POST['preferencias_contacto'];
    }
    
    // Actualizar en BD si no hay errores
    if (!$error && !empty($update_data)) {
        $result = supabase_query(
            'users',
            'PATCH',
            $update_data,
            'id=eq.' . $user['id']
        );
        
        if ($result['success']) {
            $success = true;
            // Recargar datos
            $user_data_result = supabase_query('users', 'GET', null, 'select=*&id=eq.' . $user['id']);
            $user_data = $user_data_result['data'][0] ?? $user_data;
        } else {
            $error = 'Error al actualizar perfil';
        }
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.perfil-container {
    max-width: 900px;
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
    margin-bottom: 10px;
}

.page-header p {
    color: rgba(255,255,255,0.9);
    font-size: 16px;
    margin: 0;
}

.alert {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.form-card {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.form-card h2 {
    color: #1a1a1a;
    font-size: 24px;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e0e0e0;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 600;
    font-size: 14px;
}

.form-group label .required {
    color: #dc3545;
}

.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s;
}

.form-control:focus {
    outline: none;
    border-color: #17a2b8;
    box-shadow: 0 0 0 3px rgba(23, 162, 184, 0.1);
}

.form-control:disabled {
    background: #f8f9fa;
    cursor: not-allowed;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.info-badge {
    display: inline-block;
    padding: 6px 12px;
    background: #e9ecef;
    color: #495057;
    border-radius: 6px;
    font-size: 13px;
    margin-left: 10px;
}

.nivel-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
    color: #1a1a1a;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 700;
}

.btn-save {
    padding: 14px 32px;
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
}

.btn-cancel {
    padding: 14px 32px;
    background: #6c757d;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-block;
}

.btn-cancel:hover {
    background: #5a6268;
    color: white;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.stat-item {
    text-align: center;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
}

.stat-item .value {
    font-size: 32px;
    font-weight: 700;
    color: #17a2b8;
    margin-bottom: 5px;
}

.stat-item .label {
    font-size: 14px;
    color: #666;
}

.danger-zone {
    background: #fff3cd;
    border-left: 4px solid #ffc107;
    padding: 20px;
    border-radius: 8px;
    margin-top: 30px;
}

.danger-zone h3 {
    color: #856404;
    margin-bottom: 10px;
}

.danger-zone p {
    color: #856404;
    font-size: 14px;
    margin-bottom: 15px;
}

.btn-danger {
    padding: 10px 20px;
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="perfil-container">
    <!-- Header -->
    <div class="page-header">
        <h1>⚙️ Mi Perfil</h1>
        <p>Actualiza tu información personal y preferencias</p>
    </div>
    
    <!-- Mensajes -->
    <?php if ($success): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle" style="font-size: 20px;"></i>
            <div><strong>¡Perfil actualizado!</strong><br>Tus cambios se han guardado correctamente.</div>
        </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle" style="font-size: 20px;"></i>
            <div><?php echo htmlspecialchars($error); ?></div>
        </div>
    <?php endif; ?>
    
    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-item">
            <div class="value"><?php echo number_format($user_data['puntos']); ?></div>
            <div class="label">Puntos Acumulados</div>
        </div>
        <div class="stat-item">
            <div class="value"><?php echo ucfirst($user_data['nivel_usuario']); ?></div>
            <div class="label">Nivel de Usuario</div>
        </div>
        <div class="stat-item">
            <div class="value"><?php echo date('d/m/Y', strtotime($user_data['fecha_registro'])); ?></div>
            <div class="label">Miembro desde</div>
        </div>
    </div>
    
    <form method="POST">
        <!-- Información Personal -->
        <div class="form-card">
            <h2>👤 Información Personal</h2>
            
            <div class="form-group">
                <label>Email <span class="info-badge">No editable</span></label>
                <input type="email" class="form-control" value="<?php echo htmlspecialchars($user_data['email']); ?>" disabled>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label>Nombre <span class="required">*</span></label>
                    <input type="text" name="nombre" class="form-control" required
                           value="<?php echo htmlspecialchars($user_data['nombre'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" class="form-control"
                           value="<?php echo htmlspecialchars($user_data['apellidos'] ?? ''); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label>Teléfono</label>
                <input type="tel" name="telefono" class="form-control" placeholder="600 123 456"
                       value="<?php echo htmlspecialchars($user_data['telefono'] ?? ''); ?>">
            </div>
        </div>
        
        <!-- Ubicación -->
        <div class="form-card">
            <h2>📍 Ubicación</h2>
            
            <div class="form-row">
                <div class="form-group">
                    <label>Ciudad <span class="required">*</span></label>
                    <input type="text" name="ciudad" class="form-control" required placeholder="Ej: Murcia"
                           value="<?php echo htmlspecialchars($user_data['ciudad'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label>Provincia <span class="required">*</span></label>
                    <select name="provincia" class="form-control" required>
                        <option value="">Seleccionar...</option>
                        <?php
                        $provincias = ['Murcia', 'Alicante', 'Almería', 'Albacete', 'Madrid', 'Barcelona', 'Valencia'];
                        foreach ($provincias as $prov):
                        ?>
                            <option value="<?php echo $prov; ?>" <?php echo ($user_data['provincia'] ?? '') === $prov ? 'selected' : ''; ?>>
                                <?php echo $prov; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label>Código Postal <span class="required">*</span></label>
                    <input type="text" name="codigo_postal" class="form-control" required pattern="[0-9]{5}" placeholder="30001"
                           value="<?php echo htmlspecialchars($user_data['codigo_postal'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label>Tipo de Propiedad</label>
                    <select name="tipo_propiedad" class="form-control">
                        <option value="vivienda" <?php echo ($user_data['tipo_propiedad'] ?? 'vivienda') === 'vivienda' ? 'selected' : ''; ?>>Vivienda</option>
                        <option value="negocio" <?php echo ($user_data['tipo_propiedad'] ?? '') === 'negocio' ? 'selected' : ''; ?>>Negocio</option>
                        <option value="otro" <?php echo ($user_data['tipo_propiedad'] ?? '') === 'otro' ? 'selected' : ''; ?>>Otro</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Preferencias -->
        <div class="form-card">
            <h2>🔔 Preferencias de Contacto</h2>
            
            <div class="form-group">
                <label>¿Cómo prefieres que te contactemos?</label>
                <select name="preferencias_contacto" class="form-control">
                    <option value="email" <?php echo ($user_data['preferencias_contacto'] ?? 'email') === 'email' ? 'selected' : ''; ?>>Email</option>
                    <option value="telefono" <?php echo ($user_data['preferencias_contacto'] ?? '') === 'telefono' ? 'selected' : ''; ?>>Teléfono</option>
                    <option value="ambos" <?php echo ($user_data['preferencias_contacto'] ?? '') === 'ambos' ? 'selected' : ''; ?>>Ambos</option>
                </select>
            </div>
        </div>
        
        <!-- Botones -->
        <div style="display: flex; gap: 15px; justify-content: flex-end; margin-bottom: 30px;">
            <a href="/user/dashboard.php" class="btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" class="btn-save">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
        </div>
    </form>
    
    <!-- Zona de Peligro -->
    <div class="danger-zone">
        <h3>⚠️ Zona de Peligro</h3>
        <p>Las siguientes acciones son irreversibles. Procede con precaución.</p>
        <button class="btn-danger" onclick="alert('Funcionalidad próximamente: exportar datos (GDPR)')">
            <i class="fas fa-download"></i> Exportar mis datos
        </button>
        <button class="btn-danger" onclick="alert('Funcionalidad próximamente: eliminar cuenta')" style="margin-left: 10px;">
            <i class="fas fa-trash"></i> Eliminar cuenta
        </button>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
