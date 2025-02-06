<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $table = 'catalogos';
    protected $primaryKey = 'id_catalogo';
    public $timestamps = true;

    protected $fillable = [
        'catalogo_nombre',
        'fechaIni',
        'fechaFin',
        'catalogo_estado',
        'catalogo_tipo'
    ];

    public function comerciales() {
        return $this->belongsToMany(Comercial::class);
    }

    public function administrativos() {
        return $this->belongsToMany(Administrativo::class);
    }

    public function clientesVip() {
        return $this->belongsToMany(ClienteVip::class);
    }

    public function productos() {
        return $this->belongsToMany(Producto::class);
    }


}
