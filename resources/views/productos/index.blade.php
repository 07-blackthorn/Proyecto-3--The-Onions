<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - WorldTime</title>
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
            margin-bottom: 2rem;
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
        
        .btn-success {
            background: linear-gradient(135deg, var(--azul-accento), var(--azul-principal));
            border: none;
            border-radius: 8px;
            color: var(--blanco);
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(109, 179, 233, 0.3);
            background: linear-gradient(135deg, var(--azul-principal), var(--azul-accento));
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--azul-accento), #4A90E2);
            border: none;
            border-radius: 8px;
            color: var(--blanco);
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(109, 179, 233, 0.3);
            background: linear-gradient(135deg, #4A90E2, var(--azul-accento));
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #e74c3c);
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }
        
        .table {
            border-radius: 12px;
            overflow: hidden;
            background: var(--blanco);
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal));
            color: var(--blanco);
        }
        
        .table th {
            border: none;
            padding: 1rem;
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        .table td {
            border-color: #e9ecef;
            padding: 1rem;
            vertical-align: middle;
            color: var(--azul-noche);
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .table tbody tr:hover {
            background-color: rgba(109, 179, 233, 0.1);
            transform: translateX(5px);
            border-left-color: var(--azul-accento);
        }
        
        .badge-categoria {
            background: linear-gradient(135deg, var(--azul-accento), var(--azul-principal));
            color: var(--blanco);
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        
        .precio {
            font-weight: 700;
            color: var(--azul-principal);
            font-size: 1.1rem;
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
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--azul-noche);
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: var(--azul-accento);
        }
        
        .empty-state h3 {
            color: var(--azul-noche);
            margin-bottom: 1rem;
        }
        
        .stats-card {
            background: var(--blanco);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(15, 44, 76, 0.1);
            transition: all 0.3s ease;
            border-top: 4px solid;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(15, 44, 76, 0.15);
        }
        
        .stats-card:nth-child(1) {
            border-top-color: var(--azul-principal);
        }
        
        .stats-card:nth-child(2) {
            border-top-color: var(--azul-noche);
        }
        
        .stats-card:nth-child(3) {
            border-top-color: var(--azul-accento);
        }
        
        .stats-card h3 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .stats-card:nth-child(1) h3 { color: var(--azul-principal); }
        .stats-card:nth-child(2) h3 { color: var(--azul-noche); }
        .stats-card:nth-child(3) h3 { color: var(--azul-accento); }
        
        .text-muted {
            color: #6c757d !important;
            font-weight: 500;
        }
        
        .btn-group .btn {
            margin: 0 2px;
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
                <a href="{{ route('dashboard') }}" class="back-btn">
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
                                    <td>{{ $producto->modelo ?? 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('gestion.productos.show', $producto->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('gestion.productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
                        <a href="{{ route('gestion.productos.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus me-2"></i>Crear Primer Producto
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Estadísticas rápidas -->
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="stats-card">
                    <h3>{{ $productos->count() }}</h3>
                    <p class="text-muted">Total Productos</p>
                    <i class="fas fa-box text-muted mt-2"></i>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stats-card">
                    <h3>${{ number_format($productos->sum('precio'), 2) }}</h3>
                    <p class="text-muted">Valor Total</p>
                    <i class="fas fa-dollar-sign text-muted mt-2"></i>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stats-card">
                    <h3>{{ $productos->unique('categoria')->count() }}</h3>
                    <p class="text-muted">Categorías</p>
                    <i class="fas fa-tags text-muted mt-2"></i>
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