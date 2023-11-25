<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Eventos;
use App\Models\Compra;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $eventos = Eventos::all();
    
    return view('home', compact('eventos'));
        
    }
    public function welcome()
{
    $eventos = Eventos::all();
    return view('welcome', compact('eventos'));
}

}
