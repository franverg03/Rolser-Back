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
        Schema::create('gestiones_descuentos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_administrativo');
            $table->unsignedBigInteger('id_descuento');
            $table->primary( 'id_descuento');
            $table->foreign('id_administrativo')->references('id_administrativo')->on('administrativos')->onDelete('cascade');
            $table->foreign('id_descuento')->references('id_descuento')->on('descuentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestiones_descuentos');
    }
};
