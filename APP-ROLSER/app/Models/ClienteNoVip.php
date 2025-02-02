<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteNoVip extends Model
{
    use HasFactory;

    protected $table = 'clientes_no_vip';
    protected $primaryKey = 'id_cliente_no_vip';
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

    // Relación con User (1-1)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    // Relación con Comercial (1-M)
    public function comercial()
    {
        return $this->belongsTo(Comercial::class, 'id_comercial', 'id_comercial');
    }
}
