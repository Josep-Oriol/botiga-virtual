<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'usuario_usuario' => 'admin',
                'nombre_usuario' => 'a',
                'apellidos_usuario' => 'Pérez López',
                'email' => 'a@gmail.com',
                'telefono_usuario' => 5551234567,
                'password' => Hash::make('a'),
                'tipo_usuario' => 'admin',
                'activo_usuario' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_usuario' => 'maria99',
                'nombre_usuario' => 'María',
                'apellidos_usuario' => 'Gómez Rodríguez',
                'email' => 'maria.gomez@example.com',
                'telefono_usuario' => 5559876543,
                'password' => Hash::make('comprador99'),
                'tipo_usuario' => 'comprador',
                'activo_usuario' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_usuario' => 'pedroTech',
                'nombre_usuario' => 'Pedro',
                'apellidos_usuario' => 'Fernández Cruz',
                'email' => 'pedro.fernandez@example.com',
                'telefono_usuario' => 5551112233,
                'password' => Hash::make('techlover'),
                'tipo_usuario' => 'comprador',
                'activo_usuario' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_usuario' => 'sofiaAdmin',
                'nombre_usuario' => 'Sofía',
                'apellidos_usuario' => 'Martínez Díaz',
                'email' => 'sofia.martinez@example.com',
                'telefono_usuario' => 5552223344,
                'password' => Hash::make('adminsecure'),
                'tipo_usuario' => 'admin',
                'activo_usuario' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_usuario' => 'carlosPC',
                'nombre_usuario' => 'Carlos',
                'apellidos_usuario' => 'Hernández López',
                'email' => 'carlos.hernandez@example.com',
                'telefono_usuario' => 5553334455,
                'password' => Hash::make('password123'),
                'tipo_usuario' => 'comprador',
                'activo_usuario' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
