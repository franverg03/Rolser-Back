<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    use HasFactory;

    protected $table = 'lineas_pedidos';
    protected $primaryKey = 'id_linea_pedido';
    public $timestamps = true;

    protected $fillable = [
        'linea_cantidad',
        'linea_precio_total',
        'id_pedido',
        'id_producto'
    ];

    public function pedido() {
        return $this->belongsTo(Pedido::class);
    }

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}
