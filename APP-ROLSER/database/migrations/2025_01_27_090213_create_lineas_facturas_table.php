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
        Schema::create('lineas_facturas', function (Blueprint $table) {
            $table->id('idLineaFact');
            $table->integer('unidades');
            $table->decimal('importe', 10, 2);
            $table->decimal('total', 10, 2);
            $table->foreignId('id_factura')->references('id_factura')->on('facturas')->onDelete('cascade');
            $table->foreignId('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas_facturas');
    }
};
