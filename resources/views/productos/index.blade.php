<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - WordTime</title>
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
            box-shadow: 0 2px 15px rgba(85, 107, 47, 0.3);
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
            font-weight: 600;
            font-size: 1.3rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-medio));
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(85, 107, 47, 0.3);
            background: linear-gradient(135deg, var(--verde-medio), var(--verde-oscuro));
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--verde-medio), var(--verde-claro));
            border: none;
            border-radius: 8px;
            color: var(--verde-oscuro);
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(143, 163, 30, 0.3);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #e6a23c, #f6ad55);
            border: none;
            border-radius: 8px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #e74c3c);
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .table {
            border-radius: 15px;
            overflow: hidden;
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-medio));
            color: white;
        }
        
        .table th {
            border: none;
            padding: 1rem;
            font-weight: 600;
        }
        
        .table td {
            border-color: #e9ecef;
            padding: 1rem;
            vertical-align: middle;
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(198, 216, 112, 0.1);
            transform: translateX(5px);
        }
        
        .badge-categoria {
            background: linear-gradient(135deg, var(--verde-claro), var(--verde-medio));
            color: var(--verde-oscuro);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .precio {
            font-weight: 700;
            color: var(--verde-oscuro);
            font-size: 1.1rem;
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
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--verde-oscuro);
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: var(--verde-medio);
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

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-box me-2"></i>Gestión de Productos</span>
                <a href="{{ route('gestion.productos.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Nuevo Producto
                </a>
            </div>
            <div class="card-body">
                @if($productos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Modelo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr>
                                    <td><strong>#{{ $producto->id }}</strong></td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td class="precio">${{ number_format($producto->precio, 2) }}</td>
                                    <td>
                                        <span class="badge-categoria">{{ $producto->categoria }}</span>
                                    </td>
                                     <td>{{ $producto->modelo ?? 'N/A' }}</td> <!-- Agregar esta celda -->
                                        <td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- CORREGIDO: Cambiado a gestion.productos.show -->
                                            <a href="{{ route('gestion.productos.show', $producto->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <!-- CORREGIDO: Cambiado a gestion.productos.edit -->
                                            <a href="{{ route('gestion.productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- CORREGIDO: Cambiado a gestion.productos.destroy -->
                                            <form action="{{ route('gestion.productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
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
                    <div class="empty-state">
                        <i class="fas fa-box-open"></i>
                        <h3>No hay productos registrados</h3>
                        <p class="text-muted">Comienza agregando tu primer producto al sistema.</p>
                        <!-- CORREGIDO: Ya está actualizado -->
                        <a href="{{ route('gestion.productos.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus me-2"></i>Crear Primer Producto
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Estadísticas rápidas -->
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="text-primary">{{ $productos->count() }}</h3>
                        <p class="text-muted">Total Productos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="text-success">
                            ${{ number_format($productos->sum('precio'), 2) }}
                        </h3>
                        <p class="text-muted">Valor Total</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="text-warning">
                            {{ $productos->unique('categoria')->count() }}
                        </h3>
                        <p class="text-muted">Categorías</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efectos adicionales
        document.addEventListener('DOMContentLoaded', function() {
            // Animación suave para las filas de la tabla
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach((row, index) => {
                row.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>