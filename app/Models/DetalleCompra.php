<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detalles_compras';

    protected $fillable = [
        'fk_id_compra',
        'fk_id_producto',
        'fk_id_usuario',
        'cantidad_producto_detalles',
        'precio_producto_detalles',
        'subtotal_detalles'
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'fk_id_compra');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'fk_id_producto');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_id_usuario');
    }
}
