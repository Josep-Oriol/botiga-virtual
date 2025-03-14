<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = "carrito";

    protected $fillable = [
        'fk_id_usuario',
        'fk_id_producto',
        'cantidad',
        'precio',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_id_usuario');
    }

    public function producto()
    {
        return $this->belongsTo(Usuario::class, 'fk_id_producto');
    }
}
