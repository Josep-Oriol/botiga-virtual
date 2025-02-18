<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'usuario_comprador',
        'nombre_comprador',
        'apellidos_comprador',
        'email_comprador',
        'telefono_comprador',
        'direccion_comprador',
        'password_comprador'
    ];
}
