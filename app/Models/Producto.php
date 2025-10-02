<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria',
        'marca',
        'modelo',
        'codigo_barras',
        'stock_minimo',
        'activo'
    ];

    /**
     * Scope para productos activos
     */
    public function scopeActivo($query)
    {
        return $query->where('activo', true);
    }
}