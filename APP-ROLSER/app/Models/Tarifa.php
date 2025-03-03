<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    protected $table = 'tarifas';
    protected $primaryKey = 'id_tarifa';
    public $timestamps = true;

    protected $fillable = [
        'descripcion_tarifa',
        'porcentaje_tarifa',
        'beneficiario_tarifa'
    ];

    public function clientesNoVip()  {
        return $this->belongsTo(ClienteNoVip::class, 'id_cliente_no_vip');
    }

    public function clientesVip() {
        return $this->belongsTo(ClienteVip::class, 'id_cliente_vip');
    }

    public function administrativo() {
        return $this->belongsToMany(Administrativo::class);
    }

    public function getClienteAttribute()
    {
        return $this->clienteVip ?: $this->clienteNoVip;
    }


}
