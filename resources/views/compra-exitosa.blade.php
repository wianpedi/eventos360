@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Compra Exitosa</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalles de la Compra</h5>
            <ul>


                <li><strong>Cantidad de Boletas:</strong> {{ $compra->cantidad_boletas }}</li>
                <li><strong>Nombre del Comprador:</strong> {{ $compra->usuario_id }}</li>
                <li><strong>Correo Electrónico:</strong> {{ $compra->correo }}</li>
            </ul>
            <p class="card-text">¡Gracias por tu compra!</p>
            <a href="{{ route('welcome') }}" class="btn btn-primary">Volver a la página principal</a>
        </div>
    </div>
</div>
@endsection