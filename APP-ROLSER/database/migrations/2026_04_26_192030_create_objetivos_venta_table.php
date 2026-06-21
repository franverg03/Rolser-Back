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
        Schema::create('objetivos_venta', function (Blueprint $table) {
            $table->id('id_objetivo_venta');
            $table->enum('tipo_objetivo', ['Captacion', 'Volumen Ventas', 'Producto especifico']);
            $table->string('descripcion_objetivo');
            $table->decimal('valor_meta');
            $table->decimal('valor_actual')->nullable();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->boolean('completado')->default(false);
            $table->foreignId('id_comercial')->references('id_comercial')->on('comerciales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objetivos_venta');
    }
};
