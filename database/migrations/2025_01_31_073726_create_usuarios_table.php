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
            $table->string('usuario_comprador', 255);
            $table->string('nombre_comprador', 255);
            $table->string('apellidos_comprador', 255)->nullable();
            $table->string('email_comprador', 255);
            $table->bigInteger('telefono_comprador')->nullable();
            $table->string('direccion_comprador', 255)->nullable();
            $table->string('password_comprador', 255);
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
