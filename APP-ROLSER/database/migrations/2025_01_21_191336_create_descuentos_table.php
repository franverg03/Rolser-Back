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
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id('id_descuento');
            $table->string('descripcion_descuento', 255);
            $table->string('porcentaje_descuento', 5);
            $table->date('fechaInicio_descuento');
            $table->date('fechaFin_descuento');
            // $table->unsignedBigInteger('id_cliente_vip')->nullable();
            // $table->unsignedBigInteger('id_cliente_no_vip')->nullable();
            $table->foreignId('id_cliente_vip')->nullable()->references('id_cliente_vip')->on('clientes_vip')->onDelete('set null');

            $table->foreignId('id_cliente_no_vip')->nullable()->references('id_cliente_no_vip')->on('clientes_no_vip')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descuentos');
    }
};
