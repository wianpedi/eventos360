<?php


namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function eventos()
    {

    }

    public function guardarEvento(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'ubicacion' => 'required',
            'fecha' => 'required|date',
            'entradas' => 'required',
            'descripcion' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagenNombre = time().'.'.$request->foto->extension();  
        $request->foto->move(public_path('imagenes_eventos'), $imagenNombre);

        $evento = new Eventos;
        $evento->codigo = $request->input('codigo');
        $evento->nombre = $request->input('nombre');
        $evento->ubicacion = $request->input('ubicacion');
        $evento->fecha = $request->input('fecha');
        $evento->entradas = $request->input('entradas');
        $evento->descripcion = $request->input('descripcion');
        $evento->foto = $imagenNombre;  
        $evento->save();

        return redirect()->route('home')->with('success', 'Evento creado exitosamente');
    }
}
