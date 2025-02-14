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

    public function clienteVip() {
        return $this->belongsTo(ClienteVip::class);
    }

    public function clienteNoVip() {
        return $this->belongsTo(ClienteNoVip::class);
    }

    public function comerciales() {
        return $this->belongsTo(Comercial::class);
    }

    public function facturas() {
        return $this->belongsTo(Factura::class);
    }

    public function seguimientos() {
        return $this->hasOne(Seguimiento::class);
    }

    public function lineasDePedidos() {
        return $this->hasMany(LineaPedido::class);
    }
}
