<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notificacion extends Model
{
    use HasFactory;
    protected $table = 'notificaciones';
    protected $primaryKey = 'id_notificacion';

    protected $fillable = [
        'titulo',
        'mensaje',
        'leida',
        'id_comercial'
    ];

    protected $casts = [
        'leida' => 'boolean',
    ];

    public function comercial()
    {
        return $this->belongsTo(Comercial::class, 'id_comercial', 'id_comercial');
    }
}
