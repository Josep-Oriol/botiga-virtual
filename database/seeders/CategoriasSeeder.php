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
                'activo_categoria' => true,
                'descripcion_categoria' => 'Procesadores de última generación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_categoria' => 'Tarjetas Gráficas',
                'codigo_categoria' => 'GPU002',
                'activo_categoria' => true,
                'descripcion_categoria' => 'Tarjetas gráficas de última generación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_categoria' => 'Memorias RAM',
                'codigo_categoria' => 'RAM003',
                'activo_categoria' => true,
                'descripcion_categoria' => 'Memorias RAM de última generación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_categoria' => 'Almacenamiento SSD',
                'codigo_categoria' => 'SSD004',
                'activo_categoria' => true,
                'descripcion_categoria' => 'Almacenamiento SSD de última generación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_categoria' => 'Placas Base',
                'codigo_categoria' => 'MB005',
                'activo_categoria' => true,
                'descripcion_categoria' => 'Placas base de última generación',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
