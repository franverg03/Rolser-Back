<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class ObjetivoVenta extends Model
{
    use HasFactory;
    protected $table = 'objetivos_venta';
    protected $primaryKey = 'id_objetivo_venta';

    protected $fillable = [
        'tipo_objetivo',
        'descripcion_objetivo',
        'valor_meta',
        'valor_actual',
        'fecha_inicio',
        'fecha_fin',
        'completado',
        'id_comercial'
    ];

    protected $casts = [
        'completado' => 'boolean',
        'fecha_inicio' => 'date:d/m/Y',
        'fecha_fin' => 'date:d/m/Y',
    ];



    public function comercial()
    {
        return $this->belongsTo(Comercial::class, 'id_comercial', 'id_comercial');
    }

    public function comisiones()
    {
        return $this->hasMany(Comision::class, 'id_objetivo_venta', 'id_objetivo_venta');
    }
}
