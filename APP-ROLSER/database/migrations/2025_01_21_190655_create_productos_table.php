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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('producto_nombre', 100);
            $table->text('producto_descripcion');
            $table->string('producto_tipo', 50);
            $table->string('producto_numero_lote', 50)->index();
            $table->string('producto_codigo', 50)->unique();
            $table->decimal('producto_precio', 10, 2);
            $table->integer('producto_stock');
            $table->text('producto_colores');
            $table->string('producto_ruta_imagen', 255);
            $table->foreignId('id_almacen')->nullable()->references('id_almacen')->on('almacenes')->onDelete('set null');//Relacion  1-M con Almacen
            $table->timestamps();
            $table->string('producto_ruta_imagen', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
