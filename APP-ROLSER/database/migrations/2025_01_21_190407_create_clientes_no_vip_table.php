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
        Schema::create('clientes_no_vip', function (Blueprint $table) {
            $table->id('id_cliente_no_vip');
            $table->string('cliente_empresa', 100);
            $table->string('cliente_nif', 20);
            $table->string('cliente_nombre_representante', 100);
            $table->string('cliente_apellidos_representante', 100);
            $table->string('cliente_telefono_representante', 9);
            $table->string('cliente_direccion_empresa', 200);
            $table->string('cliente_cuenta_bancaria', 50);
            // $table->unsignedBigInteger('id_usuario');
            // $table->unsignedBigInteger('id_comercial');
            $table->foreignId('id_usuario')->references('id_usuario')->on('users')->onDelete('cascade');
            $table->foreignId('id_comercial')->nullable()->references('id_comercial')->on('comerciales')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes_no_vip');
    }
};
