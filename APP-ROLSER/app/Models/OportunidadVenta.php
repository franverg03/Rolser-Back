<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class OportunidadVenta extends Model
{
    use HasFactory;
    protected $table = 'oportunidades_venta';
    protected $primaryKey = 'id_oportunidad_venta';

    protected $fillable = [
        'importe_estimado',
        'posibilidad',
        'fecha_cierre_prevista',
        'id_interaccion'
    ];

    protected $casts = [
        'fecha_cierre_prevista' => 'date:d/m/Y',
    ];

    public function interaccion()
    {
        return $this->belongsTo(Interaccion::class, 'id_interaccion', 'id_interaccion');
    }
}
