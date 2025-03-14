<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

/**
 * The Usuario model represents a user in the system.
 * It contains attributes such as username, name, surname, email, phone, address, password, user type, and active status.
 * It has a relationship with the Compra model to represent the purchases made by the user.
 */
class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

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

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'fk_id_usuario');
    }
}
