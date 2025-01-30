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
        Schema::create('gestiones_almacenes', function (Blueprint $table) {

            $table->unsignedBigInteger('id_administrativo');
            $table->unsignedBigInteger('id_almacen');
            $table->primary('id_administrativo');

            $table->foreign('id_administrativo')->references('id_administrativo')->on('administrativos')->onDelete('cascade'); // Relación con USUARIO
            $table->foreign('id_almacen')->references('id_almacen')->on('almacenes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestiones_almacenes');
    }
};
