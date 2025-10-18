<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reparación - WorldTime</title>
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
            --gris-medio: #E9ECEF;
            --verde-exito: #28a745;
        }
        
        body {
            background: linear-gradient(135deg, var(--azul-suave) 0%, var(--azul-accento) 50%, var(--azul-principal) 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-bottom: 2rem;
        }
        
        .navbar { 
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal)) !important;
            box-shadow: 0 4px 20px rgba(15, 44, 76, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--blanco) !important;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .main-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(15, 44, 76, 0.2);
            background: var(--blanco);
            overflow: hidden;
            backdrop-filter: blur(10px);
            margin-top: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .main-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(15, 44, 76, 0.3);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
            color: var(--blanco);
            border-radius: 20px 20px 0 0 !important;
            padding: 2rem;
            font-weight: 600;
            font-size: 1.4rem;
            border: none;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        .card-body {
            padding: 2.5rem;
            background: var(--blanco);
        }
        
        .btn-primary { 
            background: linear-gradient(135deg, var(--azul-principal), var(--azul-noche));
            border: none;
            border-radius: 12px;
            padding: 14px 28px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: var(--blanco);
            box-shadow: 0 6px 20px rgba(26, 95, 160, 0.3);
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
            transition: left 0.5s;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(26, 95, 160, 0.4);
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #495057);
            border: none;
            border-radius: 12px;
            padding: 14px 28px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: var(--blanco);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.3);
        }
        
        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(108, 117, 125, 0.4);
            background: linear-gradient(135deg, #495057, #6c757d);
        }
        
        .btn-outline-light {
            border: 2px solid var(--azul-accento);
            color: var(--azul-accento);
            border-radius: 12px;
            padding: 10px 24px;
            transition: all 0.3s ease;
            font-weight: 600;
            background: transparent;
            backdrop-filter: blur(10px);
        }
        
        .btn-outline-light:hover {
            background: var(--azul-accento);
            color: var(--azul-noche);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(109, 179, 233, 0.3);
        }
        
        .form-control {
            border: 2px solid var(--gris-medio);
            border-radius: 12px;
            padding: 14px 18px;
            transition: all 0.3s ease;
            font-size: 1rem;
            background: var(--gris-claro);
        }
        
        .form-control:focus {
            border-color: var(--azul-accento);
            box-shadow: 0 0 0 0.3rem rgba(109, 179, 233, 0.15);
            background: var(--blanco);
            transform: translateY(-2px);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--azul-noche);
            margin-bottom: 0.8rem;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-label::after {
            content: '*';
            color: #dc3545;
            margin-left: 0.25rem;
        }
        
        .form-label:not([for*="cliente_email"]):not([for*="costo_estimado"]):not([for*="notas"])::after {
            content: '*';
            color: #dc3545;
        }
        
        .form-label[for*="cliente_email"]::after,
        .form-label[for*="costo_estimado"]::after,
        .form-label[for*="notas"]::after {
            content: '';
        }
        
        .container {
            max-width: 1000px;
        }
        
        .input-group {
            border-radius: 12px;
            overflow: hidden;
        }
        
        .input-group-text {
            background: var(--azul-accento);
            border: 2px solid var(--azul-accento);
            color: var(--blanco);
            font-weight: 600;
        }
        
        .required-field::after {
            content: '*';
            color: #dc3545;
            margin-left: 4px;
        }
        
        .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            color: var(--azul-noche);
            font-weight: 700;
            margin: 2rem 0 1.5rem 0;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid var(--azul-accento);
            font-size: 1.3rem;
        }
        
        .icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--azul-accento), var(--azul-principal));
            border-radius: 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">
                <div class="icon-wrapper">
                    <i class="fas fa-clock"></i>
                </div>
                WorldTime
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ route('reparaciones.index') }}" class="btn btn-outline-light">
                    <i class="fas fa-arrow-left me-2"></i>Volver al Listado
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="main-card">
                    <div class="card-header">
                        <i class="fas fa-tools me-3"></i>
                        Nueva Solicitud de Reparación
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reparaciones.store') }}" method="POST">
                            @csrf
                            
                            <h5 class="section-title">
                                <i class="fas fa-user me-2"></i>Información del Cliente
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="cliente_nombre" class="form-label">
                                        <i class="fas fa-user-circle"></i>Nombre Completo
                                    </label>
                                    <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" 
                                           placeholder="Ingrese el nombre completo" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="cliente_telefono" class="form-label">
                                        <i class="fas fa-phone"></i>Teléfono
                                    </label>
                                    <input type="text" class="form-control" id="cliente_telefono" name="cliente_telefono" 
                                           placeholder="Número de contacto" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="cliente_email" class="form-label">
                                    <i class="fas fa-envelope"></i>Correo Electrónico
                                </label>
                                <input type="email" class="form-control" id="cliente_email" name="cliente_email" 
                                       placeholder="ejemplo@correo.com">
                            </div>

                            <h5 class="section-title">
                                <i class="fas fa-laptop me-2"></i>Información del Dispositivo
                            </h5>

                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label for="dispositivo" class="form-label">
                                        <i class="fas fa-mobile-alt"></i>Tipo de Dispositivo
                                    </label>
                                    <input type="text" class="form-control" id="dispositivo" name="dispositivo" 
                                           placeholder="Teléfono, Laptop, etc." required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="marca" class="form-label">
                                        <i class="fas fa-tag"></i>Marca
                                    </label>
                                    <input type="text" class="form-control" id="marca" name="marca" 
                                           placeholder="Marca del dispositivo" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="modelo" class="form-label">
                                        <i class="fas fa-barcode"></i>Modelo
                                    </label>
                                    <input type="text" class="form-control" id="modelo" name="modelo" 
                                           placeholder="Modelo específico" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="problema" class="form-label">
                                    <i class="fas fa-exclamation-triangle"></i>Problema Reportado
                                </label>
                                <textarea class="form-control" id="problema" name="problema" rows="4" 
                                          placeholder="Describa detalladamente el problema..." required></textarea>
                            </div>

                            <h5 class="section-title">
                                <i class="fas fa-clipboard-list me-2"></i>Detalles Adicionales
                            </h5>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="fecha_ingreso" class="form-label">
                                        <i class="fas fa-calendar-alt"></i>Fecha de Ingreso
                                    </label>
                                    <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" 
                                           value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="costo_estimado" class="form-label">
                                        <i class="fas fa-dollar-sign"></i>Costo Estimado
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control" id="costo_estimado" 
                                               name="costo_estimado" placeholder="0.00" min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="notas" class="form-label">
                                    <i class="fas fa-sticky-note"></i>Notas Adicionales
                                </label>
                                <textarea class="form-control" id="notas" name="notas" rows="3" 
                                          placeholder="Observaciones o comentarios adicionales..."></textarea>
                            </div>

                            <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-4 pt-3 border-top">
                                <a href="{{ route('reparaciones.index') }}" class="btn btn-secondary me-md-3 px-4">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="fas fa-save me-2"></i>Guardar Reparación
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efecto de focus mejorado para los campos
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
        
        // Establecer fecha mínima como hoy
        document.getElementById('fecha_ingreso').min = new Date().toISOString().split('T')[0];
    </script>
</body>
</html>