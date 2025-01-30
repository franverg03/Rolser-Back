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
        Schema::create('catalogos_asignados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cliente_vip');
            $table->unsignedBigInteger('id_catalogo');

            $table->primary('id_cliente_vip');
            $table->foreign('id_cliente_vip')->references('id_cliente_vip')->on('clientes_vip')->onDelete('cascade');
            $table->foreign('id_catalogo')->references('id_catalogo')->on('catalogos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogos_asignados');
    }
};
