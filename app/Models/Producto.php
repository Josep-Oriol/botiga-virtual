<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre_producto', 'descripcion_producto', 'codigo_producto', 'fk_id_categoroia', 'precio_producto', 'stock_producto', 'detacado_producto', 'foto_portada_producto'];

    
}
