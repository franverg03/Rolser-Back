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
        Schema::create('comerciales', function (Blueprint $table) {
            $table->id('id_comercial');
            $table->string('comercial_nombre', 100);
            $table->string('comercial_apellidos', 100);
            $table->string('comercial_dni', '9')->unique();
            $table->string('comercial_direccion', 100);
            $table->string('comercial_cp', 5);
            $table->string('comercial_telefono', 9);
            $table->string('comercial_email', 100);
            $table->string('comercial_zona', 100);
            $table->foreignId('id_usuario')->references('id_usuario')->on('users')->onDelete('cascade');//Relacion 1-1 con Administrativo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comerciales');
    }
};
