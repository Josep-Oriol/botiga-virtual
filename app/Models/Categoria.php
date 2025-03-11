<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
        'nombre_categoria',
        'codigo_categoria',
        'descripcion_categoria',
        'imagen_categoria',
        'activo_categoria',
        'destacada_categoria'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'fk_id_categoria');
    }
}
