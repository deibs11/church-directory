<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'mapa',
        'latitud',
        'longitud',
        'direccion',
        'ciudad',
        'estado',
        'pais',
        'cp',
        'ubicacion_enlace',
        'status',
        'telefono',
        'email',
        'pagina_web', // Página web (opcional)
        'facebook', // Facebook (opcional)
        'instagram', // Instagram (opcional)
    ];
}
