<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reparación - WorldTime</title>
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
        }
        
        .navbar {
            background: var(--azul-noche) !important;
            box-shadow: 0 2px 15px rgba(15, 44, 76, 0.4);
        }
        
        .navbar-brand {
            color: var(--blanco) !important;
            font-weight: 700;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(15, 44, 76, 0.15);
            background: var(--blanco);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
            color: var(--blanco);
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.2rem;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--azul-principal), var(--azul-noche));
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: var(--blanco);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(26, 95, 160, 0.3);
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #495057);
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: var(--blanco);
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--blanco);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--azul-principal);
            box-shadow: 0 0 0 0.2rem rgba(26, 95, 160, 0.25);
            background: var(--blanco);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--azul-noche);
            margin-bottom: 0.5rem;
        }
        
        .logout-btn {
            background: transparent;
            border: 2px solid var(--azul-accento);
            color: var(--azul-accento);
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .logout-btn:hover {
            background: var(--azul-accento);
            color: var(--azul-noche);
            transform: translateY(-1px);
        }
        
        .back-btn {
            background: transparent;
            border: 2px solid var(--azul-accento);
            color: var(--azul-accento);
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            margin-right: 1rem;
        }
        
        .back-btn:hover {
            background: var(--azul-accento);
            color: var(--azul-noche);
            text-decoration: none;
            transform: translateY(-1px);
        }
        
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
        
        .form-section {
            margin-bottom: 1.5rem;
        }
        
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%231A5FA0' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }
        
        .card-body {
            padding: 2rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">
                <i class="fas fa-globe-americas me-2"></i>WorldTime
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ route('reparaciones.index') }}" class="back-btn">
                    <i class="fas fa-arrow-left me-2"></i>Volver a Reparaciones
                </a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-edit me-2"></i>Editar Reparación #{{ $reparacion->id }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reparaciones.update', $reparacion) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-section">
                                <h5 class="mb-3" style="color: var(--azul-noche);">
                                    <i class="fas fa-user me-2"></i>Información del Cliente
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cliente_nombre" class="form-label required-field">Nombre del Cliente</label>
                                        <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" 
                                               value="{{ $reparacion->cliente_nombre }}" required 
                                               placeholder="Nombre completo del cliente">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cliente_telefono" class="form-label required-field">Teléfono</label>
                                        <input type="text" class="form-control" id="cliente_telefono" name="cliente_telefono" 
                                               value="{{ $reparacion->cliente_telefono }}" required 
                                               placeholder="Número de teléfono">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="cliente_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="cliente_email" name="cliente_email" 
                                           value="{{ $reparacion->cliente_email }}" 
                                           placeholder="correo@ejemplo.com">
                                </div>
                            </div>

                            <div class="form-section">
                                <h5 class="mb-3" style="color: var(--azul-noche);">
                                    <i class="fas fa-mobile-alt me-2"></i>Información del Dispositivo
                                </h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="dispositivo" class="form-label required-field">Dispositivo</label>
                                        <input type="text" class="form-control" id="dispositivo" name="dispositivo" 
                                               value="{{ $reparacion->dispositivo }}" required 
                                               placeholder="Tipo de dispositivo">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="marca" class="form-label required-field">Marca</label>
                                        <input type="text" class="form-control" id="marca" name="marca" 
                                               value="{{ $reparacion->marca }}" required 
                                               placeholder="Marca del dispositivo">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="modelo" class="form-label required-field">Modelo</label>
                                        <input type="text" class="form-control" id="modelo" name="modelo" 
                                               value="{{ $reparacion->modelo }}" required 
                                               placeholder="Modelo específico">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="problema" class="form-label required-field">Problema Reportado</label>
                                    <textarea class="form-control" id="problema" name="problema" rows="4" required 
                                              placeholder="Describa el problema detalladamente">{{ $reparacion->problema }}</textarea>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5 class="mb-3" style="color: var(--azul-noche);">
                                    <i class="fas fa-cogs me-2"></i>Estado y Costos
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="estado" class="form-label required-field">Estado</label>
                                        <select class="form-select" id="estado" name="estado" required>
                                            <option value="recibido" {{ $reparacion->estado == 'recibido' ? 'selected' : '' }}>📥 Recibido</option>
                                            <option value="en_proceso" {{ $reparacion->estado == 'en_proceso' ? 'selected' : '' }}>⚙️ En Proceso</option>
                                            <option value="completado" {{ $reparacion->estado == 'completado' ? 'selected' : '' }}>✅ Completado</option>
                                            <option value="entregado" {{ $reparacion->estado == 'entregado' ? 'selected' : '' }}>📦 Entregado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="costo_estimado" class="form-label">Costo Estimado</label>
                                        <input type="number" step="0.01" class="form-control" id="costo_estimado" name="costo_estimado" 
                                               value="{{ $reparacion->costo_estimado }}" placeholder="0.00" min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5 class="mb-3" style="color: var(--azul-noche);">
                                    <i class="fas fa-calendar-alt me-2"></i>Fechas
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha_ingreso" class="form-label required-field">Fecha de Ingreso</label>
                                        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" 
                                               value="{{ $reparacion->fecha_ingreso->format('Y-m-d') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha_entrega_estimada" class="form-label">Fecha Entrega Estimada</label>
                                        <input type="date" class="form-control" id="fecha_entrega_estimada" name="fecha_entrega_estimada" 
                                               value="{{ $reparacion->fecha_entrega_estimada ? $reparacion->fecha_entrega_estimada->format('Y-m-d') : '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <div class="mb-3">
                                    <label for="notas" class="form-label">
                                        <i class="fas fa-sticky-note me-2"></i>Notas Adicionales
                                    </label>
                                    <textarea class="form-control" id="notas" name="notas" rows="3"
                                              placeholder="Observaciones internas, detalles técnicos, etc.">{{ $reparacion->notas }}</textarea>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="{{ route('reparaciones.index') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Actualizar Reparación
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
        // Efectos de focus mejorados
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control, .form-select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.borderColor = 'var(--azul-principal)';
                    this.style.boxShadow = '0 0 0 0.2rem rgba(26, 95, 160, 0.25)';
                });
                input.addEventListener('blur', function() {
                    this.style.borderColor = '#e9ecef';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>