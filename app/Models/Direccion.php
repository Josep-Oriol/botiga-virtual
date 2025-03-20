<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'direcciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_id_usuario',
        'nombre_direccion',
        'direccion',
        'codigoPostal',
        'ciudad',
        'provincia',
        'pais',
    ];

    /**
     * Get the user that owns the address.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_id_usuario');
    }
}
