<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compra;
use Carbon\Carbon;

class ComprasSeeder extends Seeder
{
    public function run(): void
    {
        $compras = [
            [
                'fk_id_usuario' => 1,
                'fecha_compra' => Carbon::now(),
                'fecha_envio_compra' => Carbon::now()->addDays(3),
                'total_compra' => 150.50,
                'estado_compra' => 'completa',
            ],
            [
                'fk_id_usuario' => 2,
                'fecha_compra' => Carbon::now()->subDays(5),
                'fecha_envio_compra' => Carbon::now()->subDays(2),
                'total_compra' => 299.99,
                'estado_compra' => 'progreso',
            ],
            [
                'fk_id_usuario' => 1,
                'fecha_compra' => Carbon::now()->subDays(10),
                'fecha_envio_compra' => Carbon::now()->subDays(7),
                'total_compra' => 75.25,
                'estado_compra' => 'completa',
            ],
        ];

        foreach ($compras as $compra) {
            Compra::create($compra);
        }
    }
}
