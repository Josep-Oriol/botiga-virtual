<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre_producto' => 'Intel Core i9-13900K',
                'descripcion_producto' => 'Procesador de 24 núcleos y 32 hilos con frecuencia turbo de hasta 5.8 GHz.',
                'codigo_producto' => 'CPU001',
                'fk_id_categoria' => 1, // Procesadores
                'precio_producto' => 649.99,
                'stock_producto' => 20,
                'destacado_producto' => true,
                'foto_portada_producto' => 'intel_i9.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_producto' => 'NVIDIA GeForce RTX 4090',
                'descripcion_producto' => 'Tarjeta gráfica de última generación con 24 GB de memoria GDDR6X.',
                'codigo_producto' => 'GPU002',
                'fk_id_categoria' => 2, // Tarjetas Gráficas
                'precio_producto' => 1599.99,
                'stock_producto' => 10,
                'destacado_producto' => true,
                'foto_portada_producto' => 'rtx_4090.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_producto' => 'Corsair Vengeance LPX 32GB (2x16GB) DDR4',
                'descripcion_producto' => 'Kit de memoria RAM DDR4 de alto rendimiento con velocidad de 3200 MHz.',
                'codigo_producto' => 'RAM003',
                'fk_id_categoria' => 3, // Memorias RAM
                'precio_producto' => 149.99,
                'stock_producto' => 50,
                'destacado_producto' => false,
                'foto_portada_producto' => 'corsair_ram.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_producto' => 'Samsung 970 EVO Plus 1TB NVMe M.2',
                'descripcion_producto' => 'Unidad de estado sólido NVMe M.2 con velocidades de lectura de hasta 3500 MB/s.',
                'codigo_producto' => 'SSD004',
                'fk_id_categoria' => 4, // Almacenamiento SSD
                'precio_producto' => 129.99,
                'stock_producto' => 30,
                'destacado_producto' => true,
                'foto_portada_producto' => 'samsung_970.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_producto' => 'ASUS ROG Strix Z790-E Gaming WiFi',
                'descripcion_producto' => 'Placa base ATX compatible con procesadores Intel de 13ª generación.',
                'codigo_producto' => 'MB005',
                'fk_id_categoria' => 5, // Placas Base
                'precio_producto' => 499.99,
                'stock_producto' => 15,
                'destacado_producto' => false,
                'foto_portada_producto' => 'asus_z790.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
