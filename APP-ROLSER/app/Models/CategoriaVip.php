<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class CategoriaVip extends Model
{
    use HasFactory;
    protected $table = 'categoria_vips';
    protected $primaryKey = 'id_categoria_vip';

    protected $fillable = [
        'nombre_categoria',
        'descuento_aplicable',
        'beneficios_extra',
        'requisito_minimo'
    ];

    // Una categoría guarda el historial de los clientes que han pasado por ella
    public function historicos()
    {
        return $this->hasMany(HistoricoCategoriaVip::class, 'id_categoria_vip', 'id_categoria_vip');
    }
}
