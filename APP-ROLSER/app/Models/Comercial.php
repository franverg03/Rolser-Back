<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercial extends Model
{
    use HasFactory;

    protected $table = 'comerciales';
    protected $primaryKey = 'id_comercial';
    public $timestamps = true;

    protected $fillable = [
        'comercial_nombre',
        'comercial_apellidos',
        'comercial_direccion',
        'comercial_cp',
        'comercial_telefono',
        'comercial_email',
        'comercial_zona',
        'id_usuario'
    ];

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
}
