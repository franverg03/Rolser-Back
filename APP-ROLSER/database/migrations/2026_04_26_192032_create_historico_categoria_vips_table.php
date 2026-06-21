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
        Schema::create('historico_categoria_vips', function (Blueprint $table) {
            $table->id('id_historico_categoria_vip');
            $table->date('fecha_cambio');
            $table->string('motivo_cambio');
            $table->unsignedBigInteger('id_categoria_vip');
            $table->unsignedBigInteger('id_cliente_vip');
            $table->foreign('id_categoria_vip')->references('id_categoria_vip')->on('categoria_vips')->onDelete('restrict');
            $table->foreign('id_cliente_vip')->references('id_cliente_vip')->on('clientes_vip')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_categoria_vips');
    }
};
