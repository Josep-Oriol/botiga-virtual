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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('foto_portada_producto')->nullable();
            $table->string('nombre_producto');
            $table->text('descripcion_producto')->nullable();
            $table->string('codigo_producto')->unique();
            $table->unsignedBigInteger('fk_id_categoria')->nullable();
            $table->unsignedBigInteger('fk_id_marca')->nullable();
            $table->decimal('precio_producto', 8, 2);
            $table->bigInteger('stock_producto');
            $table->boolean('destacado_producto')->default(false);
            $table->boolean('activo_producto')->default(true);
            $table->timestamps();

            $table->foreign('fk_id_categoria')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('fk_id_marca')->references('id')->on('marcas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
