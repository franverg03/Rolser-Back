<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comision extends Model
{
    use HasFactory;
    protected $table = 'comisiones';
    protected $primaryKey = 'id_comision';

    protected $fillable = [
        'importe',
        'pagada',
        'id_objetivo_venta'
    ];

    public function objetivoVenta()
    {
        return $this->belongsTo(ObjetivoVenta::class, 'id_objetivo_venta', 'id_objetivo_venta');
    }
}
