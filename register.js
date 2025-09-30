// Base de datos simulada para usuarios registrados
let usuarios = JSON.parse(localStorage.getItem('usuariosRegistrados')) || [
    { email: 'usuario@ejemplo.com', password: 'password123', name: 'Usuario Ejemplo', phone: '123456789', address: 'Dirección ejemplo' },
    { email: 'admin@ejemplo.com', password: 'admin123', name: 'Admin Ejemplo', phone: '987654321', address: 'Dirección admin' }
];

// Función para mostrar mensajes
function mostrarMensaje(mensaje, tipo) {
    const messageDiv = document.getElementById('message');
    const registerButton = document.getElementById('registerButton');
    
    messageDiv.textContent = mensaje;
    messageDiv.className = `message ${tipo}`;
    messageDiv.classList.remove('hidden');
    
    // Efecto visual en el botón según el tipo de mensaje
    if (tipo === 'success') {
        registerButton.style.background = 'linear-gradient(135deg, #8FA31E 0%, #556B2F 100%)';
    }
    
    // Ocultar mensaje después de 5 segundos (más tiempo para éxito)
    setTimeout(() => {
        messageDiv.classList.add('hidden');
        registerButton.style.background = 'linear-gradient(135deg, #556B2F 0%, #8FA31E 100%)';
    }, tipo === 'success' ? 5000 : 4000);
}

// Función para validar email
function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Función para validar teléfono
function validarTelefono(phone) {
    const regex = /^[0-9]{10,15}$/;
    return regex.test(phone.replace(/\s/g, ''));
}

// Función para validar contraseña
function validarPassword(password) {
    return password.length >= 6;
}

// Función para verificar si el email ya existe
function emailExiste(email) {
    return usuarios.some(user => user.email === email);
}

// Función para mostrar carga en el botón
function mostrarCarga(mostrar) {
    const registerButton = document.getElementById('registerButton');
    if (mostrar) {
        registerButton.innerHTML = '⏳ Registrando...';
        registerButton.disabled = true;
    } else {
        registerButton.innerHTML = 'Registrarse en WorldTime';
        registerButton.disabled = false;
    }
}

// Función de registro
async function registrarUsuario(userData) {
    mostrarCarga(true);
    
    // Simular delay de red
    await new Promise(resolve => setTimeout(resolve, 1500));
    
    // Validaciones
    if (!userData.name.trim()) {
        mostrarMensaje('❌ Por favor, ingresa tu nombre completo', 'error');
        mostrarCarga(false);
        return false;
    }
    
    if (!validarTelefono(userData.phone)) {
        mostrarMensaje('❌ Por favor, ingresa un teléfono válido (10-15 dígitos)', 'error');
        mostrarCarga(false);
        return false;
    }
    
    if (!validarEmail(userData.email)) {
        mostrarMensaje('❌ Por favor, ingresa un email válido', 'error');
        mostrarCarga(false);
        return false;
    }
    
    if (emailExiste(userData.email)) {
        mostrarMensaje('❌ Este email ya está registrado', 'error');
        mostrarCarga(false);
        return false;
    }
    
    if (!validarPassword(userData.password)) {
        mostrarMensaje('❌ La contraseña debe tener al menos 6 caracteres', 'error');
        mostrarCarga(false);
        return false;
    }
    
    if (userData.password !== userData.confirmPassword) {
        mostrarMensaje('❌ Las contraseñas no coinciden', 'error');
        mostrarCarga(false);
        return false;
    }
    
    if (!userData.address.trim()) {
        mostrarMensaje('❌ Por favor, ingresa tu dirección', 'error');
        mostrarCarga(false);
        return false;
    }
    
    // Registrar usuario
    const nuevoUsuario = {
        name: userData.name.trim(),
        phone: userData.phone,
        email: userData.email,
        address: userData.address.trim(),
        password: userData.password
    };
    
    usuarios.push(nuevoUsuario);
    localStorage.setItem('usuariosRegistrados', JSON.stringify(usuarios));
    
    mostrarMensaje('✅ ¡Registro exitoso! Redirigiendo al login...', 'success');
    
    // Redireccionar después de éxito
    setTimeout(() => {
        window.location.href = 'index.html';
    }, 3000);
    
    mostrarCarga(false);
    return true;
}

// Event listener para el formulario de registro
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const userData = {
        name: document.getElementById('name').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value.trim(),
        address: document.getElementById('address').value,
        password: document.getElementById('password').value,
        confirmPassword: document.getElementById('confirmPassword').value
    };
    
    registrarUsuario(userData);
});

// Efectos interactivos en los inputs
document.querySelectorAll('input, textarea').forEach(input => {
    input.addEventListener('focus', function() {
        this.style.transform = 'scale(1.02)';
    });
    
    input.addEventListener('blur', function() {
        this.style.transform = 'scale(1)';
    });
});

// Validación en tiempo real para confirmar contraseña
document.getElementById('confirmPassword').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    
    if (confirmPassword && password !== confirmPassword) {
        this.style.borderColor = '#ff6b6b';
    } else {
        this.style.borderColor = '#C6D870';
    }
});

// Mostrar hora actual en la consola
function mostrarHoraActual() {
    const ahora = new Date();
    console.log(`🕐 WorldTime Registro - Hora actual: ${ahora.toLocaleString()}`);
}

// Inicializar hora
mostrarHoraActual();