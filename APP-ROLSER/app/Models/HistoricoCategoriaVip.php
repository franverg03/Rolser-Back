<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoricoCategoriaVip extends Model
{
    use HasFactory;
    protected $table = 'historico_categoria_vips';
    protected $primaryKey = 'id_historico_categoria_vip';

    protected $fillable = [
        'fecha_cambio',
        'motivo_cambio',
        'id_categoria_vip',
        'id_cliente_vip'
    ];

    public function categoriaVip()
    {
        return $this->belongsTo(CategoriaVip::class, 'id_categoria_vip', 'id_categoria_vip');
    }

    public function clienteVip()
    {
        return $this->belongsTo(ClienteVip::class, 'id_cliente_vip', 'id_cliente_vip');
    }
}
