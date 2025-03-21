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
        'id_almacen',
        'producto_ruta_imagen',
    ];
    public function catalogos()
    {
        return $this->belongsToMany(Catalogo::class);
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'id_almacen');
    }

    public function lineasDePedidos()
    {
        return $this->hasMany(LineaPedido::class, 'id_producto');
    }


}
