<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo DetalleVenta
 * 
 * Este modelo representa el detalle de una venta en el sistema.
 * Cada detalle contiene información sobre un producto específico vendido,
 * incluyendo la cantidad, precio unitario y subtotal.
 */
class DetalleVenta extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'detalle_ventas';
    
    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    /**
     * Obtiene la venta a la que pertenece este detalle
     */
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    /**
     * Obtiene el producto asociado a este detalle
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
} 