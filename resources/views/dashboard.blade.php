<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - WorldTime</title>
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
            color: var(--azul-noche);
        }
        .navbar {
            background: var(--azul-noche) !important;
            box-shadow: 0 2px 15px rgba(15, 44, 76, 0.4);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--blanco) !important;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(15, 44, 76, 0.15);
            transition: all 0.3s ease;
            background: var(--blanco);
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(15, 44, 76, 0.25);
        }
        .stats-card {
            border-top: 4px solid;
            background: var(--blanco);
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-3px);
        }
        .stats-card .card-body {
            padding: 1.5rem;
        }
        .stats-card h3 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .stats-card:nth-child(1) h3 { color: var(--azul-principal); }
        .stats-card:nth-child(2) h3 { color: var(--azul-noche); }
        .stats-card:nth-child(3) h3 { color: var(--azul-accento); }
        .stats-card:nth-child(4) h3 { color: var(--azul-principal); }
        
        .stats-card:nth-child(1) { border-top-color: var(--azul-principal); }
        .stats-card:nth-child(2) { border-top-color: var(--azul-noche); }
        .stats-card:nth-child(3) { border-top-color: var(--azul-accento); }
        .stats-card:nth-child(4) { border-top-color: var(--azul-principal); }

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
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            color: var(--blanco);
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(109, 179, 233, 0.3);
            background: linear-gradient(135deg, var(--azul-principal), var(--azul-accento));
        }
        .btn-warning {
            background: linear-gradient(135deg, var(--azul-accento), #4A90E2);
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            color: var(--blanco);
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(109, 179, 233, 0.3);
            background: linear-gradient(135deg, #4A90E2, var(--azul-accento));
        }
        .btn-info {
            background: linear-gradient(135deg, var(--azul-principal), var(--azul-accento));
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            color: var(--blanco);
            transition: all 0.3s ease;
        }
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(26, 95, 160, 0.3);
            background: linear-gradient(135deg, var(--azul-accento), var(--azul-principal));
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
        .dashboard-title {
            color: var(--blanco);
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(15, 44, 76, 0.3);
            margin-bottom: 1.5rem;
        }
        .container {
            max-width: 1200px;
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
        .text-muted {
            color: #6c757d !important;
            font-weight: 500;
        }
        .navbar-nav .nav-link {
            color: var(--azul-accento) !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-globe-americas me-2"></i>WorldTime
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
        <h2 class="dashboard-title">
            <i class="fas fa-chart-line me-2"></i>Dashboard Administrativo
        </h2>
        
        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card stats-card">
                    <div class="card-body text-center">
                        <h3>{{ App\Models\Producto::count() }}</h3>
                        <p class="text-muted">Total Productos</p>
                        <i class="fas fa-box text-muted mt-2" style="font-size: 1.5rem;"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card stats-card">
                    <div class="card-body text-center">
                        <h3>${{ number_format(App\Models\Producto::sum('precio'), 2) }}</h3>
                        <p class="text-muted">Valor Total</p>
                        <i class="fas fa-dollar-sign text-muted mt-2" style="font-size: 1.5rem;"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card stats-card">
                    <div class="card-body text-center">
                        <h3>{{ App\Models\Producto::distinct('categoria')->count('categoria') }}</h3>
                        <p class="text-muted">Categorías</p>
                        <i class="fas fa-tags text-muted mt-2" style="font-size: 1.5rem;"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card stats-card">
                    <div class="card-body text-center">
                        <h3>{{ App\Models\Inventario::count() }}</h3>
                        <p class="text-muted">En Inventario</p>
                        <i class="fas fa-warehouse text-muted mt-2" style="font-size: 1.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Management Cards -->
        <div class="card mb-4">
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
                        <a href="#" class="btn btn-warning w-100">
                            <i class="fas fa-users me-2"></i>Gestión de Clientes
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="http://127.0.0.1:8000/reparaciones" class="btn btn-info w-100">
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