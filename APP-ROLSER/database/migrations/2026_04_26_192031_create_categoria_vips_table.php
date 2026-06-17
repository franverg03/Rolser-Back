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
        Schema::create('categoria_vips', function (Blueprint $table) {
            $table->id('id_categoria_vip');
            $table->string('nombre_categoria');
            $table->integer('descuento_aplicable');
            $table->string('beneficios_extra');
            $table->decimal('requisito_minimo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_vips');
    }
};
