<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventario';

    protected $fillable = [
        'producto_id',
        'cantidad_disponible', // ✅ Usar el nombre correcto que existe
        'stock_minimo',
        'modelo',
        'notas'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    /**
     * Accesor para compatibilidad - usar cantidad en lugar de cantidad_disponible
     */
    public function getCantidadAttribute()
    {
        return $this->cantidad_disponible;
    }

    public function setCantidadAttribute($value)
    {
        $this->attributes['cantidad_disponible'] = $value;
    }
}