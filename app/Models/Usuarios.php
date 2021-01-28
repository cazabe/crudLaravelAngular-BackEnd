<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $primaryKey = 'persona_id';
    protected $fillable = [
        'nombres', 'apellidos', 'cedula', 'estado'
      ];
}
