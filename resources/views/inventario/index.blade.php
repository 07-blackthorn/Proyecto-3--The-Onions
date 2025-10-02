<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Inventario - WordTime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --verde-oscuro: #556b2f;
            --verde-medio: #8fa31e;
            --verde-claro: #c6d870;
            --crema: #eff5d2;
            --rojo: #dc3545;
            --naranja: #fd7e14;
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
            margin-bottom: 2rem;
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
        
        .btn-success {
            background: linear-gradient(135deg, var(--verde-medio), var(--verde-claro));
            border: none;
            border-radius: 8px;
            color: var(--verde-oscuro);
            font-weight: 600;
        }
        
        .stock-bajo {
            background-color: #fff3cd !important;
            border-left: 4px solid var(--naranja);
        }
        
        .sin-stock {
            background-color: #f8d7da !important;
            border-left: 4px solid var(--rojo);
        }
        
        .stock-ok {
            border-left: 4px solid #28a745;
        }
        
        .badge-stock {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .table {
            border-radius: 15px;
            overflow: hidden;
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-medio));
            color: white;
        }
        
        .logout-btn {
            background: transparent;
            border: 2px solid var(--crema);
            color: var(--crema);
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background: var(--crema);
            color: var(--verde-oscuro);
        }
        
        .back-btn {
            background: transparent;
            border: 2px solid var(--crema);
            color: var(--crema);
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .back-btn:hover {
            background: var(--crema);
            color: var(--verde-oscuro);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-clock me-2"></i>WordTime
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ route('dashboard') }}" class="back-btn me-2">
                    <i class="fas fa-arrow-left me-2"></i>Volver al Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>Control de Inventario</h4>
                <a href="{{ route('inventario.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Nuevo Registro
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($inventario->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Stock Actual</th>
                                    <th>Stock Mínimo</th>
                                    <th>Estado</th>
                                    <th>Modelo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventario as $item)
                                <tr class="@if($item->cantidad == 0) sin-stock @elseif($item->stock_bajo) stock-bajo @else stock-ok @endif">
                                    <td>
                                        <strong>{{ $item->producto->nombre }}</strong><br>
                                        <small class="text-muted">Categoría: {{ $item->producto->categoria }}</small>
                                    </td>
                                    <td>
                                        <span class="h5">{{ $item->cantidad }}</span>
                                    </td>
                                    <td>{{ $item->stock_minimo }}</td>
                                    <td>
                                        @if($item->cantidad == 0)
                                            <span class="badge-stock bg-danger text-white">Sin Stock</span>
                                        @elseif($item->stock_bajo)
                                            <span class="badge-stock bg-warning text-dark">Stock Bajo</span>
                                        @else
                                            <span class="badge-stock bg-success text-white">Disponible</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->modelo ?? 'No especificado' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('inventario.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('inventario.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este registro?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-boxes fa-4x text-muted mb-3"></i>
                        <h4>No hay registros de inventario</h4>
                        <p class="text-muted">Comienza agregando tu primer registro de inventario.</p>
                        <a href="{{ route('inventario.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Crear Primer Registro
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="text-primary">{{ $inventario->count() }}</h3>
                        <p class="text-muted">Productos en Inventario</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="text-success">{{ $inventario->where('cantidad', '>', 0)->count() }}</h3>
                        <p class="text-muted">Con Stock</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="text-warning">{{ $inventario->where('stock_bajo', true)->where('cantidad', '>', 0)->count() }}</h3>
                        <p class="text-muted">Stock Bajo</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="text-danger">{{ $inventario->where('cantidad', 0)->count() }}</h3>
                        <p class="text-muted">Sin Stock</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>