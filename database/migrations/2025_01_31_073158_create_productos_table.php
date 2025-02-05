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
            $table->string('nombre_producto');
            $table->text('descripcion_producto');
            $table->string('codigo_producto');
            $table->unsignedBigInteger('fk_id_categoria');
            $table->decimal('precio_producto', 8, 2);
            $table->bigInteger('stock_producto');
            $table->boolean('destacado_producto');
            $table->string('foto_portada_producto');
            $table->timestamps();


            $table->foreign('fk_id_categoria')->references('id')->on('categorias')->onDelete('cascade');
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
