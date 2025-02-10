<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'usuario_nombre',
        'usuario_password',
        'usuario_activo',
        'usuario_rol',
        'id_administrativo'
    ];

    protected $hidden = [
        'usuario_password',
        'remember_token',
    ];

    protected $casts = [
        'usuario_activo' => 'boolean',
    ];

    public function run(): void
    {
        Administrativo::insert([
            [
                'usario_nombre' => '16122024C',
                'administrativo_apellidos' => 'Valencia Pulgarin',
                'administrativo_direccion' => 'Avenida Hermanos Marista, 35,7',
                'administrativo_cp' => 46015,
                'administrativo_telefono' => '658456123',
                'administrativo_email' => 'crivalpul@gmail.com',
                'administrativo_departamento' => 'Administracion',
            ],
            [
                'administrativo_nombre' => 'Daniel',
                'administrativo_apellidos' => 'Endrino Pardo',
                'administrativo_direccion' => 'Avenida Hermanos Marista, 35,7',
                'administrativo_cp' => 46015,
                'administrativo_telefono' => '657455122',
                'administrativo_email' => 'danendpar@gmail.com',
                'administrativo_departamento' => 'Administracion',
            ],
            [
                'administrativo_nombre' => 'Francisco',
                'administrativo_apellidos' => 'Verdeguer Garcia',
                'administrativo_direccion' => 'Avenida Hermanos Marista, 35,7',
                'administrativo_cp' => 46015,
                'administrativo_telefono' => '656454321',
                'administrativo_email' => 'fravergar@gmail.com',
                'administrativo_departamento' => 'Administracion',
            ]
        ]);
    }

    /**
     * Relación con la tabla administrativos
     */
    public function administrativo()
    {
        return $this->belongsTo(Administrativo::class, 'id_administrativo', 'id_administrativo');
    }
}
