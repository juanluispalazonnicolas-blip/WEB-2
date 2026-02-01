<!-- Chatbot Widget Praxis Seguridad -->
<div id="praxis-chatbot" class="fixed bottom-28 right-8 z-50">
    
    <!-- Chat Button -->
    <button id="chatbot-toggle" class="w-16 h-16 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-full shadow-xl flex items-center justify-center text-praxis-black hover:scale-110 transition-all group">
        <i class="fas fa-comments text-2xl group-hover:scale-110 transition-transform" id="chat-icon"></i>
        <i class="fas fa-times text-2xl hidden" id="close-icon"></i>
        <!-- Notification dot -->
        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full animate-pulse" id="chat-notification"></span>
    </button>
    
    <!-- Chat Window -->
    <div id="chatbot-window" class="hidden absolute bottom-20 right-0 w-80 sm:w-96 bg-praxis-gray rounded-2xl shadow-2xl border border-praxis-gold/20 overflow-hidden transform transition-all duration-300 origin-bottom-right scale-95 opacity-0">
        
        <!-- Header -->
        <div class="bg-praxis-black p-4 border-b border-praxis-gold/30">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-halved text-praxis-black"></i>
                    </div>
                    <div>
                        <h4 class="font-heading font-bold text-praxis-white text-sm">Praxis Seguridad</h4>
                        <p class="text-praxis-gray-light text-xs flex items-center gap-1">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            Asistente Virtual
                        </p>
                    </div>
                </div>
                <button onclick="toggleChatbot()" class="text-praxis-gray-light hover:text-praxis-white transition-colors">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        
        <!-- Messages Container -->
        <div id="chat-messages" class="h-80 overflow-y-auto p-4 space-y-4 bg-praxis-black/50">
            <!-- Welcome Message -->
            <div class="chat-message bot">
                <div class="flex items-start gap-2">
                    <div class="w-8 h-8 bg-praxis-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-robot text-praxis-gold text-sm"></i>
                    </div>
                    <div class="bg-praxis-gray rounded-xl rounded-tl-none p-3 max-w-[80%]">
                        <p class="text-praxis-white text-sm">¡Hola! 👋 Soy el asistente virtual de <strong class="text-praxis-gold">Praxis Seguridad</strong>.</p>
                        <p class="text-praxis-gray-light text-sm mt-2">¿En qué puedo ayudarte? Puedo informarte sobre:</p>
                        <ul class="text-praxis-gray-light text-xs mt-2 space-y-1">
                            <li>🔒 Nuestros servicios</li>
                            <li>💰 Precios y presupuestos</li>
                            <li>📞 Cómo contactarnos</li>
                            <li>🕐 Horarios de atención</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="p-2 bg-praxis-black/30 border-t border-praxis-gray/30">
            <div class="flex gap-2 overflow-x-auto pb-2">
                <button onclick="sendQuickMessage('¿Qué servicios ofrecéis?')" class="flex-shrink-0 px-3 py-1 bg-praxis-gray/50 rounded-full text-xs text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all">
                    Servicios
                </button>
                <button onclick="sendQuickMessage('¿Cuánto cuesta?')" class="flex-shrink-0 px-3 py-1 bg-praxis-gray/50 rounded-full text-xs text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all">
                    Precios
                </button>
                <button onclick="sendQuickMessage('¿Cómo os contacto?')" class="flex-shrink-0 px-3 py-1 bg-praxis-gray/50 rounded-full text-xs text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all">
                    Contacto
                </button>
                <button onclick="sendQuickMessage('¿Cuál es vuestro horario?')" class="flex-shrink-0 px-3 py-1 bg-praxis-gray/50 rounded-full text-xs text-praxis-gray-light hover:bg-praxis-gold hover:text-praxis-black transition-all">
                    Horario
                </button>
            </div>
        </div>
        
        <!-- Input -->
        <div class="p-4 bg-praxis-black border-t border-praxis-gold/30">
            <form id="chat-form" class="flex gap-2">
                <input 
                    type="text" 
                    id="chat-input" 
                    placeholder="Escribe tu mensaje..." 
                    class="flex-1 px-4 py-3 bg-praxis-gray border border-praxis-gray/50 rounded-xl text-praxis-white text-sm placeholder-praxis-gray-medium focus:border-praxis-gold focus:outline-none transition-all"
                    autocomplete="off"
                >
                <button type="submit" class="w-12 h-12 bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-xl flex items-center justify-center text-praxis-black hover:scale-105 transition-all">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
/* Chatbot Animations */
#chatbot-window.active {
    transform: scale(1);
    opacity: 1;
}

#chat-messages::-webkit-scrollbar {
    width: 4px;
}

#chat-messages::-webkit-scrollbar-thumb {
    background: #C9A24D;
    border-radius: 2px;
}

#chat-messages::-webkit-scrollbar-track {
    background: transparent;
}

.chat-message {
    animation: messageSlide 0.3s ease;
}

