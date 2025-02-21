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
                'email_usuario' => 'a@gmail.com',
                'telefono_usuario' => 5551234567,
                'direccion_usuario' => 'Calle Falsa 123, CDMX',
                'password_usuario' => Hash::make('a'),
                'tipo_usuario' => 'admin',
                'activo_usuario' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_usuario' => 'maria99',
                'nombre_usuario' => 'María',
                'apellidos_usuario' => 'Gómez Rodríguez',
                'email_usuario' => 'maria.gomez@example.com',
                'telefono_usuario' => 5559876543,
                'direccion_usuario' => 'Av. Reforma 456, CDMX',
                'password_usuario' => Hash::make('comprador99'),
                'tipo_usuario' => 'comprador',
                'activo_usuario' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_usuario' => 'pedroTech',
                'nombre_usuario' => 'Pedro',
                'apellidos_usuario' => 'Fernández Cruz',
                'email_usuario' => 'pedro.fernandez@example.com',
                'telefono_usuario' => 5551112233,
                'direccion_usuario' => 'Col. Centro 789, Monterrey',
                'password_usuario' => Hash::make('techlover'),
                'tipo_usuario' => 'comprador',
                'activo_usuario' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_usuario' => 'sofiaAdmin',
                'nombre_usuario' => 'Sofía',
                'apellidos_usuario' => 'Martínez Díaz',
                'email_usuario' => 'sofia.martinez@example.com',
                'telefono_usuario' => 5552223344,
                'direccion_usuario' => 'Calle 7, Guadalajara',
                'password_usuario' => Hash::make('adminsecure'),
                'tipo_usuario' => 'admin',
                'activo_usuario' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_usuario' => 'carlosPC',
                'nombre_usuario' => 'Carlos',
                'apellidos_usuario' => 'Hernández López',
                'email_usuario' => 'carlos.hernandez@example.com',
                'telefono_usuario' => 5553334455,
                'direccion_usuario' => 'Zona Norte 101, Mérida',
                'password_usuario' => Hash::make('password123'),
                'tipo_usuario' => 'comprador',
                'activo_usuario' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
