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
        Schema::create('lineas_pedidos', function (Blueprint $table) {
            $table->id('id_linea_pedido');
            $table->integer('linea_cantidad');
            $table->decimal('linea_precio_total', 10, 2);
            // $table->unsignedBigInteger('id_pedido');
            // $table->unsignedBigInteger('id_producto');
            $table->foreignId('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreignId('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas_pedidos');
    }
};
