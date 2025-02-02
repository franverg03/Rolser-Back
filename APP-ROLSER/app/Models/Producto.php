<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = true;

    protected $fillable = [
        'producto_nombre',
        'producto_descripcion',
        'producto_tipo',
        'producto_numero_lote',
        'producto_codigo',
        'producto_precio',
        'producto_stock',
        'producto_colores',
        'id_almacen'
    ];

    // Relación con Almacen (1-M, opcional)
    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'id_almacen', 'id_almacen');
    }
}
