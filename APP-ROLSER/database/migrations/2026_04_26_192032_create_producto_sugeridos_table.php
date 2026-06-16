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
        Schema::create('productos_sugeridos', function (Blueprint $table) {
            $table->id('id_producto_sugerido');
            $table->integer('puntuacion_similitud');
            $table->foreignId('id_cliente_no_vip')->nullable()->references('id_cliente_no_vip')->on('clientes_no_vip');
            $table->foreignId('id_cliente_vip')->nullable()->references('id_cliente_vip')->on('clientes_vip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_sugeridos');
    }
};
