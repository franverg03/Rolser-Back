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
        Schema::create('catalogos_de_productos', function (Blueprint $table) {
            $table->primary('id_catalogo');
            $table->foreignId('id_catalogo')->references('id_catalogo')->on('catalogos')->onDelete('cascade');
            $table->foreignId('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogos_de_productos');
    }
};
