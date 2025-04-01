<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = 'cupones';

    protected $fillable = [
        'codigo_cupon',
        'descuento_cupon',
        'fecha_inicio_cupon',
        'fecha_fin_cupon',
        'activo_cupon'
    ];
}
