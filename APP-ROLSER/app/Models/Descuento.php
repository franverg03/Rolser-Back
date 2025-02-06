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

    public function clientesNoVip()  {
        return $this->belongsTo(ClienteNoVip::class);
    }

    public function clientesVip() {
        return $this->belongsTo(ClienteVip::class);
    }

    public function administrativo() {
        return $this->belongsToMany(Administrativo::class);
    }
}
