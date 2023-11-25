<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Eventos extends Model
{

    protected $fillable = ['codigo', 'nombre', 'ubicacion', 'fecha', 'entradas', 'descripcion', 'foto'];
}
