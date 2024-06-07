<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'state', 'zipcode', 'country', 'phone', 'email', 'description', 'image', 'status'
    ];
}
