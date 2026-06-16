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
        Schema::create('oportunidades_venta', function (Blueprint $table) {
            $table->id('oportunidad_venta');
            $table->decimal('importe_estimado');
            $table->enum('posibilidad', ['Alta', 'Baja', 'Media']);
            $table->dateTime('fecha_cierre_prevista');
            $table->foreignId('id_interaccion')->nullable()->references('id_interaccion')->on('interacciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oportunidad_ventas');
    }
};
