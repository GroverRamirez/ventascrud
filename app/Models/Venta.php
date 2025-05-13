<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Venta
 * 
 * Este modelo representa una venta en el sistema.
 * Cada venta tiene un cliente, un usuario (vendedor) y un total.
 * También tiene una relación con los detalles de la venta.
 */
class Venta extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'ventas';
    
    protected $fillable = [
        'cliente_nombre',
        'usuario_id',
        'total',
    ];

    /**
     * Obtiene el usuario (vendedor) asociado a la venta
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    /**
     * Obtiene los detalles de la venta
     */
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
} 