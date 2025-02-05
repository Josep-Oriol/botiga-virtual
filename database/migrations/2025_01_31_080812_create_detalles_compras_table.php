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
            $table->bigInteger('cantidad_detalles');
            $table->decimal('precio_detalles', 8, 2);
            $table->decimal('subtotal', 8, 2);
            $table->timestamps();

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
