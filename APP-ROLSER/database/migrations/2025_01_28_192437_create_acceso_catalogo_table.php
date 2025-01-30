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
        Schema::create('acceso_catalogo', function (Blueprint $table) {
            $table->unsignedBigInteger('id_comercial');
            $table->unsignedBigInteger('id_catalogo');
            $table->timestamps();

            // Clave primaria compuesta (muchos a muchos)
            $table->primary(['id_comercial', 'id_catalogo']);

            // Claves foráneas
            $table->foreign('id_comercial')->references('id_comercial')->on('comerciales')->onDelete('cascade');
            $table->foreign('id_catalogo')->references('id_catalogo')->on('catalogos')->onDelete('cascade');
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceso_catalogo');
    }
};
