<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //protected $table = 'usuarios';

    protected $fillable = [
        'usuario_usuario',
        'nombre_usuario',
        'apellidos_usuario',
        'email_usuario',
        'telefono_usuario',
        'direccion_usuario',
        'password_usuario',
        'tipo_usuario',
        'activo_usuario'
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'fk_id_usuario');
    }
}
