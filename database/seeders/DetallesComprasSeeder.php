<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetalleCompra;

class DetallesComprasSeeder extends Seeder
{
    public function run(): void
    {
        $detallesCompras = [
            [
                'fk_id_compra' => 1,
                'fk_id_producto' => 1,
                'cantidad_producto_detalles' => 2,
                'precio_producto_detalles' => 75.25,
                'subtotal_detalles' => 150.50,
            ],
            [
                'fk_id_compra' => 2,
                'fk_id_producto' => 2,
                'cantidad_producto_detalles' => 1,
                'precio_producto_detalles' => 299.99,
                'subtotal_detalles' => 299.99,
            ],
            [
                'fk_id_compra' => 3,
                'fk_id_producto' => 3,
                'cantidad_producto_detalles' => 1,
                'precio_producto_detalles' => 75.25,
                'subtotal_detalles' => 75.25,
            ],
            [
                'fk_id_compra' => 1,
                'fk_id_producto' => 4,
                'cantidad_producto_detalles' => 3,
                'precio_producto_detalles' => 25.99,
                'subtotal_detalles' => 77.97,
            ],
        ];

        foreach ($detallesCompras as $detalle) {
            DetalleCompra::create($detalle);
        }
    }
}
