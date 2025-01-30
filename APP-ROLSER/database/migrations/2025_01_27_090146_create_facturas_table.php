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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');
            $table->decimal('factura_importe_total', 10, 2);
            // $table->unsignedBigInteger('id_pedido');
            // $table->unsignedBigInteger('id_cliente_no_vip')->nullable();
            // $table->unsignedBigInteger('id_cliente_vip')->nullable();
            // $table->unsignedBigInteger('id_comercial');
            $table->foreignId('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreignId('id_cliente_no_vip')->nullable()->references('id_cliente_no_vip')->on('clientes_no_vip')->onDelete('set null');
            $table->foreignId('id_cliente_vip')->nullable()->references('id_cliente_vip')->on('clientes_vip')->onDelete('set null');
            $table->foreignId('id_comercial')->nullable()->references('id_comercial')->on('comerciales')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
