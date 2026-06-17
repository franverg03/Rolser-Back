<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Interaccion extends Model
{
    use HasFactory;

    protected $table = 'interacciones';
    protected $primaryKey = 'id_interaccion';
    public $timestamps = true;
    protected $fillable = [
        'fecha_interaccion',
        'medio_contacto',
        'resumen_contacto',
        'resultado',
        'id_comercial',
        'id_cliente_vip',
        'id_cliente_no_vip'
    ];

    public function comercial()
    {
        return $this->belongsTo(Comercial::class, 'id_comercial', 'id_comercial');
    }

    public function clienteVip()
    {
        return $this->belongsTo(ClienteVip::class, 'id_cliente_vip', 'id_cliente_vip');
    }

    public function clienteNoVip()
    {
        return $this->belongsTo(ClienteNoVip::class, 'id_cliente_no_vip', 'id_cliente_no_vip');
    }

    public function oportunidades()
    {
        return $this->hasMany(OportunidadVenta::class, 'id_interaccion', 'id_interaccion');
    }
}
