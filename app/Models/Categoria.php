<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo Categoria
 * 
 * Este modelo representa una categoría de productos en el sistema.
 * Una categoría puede tener muchos productos asociados.
 */
class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_registro',
        'actualizar_registro'
    ];

    /**
     * Obtiene los productos asociados a esta categoría.
     */
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
} 