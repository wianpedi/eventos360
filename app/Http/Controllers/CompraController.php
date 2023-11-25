<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function mostrarFormularioCompra($eventoId)
    {
        $evento = Eventos::findOrFail($eventoId);
        return view('formulario', compact('evento'));
    }

    public function procesarCompra(Request $request, $eventoId)
    {
        // Valida el formulario según tus necesidades
        $request->validate([
            'cantidad_boletas' => 'required|integer|min:1',
            'usuario_id' => 'required|string',
            'correo' => 'required|email',
        ]);
    
        // Procesa la compra y actualiza la base de datos
        $evento = Eventos::findOrFail($eventoId);
    
        if ($evento->entradas >= $request->input('cantidad_boletas')) {
            // Actualiza la cantidad de boletas disponibles
            $evento->entradas -= $request->input('cantidad_boletas');
            $evento->save();
    
            // Registra la compra
            $compra = Compra::create([
                'evento_id' => $evento->id,
                'usuario_id' => $request->input('usuario_id'),
                'cantidad_boletas' => $request->input('cantidad_boletas'),
                'correo' => $request->input('correo'),
            ]);
    
            // Verifica si quedan boletas disponibles
            if ($evento->entradas > 0) {
                // Pasa el parámetro correctamente
                return redirect()->route('compra.exitosa', ['compraId' => $compra->id]);
            } else {
                // Si no quedan boletas, redirige a la vista de compra agotada
                return redirect()->route('compra.agotada');
            }
        } else {
            return redirect()->back()->with('error', 'No hay suficientes boletas disponibles');
        }
    }
    
    public function compraExitosa($compraId)
    {
        $compra = Compra::findOrFail($compraId);
        return view('compra-exitosa', compact('compra'));
    }

    public function compraAgotada()
    {
        return view('compra-agotada');
    }
}
