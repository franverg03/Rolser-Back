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
        Schema::create('interacciones', function (Blueprint $table) {
            $table->id('id_interaccion');
            $table->dateTime('fecha_interaccion');
            $table->string('medio_contacto');
            $table->text('resumen_contacto')->nullable();
            $table->enum('resultado', ['positivo', 'seguimiento', 'sin_interes']);
            $table->foreignId('id_comercial')->references('id_comercial')->on('comerciales');
            $table->foreignId('id_cliente_vip')->nullable()->references('id_cliente_vip')->on('clientes_vip');
            $table->foreignId('id_cliente_no_vip')->nullable()->references('id_cliente_no_vip')->on('clientes_no_vip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interacciones');
    }
};
