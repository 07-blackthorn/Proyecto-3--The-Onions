<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - WorldTime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --azul-noche: #0F2C4C;
            --azul-principal: #1A5FA0;
            --azul-accento: #6DB3E9;
            --negro: #000000;
            --blanco: #FFFFFF;
        }
        
        body {
            background: linear-gradient(135deg, var(--azul-accento) 0%, var(--azul-principal) 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .register-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }
        
        .register-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(15, 44, 76, 0.3);
            background: var(--blanco);
            overflow: hidden;
        }
        
        .register-header {
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
            color: var(--blanco);
            padding: 2.5rem 2rem;
            text-align: center;
            border-radius: 0 0 30px 30px;
        }
        
        .register-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
        }
        
        .register-header i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: block;
        }
        
        .register-body {
            padding: 2.5rem 2rem;
        }
        
        .form-control {
            border-radius: 12px;
            border: 2px solid #e9ecef;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--blanco);
        }
        
        .form-control:focus {
            border-color: var(--azul-principal);
            box-shadow: 0 0 0 0.3rem rgba(26, 95, 160, 0.15);
            transform: translateY(-2px);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--azul-noche);
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--azul-principal), var(--azul-noche));
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--blanco);
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(26, 95, 160, 0.3);
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
        }
        
        .login-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(15, 44, 76, 0.1);
        }
        
        .login-link a {
            color: var(--azul-principal);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .login-link a:hover {
            color: var(--azul-noche);
            text-decoration: underline;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group .form-control {
            padding-left: 45px;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--azul-principal);
            z-index: 5;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--azul-principal);
            cursor: pointer;
            z-index: 5;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--azul-noche);
        }
        
        .form-text {
            color: var(--azul-principal);
            font-size: 0.85rem;
        }
        
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
        
        .is-invalid {
            border-color: #dc3545 !important;
        }
        
        .is-invalid:focus {
            box-shadow: 0 0 0 0.3rem rgba(220, 53, 69, 0.15) !important;
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .register-card {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Efectos de iconos al focus */
        .form-control:focus + .input-icon {
            color: var(--azul-noche);
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <i class="fas fa-globe-americas"></i>
                <h2>Crear Cuenta</h2>
                <p class="mb-0 opacity-75">Únete a WorldTime</p>
            </div>
            
            <div class="register-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                        <div class="input-group">
                            <i class="input-icon fas fa-user"></i>
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus
                                   placeholder="Ingresa tu nombre completo">
                        </div>
                        @error('nombre')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <div class="input-group">
                            <i class="input-icon fas fa-envelope"></i>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="tu@ejemplo.com">
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group">
                            <i class="input-icon fas fa-lock"></i>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password"
                                   placeholder="Crea una contraseña segura">
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">Mínimo 8 caracteres con letras y números</div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                        <div class="input-group">
                            <i class="input-icon fas fa-lock"></i>
                            <input id="password-confirm" type="password" class="form-control" 
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Repite tu contraseña">
                            <button type="button" class="password-toggle" onclick="togglePassword('password-confirm')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-register">
                        <i class="fas fa-user-plus me-2"></i>Registrarse
                    </button>

                    <div class="login-link">
                        <span>¿Ya tienes cuenta? </span>
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.parentNode.querySelector('.password-toggle i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Efectos de hover mejorados
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    const icon = this.parentNode.querySelector('.input-icon');
                    if (icon) {
                        icon.style.color = 'var(--azul-noche)';
                    }
                });
                input.addEventListener('blur', function() {
                    const icon = this.parentNode.querySelector('.input-icon');
                    if (icon) {
                        icon.style.color = 'var(--azul-principal)';
                    }
                });
            });
        });
    </script>
</body>
</html>