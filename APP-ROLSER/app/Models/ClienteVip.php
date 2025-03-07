<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteVip extends Model
{
    use HasFactory;

    protected $table = 'clientes_vip';
    protected $primaryKey = 'id_cliente_vip';
    public $timestamps = true;

    protected $fillable = [
        'cliente_empresa',
        'cliente_nif',
        'cliente_nombre_representante',
        'cliente_apellidos_representante',
        'cliente_telefono_representante',
        'cliente_email_representante' => 'required|string|max:100',
        'cliente_direccion_empresa',
        'cliente_cuenta_bancaria',
    ];


    public function usuario() {
        return $this->belongsTo(User::class, 'id_usuario');
    }


    public function catalogos()
    {
        return $this->belongsToMany(Catalogo::class);
    }


    public function comercial() {
        return $this->belongsTo(Comercial::class, 'id_comercial');
    }


    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_cliente_vip');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_cliente_vip');
    }

    public function tarifa()
    {
        return $this->hasOne(Tarifa::class, 'id_cliente_vip');
    }

    public function descuentos()
    {
        return $this->hasMany(Descuento::class, 'id_cliente_vip');
    }
}
