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
        Schema::create('detalles_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_compra');
            $table->unsignedBigInteger('fk_id_producto');
            $table->unsignedBigInteger('fk_id_usuario');
            $table->bigInteger('cantidad_producto_detalles');
            $table->decimal('precio_producto_detalles', 8, 2);
            $table->decimal('subtotal_detalles', 8, 2);
            $table->timestamps();

            $table->foreign('fk_id_compra')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('fk_id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('fk_id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_compras');
    }
};
