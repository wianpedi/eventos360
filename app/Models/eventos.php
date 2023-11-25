<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    // Definición de la clase Eventos
    protected $fillable = ['codigo', 'nombre', 'ubicacion', 'fecha', 'entradas', 'descripcion', 'foto'];
    public function mostrarEventos()
{
    $eventos = Eventos::all();

    return view('mostrar-eventos', compact('eventos'));
}

}