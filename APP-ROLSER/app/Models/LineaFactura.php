<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaFactura extends Model
{
    use HasFactory;

    protected $table = 'lineas_facturas';
    protected $primaryKey = 'idLineaFact';
    public $timestamps = true;

    protected $fillable = [
        'unidades',
        'importe',
        'total',
        'id_factura',
        'id_producto'
    ];

    // Relación con Factura (1-M)
    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id_factura', 'id_factura');
    }

    // Relación con Producto (1-M)
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}
