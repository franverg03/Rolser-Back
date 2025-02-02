<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $table = 'seguimientos';
    protected $primaryKey = 'id_Seguimiento';
    public $timestamps = true;

    protected $fillable = [
        'id_pedido',
        'seguimiento_descripcion',
        'seguimiento_fecha'
    ];

    // Relación con Pedido (1-M)
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id_pedido');
    }
}
