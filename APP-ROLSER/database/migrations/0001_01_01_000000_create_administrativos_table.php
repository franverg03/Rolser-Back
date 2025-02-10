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
        Schema::create('administrativos', function (Blueprint $table) {
            $table->id('id_administrativo');
            $table->string('administrativo_nombre', 100);
            $table->string('administrativo_apellidos', 100);
            $table->string('administrativo_dni', '9')->unique();
            $table->string('administrativo_direccion', 100);
            $table->string('administrativo_cp', 5);
            $table->string('administrativo_telefono', 9);
            $table->string('administrativo_email', 100)->unique();
            $table->string('administrativo_departamento', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrativos');
    }


};
