<?php
/**
 * Praxis Seguridad - Cuestionario Interactivo
 * Wizard multi-paso para valoración de presupuesto
 */
?>

<!-- Cuestionario Modal Overlay -->
<div id="questionnaire-modal" class="fixed inset-0 z-[100] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-praxis-black/95 backdrop-blur-sm" onclick="closeQuestionnaire()"></div>
    
    <!-- Modal Content -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="bg-praxis-gray w-full max-w-2xl rounded-2xl shadow-2xl border border-praxis-gold/20 overflow-hidden max-h-[90vh] overflow-y-auto">
            
            <!-- Header -->
            <div class="bg-praxis-black p-6 border-b border-praxis-gold/30">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-heading font-bold text-xl text-praxis-white">
                            Valoración de <span class="gradient-text">Seguridad</span>
                        </h3>
                        <p class="text-praxis-gray-light text-sm mt-1">Responde unas preguntas y te hacemos un presupuesto personalizado</p>
                    </div>
                    <button onclick="closeQuestionnaire()" class="w-10 h-10 rounded-lg bg-praxis-gray/50 flex items-center justify-center text-praxis-gray-light hover:text-praxis-white hover:bg-praxis-gray transition-all">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Progress Bar -->
                <div class="mt-4">
                    <div class="flex justify-between text-xs text-praxis-gray-light mb-2">
                        <span>Paso <span id="current-step">1</span> de <span id="total-steps">5</span></span>
                        <span id="progress-percent">20%</span>
                    </div>
                    <div class="h-2 bg-praxis-black rounded-full overflow-hidden">
                        <div id="progress-bar" class="h-full bg-gradient-to-r from-praxis-gold to-praxis-gold-light transition-all duration-500" style="width: 20%"></div>
                    </div>
                </div>
            </div>
            
            <!-- Form Steps -->
            <form id="questionnaire-form" class="p-6">
                
                <!-- STEP 1: Tipo de instalación -->
                <div class="questionnaire-step" data-step="1">
                    <h4 class="font-heading font-bold text-lg text-praxis-white mb-6">
                        <i class="fas fa-building text-praxis-gold mr-2"></i>
                        ¿Qué tipo de instalación necesitas proteger?
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <label class="option-card cursor-pointer">
                            <input type="radio" name="tipo_instalacion" value="vivienda" class="hidden" required>
                            <div class="p-6 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                <i class="fas fa-home text-3xl text-praxis-gold mb-3"></i>
                                <p class="font-heading font-semibold text-praxis-white">Vivienda</p>
                                <p class="text-praxis-gray-light text-xs mt-1">Casa, piso o chalet</p>
                            </div>
                        </label>
                        
                        <label class="option-card cursor-pointer">
                            <input type="radio" name="tipo_instalacion" value="oficina" class="hidden">
                            <div class="p-6 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                <i class="fas fa-briefcase text-3xl text-praxis-gold mb-3"></i>
                                <p class="font-heading font-semibold text-praxis-white">Oficina</p>
                                <p class="text-praxis-gray-light text-xs mt-1">Despacho o local de oficinas</p>
                            </div>
                        </label>
                        
                        <label class="option-card cursor-pointer">
                            <input type="radio" name="tipo_instalacion" value="comercio" class="hidden">
                            <div class="p-6 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                <i class="fas fa-store text-3xl text-praxis-gold mb-3"></i>
                                <p class="font-heading font-semibold text-praxis-white">Comercio</p>
                                <p class="text-praxis-gray-light text-xs mt-1">Tienda, bar o restaurante</p>
                            </div>
                        </label>
                        
                        <label class="option-card cursor-pointer">
                            <input type="radio" name="tipo_instalacion" value="nave" class="hidden">
                            <div class="p-6 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                <i class="fas fa-warehouse text-3xl text-praxis-gold mb-3"></i>
                                <p class="font-heading font-semibold text-praxis-white">Nave / Industria</p>
                                <p class="text-praxis-gray-light text-xs mt-1">Almacén o fábrica</p>
                            </div>
                        </label>
                    </div>
                </div>
                
                
                <!-- STEP 2: Detalles de vivienda (condicional) -->
                <div class="questionnaire-step hidden" data-step="2" data-condition="vivienda">
                    <h4 class="font-heading font-bold text-lg text-praxis-white mb-6">
                        <i class="fas fa-house-chimney text-praxis-gold mr-2"></i>
                        Cuéntanos más sobre tu vivienda
                    </h4>
                    
                    <div class="space-y-6">
                        <!-- Tipo vivienda -->
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-3">¿Qué tipo de vivienda es?</label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="tipo_vivienda" value="piso" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <i class="fas fa-building text-xl text-praxis-gold mb-2"></i>
                                        <p class="text-praxis-white text-sm">Piso</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="tipo_vivienda" value="casa" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <i class="fas fa-house text-xl text-praxis-gold mb-2"></i>
                                        <p class="text-praxis-white text-sm">Casa / Chalet</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="tipo_vivienda" value="adosado" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <i class="fas fa-house-chimney-window text-xl text-praxis-gold mb-2"></i>
                                        <p class="text-praxis-white text-sm">Adosado</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Planta -->
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-3">¿En qué planta está?</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="planta" value="bajo" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white text-sm">Bajo</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="planta" value="intermedio" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white text-sm">Intermedio</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="planta" value="atico" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white text-sm">Ático</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="planta" value="unifamiliar" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white text-sm">Unifamiliar</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Características -->
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-3">¿Tiene alguna de estas características?</label>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                                    <input type="checkbox" name="caracteristicas[]" value="terraza" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                                    <span class="text-praxis-white"><i class="fas fa-umbrella-beach text-praxis-gold mr-2"></i>Terraza</span>
                                </label>
                                <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                                    <input type="checkbox" name="caracteristicas[]" value="garaje" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                                    <span class="text-praxis-white"><i class="fas fa-car text-praxis-gold mr-2"></i>Garaje</span>
                                </label>
                                <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                                    <input type="checkbox" name="caracteristicas[]" value="jardin" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                                    <span class="text-praxis-white"><i class="fas fa-tree text-praxis-gold mr-2"></i>Jardín</span>
                                </label>
                                <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                                    <input type="checkbox" name="caracteristicas[]" value="piscina" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                                    <span class="text-praxis-white"><i class="fas fa-water text-praxis-gold mr-2"></i>Piscina</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- STEP 2B: Detalles de negocio (condicional) -->
                <div class="questionnaire-step hidden" data-step="2" data-condition="oficina,comercio,nave">
                    <h4 class="font-heading font-bold text-lg text-praxis-white mb-6">
                        <i class="fas fa-building-user text-praxis-gold mr-2"></i>
                        Cuéntanos más sobre tu negocio
                    </h4>
                    
                    <div class="space-y-6">
                        <!-- Metros cuadrados -->
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-3">¿Cuántos metros cuadrados aproximados tiene?</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="metros" value="menos-50" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white text-sm">&lt; 50 m²</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="metros" value="50-150" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white text-sm">50-150 m²</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="metros" value="150-500" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white text-sm">150-500 m²</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="metros" value="mas-500" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white text-sm">&gt; 500 m²</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Accesos -->
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-3">¿Cuántos accesos tiene el local?</label>
                            <div class="grid grid-cols-4 gap-3">
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="accesos" value="1" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white">1</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="accesos" value="2" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white">2</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="accesos" value="3" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white">3</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="accesos" value="mas" class="hidden">
                                    <div class="p-3 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-white">+3</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Sistema actual -->
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-3">¿Tiene actualmente algún sistema de seguridad?</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="sistema_actual" value="si" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <i class="fas fa-check text-green-500 text-xl mb-2"></i>
                                        <p class="text-praxis-white">Sí, tengo uno</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="sistema_actual" value="no" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <i class="fas fa-times text-red-500 text-xl mb-2"></i>
                                        <p class="text-praxis-white">No, es nuevo</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- STEP 3: Servicios de interés -->
                <div class="questionnaire-step hidden" data-step="3">
                    <h4 class="font-heading font-bold text-lg text-praxis-white mb-6">
                        <i class="fas fa-shield-halved text-praxis-gold mr-2"></i>
                        ¿Qué servicios te interesan?
                    </h4>
                    
                    <p class="text-praxis-gray-light text-sm mb-4">Selecciona todos los que apliquen</p>
                    
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                            <input type="checkbox" name="servicios[]" value="alarma" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                            <div>
                                <span class="text-praxis-white font-medium"><i class="fas fa-bell text-praxis-gold mr-2"></i>Sistema de alarma</span>
                                <p class="text-praxis-gray-light text-xs">Detección de intrusión con aviso</p>
                            </div>
                        </label>
                        <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                            <input type="checkbox" name="servicios[]" value="camaras" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                            <div>
                                <span class="text-praxis-white font-medium"><i class="fas fa-video text-praxis-gold mr-2"></i>Cámaras de videovigilancia (CCTV)</span>
                                <p class="text-praxis-gray-light text-xs">Grabación y monitorización visual</p>
                            </div>
                        </label>
                        <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                            <input type="checkbox" name="servicios[]" value="control_accesos" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                            <div>
                                <span class="text-praxis-white font-medium"><i class="fas fa-door-open text-praxis-gold mr-2"></i>Control de accesos</span>
                                <p class="text-praxis-gray-light text-xs">Tarjetas, códigos o biométrico</p>
                            </div>
                        </label>
                        <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                            <input type="checkbox" name="servicios[]" value="vigilancia" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                            <div>
                                <span class="text-praxis-white font-medium"><i class="fas fa-user-shield text-praxis-gold mr-2"></i>Servicio de vigilancia</span>
                                <p class="text-praxis-gray-light text-xs">Personal de seguridad o rondas</p>
                            </div>
                        </label>
                        <label class="flex items-center gap-3 p-4 bg-praxis-black rounded-xl border border-praxis-gray/50 cursor-pointer hover:border-praxis-gold/50 transition-all">
                            <input type="checkbox" name="servicios[]" value="consultoria" class="w-5 h-5 rounded border-praxis-gray bg-praxis-gray text-praxis-gold focus:ring-praxis-gold">
                            <div>
                                <span class="text-praxis-white font-medium"><i class="fas fa-chess-queen text-praxis-gold mr-2"></i>Consultoría y auditoría</span>
                                <p class="text-praxis-gray-light text-xs">Análisis y recomendaciones</p>
                            </div>
                        </label>
                    </div>
                </div>
                
                
                <!-- STEP 4: Urgencia y presupuesto -->
                <div class="questionnaire-step hidden" data-step="4">
                    <h4 class="font-heading font-bold text-lg text-praxis-white mb-6">
                        <i class="fas fa-clock text-praxis-gold mr-2"></i>
                        ¿Cuándo lo necesitas?
                    </h4>
                    
                    <div class="space-y-6">
                        <!-- Urgencia -->
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-3">Plazo estimado de instalación</label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="urgencia" value="urgente" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <i class="fas fa-bolt text-red-500 text-xl mb-2"></i>
                                        <p class="text-praxis-white text-sm">Urgente</p>
                                        <p class="text-praxis-gray-light text-xs">Esta semana</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="urgencia" value="pronto" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <i class="fas fa-calendar-check text-praxis-gold text-xl mb-2"></i>
                                        <p class="text-praxis-white text-sm">Pronto</p>
                                        <p class="text-praxis-gray-light text-xs">Este mes</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="urgencia" value="planificando" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <i class="fas fa-clipboard-list text-blue-500 text-xl mb-2"></i>
                                        <p class="text-praxis-white text-sm">Planificando</p>
                                        <p class="text-praxis-gray-light text-xs">Sin prisa</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Presupuesto -->
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-3">¿Tienes un presupuesto orientativo?</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="presupuesto" value="basico" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-gold font-bold">Hasta 500€</p>
                                        <p class="text-praxis-gray-light text-xs">Básico</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="presupuesto" value="medio" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-gold font-bold">500€ - 1.500€</p>
                                        <p class="text-praxis-gray-light text-xs">Estándar</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="presupuesto" value="alto" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-gold font-bold">1.500€ - 5.000€</p>
                                        <p class="text-praxis-gray-light text-xs">Avanzado</p>
                                    </div>
                                </label>
                                <label class="option-card cursor-pointer">
                                    <input type="radio" name="presupuesto" value="premium" class="hidden">
                                    <div class="p-4 bg-praxis-black rounded-xl border-2 border-praxis-gray/50 hover:border-praxis-gold/50 transition-all text-center">
                                        <p class="text-praxis-gold font-bold">+5.000€</p>
                                        <p class="text-praxis-gray-light text-xs">Premium</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- STEP 5: Datos de contacto -->
                <div class="questionnaire-step hidden" data-step="5">
                    <h4 class="font-heading font-bold text-lg text-praxis-white mb-6">
                        <i class="fas fa-user text-praxis-gold mr-2"></i>
                        ¿Cómo podemos contactarte?
                    </h4>
                    
                    <p class="text-praxis-gray-light text-sm mb-6">Te enviaremos un presupuesto personalizado sin compromiso</p>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-2">Nombre completo <span class="text-praxis-gold">*</span></label>
                            <input type="text" name="nombre" required
                                   class="w-full px-4 py-3 bg-praxis-black border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors"
                                   placeholder="Tu nombre y apellidos">
                        </div>
                        
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-2">Teléfono <span class="text-praxis-gold">*</span></label>
                            <input type="tel" name="telefono" required
                                   class="w-full px-4 py-3 bg-praxis-black border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors"
                                   placeholder="+34 600 000 000">
                        </div>
                        
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-2">Email <span class="text-praxis-gold">*</span></label>
                            <input type="email" name="email" required
                                   class="w-full px-4 py-3 bg-praxis-black border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors"
                                   placeholder="tu@email.com">
                        </div>
                        
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-2">Localidad</label>
                            <input type="text" name="localidad"
                                   class="w-full px-4 py-3 bg-praxis-black border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors"
                                   placeholder="Ej: Murcia, Santomera...">
                        </div>
                        
                        <div>
                            <label class="block text-praxis-white text-sm font-medium mb-2">Comentarios adicionales</label>
                            <textarea name="comentarios" rows="3"
                                      class="w-full px-4 py-3 bg-praxis-black border border-praxis-gray/50 rounded-lg text-praxis-white placeholder-praxis-gray-medium focus:border-praxis-gold focus:ring-1 focus:ring-praxis-gold transition-colors resize-none"
                                      placeholder="Cualquier detalle que quieras añadir..."></textarea>
                        </div>
                        
                        <div class="flex items-start gap-3 pt-2">
                            <input type="checkbox" name="privacidad" required
                                   class="mt-1 w-5 h-5 rounded border-praxis-gray bg-praxis-black text-praxis-gold focus:ring-praxis-gold">
                            <label class="text-praxis-gray-light text-sm">
                                He leído y acepto la <a href="#" class="text-praxis-gold hover:underline">política de privacidad</a>
                            </label>
                        </div>
                    </div>
                </div>
                
                
                <!-- SUCCESS MESSAGE -->
                <div class="questionnaire-step hidden" data-step="success">
                    <div class="text-center py-8">
                        <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-check text-green-500 text-4xl"></i>
                        </div>
                        <h4 class="font-heading font-bold text-2xl text-praxis-white mb-4">
                            ¡Gracias por tu interés!
                        </h4>
                        <p class="text-praxis-gray-light mb-6">
                            Hemos recibido tu solicitud. <br>
                            <strong class="text-praxis-white">Te contactaremos en menos de 24 horas</strong> con un presupuesto personalizado.
                        </p>
                        <button type="button" onclick="closeQuestionnaire()" class="btn-gold px-8 py-4 rounded-lg text-praxis-black font-heading font-semibold uppercase tracking-wider">
                            Cerrar
                        </button>
                    </div>
                </div>
                
                
                <!-- Navigation Buttons -->
                <div id="questionnaire-navigation" class="flex justify-between mt-8 pt-6 border-t border-praxis-gray/50">
                    <button type="button" id="btn-prev" onclick="prevStep()" class="px-6 py-3 rounded-lg border border-praxis-gray/50 text-praxis-gray-light font-medium hover:border-praxis-gold hover:text-praxis-gold transition-all hidden">
                        <i class="fas fa-arrow-left mr-2"></i>Anterior
                    </button>
                    <button type="button" id="btn-next" onclick="nextStep()" class="btn-gold px-8 py-3 rounded-lg text-praxis-black font-heading font-semibold ml-auto">
                        Siguiente<i class="fas fa-arrow-right ml-2"></i>
                    </button>
                    <button type="submit" id="btn-submit" class="btn-gold px-8 py-3 rounded-lg text-praxis-black font-heading font-semibold ml-auto hidden">
                        <i class="fas fa-paper-plane mr-2"></i>Enviar solicitud
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>

