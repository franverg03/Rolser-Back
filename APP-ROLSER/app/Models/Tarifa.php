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
}
