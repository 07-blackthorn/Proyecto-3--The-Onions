<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto - WordTime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Copia los mismos estilos del index aquí */
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
        }
        
        .navbar {
            background: var(--verde-oscuro) !important;
        }
        
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(85, 107, 47, 0.15);
            background: var(--crema);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-medio));
            color: white;
            border-radius: 20px 20px 0 0 !important;
            padding: 1.5rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-medio));
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
        }
        
        .form-control {
            border-radius: 12px;
            border: 2px solid #e9ecef;
            padding: 12px;
        }
        
        .form-control:focus {
            border-color: var(--verde-medio);
            box-shadow: 0 0 0 0.2rem rgba(143, 163, 30, 0.25);
        }
    </style>
</head>
<body>
    <!-- Navbar (igual al index) -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-clock me-2"></i>WordTime
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ route('productos.index') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-arrow-left me-2"></i>Volver
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-plus me-2"></i>Nuevo Producto</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <div class="row">
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre del Producto *</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="precio" class="form-label">Precio *</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="categoria" class="form-label">Categoría *</label>
        <input type="text" class="form-control" id="categoria" name="categoria" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo">
    </div>
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="2"></textarea>
</div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>