<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - WordTime</title>
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
            background: linear-gradient(135deg, #c6d870 0%, #8fa31e 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: var(--verde-oscuro) !important;
            box-shadow: 0 2px 15px rgba(85, 107, 47, 0.3);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(85, 107, 47, 0.15);
            transition: all 0.3s ease;
            background: var(--crema);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(85, 107, 47, 0.25);
        }
        .stats-card {
            border-left: 5px solid;
            background: white;
        }
        .stats-card.bg-primary {
            border-left-color: var(--verde-oscuro);
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-medio)) !important;
        }
        .stats-card.bg-success {
            border-left-color: var(--verde-medio);
            background: linear-gradient(135deg, var(--verde-medio), var(--verde-claro)) !important;
        }
        .stats-card.bg-warning {
            border-left-color: #e6a23c;
            background: linear-gradient(135deg, #e6a23c, #f6ad55) !important;
        }
        .stats-card.bg-info {
            border-left-color: #17a2b8;
            background: linear-gradient(135deg, #17a2b8, #6cb2eb) !important;
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
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            color: var(--verde-oscuro);
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(143, 163, 30, 0.3);
        }
        .btn-warning {
            background: linear-gradient(135deg, #e6a23c, #f6ad55);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(230, 162, 60, 0.3);
        }
        .btn-info {
            background: linear-gradient(135deg, #17a2b8, #6cb2eb);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(23, 162, 184, 0.3);
        }
        .card-header {
            background: var(--verde-oscuro);
            color: var(--crema);
            border-radius: 20px 20px 0 0 !important;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.3rem;
        }
        .display-6 {
            font-weight: 700;
            color: white;
        }
        .card-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: white;
        }
        .container {
            max-width: 1200px;
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-clock me-2"></i>WordTime
            </a>
            <div class="navbar-nav ms-auto">
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
        <h2 class="mb-4" style="color: var(--verde-oscuro); font-weight: 700;">Dashboard Administrativo</h2>
        
        <!-- Stats Cards -->
        <div class="row">
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-primary">{{ App\Models\Producto::count() }}</h3>
                <p class="text-muted">Total Productos</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-success">
                    ${{ number_format(App\Models\Producto::sum('precio'), 2) }}
                </h3>
                <p class="text-muted">Valor Total</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-warning">
                    {{ App\Models\Producto::distinct('categoria')->count('categoria') }}
                </h3>
                <p class="text-muted">Categorías</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-info">
                    {{ App\Models\Inventario::count() }}
                </h3>
                <p class="text-muted">En Inventario</p>
            </div>
        </div>
    </div>
</div>
        
        <!-- Management Cards -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-cog me-2"></i>Gestión del Sistema
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('gestion.productos.index') }}" class="btn btn-primary w-100">
                            <i class="fas fa-box me-2"></i>Gestión de Productos
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('inventario.index') }}" class="btn btn-success w-100">
                            <i class="fas fa-clipboard-list me-2"></i>Control de Inventario
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-warning w-100 text-white">
                            <i class="fas fa-users me-2"></i>Gestión de Clientes
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-info w-100 text-white">
                            <i class="fas fa-tools me-2"></i>Seguimiento de Reparaciones
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>