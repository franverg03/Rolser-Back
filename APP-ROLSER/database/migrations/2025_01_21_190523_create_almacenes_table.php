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
        Schema::create('almacenes', function (Blueprint $table) {
            $table->id('id_almacen');
            $table->string('almacen_nombre', 100);
            $table->string('almacen_ubicacion', 200);
            $table->integer('almacen_capacidad');
            $table->string('almacen_localidad', 100);
            $table->string('almacen_codigo_postal', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacenes');
    }
};
