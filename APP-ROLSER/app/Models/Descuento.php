<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;

    protected $table = 'descuentos';
    protected $primaryKey = 'id_descuento';
    public $timestamps = true;

    protected $fillable = [
        'descripcion_descuento',
        'porcentaje_descuento',
        'fechaInicio_descuento',
        'fechaFin_descuento',
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
