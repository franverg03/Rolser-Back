<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class ProductoSugerido extends Model
{
    use HasFactory;
    protected $table = 'productos_sugeridos';
    protected $primaryKey = 'id_producto_sugerido';

    protected $fillable = [
        'puntuacion_similitud',
        'id_cliente_no_vip',
        'id_cliente_vip'
    ];

    public function clienteNoVip()
    {
        return $this->belongsTo(ClienteNoVip::class, 'id_cliente_no_vip', 'id_cliente_no_vip');
    }

    public function clienteVip()
    {
        return $this->belongsTo(ClienteVip::class, 'id_cliente_vip', 'id_cliente_vip');
    }
}
