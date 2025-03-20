<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('direcciones')->insert([
            [   
                'fk_id_usuario' => 1,
                'nombre_direccion' => 'Casa',
                'direccion' => 'Calle a Casa',
                'codigoPostal' => '12345',
                'ciudad' => 'Madrid',
                'provincia' => 'Madrid',
                'pais' => 'España',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   
                'fk_id_usuario' => 1,
                'nombre_direccion' => 'Trabajo',
                'direccion' => 'Calle a Trabajo',
                'codigoPostal' => '23465',
                'ciudad' => 'Barcelona',
                'provincia' => 'Barcelona',
                'pais' => 'España',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   
                'fk_id_usuario' => 2,
                'nombre_direccion' => 'Comida',
                'direccion' => 'Calle a Comida',
                'codigoPostal' => '67843',
                'ciudad' => 'Tarragona',
                'provincia' => 'Tarragona',
                'pais' => 'España',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