<!-- Trigger Button (Floating) -->
<button id="questionnaire-trigger" onclick="openQuestionnaire()" class="fixed bottom-44 right-8 z-50 btn-gold px-6 py-4 rounded-full shadow-lg flex items-center gap-3 animate-pulse hover:animate-none">
    <i class="fas fa-clipboard-question text-xl"></i>
    <span class="font-heading font-semibold hidden sm:inline">¿Necesitas presupuesto?</span>
</button>

<style>
/* Option card selected state */
.option-card input:checked + div {
    border-color: #C9A24D;
    background: rgba(201, 162, 77, 0.1);
}

/* Animation for modal */
#questionnaire-modal.active {
    display: flex;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Questionnaire trigger pulse */
#questionnaire-trigger {
    animation: pulse-gold 2s infinite;
}

@keyframes pulse-gold {
    0%, 100% { box-shadow: 0 0 0 0 rgba(201, 162, 77, 0.4); }
    50% { box-shadow: 0 0 0 15px rgba(201, 162, 77, 0); }
}
</style>

<script>
let currentStep = 1;
let totalSteps = 5;
let tipoInstalacion = '';

function openQuestionnaire() {
    const modal = document.getElementById('questionnaire-modal');
    modal.classList.remove('hidden');
    modal.classList.add('active');
    document.body.classList.add('overflow-hidden');
    
    // Show after delay for first-time visitors
    localStorage.setItem('questionnaire_shown', 'true');
}

