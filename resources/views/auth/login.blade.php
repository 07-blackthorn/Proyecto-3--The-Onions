<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - WordTime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #c6d870 0%, #8fa31e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 1rem;
        }
        .login-container {
            width: 100%;
            max-width: 420px; /* ANCHO FIJO COMO LA IMAGEN */
        }
        .login-card {
            background: #eff5d2;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(85, 107, 47, 0.25);
            overflow: hidden;
            border: none;
            width: 100%;
        }
        .login-header {
            background: #556b2f;
            color: #eff5d2;
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
            border: 2px solid #c6d870;
            background: white;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            margin-top: 8px;
            width: 100%;
        }
        .form-control:focus {
            border-color: #8fa31e;
            box-shadow: 0 0 0 0.3rem rgba(143, 163, 30, 0.15);
            background: white;
        }
        .btn-login {
            background: linear-gradient(135deg, #556b2f 0%, #8fa31e 100%);
            border: none;
            padding: 18px;
            font-weight: 600;
            border-radius: 12px;
            width: 100%;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin: 2rem 0 1.5rem 0;
            color: white;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(85, 107, 47, 0.3);
            background: linear-gradient(135deg, #8fa31e 0%, #556b2f 100%);
            color: white;
        }
        .form-label {
            font-weight: 600;
            color: #556b2f;
            margin-bottom: 0.5rem;
            font-size: 1rem;
            display: block;
        }
        .form-check-input:checked {
            background-color: #8fa31e;
            border-color: #8fa31e;
        }
        .form-check {
            margin: 1.5rem 0;
            display: flex;
            align-items: center;
        }
        .form-check-label {
            color: #556b2f;
            font-weight: 500;
            margin-left: 0.5rem;
        }
        .forgot-link {
            color: #556b2f;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.95rem;
            display: block;
            text-align: center;
            margin-top: 1rem;
        }
        .forgot-link:hover {
            color: #8fa31e;
            text-decoration: underline;
        }
        .clock-icon {
            background: #8fa31e;
            color: #eff5d2;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }
        .form-section {
            margin-bottom: 1.8rem;
        }
        .divider {
            border: none;
            height: 1px;
            background: linear-gradient(90deg, transparent, #c6d870, transparent);
            margin: 2rem 0;
        }
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #556b2f;
        }
        .register-link a {
            color: #8fa31e;
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="clock-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h1 class="brand-title">WordTime</h1>
                <p class="brand-subtitle">Tu portal de tiempo y control</p>
            </div>

            <!-- Form -->
            <div class="login-body">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-section">
                        <label for="email" class="form-label">
                            Correo electrónico
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
                            Contraseña
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
                        <strong>ACCEDER A WORLD TIME</strong>
                    </button>

                    <!-- Register Link -->
                    <div class="register-link">
                        ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>