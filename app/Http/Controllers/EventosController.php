<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventosController extends Controller

{
    public function index()
{
    $eventos = Eventos::all();
    
   

    return view('home', compact('eventos'));
}
 
    

    public function actualizar(Request $request, $id)
{
    $request->validate([
        'codigo' => 'required',
        'nombre' => 'required',
        'ubicacion' => 'required',
        'fecha' => 'required|date',
        'entradas' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $evento = Eventos::findOrFail($id);

    $evento->codigo = $request->input('codigo');
    $evento->nombre = $request->input('nombre');
    $evento->ubicacion = $request->input('ubicacion');
    $evento->fecha = $request->input('fecha');
    $evento->entradas = $request->input('entradas');
    $evento->descripcion = $request->input('descripcion');
    $evento->precio = $request->input('precio');
    if ($request->hasFile('foto')) {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Elimina la foto anterior si existe
        if ($evento->foto) {
            $this->borrarFoto($evento->foto);
        }

        // Sube la nueva foto
        $imagenNombre = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('imagenes_eventos'), $imagenNombre);
        $evento->foto = $imagenNombre;
    }

    $evento->save();

    return redirect()->route('home')->with('success', 'Evento actualizado exitosamente');
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
        'precio' => 'required|numeric',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagenNombre = time() . '.' . $request->foto->extension();
    $request->foto->move(public_path('imagenes_eventos'), $imagenNombre);

    $evento = new Eventos;
    $evento->codigo = $request->input('codigo');
    $evento->nombre = $request->input('nombre');
    $evento->ubicacion = $request->input('ubicacion');
    $evento->fecha = $request->input('fecha');
    $evento->entradas = $request->input('entradas');
    $evento->descripcion = $request->input('descripcion');
    $evento->precio = $request->input('precio');
    $evento->foto = $imagenNombre;
    $evento->save();

    return redirect()->route('home')->with('success', 'Evento creado exitosamente');
}

private function borrarFoto($nombreFoto)
{
    $rutaFoto = public_path('imagenes_eventos/' . $nombreFoto);

    if (File::exists($rutaFoto)) {
        File::delete($rutaFoto);
    }
}

public function editar($id)
{
    $evento = Eventos::findOrFail($id);
    return view('editar-evento', compact('evento'));
}

public function eliminar($id)
{
    $evento = Eventos::findOrFail($id);

    // Elimina la foto asociada al evento
    if ($evento->foto) {
        $this->borrarFoto($evento->foto);
    }

    $evento->delete();

    return redirect()->route('home')->with('success', 'Evento eliminado exitosamente');
}
public function ver($id)
{
    $evento = Eventos::findOrFail($id);
    return view('ver-evento', compact('evento'));
}
public function welcome()
{
    $eventos = Eventos::all(); 

    return view('welcome', compact('eventos'));
}


}

