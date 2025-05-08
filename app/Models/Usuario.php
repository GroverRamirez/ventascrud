<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    
    protected $fillable = [
        'nombre',
        'usuario',
        'email',
        'contraseña',
    ];

    protected $hidden = [
        'contraseña',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
} 