function closeQuestionnaire() {
    const modal = document.getElementById('questionnaire-modal');
    modal.classList.add('hidden');
    modal.classList.remove('active');
    document.body.classList.remove('overflow-hidden');
}

function updateProgress() {
    const progressBar = document.getElementById('progress-bar');
    const currentStepEl = document.getElementById('current-step');
    const progressPercent = document.getElementById('progress-percent');
    
    const percent = (currentStep / totalSteps) * 100;
    progressBar.style.width = percent + '%';
    currentStepEl.textContent = currentStep;
    progressPercent.textContent = Math.round(percent) + '%';
}

function showStep(step) {
    // Hide all steps
    document.querySelectorAll('.questionnaire-step').forEach(el => {
        el.classList.add('hidden');
    });
    
    // Handle conditional step 2
    if (step === 2) {
        tipoInstalacion = document.querySelector('input[name="tipo_instalacion"]:checked')?.value || '';
        
        document.querySelectorAll('.questionnaire-step[data-step="2"]').forEach(el => {
            const condition = el.dataset.condition;
            if (condition && condition.includes(tipoInstalacion)) {
                el.classList.remove('hidden');
            }
        });
    } else if (step === 'success') {
        document.querySelector('.questionnaire-step[data-step="success"]').classList.remove('hidden');
        document.getElementById('questionnaire-navigation').classList.add('hidden');
    } else {
        // Show the step
        const stepEl = document.querySelector(`.questionnaire-step[data-step="${step}"]:not([data-condition])`);
        if (stepEl) stepEl.classList.remove('hidden');
    }
    
    // Update navigation buttons
    const btnPrev = document.getElementById('btn-prev');
    const btnNext = document.getElementById('btn-next');
    const btnSubmit = document.getElementById('btn-submit');
    
    if (step === 1) {
        btnPrev.classList.add('hidden');
    } else {
        btnPrev.classList.remove('hidden');
    }
    
    if (step === totalSteps) {
        btnNext.classList.add('hidden');
        btnSubmit.classList.remove('hidden');
    } else {
        btnNext.classList.remove('hidden');
        btnSubmit.classList.add('hidden');
    }
    
    currentStep = step;
    updateProgress();
}

