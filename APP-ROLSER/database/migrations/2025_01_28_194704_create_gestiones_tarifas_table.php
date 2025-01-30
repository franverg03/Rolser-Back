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
        Schema::create('gestiones_tarifas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_administrativo');
            $table->unsignedBigInteger('id_tarifa');
            $table->primary( 'id_tarifa');
            $table->foreign('id_administrativo')->references('id_administrativo')->on('administrativos')->onDelete('cascade');
            $table->foreign('id_tarifa')->references('id_tarifa')->on('tarifas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestiones_tarifas');
    }
};
