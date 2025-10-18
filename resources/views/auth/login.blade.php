<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - WorldTime</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 1rem;
        }
        .login-container {
            width: 100%;
            max-width: 420px;
        }
        .login-card {
            background: var(--blanco);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(15, 44, 76, 0.3);
            overflow: hidden;
            border: none;
            width: 100%;
        }
        .login-header {
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
            color: var(--blanco);
            padding: 2.5rem 2rem;
            text-align: center;
        }
        .brand-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.5px;
        }
        .brand-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
            font-weight: 300;
        }
        .login-body {
            padding: 2.5rem;
        }
        .form-control {
            border-radius: 12px;
            padding: 16px 18px;
            border: 2px solid var(--azul-accento);
            background: var(--blanco);
            font-size: 1.05rem;
            transition: all 0.3s ease;
            margin-top: 8px;
            width: 100%;
        }
        .form-control:focus {
            border-color: var(--azul-principal);
            box-shadow: 0 0 0 0.3rem rgba(26, 95, 160, 0.15);
            background: var(--blanco);
        }
        .btn-login {
            background: linear-gradient(135deg, var(--azul-principal), var(--azul-noche));
            border: none;
            padding: 18px;
            font-weight: 600;
            border-radius: 12px;
            width: 100%;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin: 2rem 0 1.5rem 0;
            color: var(--blanco);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(26, 95, 160, 0.3);
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
            color: var(--blanco);
        }
        .form-label {
            font-weight: 600;
            color: var(--azul-noche);
            margin-bottom: 0.5rem;
            font-size: 1rem;
            display: block;
        }
        .form-check-input:checked {
            background-color: var(--azul-principal);
            border-color: var(--azul-principal);
        }
        .form-check {
            margin: 1.5rem 0;
            display: flex;
            align-items: center;
        }
        .form-check-label {
            color: var(--azul-noche);
            font-weight: 500;
            margin-left: 0.5rem;
        }
        .forgot-link {
            color: var(--azul-principal);
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.95rem;
            display: block;
            text-align: center;
            margin-top: 1rem;
        }
        .forgot-link:hover {
            color: var(--azul-noche);
            text-decoration: underline;
        }
        .globe-icon {
            background: var(--azul-accento);
            color: var(--azul-noche);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.8rem;
            transition: all 0.3s ease;
        }
        .globe-icon:hover {
            transform: rotate(15deg);
            background: var(--azul-principal);
            color: var(--blanco);
        }
        .form-section {
            margin-bottom: 1.8rem;
        }
        .divider {
            border: none;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--azul-accento), transparent);
            margin: 2rem 0;
        }
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--azul-noche);
        }
        .register-link a {
            color: var(--azul-principal);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .register-link a:hover {
            color: var(--azul-noche);
            text-decoration: underline;
        }
        .text-danger {
            color: #dc3545 !important;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        .alert-success {
            background: linear-gradient(135deg, var(--azul-accento), var(--azul-principal));
            color: var(--blanco);
            border: none;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="globe-icon">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <h1 class="brand-title">WorldTime</h1>
                <p class="brand-subtitle">Tu portal de tiempo y control</p>
            </div>

            <!-- Form -->
            <div class="login-body">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-section">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Correo electrónico
                        </label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ old('email') }}" required autofocus 
                               placeholder="ejemplo@correo.com">
                        @error('email')
                            <div class="text-danger mt-2">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-section">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Contraseña
                        </label>
                        <input type="password" class="form-control" id="password" name="password" 
                               required placeholder="********">
                        @error('password')
                            <div class="text-danger mt-2">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Recordarme
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt me-2"></i><strong>ACCEDER A WORLD TIME</strong>
                    </button>

                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            <i class="fas fa-key me-1"></i>¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <!-- Register Link -->
                    <div class="register-link">
                        ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efecto de rotación en el icono del globo
        document.addEventListener('DOMContentLoaded', function() {
            const globeIcon = document.querySelector('.globe-icon');
            if (globeIcon) {
                globeIcon.addEventListener('mouseenter', function() {
                    this.style.transform = 'rotate(15deg) scale(1.1)';
                });
                globeIcon.addEventListener('mouseleave', function() {
                    this.style.transform = 'rotate(0) scale(1)';
                });
            }
        });
    </script>
</body>
</html>