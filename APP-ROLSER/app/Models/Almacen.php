<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacenes';
    protected $primaryKey = 'id_almacen';
    public $timestamps = true;

    protected $fillable = [
        'almacen_nombre',
        'almacen_ubicacion',
        'almacen_capacidad',
        'almacen_localidad',
        'almacen_codigo_postal'
    ];


    public function productos() {
        return $this->hasMany(Producto::class, 'id_producto');
    }

    public function administrativos() {
        return $this->belongsToMany(Administrativo::class);
    }


}
