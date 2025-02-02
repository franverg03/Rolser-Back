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
        'administrativo_direccion',
        'administrativo_cp',
        'administrativo_telefono',
        'administrativo_email',
        'administrativo_departamento'
    ];
}
