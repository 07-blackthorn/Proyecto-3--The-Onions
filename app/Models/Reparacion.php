<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;

    // Especificar explícitamente el nombre de la tabla
    protected $table = 'reparaciones';

    protected $fillable = [
        'cliente_nombre',
        'cliente_telefono',
        'cliente_email',
        'dispositivo',
        'marca',
        'modelo',
        'problema',
        'estado',
        'costo_estimado',
        'notas',
        'fecha_ingreso',
        'fecha_entrega_estimada'
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'fecha_entrega_estimada' => 'date',
        'costo_estimado' => 'decimal:2'
    ];

    public static function getEstados()
    {
        return [
            'recibido' => 'Recibido',
            'en_proceso' => 'En Proceso',
            'completado' => 'Completado',
            'entregado' => 'Entregado'
        ];
    }
}