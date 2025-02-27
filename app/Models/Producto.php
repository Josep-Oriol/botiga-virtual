<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'foto_portada_producto',
        'nombre_producto',
        'descripcion_producto',
        'codigo_producto',
        'fk_id_categoria',
        'fk_id_marca',
        'precio_producto',
        'stock_producto',
        'destacado_producto',
        'activo_producto'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_id_categoria');
    }

    public function caracteristicas()
    {
        return $this->belongsToMany(Caracteristica::class, 'caracteristicas_producto')
                    ->withPivot('valor');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'fk_id_marca');
    }

    /*public function fotos ()
    {
        return $this->hasMany(Foto::class, 'fk_id_producto');
    }*/
}
