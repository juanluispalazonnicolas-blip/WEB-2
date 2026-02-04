<?php
/**
 * Calculadora de Riesgo de Seguridad
 * Praxis Seguridad
 */

require_once __DIR__ . '/../includes/auth-config.php';
require_once __DIR__ . '/../includes/user-functions.php';

// Requerir login
$user = user_require_login();

// Verificar si ya completó la calculadora
$resultado_previo = supabase_query(
    'calculadora_resultados',
    'GET',
    null,
    'select=*&user_id=eq.' . $user['id'] . '&order=fecha_calculo.desc&limit=1'
);

$tiene_resultado = !empty($resultado_previo['data']);
$resultado_anterior = $tiene_resultado ? $resultado_previo['data'][0] : null;

// Procesar calculadora
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calcular'])) {
    // Recoger respuestas
    $respuestas = [];
    $puntuacion_total = 0;
    
    // Pregunta 1: Tipo de propiedad
    $tipo_propiedad = $_POST['tipo_propiedad'] ?? '';
    $respuestas['tipo_propiedad'] = $tipo_propiedad;
    $puntos_tipo = ['vivienda' => 10, 'negocio' => 15, 'nave_industrial' => 20, 'oficina' => 12];
    $puntuacion_total += $puntos_tipo[$tipo_propiedad] ?? 0;
    
    // Pregunta 2: Ubicación
    $ubicacion = $_POST['ubicacion'] ?? '';
    $respuestas['ubicacion'] = $ubicacion;
    $puntos_ubicacion = ['centro_ciudad' => 15, 'residencial' => 10, 'rural' => 5, 'industrial' => 18];
    $puntuacion_total += $puntos_ubicacion[$ubicacion] ?? 0;
    
    // Pregunta 3: Piso/Planta
    $planta = $_POST['planta'] ?? '';
    $respuestas['planta'] = $planta;
    $puntos_planta = ['bajo' => 20, 'primero' => 15, 'segundo_o_mas' => 5, 'atico' => 12];
    $puntuacion_total += $puntos_planta[$planta] ?? 0;
    
    // Pregunta 4: Acceso principal
    $acceso = $_POST['acceso'] ?? '';
    $respuestas['acceso'] = $acceso;
    $puntos_acceso = ['calle_directa' => 15, 'portal_comunitario' => 8, 'edificio_seguridad' => 3];
    $puntuacion_total += $puntos_acceso[$acceso] ?? 0;
    
    // Pregunta 5: Ventanas accesibles
    $ventanas = intval($_POST['ventanas'] ?? 0);
    $respuestas['ventanas'] = $ventanas;
    $puntuacion_total += min($ventanas * 3, 20);
    
    // Pregunta 6: ¿Tiene alarma?
    $tiene_alarma = $_POST['tiene_alarma'] ?? 'no';
    $respuestas['tiene_alarma'] = $tiene_alarma;
    $puntuacion_total -= ($tiene_alarma === 'si') ? 25 : 0;
    
    // Pregunta 7: ¿Cámaras?
    $tiene_camaras = $_POST['tiene_camaras'] ?? 'no';
    $respuestas['tiene_camaras'] = $tiene_camaras;
    $puntuacion_total -= ($tiene_camaras === 'si') ? 15 : 0;
    
    // Pregunta 8: Iluminación exterior
    $iluminacion = $_POST['iluminacion'] ?? '';
    $respuestas['iluminacion'] = $iluminacion;
    $puntos_ilum = ['excelente' => -10, 'buena' => -5, 'regular' => 0, 'mala' => 10];
    $puntuacion_total += $puntos_ilum[$iluminacion] ?? 0;
    
    // Pregunta 9: Actividad en la zona
    $actividad = $_POST['actividad'] ?? '';
    $respuestas['actividad'] = $actividad;
    $puntos_act = ['muy_alta' => -5, 'alta' => 0, 'media' => 5, 'baja' => 12];
    $puntuacion_total += $puntos_act[$actividad] ?? 0;
    
    // Pregunta 10: Historial de robos
    $historial = $_POST['historial'] ?? 'no';
    $respuestas['historial'] = $historial;
    $puntuacion_total += ($historial === 'si') ? 25 : 0;
    
    // Pregunta 11: Tiempo solo
    $tiempo_solo = $_POST['tiempo_solo'] ?? '';
    $respuestas['tiempo_solo'] = $tiempo_solo;
    $puntos_tiempo = ['siempre_ocupado' => 0, 'dias_laborables' => 8, 'fines_semana' => 5, 'temporadas' => 20];
    $puntuacion_total += $puntos_tiempo[$tiempo_solo] ?? 0;
    
    // Pregunta 12: Vecinos
    $vecinos = $_POST['vecinos'] ?? '';
    $respuestas['vecinos'] = $vecinos;
    $puntos_vec = ['si_vigilantes' => -5, 'si_normales' => 0, 'pocos' => 5, 'ninguno' => 10];
    $puntuacion_total += $puntos_vec[$vecinos] ?? 0;
    
    // Pregunta 13: Valor del contenido
    $valor_contenido = $_POST['valor_contenido'] ?? '';
    $respuestas['valor_contenido'] = $valor_contenido;
    $puntos_valor = ['bajo' => 5, 'medio' => 10, 'alto' => 15, 'muy_alto' => 20];
    $puntuacion_total += $puntos_valor[$valor_contenido] ?? 0;
    
    // Pregunta 14: Cerraduras
    $cerraduras = $_POST['cerraduras'] ?? '';
    $respuestas['cerraduras'] = $cerraduras;
    $puntos_cerr = ['alta_seguridad' => -10, 'normales' => 0, 'basicas' => 10];
    $puntuacion_total += $puntos_cerr[$cerraduras] ?? 0;
    
    // Pregunta 15: Redes sociales
    $redes_sociales = $_POST['redes_sociales'] ?? '';
    $respuestas['redes_sociales'] = $redes_sociales;
    $puntos_redes = ['nunca' => 0, 'a_veces' => 5, 'frecuentemente' => 15];
    $puntuacion_total += $puntos_redes[$redes_sociales] ?? 0;
    
    // Normalizar puntuación (0-100)
    $puntuacion_total = max(0, min(100, $puntuacion_total));
    
    // Determinar nivel de riesgo
    $nivel_riesgo = 'bajo';
    if ($puntuacion_total >= 70) {
        $nivel_riesgo = 'muy_alto';
    } elseif ($puntuacion_total >= 50) {
        $nivel_riesgo = 'alto';
    } elseif ($puntuacion_total >= 30) {
        $nivel_riesgo = 'medio';
    }
    
    // Guardar en BD
    $resultado_data = [
        'user_id' => $user['id'],
        'puntuacion' => $puntuacion_total,
        'nivel_riesgo' => $nivel_riesgo,
        'respuestas' => json_encode($respuestas),
        'ip_address' => auth_get_user_ip()
    ];
    
    $save_result = supabase_query('calculadora_resultados', 'POST', $resultado_data);
    
    // Otorgar badge si es la primera vez
    if (!$tiene_resultado && $save_result['success']) {
        user_award_badge($user['id'], 'calculadora_completada');
    }
    
    // Redirigir a resultados
    header('Location: /user/calculadora-riesgo.php?resultado=' . $puntuacion_total);
    exit;
}

