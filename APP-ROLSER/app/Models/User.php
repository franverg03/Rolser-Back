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
        'password',
        'usuario_activo',
        'usuario_rol',
        'id_administrativo'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'usuario_activo' => 'boolean',
    ];

    /**
     * Relación con la tabla administrativos
     */
    public function administrativo()
    {
        return $this->belongsTo(Administrativo::class, 'id_administrativo');
    }

    public function clienteVip(){
        return $this->hasOne(ClienteVip::class, 'id_cliente_vip');
    }

    public function clienteNoVip(){
        return $this->hasOne(ClienteNoVip::class, 'id_cliente_no_vip');
    }

    public function comercial(){
        return $this->belongsTo(Comercial::class, 'id_comercial');
    }
}
