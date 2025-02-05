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
        Schema::create('productos_fotos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_producto');
            $table->string('url_foto');
            $table->text('descripcion_foto');
            $table->integer('orden_foto');
            $table->timestamps();

            $table->foreign('fk_id_producto')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_fotos');
    }
};
