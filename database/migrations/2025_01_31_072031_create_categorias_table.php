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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_categoria');
            $table->string('codigo_categoria');
            $table->boolean('activo_categoria')->default(true);
            $table->string('descripcion_categoria')->nullable();
            $table->string('imagen_categoria')->nullable();
            $table->boolean('destacada_categoria')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
