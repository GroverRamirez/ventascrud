<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo Producto
 * 
 * Este modelo representa un producto en el sistema.
 * Cada producto pertenece a una categoría.
 */
class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'identificador',
        'descripcion',
        'precio',
        'stock',
        'categoria_id',
        'estado'
    ];

    /**
     * Obtiene la categoría a la que pertenece el producto.
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
