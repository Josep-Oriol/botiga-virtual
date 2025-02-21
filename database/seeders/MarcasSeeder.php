<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcas')->insert([
            [
                'nombre_marca' => 'Intel',
                'descripcion_marca' => 'Fabricante de procesadores y componentes para computadoras.',
                'imagen_marca' => 'intel.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'AMD',
                'descripcion_marca' => 'Fabricante de procesadores y tarjetas gráficas Radeon.',
                'imagen_marca' => 'amd.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'NVIDIA',
                'descripcion_marca' => 'Líder en tarjetas gráficas y tecnologías de inteligencia artificial.',
                'imagen_marca' => 'nvidia.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'ASUS',
                'descripcion_marca' => 'Fabricante de motherboards, tarjetas gráficas y laptops gaming.',
                'imagen_marca' => 'asus.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'MSI',
                'descripcion_marca' => 'Especializado en gaming y hardware de alto rendimiento.',
                'imagen_marca' => 'msi.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'Gigabyte',
                'descripcion_marca' => 'Fabricante de motherboards, tarjetas gráficas y laptops.',
                'imagen_marca' => 'gigabyte.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'Corsair',
                'descripcion_marca' => 'Fabricante de memorias RAM, fuentes de poder y periféricos.',
                'imagen_marca' => 'corsair.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'Razer',
                'descripcion_marca' => 'Especializado en periféricos y accesorios gaming.',
                'imagen_marca' => 'razer.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'Logitech',
                'descripcion_marca' => 'Fabricante de teclados, mouse y otros periféricos.',
                'imagen_marca' => 'logitech.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'Seagate',
                'descripcion_marca' => 'Fabricante de discos duros y almacenamiento externo.',
                'imagen_marca' => 'seagate.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_marca' => 'Western Digital',
                'descripcion_marca' => 'Especialista en almacenamiento HDD y SSD.',
                'imagen_marca' => 'western_digital.png',
                'activo_marca' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
