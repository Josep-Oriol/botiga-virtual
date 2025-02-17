<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre_categoria' => 'Procesadores',
                'codigo_categoria' => 'CPU001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_categoria' => 'Tarjetas Gráficas',
                'codigo_categoria' => 'GPU002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_categoria' => 'Memorias RAM',
                'codigo_categoria' => 'RAM003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_categoria' => 'Almacenamiento SSD',
                'codigo_categoria' => 'SSD004',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_categoria' => 'Placas Base',
                'codigo_categoria' => 'MB005',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
