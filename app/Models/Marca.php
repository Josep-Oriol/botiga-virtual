<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';

    protected $fillable = [
        'nombre_marca',
        'descripcion_marca',
        'imagen_marca',
        'activo_marca'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'fk_id_marca');
    }
}