// Obtener resultado si viene del redirect
$mostrar_resultado = isset($_GET['resultado']);
$resultado_score = $mostrar_resultado ? intval($_GET['resultado']) : 0;

if ($mostrar_resultado) {
    $nivel_resultado = 'bajo';
    if ($resultado_score >= 70) {
        $nivel_resultado = 'muy_alto';
    } elseif ($resultado_score >= 50) {
        $nivel_resultado = 'alto';
    } elseif ($resultado_score >= 30) {
        $nivel_resultado = 'medio';
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<style>
.calc-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 20px;
}

.page-header {
    background: linear-gradient(135deg, #fd7e14 0%, #dc6502 100%);
    color: white;
    padding: 50px 40px;
    border-radius: 16px;
    margin-bottom: 40px;
    box-shadow: 0 4px 20px rgba(253, 126, 20, 0.2);
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

.formulario-card {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.pregunta-group {
    margin-bottom: 35px;
    padding-bottom: 30px;
    border-bottom: 1px solid #e0e0e0;
}

.pregunta-group:last-child {
    border-bottom: none;
}

.pregunta-numero {
    display: inline-block;
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #fd7e14 0%, #dc6502 100%);
    color: white;
    border-radius: 50%;
    text-align: center;
    line-height: 32px;
    font-weight: 700;
    margin-right: 12px;
}

.pregunta-titulo {
    font-size: 18px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.opciones-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.opcion-radio {
    position: relative;
}

.opcion-radio input[type="radio"] {
    position: absolute;
    opacity: 0;
}

.opcion-radio label {
    display: block;
    padding: 15px 20px;
    background: #f8f9fa;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
    font-weight: 500;
}

.opcion-radio input[type="radio"]:checked + label {
    background: #fff3e0;
    border-color: #fd7e14;
    color: #fd7e14;
    font-weight: 700;
}

.opcion-radio label:hover {
    border-color: #fd7e14;
}

.btn-calcular {
    width: 100%;
    padding: 18px;
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    margin-top: 20px;
}

.btn-calcular:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
}

.resultado-card {
    background: white;
    padding: 50px;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    text-align: center;
}

.resultado-score {
    font-size: 120px;
    font-weight: 900;
    margin-bottom: 20px;
    line-height: 1;
}

.resultado-score.bajo {
    color: #28a745;
}

.resultado-score.medio {
    color: #ffc107;
}

.resultado-score.alto {
    color: #fd7e14;
}

.resultado-score.muy_alto {
    color: #dc3545;
}

.nivel-badge {
    display: inline-block;
    padding: 12px 30px;
    border-radius: 30px;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 30px;
}

.nivel-badge.bajo {
    background: #d4edda;
    color: #155724;
}

.nivel-badge.medio {
    background: #fff3cd;
    color: #856404;
}

.nivel-badge.alto {
    background: #ffe8d1;
    color: #fd7e14;
}

.nivel-badge.muy_alto {
    background: #f8d7da;
    color: #721c24;
}

.recomendaciones {
    text-align: left;
    margin-top: 40px;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 12px;
}

.recomendaciones h3 {
    color: #1a1a1a;
    margin-bottom: 20px;
}

.recomendaciones ul {
    list-style: none;
    padding: 0;
}

.recomendaciones li {
    padding: 12px 0;
    padding-left: 30px;
    position: relative;
    color: #666;
    line-height: 1.6;
}

.recomendaciones li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #28a745;
    font-weight: 700;
    font-size: 18px;
}

.btn-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
    justify-content: center;
}

.btn-action {
    padding: 14px 28px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s;
}

.btn-primary {
    background: linear-gradient(135deg, #c8102e 0%, #a00d25 100%);
    color: white;
}

.btn-secondary {
    background: #6c757d;
    color: white;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    color: white;
}

@media (max-width: 768px) {
    .opciones-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="calc-container">
    <?php if ($mostrar_resultado): ?>
        <!-- Mostrar Resultado -->
        <div class="page-header">
            <h1>📊 Tu Resultado</h1>
            <p>Análisis completo de tu nivel de riesgo</p>
        </div>
        
        <div class="resultado-card">
            <div class="resultado-score <?php echo $nivel_resultado; ?>">
                <?php echo $resultado_score; ?>
            </div>
            
            <div class="nivel-badge <?php echo $nivel_resultado; ?>">
                <?php
                $textos_nivel = [
                    'bajo' => '🟢 Riesgo BAJO',
                    'medio' => '🟡 Riesgo MEDIO',
                    'alto' => '🟠 Riesgo ALTO',
                    'muy_alto' => '🔴 Riesgo MUY ALTO'
                ];
                echo $textos_nivel[$nivel_resultado];
                ?>
            </div>
            
            <p style="font-size: 18px; color: #666; max-width: 600px; margin: 0 auto 30px;">
                <?php
                $descripciones = [
                    'bajo' => 'Tu propiedad tiene un nivel de riesgo bajo. Mantén las medidas actuales.',
                    'medio' => 'Tu propiedad tiene riesgo moderado. Considera mejorar la seguridad.',
                    'alto' => 'Tu propiedad está en riesgo alto. Recomendamos instalar un sistema de alarma.',
                    'muy_alto' => 'Tu propiedad tiene riesgo muy alto. Es urgente mejorar la seguridad.'
                ];
                echo $descripciones[$nivel_resultado];
                ?>
            </p>
            
            <div class="recomendaciones">
                <h3>💡 Recomendaciones Personalizadas</h3>
                <ul>
                    <?php
                    $recomendaciones = [
                        'bajo' => [
                            'Mantén las puertas y ventanas cerradas cuando salgas',
                            'Actualiza tus cerraduras cada 2-3 años',
                            'Considera añadir iluminación por movimiento',
                            'Revisa periódicamente tu sistema de seguridad actual'
                        ],
                        'medio' => [
                            'Instala cerraduras de alta seguridad en puertas principales',
                            'Añade iluminación exterior con sensor de movimiento',
                            'Considera un sistema de alarma básico',
                            'Evita publicar vacaciones en redes sociales',
                            'Instala rejas o protecciones en ventanas accesibles'
                        ],
                        'alto' => [
                            'Instala un sistema de alarma monitoreado 24/7',
                            'Añade cámaras de seguridad en puntos clave',
                            'Refuerza puertas con cerraduras antibumping',
                            'Protege todas las ventanas de planta baja',
                            'Contrata vigilancia o conserjería si es viable',
                            'No compartas información de ausencias en redes'
                        ],
                        'muy_alto' => [
                            'URGENTE: Instala sistema de alarma con conexión a CRA',
                            'Videovigilancia completa con grabación remota',
                            'Cerraduras antibumping en todas las puertas',
                            'Rejas de seguridad en ventanas vulnerables',
                            'Iluminación perimetral completa',
                            'Considera contratar seguridad física',
                            'Evita patrones predecibles de entrada/salida',
                            'Caja fuerte para objetos de valor'
                        ]
                    ];
                    
                    foreach ($recomendaciones[$nivel_resultado] as $rec) {
                        echo "<li>$rec</li>";
                    }
                    ?>
                </ul>
            </div>
            
            <div class="btn-actions">
                <a href="/pedido.php" class="btn-action btn-primary">
                    <i class="fas fa-shield-alt"></i> Solicitar Presupuesto
                </a>
                <a href="/user/dashboard.php" class="btn-action btn-secondary">
                    <i class="fas fa-home"></i> Volver al Dashboard
                </a>
            </div>
            
            <?php if (!$tiene_resultado): ?>
                <div style="margin-top: 30px; padding: 20px; background: #d4edda; border-radius: 8px; color: #155724;">
                    <strong>🎉 ¡Badge Desbloqueado!</strong><br>
                    "Calculadora Completada" (+50 puntos)
                </div>
            <?php endif; ?>
        </div>
        
    <?php else: ?>
        <!-- Formulario de Calculadora -->
        <div class="page-header">
            <h1>🧮 Calculadora de Riesgo</h1>
            <p>Evalúa el nivel de seguridad de tu propiedad en 2 minutos</p>
        </div>
        
        <?php if ($tiene_resultado): ?>
            <div style="background: #d1ecf1; padding: 20px; border-radius: 8px; margin-bottom: 30px; color: #0c5460;">
                <strong>ℹ️ Ya completaste la calculadora anteriormente</strong><br>
                Puntuación: <strong><?php echo $resultado_anterior['puntuacion']; ?></strong> - 
                Riesgo: <strong><?php echo strtoupper($resultado_anterior['nivel_riesgo']); ?></strong><br>
                <small>Puedes volver a hacerla para actualizar tu evaluación</small>
            </div>
        <?php endif; ?>
        
        <div class="formulario-card">
            <form method="POST">
                <!-- Pregunta 1 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">1</span>
                        <span>¿Qué tipo de propiedad es?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="tipo_propiedad" value="vivienda" id="tipo_1" required>
                            <label for="tipo_1">🏠 Vivienda</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="tipo_propiedad" value="negocio" id="tipo_2">
                            <label for="tipo_2">🏪 Negocio</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="tipo_propiedad" value="nave_industrial" id="tipo_3">
                            <label for="tipo_3">🏭 Nave Industrial</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="tipo_propiedad" value="oficina" id="tipo_4">
                            <label for="tipo_4">🏢 Oficina</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 2 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">2</span>
                        <span>¿Dónde está ubicada?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="ubicacion" value="centro_ciudad" id="ubi_1" required>
                            <label for="ubi_1">🏙️ Centro Ciudad</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="ubicacion" value="residencial" id="ubi_2">
                            <label for="ubi_2">🏘️ Zona Residencial</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="ubicacion" value="rural" id="ubi_3">
                            <label for="ubi_3">🌳 Zona Rural</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="ubicacion" value="industrial" id="ubi_4">
                            <label for="ubi_4">🏭 Polígono Industrial</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 3 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">3</span>
                        <span>¿En qué planta está?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="planta" value="bajo" id="planta_1" required>
                            <label for="planta_1">Planta Baja</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="planta" value="primero" id="planta_2">
                            <label for="planta_2">1º Piso</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="planta" value="segundo_o_mas" id="planta_3">
                            <label for="planta_3">2º Piso o más</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="planta" value="atico" id="planta_4">
                            <label for="planta_4">Ático</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 4 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">4</span>
                        <span>¿Cómo es el acceso principal?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="acceso" value="calle_directa" id="acceso_1" required>
                            <label for="acceso_1">🚪 Calle Directa</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="acceso" value="portal_comunitario" id="acceso_2">
                            <label for="acceso_2">🏢 Portal Comunitario</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="acceso" value="edificio_seguridad" id="acceso_3">
                            <label for="acceso_3">🔐 Con Control Acceso</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 5 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">5</span>
                        <span>¿Cuántas ventanas son fácilmente accesibles desde el exterior?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="ventanas" value="0" id="vent_1" required>
                            <label for="vent_1">Ninguna</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="ventanas" value="1" id="vent_2">
                            <label for="vent_2">1-2</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="ventanas" value="3" id="vent_3">
                            <label for="vent_3">3-4</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="ventanas" value="5" id="vent_4">
                            <label for="vent_4">5 o más</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 6 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">6</span>
                        <span>¿Tienes sistema de alarma instalado?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="tiene_alarma" value="si" id="alarma_1" required>
                            <label for="alarma_1">✅ Sí</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="tiene_alarma" value="no" id="alarma_2">
                            <label for="alarma_2">❌ No</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 7 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">7</span>
                        <span>¿Tienes cámaras de seguridad?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="tiene_camaras" value="si" id="cam_1" required>
                            <label for="cam_1">✅ Sí</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="tiene_camaras" value="no" id="cam_2">
                            <label for="cam_2">❌ No</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 8 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">8</span>
                        <span>¿Cómo es la iluminación exterior?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="iluminacion" value="excelente" id="ilum_1" required>
                            <label for="ilum_1">💡 Excelente</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="iluminacion" value="buena" id="ilum_2">
                            <label for="ilum_2">🔆 Buena</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="iluminacion" value="regular" id="ilum_3">
                            <label for="ilum_3">🌙 Regular</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="iluminacion" value="mala" id="ilum_4">
                            <label for="ilum_4">🌑 Mala</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 9 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">9</span>
                        <span>¿Cuánta actividad (tránsito de personas) hay en la zona?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="actividad" value="muy_alta" id="act_1" required>
                            <label for="act_1">Muy Alta</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="actividad" value="alta" id="act_2">
                            <label for="act_2">Alta</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="actividad" value="media" id="act_3">
                            <label for="act_3">Media</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="actividad" value="baja" id="act_4">
                            <label for="act_4">Baja</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 10 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">10</span>
                        <span>¿Ha habido robos en tu zona recientemente?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="historial" value="si" id="hist_1" required>
                            <label for="hist_1">Sí</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="historial" value="no" id="hist_2">
                            <label for="hist_2">No</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 11 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">11</span>
                        <span>¿Cuánto tiempo está la propiedad desocupada?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="tiempo_solo" value="siempre_ocupado" id="tiempo_1" required>
                            <label for="tiempo_1">Siempre ocupado</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="tiempo_solo" value="dias_laborables" id="tiempo_2">
                            <label for="tiempo_2">Días laborables</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="tiempo_solo" value="fines_semana" id="tiempo_3">
                            <label for="tiempo_3">Fines de semana</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="tiempo_solo" value="temporadas" id="tiempo_4">
                            <label for="tiempo_4">Temporadas completas</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 12 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">12</span>
                        <span>¿Tienes vecinos que puedan vigilar?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="vecinos" value="si_vigilantes" id="vec_1" required>
                            <label for="vec_1">Sí, muy atentos</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="vecinos" value="si_normales" id="vec_2">
                            <label for="vec_2">Sí, normales</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="vecinos" value="pocos" id="vec_3">
                            <label for="vec_3">Pocos vecinos</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="vecinos" value="ninguno" id="vec_4">
                            <label for="vec_4">No hay vecinos</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 13 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">13</span>
                        <span>¿Qué valor tienen tus pertenencias?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="valor_contenido" value="bajo" id="val_1" required>
                            <label for="val_1">Bajo (&lt;5K€)</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="valor_contenido" value="medio" id="val_2">
                            <label for="val_2">Medio (5-15K€)</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="valor_contenido" value="alto" id="val_3">
                            <label for="val_3">Alto (15-50K€)</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="valor_contenido" value="muy_alto" id="val_4">
                            <label for="val_4">Muy Alto (&gt;50K€)</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 14 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">14</span>
                        <span>¿Qué tipo de cerraduras tienes?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="cerraduras" value="alta_seguridad" id="cerr_1" required>
                            <label for="cerr_1">🔐 Alta Seguridad</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="cerraduras" value="normales" id="cerr_2">
                            <label for="cerr_2">🔓 Normales</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="cerraduras" value="basicas" id="cerr_3">
                            <label for="cerr_3">🗝️ Básicas/Antiguas</label>
                        </div>
                    </div>
                </div>
                
                <!-- Pregunta 15 -->
                <div class="pregunta-group">
                    <div class="pregunta-titulo">
                        <span class="pregunta-numero">15</span>
                        <span>¿Publicas en redes sociales cuando estás de vacaciones?</span>
                    </div>
                    <div class="opciones-grid">
                        <div class="opcion-radio">
                            <input type="radio" name="redes_sociales" value="nunca" id="redes_1" required>
                            <label for="redes_1">❌ Nunca</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="redes_sociales" value="a_veces" id="redes_2">
                            <label for="redes_2">🤔 A veces</label>
                        </div>
                        <div class="opcion-radio">
                            <input type="radio" name="redes_sociales" value="frecuentemente" id="redes_3">
                            <label for="redes_3">📱 Frecuentemente</label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" name="calcular" class="btn-calcular">
                    <i class="fas fa-calculator"></i> Calcular Mi Riesgo
                </button>
            </form>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
