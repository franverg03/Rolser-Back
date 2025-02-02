<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $timestamps = true;

    protected $fillable = [
        'pedido_estado',
        'fecha_creacion',
        'id_cliente_vip',
        'id_cliente_no_vip'
    ];

    // Relación con Cliente VIP (1-M, opcional)
    public function clienteVip()
    {
        return $this->belongsTo(ClienteVip::class, 'id_cliente_vip', 'id_cliente_vip');
    }

    // Relación con Cliente No VIP (1-M, opcional)
    public function clienteNoVip()
    {
        return $this->belongsTo(ClienteNoVip::class, 'id_cliente_no_vip', 'id_cliente_no_vip');
    }
}
