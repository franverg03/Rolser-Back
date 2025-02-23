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

    public function facturas() {
        return $this->belongsTo(Factura::class, 'id_factura');
    }

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}
