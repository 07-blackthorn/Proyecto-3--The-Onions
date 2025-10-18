<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento de Reparaciones - WorldTime</title>
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
        .navbar { background: var(--azul-noche) !important; box-shadow: 0 2px 15px rgba(15, 44, 76, 0.4); }
        .navbar-brand { font-weight: 700; font-size: 1.5rem; color: var(--blanco) !important; }
        .btn-primary { background: linear-gradient(135deg, var(--azul-principal), var(--azul-noche)); border: none; border-radius: 10px; padding: 10px 20px; font-weight: 600; color: var(--blanco); transition: all 0.3s ease; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(26, 95, 160, 0.3); background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal)); }
        .btn-info, .btn-warning, .btn-danger, .btn-secondary { border-radius: 6px; font-weight: 600; transition: all 0.3s ease; }
        .btn-info { background: linear-gradient(135deg, var(--azul-accento), var(--azul-principal)); color: var(--blanco); }
        .btn-warning { background: linear-gradient(135deg, var(--azul-accento), #4A90E2); color: var(--blanco); }
        .btn-danger { background: linear-gradient(135deg, #dc3545, #e74c3c); color: var(--blanco); }
        .btn-secondary { background: #6c757d; color: var(--blanco); }
        .estado-badge { padding: 0.5em 1em; border-radius: 20px; font-weight: 600; font-size: 0.85em; color: var(--blanco); }
        .estado-recibido { background: linear-gradient(135deg, var(--azul-accento), var(--azul-principal)); }
        .estado-en_proceso { background: linear-gradient(135deg, #4A90E2, #1A5FA0); }
        .estado-completado { background: linear-gradient(135deg, #28a745, #20c997); }
        .estado-entregado { background: linear-gradient(135deg, #6c757d, #495057); }
        .table { border-radius: 12px; overflow: hidden; background: var(--blanco); }
        .table th { background: linear-gradient(135deg, var(--azul-noche), var(--azul-principal)); color: var(--blanco); border: none; padding: 1rem; font-weight: 600; }
        .table td { vertical-align: middle; padding: 1rem; color: var(--azul-noche); border-color: #e9ecef; }
        .table tbody tr:hover { background-color: rgba(109, 179, 233, 0.1); transform: translateX(5px); }
        .logout-btn, .back-btn { border-radius: 8px; padding: 8px 20px; font-weight: 600; transition: all 0.3s ease; text-decoration: none; display: inline-flex; align-items: center; }
        .logout-btn { background: transparent; border: 2px solid var(--azul-accento); color: var(--azul-accento); }
        .logout-btn:hover { background: var(--azul-accento); color: var(--azul-noche); transform: translateY(-1px); }
        .back-btn { background: transparent; border: 2px solid var(--azul-accento); color: var(--azul-accento); margin-right: 1rem; }
        .back-btn:hover { background: var(--azul-accento); color: var(--azul-noche); text-decoration: none; transform: translateY(-1px); }
        .page-title { color: var(--blanco); font-weight: 700; margin-bottom: 1.5rem; text-shadow: 0 2px 4px rgba(15, 44, 76, 0.3); }
        .stats-card { background: var(--blanco); border-radius: 12px; padding: 1.5rem; text-align: center; box-shadow: 0 4px 15px rgba(15, 44, 76, 0.1); transition: all 0.3s ease; border-top: 4px solid; height: 100%; }
        .stats-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(15, 44, 76, 0.15); }
        .stats-card:nth-child(1) { border-top-color: var(--azul-accento); }
        .stats-card:nth-child(2) { border-top-color: var(--azul-principal); }
        .stats-card:nth-child(3) { border-top-color: #28a745; }
        .stats-card:nth-child(4) { border-top-color: #6c757d; }
        .stats-card h4 { font-weight: 700; margin-bottom: 0.5rem; }
        .stats-card:nth-child(1) h4 { color: var(--azul-accento); }
        .stats-card:nth-child(2) h4 { color: var(--azul-principal); }
        .stats-card:nth-child(3) h4 { color: #28a745; }
        .stats-card:nth-child(4) h4 { color: #6c757d; }
        .alert-success { background: linear-gradient(135deg, var(--azul-accento), var(--azul-principal)); color: var(--blanco); border: none; border-radius: 12px; padding: 1rem; }
        .empty-state { text-align: center; padding: 3rem; color: var(--azul-noche); }
        .empty-state i { font-size: 4rem; margin-bottom: 1rem; color: var(--azul-accento); }
        .text-success { color: var(--azul-principal) !important; font-weight: 600; }
        .btn-group .btn { margin: 0 2px; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">
                <i class="fas fa-globe-americas me-2"></i>WorldTime
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ url('/dashboard') }}" class="back-btn">
                    <i class="fas fa-arrow-left me-2"></i>Volver al Dashboard
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title">
                <i class="fas fa-tools me-2"></i>Seguimiento de Reparaciones
            </h1>
            <a href="{{ route('reparaciones.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Nueva Reparación
            </a>
        </div>

        <!-- Mensajes de éxito -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Estadísticas rápidas -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <h4>{{ $reparaciones->where('estado', 'recibido')->count() }}</h4>
                    <p class="mb-0 text-muted">Recibidas</p>
                    <i class="fas fa-inbox text-muted mt-2"></i>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <h4>{{ $reparaciones->where('estado', 'en_proceso')->count() }}</h4>
                    <p class="mb-0 text-muted">En Proceso</p>
                    <i class="fas fa-cogs text-muted mt-2"></i>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <h4>{{ $reparaciones->where('estado', 'completado')->count() }}</h4>
                    <p class="mb-0 text-muted">Completadas</p>
                    <i class="fas fa-check text-muted mt-2"></i>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <h4>{{ $reparaciones->where('estado', 'entregado')->count() }}</h4>
                    <p class="mb-0 text-muted">Entregadas</p>
                    <i class="fas fa-box text-muted mt-2"></i>
                </div>
            </div>
        </div>

        <!-- Tabla de reparaciones -->
        <div class="card">
            <div class="card-body">
                @if($reparaciones->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Dispositivo</th>
                                    <th>Problema</th>
                                    <th>Estado</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Costo Estimado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reparaciones as $reparacion)
                                <tr>
                                    <td><strong>#{{ $reparacion->id }}</strong></td>
                                    <td>
                                        <div>
                                            <strong>{{ $reparacion->cliente_nombre }}</strong>
                                            @if($reparacion->cliente_telefono)
                                                <br><small class="text-muted">{{ $reparacion->cliente_telefono }}</small>
                                            @endif
                                            @if($reparacion->cliente_email)
                                                <br><small class="text-muted">{{ $reparacion->cliente_email }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $reparacion->dispositivo }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $reparacion->marca }} {{ $reparacion->modelo }}</small>
                                    </td>
                                    <td>
                                        <span title="{{ $reparacion->problema }}">
                                            {{ \Illuminate\Support\Str::limit($reparacion->problema, 50) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="estado-badge estado-{{ $reparacion->estado }}">
                                            @switch($reparacion->estado)
                                                @case('recibido')
                                                    <i class="fas fa-inbox me-1"></i>
                                                    @break
                                                @case('en_proceso')
                                                    <i class="fas fa-cogs me-1"></i>
                                                    @break
                                                @case('completado')
                                                    <i class="fas fa-check me-1"></i>
                                                    @break
                                                @case('entregado')
                                                    <i class="fas fa-box me-1"></i>
                                                    @break
                                            @endswitch
                                            {{ ucfirst(str_replace('_', ' ', $reparacion->estado)) }}
                                        </span>
                                    </td>
                                    <td>{{ $reparacion->fecha_ingreso->format('d/m/Y') }}</td>
                                    <td>
                                        @if($reparacion->costo_estimado)
                                            <span class="fw-bold text-success">${{ number_format($reparacion->costo_estimado, 2) }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- Ver detalles -->
                                            <a href="{{ route('reparaciones.show', $reparacion) }}" 
                                               class="btn btn-sm btn-info" 
                                               title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Editar -->
                                            <a href="{{ route('reparaciones.edit', $reparacion) }}" 
                                               class="btn btn-sm btn-warning" 
                                               title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Alerta de Retraso -->
                                            <form action="{{ route('reparaciones.alerta', $reparacion) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Enviar alerta de retraso al cliente?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-secondary" title="Alerta de Retraso">
                                                    <i class="fas fa-exclamation-triangle me-1"></i> Retraso
                                                </button>
                                            </form>

                                            <!-- Eliminar -->
                                            <form action="{{ route('reparaciones.destroy', $reparacion) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta reparación?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
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
                        <i class="fas fa-tools"></i>
                        <h4>No hay reparaciones registradas</h4>
                        <p>Haz clic en el botón "Nueva Reparación" para agregar tu primer registro.</p>
                        <a href="{{ route('reparaciones.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus me-2"></i>Agregar primera reparación
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
