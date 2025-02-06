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
        'cliente_direccion_empresa',
        'cliente_cuenta_bancaria',
        'id_usuario',
        'id_comercial'
    ];

    public function usuarios() {
        return $this->belongsTo(User::class);
    }

    public function catalogos() {
        return $this->belongsToMany(Catalogo::class);
    }

    public function comerciales() {
        return $this->belongsTo(Comercial::class);
    }

    public function facturas() {
        return $this->hasMany(Factura::class);
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }

    public function tarifas() {
        return $this->hasMany(Tarifa::class);
    }

    public function descuetos() {
        return $this->hasMany(Descuento::class);
    }
}
