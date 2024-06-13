<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'ciudad',
        'estado',
        'pais',
        'cp',
        'status',
        'telefono',
        'email',
    ];
}
