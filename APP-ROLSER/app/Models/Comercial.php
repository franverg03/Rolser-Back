<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercial extends Model
{
    use HasFactory;

    protected $table = 'comerciales';
    protected $primaryKey = 'id_comercial';
    public $timestamps = true;

    protected $fillable = [
        'comercial_nombre',
        'comercial_apellidos',
        'comercial_direccion',
        'comercial_cp',
        'comercial_telefono',
        'comercial_email',
        'comercial_zona',
        'id_usuario'
    ];

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }

    public function facturas() {
        return $this->hasMany(Factura::class);
    }

    public function clientesNoVip() {
        return $this->hasMany(ClienteNoVip::class);
    }

    public function clientesVip() {
        return $this->hasMany(ClienteVip::class);
    }

    public function catalogos() {
        return $this->belongsToMany(Catalogo::class);
    }
}
