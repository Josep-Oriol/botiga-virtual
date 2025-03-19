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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_id_usuario')->unsigned();
            $table->string('nombre_direccion', 255);
            $table->string('direccion', 255);
            $table->string('codigoPostal', 255);
            $table->string('ciudad', 255);
            $table->string('provincia', 255);
            $table->string('pais', 255);
            $table->timestamps();

            $table->foreign('fk_id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
