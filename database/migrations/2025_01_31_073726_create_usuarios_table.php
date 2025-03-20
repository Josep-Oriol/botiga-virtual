<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario_usuario', 255);
            $table->string('nombre_usuario', 255);
            $table->string('apellidos_usuario', 255)->nullable();
            $table->string('email', 255);
            $table->bigInteger('telefono_usuario')->nullable();
            $table->string('password', 255);
            $table->enum('tipo_usuario', ['admin', 'comprador'])->default('comprador');
            $table->boolean('activo_usuario')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
