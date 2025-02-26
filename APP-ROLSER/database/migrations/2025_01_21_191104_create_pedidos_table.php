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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->string('pedido_estado', 50);
            $table->date('fecha_creacion');
            $table->string('codigo_Pedido');
            $table->decimal('total_Pedido');
            $table->foreignId('id_cliente_vip')->nullable()->references('id_cliente_vip')->on('clientes_vip')->onDelete('cascade');//Relacion 1-M con CLiente_VIP
            $table->foreignId('id_cliente_no_vip')->nullable()->references('id_cliente_no_vip')->on('clientes_no_vip')->onDelete('cascade');//Relacion 1-M con CLiente_NO_VIP
            $table->foreignId('id_comercial')->nullable()->references('id_comercial')->on('comerciales')->onDelete('cascade');//Relacion 1-M con Comercial
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
