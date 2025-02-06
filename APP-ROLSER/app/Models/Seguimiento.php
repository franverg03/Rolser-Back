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
    public function clientesNoVip()
    {
        return $this->belongsTo(ClienteNoVip::class);
    }

    public function clientesVip()
    {
        return $this->belongsTo(ClienteVip::class);
    }

    public function administrativos()
    {
        return $this->belongsToMany(Administrativo::class);
    }



}
