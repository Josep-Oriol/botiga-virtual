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
        Schema::create('caracteristicas_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_producto')->nullable();
            $table->unsignedBigInteger('fk_id_caracteristica')->nullable();
            $table->timestamps();

            $table->foreign('fk_id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('fk_id_caracteristica')->references('id')->on('caracteristicas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caracteristicas_productos');
    }
};
