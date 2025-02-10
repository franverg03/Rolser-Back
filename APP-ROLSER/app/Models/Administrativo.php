<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;

    protected $table = 'administrativos';
    protected $primaryKey = 'id_administrativo';
    public $timestamps = true;

    protected $fillable = [
        'administrativo_nombre',
        'administrativo_apellidos',
        'administrativo_dni',
        'administrativo_direccion',
        'administrativo_cp',
        'administrativo_telefono',
        'administrativo_email',
        'administrativo_departamento'
    ];



    public function catalogos()
    {
        return $this->belongsTo(Catalogo::class);
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function almacenes()
    {
        return $this->belongsToMany(Almacen::class);
    }

    public function seguimientos()
    {
        return $this->belongsToMany(Seguimiento::class);
    }

    public function descuentos()
    {
        return $this->belongsToMany(Descuento::class);
    }

    public function tarifas()
    {
        return $this->belongsToMany(Tarifa::class);
    }
}
