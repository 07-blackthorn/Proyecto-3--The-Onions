<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - WordTime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --verde-oscuro: #556b2f;
            --verde-medio: #8fa31e;
            --verde-claro: #c6d870;
            --crema: #eff5d2;
        }
        
        body {
            background: linear-gradient(135deg, var(--verde-claro) 0%, var(--verde-medio) 100%);
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
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(85, 107, 47, 0.2);
            background: var(--crema);
            overflow: hidden;
        }
        
        .register-header {
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-medio));
            color: white;
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
            border-radius: 15px;
            border: 2px solid #e9ecef;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-control:focus {
            border-color: var(--verde-medio);
            box-shadow: 0 0 0 0.3rem rgba(143, 163, 30, 0.15);
            transform: translateY(-2px);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--verde-oscuro);
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-medio));
            border: none;
            border-radius: 15px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(85, 107, 47, 0.3);
            background: linear-gradient(135deg, var(--verde-medio), var(--verde-oscuro));
        }
        
        .login-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(85, 107, 47, 0.1);
        }
        
        .login-link a {
            color: var(--verde-medio);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .login-link a:hover {
            color: var(--verde-oscuro);
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
            color: var(--verde-medio);
            z-index: 5;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--verde-medio);
            cursor: pointer;
            z-index: 5;
        }
        
        .form-text {
            color: var(--verde-medio);
            font-size: 0.85rem;
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
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <i class="fas fa-clock"></i>
                <h2>Crear Cuenta</h2>
                <p class="mb-0 opacity-75">Únete a WordTime</p>
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
                    this.parentNode.querySelector('.input-icon').style.color = 'var(--verde-oscuro)';
                });
                input.addEventListener('blur', function() {
                    this.parentNode.querySelector('.input-icon').style.color = 'var(--verde-medio)';
                });
            });
        });
    </script>
</body>
</html>