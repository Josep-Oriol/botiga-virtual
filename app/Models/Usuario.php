<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authentication;

    /**
     * The Usuario model represents a user in the system.
     * It contains attributes such as username, name, surname, email, phone, address, password, user type, and active status.
     * It has a relationship with the Compra model to represent the purchases made by the user.
     */
class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'usuario_usuario',
        'nombre_usuario',
        'apellidos_usuario',
        'email',
        'telefono_usuario',
        'direccion_usuario',
        'password',
        'tipo_usuario',
        'activo_usuario'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'fk_id_usuario');
    }
}
