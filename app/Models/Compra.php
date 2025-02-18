<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $fillable = [
        'fk_id_usuario',
        'fecha_compra',
        'fecha_envio_compra',
        'total_compra',
        'estado_compra'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_id_usuario');
    }
}