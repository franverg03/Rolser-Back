<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $primaryKey = 'id_factura';
    public $timestamps = true;

    protected $fillable = [
        'factura_importe_total',
        'id_pedido',
        'id_cliente_no_vip',
        'id_cliente_vip',
        'id_comercial'
    ];
    public function lineasDeFactura() {
        return $this->hasMany(LineaFactura::class);
    }

    public function pedido() {
        return $this->hasMany(Pedido::class, 'id_pedido');
    }

    public function comercial() {
        return $this->belongsTo(Comercial::class, 'id_comercial');
    }

    public function clienteVip() {
        return $this->belongsTo(ClienteVip::class, 'id_cliente_vip');
    }

    public function clienteNoVip() {
        return $this->belongsTo(ClienteNoVip::class, 'id_cliente_no_vip');
    }
}