function nextStep() {
    // Validate current step
    const currentStepEl = document.querySelector(`.questionnaire-step[data-step="${currentStep}"]:not(.hidden)`);
    const requiredInputs = currentStepEl.querySelectorAll('input[required], select[required]');
    
    let isValid = true;
    requiredInputs.forEach(input => {
        if (input.type === 'radio') {
            const name = input.name;
            if (!document.querySelector(`input[name="${name}"]:checked`)) {
                isValid = false;
            }
        } else if (!input.value) {
            isValid = false;
        }
    });
    
    if (currentStep === 1) {
        const checked = document.querySelector('input[name="tipo_instalacion"]:checked');
        if (!checked) {
            alert('Por favor, selecciona un tipo de instalación');
            return;
        }
    }
    
    if (currentStep < totalSteps) {
        showStep(currentStep + 1);
    }
}

function prevStep() {
    if (currentStep > 1) {
        showStep(currentStep - 1);
    }
}

// Form submission
document.getElementById('questionnaire-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Collect all form data
    const formData = new FormData(this);
    const data = {};
    
    for (let [key, value] of formData.entries()) {
        if (key.endsWith('[]')) {
            const cleanKey = key.replace('[]', '');
            if (!data[cleanKey]) data[cleanKey] = [];
            data[cleanKey].push(value);
        } else {
            data[key] = value;
        }
    }
    
    console.log('Questionnaire Data:', data);
    
    // Here you would typically send this data to your server
    // For now, we'll just show success
    
    // You can send via fetch:
    /*
    fetch('procesar_cuestionario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        showStep('success');
    });
    */
    
    // Show success for demo
    showStep('success');
});

// Auto-show questionnaire after 10 seconds for first-time visitors
document.addEventListener('DOMContentLoaded', function() {
    const shown = localStorage.getItem('questionnaire_shown');
    if (!shown) {
        setTimeout(() => {
            openQuestionnaire();
        }, 10000);
    }
});

// Close on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeQuestionnaire();
    }
});
</script>
