<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto - WorldTime</title>
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
        
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--blanco);
        }
        
        .form-control:focus {
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
        
        .card-body {
            padding: 2rem;
        }
        
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
        
        .form-section {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-globe-americas me-2"></i>WorldTime
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ route('gestion.productos.index') }}" class="back-btn">
                    <i class="fas fa-arrow-left me-2"></i>Volver a Productos
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
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-plus me-2"></i>Nuevo Producto</h4>
            </div>
            <div class="card-body">
                {{-- 🔧 Ruta corregida --}}
                <form action="{{ route('gestion.productos.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label required-field">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required 
                                       placeholder="Ingresa el nombre del producto">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="precio" class="form-label required-field">Precio</label>
                                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required 
                                       placeholder="0.00" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="categoria" class="form-label required-field">Categoría</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" required 
                                       placeholder="Ej: Relojes, Reparaciones, etc.">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="modelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" 
                                       placeholder="Modelo específico (opcional)">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" 
                                      placeholder="Descripción detallada del producto (opcional)"></textarea>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <a href="{{ route('gestion.productos.index') }}" class="btn btn-secondary me-md-2">
                            <i class="fas fa-times me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
