<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alerta de Retraso</title>
</head>
<body>
    <p>Estimado/a {{ $reparacion->cliente_nombre }},</p>

    <p>Queremos informarle que la reparación de su {{ $reparacion->dispositivo }} 
       (modelo: {{ $reparacion->modelo }}) ha tenido un <strong>retraso</strong>.</p>

    <p>Fecha de ingreso: {{ $reparacion->fecha_ingreso->format('d/m/Y') }}</p>
    @if($reparacion->fecha_entrega_estimada)
        <p>Fecha estimada de entrega: {{ $reparacion->fecha_entrega_estimada->format('d/m/Y') }}</p>
    @endif

    <p>Estamos trabajando para completar su reparación lo antes posible. 
       Gracias por su paciencia.</p>

    <p>Atentamente,</p>
    <p><strong>Equipo WorldTime</strong></p>
</body>
</html>