@keyframes messageSlide {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.typing-indicator {
    display: flex;
    gap: 4px;
    padding: 8px 12px;
}

.typing-indicator span {
    width: 8px;
    height: 8px;
    background: #C9A24D;
    border-radius: 50%;
    animation: typing 1.4s infinite ease-in-out;
}

.typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
.typing-indicator span:nth-child(3) { animation-delay: 0.4s; }

@keyframes typing {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-8px); }
}

/* Pulse animation for chat button */
#chatbot-toggle {
    animation: pulse-gold 2s infinite;
}

@keyframes pulse-gold {
    0%, 100% { box-shadow: 0 0 0 0 rgba(201, 162, 77, 0.4); }
    50% { box-shadow: 0 0 0 15px rgba(201, 162, 77, 0); }
}
</style>

<script>
const chatbotWindow = document.getElementById('chatbot-window');
const chatMessages = document.getElementById('chat-messages');
const chatForm = document.getElementById('chat-form');
const chatInput = document.getElementById('chat-input');
const chatIcon = document.getElementById('chat-icon');
const closeIcon = document.getElementById('close-icon');
const chatNotification = document.getElementById('chat-notification');

let isOpen = false;

function toggleChatbot() {
    isOpen = !isOpen;
    
    if (isOpen) {
        chatbotWindow.classList.remove('hidden');
        setTimeout(() => chatbotWindow.classList.add('active'), 10);
        chatIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
        chatNotification.classList.add('hidden');
        chatInput.focus();
    } else {
        chatbotWindow.classList.remove('active');
        setTimeout(() => chatbotWindow.classList.add('hidden'), 300);
        chatIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    }
}

document.getElementById('chatbot-toggle').addEventListener('click', toggleChatbot);

