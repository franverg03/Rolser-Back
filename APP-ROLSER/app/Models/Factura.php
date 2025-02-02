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

    // Relación con Pedido (1-M)
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id_pedido');
    }

    // Relación con Cliente No VIP (1-M, opcional)
    public function clienteNoVip()
    {
        return $this->belongsTo(ClienteNoVip::class, 'id_cliente_no_vip', 'id_cliente_no_vip');
    }

    // Relación con Cliente VIP (1-M, opcional)
    public function clienteVip()
    {
        return $this->belongsTo(ClienteVip::class, 'id_cliente_vip', 'id_cliente_vip');
    }

    // Relación con Comercial (1-M, opcional)
    public function comercial()
    {
        return $this->belongsTo(Comercial::class, 'id_comercial', 'id_comercial');
    }
}
