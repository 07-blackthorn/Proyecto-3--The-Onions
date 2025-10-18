<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - WorldTime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --azul-noche: #0F2C4C;
            --azul-principal: #1A5FA0;
            --azul-accento: #6DB3E9;
            --azul-suave: #E8F4FF;
            --blanco: #FFFFFF;
            --gris-claro: #F8F9FA;
            --gris-texto: #6B7280;
        }
        
        body {
            background: linear-gradient(135deg, var(--azul-suave) 0%, var(--azul-accento) 50%, var(--azul-principal) 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: gradientFlow 8s ease infinite;
            background-size: 200% 200%;
        }
        
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .guest-container {
            background: var(--blanco);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(15, 44, 76, 0.2);
            padding: 3rem;
            width: 100%;
            max-width: 500px;
            animation: cardAppear 0.8s ease-out;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
            animation: logoFloat 3s ease-in-out infinite;
        }
        
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .logo {
            font-size: 2.5rem;
            color: var(--azul-principal);
            margin-bottom: 1rem;
        }
        
        .brand-title {
            color: var(--azul-noche);
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        
        .brand-subtitle {
            color: var(--gris-texto);
            font-size: 1rem;
        }
        
        .info-text {
            color: var(--gris-texto);
            text-align: center;
            margin-bottom: 2rem;
            line-height: 1.6;
            font-size: 1rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            animation: inputSlide 0.6s ease-out;
        }
        
        @keyframes inputSlide {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .form-label {
            color: var(--azul-noche);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .form-input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid var(--gris-claro);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--blanco);
        }
        
        .form-input:focus {
            border-color: var(--azul-accento);
            box-shadow: 0 0 0 3px rgba(109, 179, 233, 0.15);
            outline: none;
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--azul-principal), var(--azul-noche));
            border: none;
            border-radius: 12px;
            padding: 14px 28px;
            font-weight: 600;
            color: var(--blanco);
            width: 100%;
            transition: all 0.4s ease;
            box-shadow: 0 6px 20px rgba(26, 95, 160, 0.25);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(26, 95, 160, 0.35);
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:active {
            transform: translateY(-1px);
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            border: 1px solid rgba(40, 167, 69, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #155724;
            animation: alertSlide 0.5s ease-out;
        }
        
        @keyframes alertSlide {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .back-link {
            text-align: center;
            margin-top: 2rem;
        }
        
        .back-link a {
            color: var(--azul-accento);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .back-link a:hover {
            color: var(--azul-principal);
            transform: translateX(-5px);
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--azul-accento);
            z-index: 2;
        }
        
        .input-icon .form-input {
            padding-left: 45px;
        }
        
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid var(--blanco);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 8px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="guest-container">
        <!-- Logo and Brand -->
        <div class="logo-section">
            <div class="logo">
                <i class="fas fa-globe-americas"></i>
            </div>
            <h1 class="brand-title">WorldTime</h1>
            <p class="brand-subtitle">Sistema de Gestión</p>
        </div>

        <!-- Info Text -->
        <div class="info-text">
            ¿Olvidaste tu contraseña? No hay problema. Solo dinos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert-success" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" id="passwordResetForm">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope me-2"></i>Correo Electrónico
                </label>
                <div class="input-icon">
                    <i class="fas fa-at"></i>
                    <input 
                        id="email" 
                        class="form-input" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        placeholder="tu@correo.com"
                    />
                </div>
                @if ($errors->has('email'))
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn-primary" id="submitBtn">
                    <i class="fas fa-paper-plane me-2"></i>
                    Enviar Enlace de Restablecimiento
                </button>
            </div>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">
                <i class="fas fa-arrow-left"></i>
                Volver al Inicio de Sesión
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('passwordResetForm');
            const submitBtn = document.getElementById('submitBtn');
            
            form.addEventListener('submit', function(e) {
                // Animación de carga
                submitBtn.innerHTML = '<span class="loading-spinner"></span>Enviando...';
                submitBtn.disabled = true;
                
                // Simular envío (en producción esto sería real)
                setTimeout(() => {
                    submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>¡Enviado!';
                    submitBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                }, 2000);
            });

            // Efectos de focus mejorados
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });

            // Validación en tiempo real
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('input', function() {
                if (this.validity.valid) {
                    this.style.borderColor = '#28a745';
                } else {
                    this.style.borderColor = '#e9ecef';
                }
            });
        });
    </script>
</body>
</html>