function addMessage(content, isBot = false) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `chat-message ${isBot ? 'bot' : 'user'}`;
    
    const formattedContent = content.replace(/\n/g, '<br>');
    
    if (isBot) {
        messageDiv.innerHTML = `
            <div class="flex items-start gap-2">
                <div class="w-8 h-8 bg-praxis-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-praxis-gold text-sm"></i>
                </div>
                <div class="bg-praxis-gray rounded-xl rounded-tl-none p-3 max-w-[80%]">
                    <p class="text-praxis-white text-sm">${formattedContent}</p>
                </div>
            </div>
        `;
    } else {
        messageDiv.innerHTML = `
            <div class="flex items-start gap-2 justify-end">
                <div class="bg-gradient-to-br from-praxis-gold to-praxis-gold-dark rounded-xl rounded-tr-none p-3 max-w-[80%]">
                    <p class="text-praxis-black text-sm font-medium">${formattedContent}</p>
                </div>
            </div>
        `;
    }
    
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function showTyping() {
    const typingDiv = document.createElement('div');
    typingDiv.id = 'typing-indicator';
    typingDiv.className = 'chat-message bot';
    typingDiv.innerHTML = `
        <div class="flex items-start gap-2">
            <div class="w-8 h-8 bg-praxis-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-robot text-praxis-gold text-sm"></i>
            </div>
            <div class="bg-praxis-gray rounded-xl rounded-tl-none p-3">
                <div class="typing-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    `;
    chatMessages.appendChild(typingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function hideTyping() {
    const typing = document.getElementById('typing-indicator');
    if (typing) typing.remove();
}

// Respuestas del chatbot (sin necesidad de backend)
const chatResponses = {
    servicios: {
        keywords: ['servicio', 'servicios', 'ofrecen', 'hacen', 'ofrece', 'realizan'],
        answer: 'Ofrecemos consultoría estratégica, auditoría de riesgos, diseño de sistemas de seguridad (CCTV, alarmas, control de accesos), servicios de vigilancia y tecnología e IA. ¿Te interesa alguno en particular?'
    },
    precio: {
        keywords: ['precio', 'precios', 'coste', 'cuesta', 'presupuesto', 'tarifa', 'cuanto', 'cuánto'],
        answer: 'Cada proyecto es personalizado según tus necesidades. Solicita una consultoría gratuita y te haremos un presupuesto sin compromiso. ¿Quieres que te contactemos?'
    },
    contacto: {
        keywords: ['contacto', 'teléfono', 'telefono', 'llamar', 'whatsapp', 'email', 'correo', 'hablar'],
        answer: 'Puedes contactarnos de varias formas:<br>📞 Teléfono: +34 637 474 428<br>💬 WhatsApp: wa.me/34637474428<br>✉️ Email: info@praxisseguridad.es'
    },
    horario: {
        keywords: ['horario', 'hora', 'horas', 'abierto', 'disponible', 'atencion', 'atención', 'cuando', 'cuándo'],
        answer: 'Nuestro horario es de lunes a viernes de 09:00 a 18:00. Para urgencias, tenemos disponibilidad 24/7.'
    },
    ubicacion: {
        keywords: ['ubicación', 'ubicacion', 'donde', 'dónde', 'murcia', 'santomera', 'direccion', 'dirección', 'zona'],
        answer: 'Estamos ubicados en Santomera, Región de Murcia, España. Damos servicio en toda la región de Murcia y alrededores.'
    },
    camaras: {
        keywords: ['cámara', 'camara', 'cámaras', 'camaras', 'cctv', 'video', 'vídeo', 'grabar', 'grabación'],
        answer: 'Sí, diseñamos e instalamos sistemas CCTV profesionales. No vendemos productos genéricos: analizamos tus necesidades y diseñamos la solución óptima. ¿Quieres una consultoría gratuita?'
    },
    alarma: {
        keywords: ['alarma', 'alarmas', 'intrusión', 'intrusion', 'robo', 'ladrón', 'ladron', 'detector', 'detectores'],
        answer: 'Diseñamos sistemas de detección de intrusión conectados a CRA (Central Receptora de Alarmas). Pensamos antes de instalar para darte la mejor protección.'
    },
    accesos: {
        keywords: ['acceso', 'accesos', 'entrada', 'puerta', 'biométrico', 'biometrico', 'tarjeta', 'llave', 'control'],
        answer: 'Implementamos sistemas de control de accesos: tarjetas, códigos, biométricos... Todo diseñado según las necesidades específicas de tu instalación.'
    },
    consultoria: {
        keywords: ['consultoría', 'consultoria', 'asesor', 'asesoramiento', 'análisis', 'analisis', 'auditoría', 'auditoria', 'evaluar'],
        answer: 'Nuestra consultoría estratégica analiza tu situación actual y diseña el modelo de seguridad óptimo. No vendemos, asesoramos. ¿Agendamos una reunión sin compromiso?'
    },
    saludo: {
        keywords: ['hola', 'buenas', 'buenos', 'hey', 'saludos', 'qué tal', 'que tal', 'hi', 'hello'],
        answer: '¡Hola! 👋 Soy el asistente virtual de Praxis Seguridad. ¿En qué puedo ayudarte? Puedo informarte sobre nuestros servicios, precios, horarios o cómo contactarnos.'
    },
    gracias: {
        keywords: ['gracias', 'vale', 'ok', 'perfecto', 'genial', 'estupendo', 'entendido', 'claro'],
        answer: '¡De nada! Si tienes más preguntas, aquí estoy. También puedes llamarnos al +34 637 474 428 o solicitar una consultoría gratuita.'
    },
    vigilancia: {
        keywords: ['vigilancia', 'vigilante', 'guardia', 'guardias', 'seguridad', 'vigilar', 'ronda', 'rondas'],
        answer: 'Sí, ofrecemos estructuración y coordinación profesional de servicios de vigilancia, acudas y servicios auxiliares. Diseñamos el modelo que mejor se adapte a tu necesidad.'
    },
    tecnologia: {
        keywords: ['tecnología', 'tecnologia', 'ia', 'inteligencia', 'artificial', 'automatización', 'automatizacion', 'digital'],
        answer: 'Sí, integramos automatización, control y eficiencia operativa usando herramientas digitales avanzadas e inteligencia artificial para optimizar la seguridad.'
    }
};

function findResponse(message) {
    const lowerMessage = message.toLowerCase();
    let bestMatch = null;
    let maxMatches = 0;
    
    for (const key in chatResponses) {
        let matches = 0;
        for (const keyword of chatResponses[key].keywords) {
            if (lowerMessage.includes(keyword.toLowerCase())) {
                matches++;
            }
        }
        if (matches > maxMatches) {
            maxMatches = matches;
            bestMatch = chatResponses[key].answer;
        }
    }
    
    return bestMatch || 'No tengo información específica sobre eso, pero estaré encantado de ayudarte.<br><br>📞 Llámanos: +34 637 474 428<br>💬 WhatsApp: wa.me/34637474428<br>📝 O rellena el cuestionario de valoración<br><br>¿Hay algo más en lo que pueda ayudarte?';
}

async function sendMessage(message) {
    if (!message.trim()) return;
    
    addMessage(message, false);
    chatInput.value = '';
    
    showTyping();
    
    // Simular delay de respuesta (más natural)
    await new Promise(resolve => setTimeout(resolve, 800 + Math.random() * 500));
    
    hideTyping();
    const response = findResponse(message);
    addMessage(response, true);
}

function sendQuickMessage(message) {
    sendMessage(message);
}

chatForm.addEventListener('submit', (e) => {
    e.preventDefault();
    sendMessage(chatInput.value);
});

// Auto-open after 5 seconds for first-time visitors
document.addEventListener('DOMContentLoaded', () => {
    const hasSeenChat = localStorage.getItem('praxis_chat_opened');
    if (!hasSeenChat) {
        setTimeout(() => {
            if (!isOpen) {
                chatNotification.classList.remove('hidden');
            }
        }, 5000);
    }
});

// Mark as opened when user interacts
chatInput.addEventListener('focus', () => {
    localStorage.setItem('praxis_chat_opened', 'true');
});
</script>
