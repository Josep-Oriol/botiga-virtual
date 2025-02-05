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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_comprador');
            $table->date('fecha_compra');
            $table->date('fecha_envio_compra');
            $table->decimal('total_compra', 8, 2);
            $table->enum('estado_compra', ['progreso', 'completa', 'incompleta']);
            
            $table->foreign('fk_id_comprador')->references('id')->on('compradores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
