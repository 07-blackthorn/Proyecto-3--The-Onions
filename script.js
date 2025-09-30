// Base de datos simulada
function obtenerUsuarios() {
    return JSON.parse(localStorage.getItem('usuariosRegistrados')) || [
        { email: 'usuario@ejemplo.com', password: 'password123', name: 'Usuario Ejemplo', phone: '123456789', address: 'Dirección ejemplo' },
        { email: 'admin@ejemplo.com', password: 'admin123', name: 'Admin Ejemplo', phone: '987654321', address: 'Dirección admin' }
    ];
}

// Función para mostrar mensajes
function mostrarMensaje(mensaje, tipo) {
    const messageDiv = document.getElementById('message');
    const loginButton = document.getElementById('loginButton');
    
    messageDiv.textContent = mensaje;
    messageDiv.className = `message ${tipo}`;
    messageDiv.classList.remove('hidden');
    
    // Efecto visual en el botón según el tipo de mensaje
    if (tipo === 'success') {
        loginButton.style.background = 'linear-gradient(135deg, #8FA31E 0%, #556B2F 100%)';
    }
    
    // Ocultar mensaje después de 4 segundos
    setTimeout(() => {
        messageDiv.classList.add('hidden');
        loginButton.style.background = 'linear-gradient(135deg, #556B2F 0%, #8FA31E 100%)';
    }, 4000);
}

// Función para validar email
function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Función para validar contraseña
function validarPassword(password) {
    return password.length >= 6;
}

// Función para mostrar carga en el botón
function mostrarCarga(mostrar) {
    const loginButton = document.getElementById('loginButton');
    if (mostrar) {
        loginButton.innerHTML = '⏳ Verificando...';
        loginButton.disabled = true;
    } else {
        loginButton.innerHTML = 'Acceder a WorldTime';
        loginButton.disabled = false;
    }
}

// Función de inicio de sesión
async function iniciarSesion(email, password) {
    mostrarCarga(true);
    
    // Simular delay de red
    await new Promise(resolve => setTimeout(resolve, 1500));
    
    // Validaciones
    if (!validarEmail(email)) {
        mostrarMensaje('❌ Por favor, ingresa un email válido', 'error');
        mostrarCarga(false);
        return false;
    }
    
    if (!validarPassword(password)) {
        mostrarMensaje('❌ La contraseña debe tener al menos 6 caracteres', 'error');
        mostrarCarga(false);
        return false;
    }
    
    // Buscar usuario en la base actualizada
    const usuarios = obtenerUsuarios();
    const usuario = usuarios.find(user => 
        user.email === email && user.password === password
    );
    
    if (usuario) {
        mostrarMensaje('✅ ¡Inicio de sesión exitoso! Redirigiendo a WorldTime...', 'success');
        
        // Guardar en localStorage
        localStorage.setItem('usuarioLogueado', JSON.stringify({
            email: usuario.email,
            name: usuario.name,
            timestamp: new Date().getTime(),
            app: 'WorldTime'
        }));
        
        // Redireccionar después de éxito
        setTimeout(() => {
            alert(`🕐 ¡Bienvenido a WorldTime, ${usuario.name}!`);
            // window.location.href = 'dashboard.html';
        }, 2000);
        
        mostrarCarga(false);
        return true;
    } else {
        mostrarMensaje('❌ Credenciales incorrectas. Intenta nuevamente.', 'error');
        mostrarCarga(false);
        return false;
    }
}


// Event listener para el formulario
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    
    iniciarSesion(email, password);
});

// Verificar si ya hay una sesión activa
window.addEventListener('load', function() {
    const usuarioLogueado = localStorage.getItem('usuarioLogueado');
    if (usuarioLogueado) {
        const usuario = JSON.parse(usuarioLogueado);
        mostrarMensaje(`🌿 Bienvenido de nuevo a WorldTime, ${usuario.email}`, 'success');
    }
    
    // Efecto de enfoque en el primer campo
    document.getElementById('email').focus();
});

// Efectos interactivos en los inputs
document.querySelectorAll('input').forEach(input => {
    input.addEventListener('focus', function() {
        this.style.transform = 'scale(1.02)';
    });
    
    input.addEventListener('blur', function() {
        this.style.transform = 'scale(1)';
    });
});

// Función para cerrar sesión
function cerrarSesion() {
    localStorage.removeItem('usuarioLogueado');
    mostrarMensaje('👋 Sesión cerrada correctamente', 'success');
    setTimeout(() => {
        window.location.reload();
    }, 2000);
}

// Mostrar hora actual en la consola (para tema WorldTime)
function mostrarHoraActual() {
    const ahora = new Date();
    console.log(`🕐 WorldTime - Hora actual: ${ahora.toLocaleString()}`);
}

// Inicializar hora
mostrarHoraActual();
setInterval(mostrarHoraActual, 60000); // Actualizar cada minuto