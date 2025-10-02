<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro - Inventario</title>
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
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #8fa31e);
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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-clock me-2"></i>WordTime
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ route('inventario.index') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-arrow-left me-2"></i>Volver al Inventario
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-plus me-2"></i>Nuevo Registro de Inventario</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('inventario.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="producto_id" class="form-label">Producto *</label>
                            <select class="form-select" id="producto_id" name="producto_id" required>
                                <option value="">Seleccionar Producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('producto_id')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cantidad" class="form-label">Cantidad en Stock *</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" 
                                   value="{{ old('cantidad', 0) }}" min="0" required>
                            @error('cantidad')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stock_minimo" class="form-label">Stock Mínimo *</label>
                            <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" 
                                   value="{{ old('stock_minimo', 5) }}" min="0" required>
                            <div class="form-text">Se alertará cuando el stock llegue a este nivel.</div>
                            @error('stock_minimo')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" 
                                   value="{{ old('modelo') }}" placeholder="Ej: Classic 2024, Sport Edition">
                            @error('modelo')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="notas" class="form-label">Notas</label>
                        <textarea class="form-control" id="notas" name="notas" rows="3" 
                                  placeholder="Observaciones adicionales...">{{ old('notas') }}</textarea>
                        @error('notas')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('inventario.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Registro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>