@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h2>
                        <div class="card-header">{{ __('Detalles del Evento') }}</div>
                    </h2>

                    <div class="card-body">
                        <h3>Código: {{ $evento->codigo }}</h3>
                        <p>Nombre: {{ $evento->nombre }}</p>
                        <p>Ubicación: {{ $evento->ubicacion }}</p>
                        <p>Fecha: {{ $evento->fecha }}</p>
                        <p>Entradas Disponibles: {{ $evento->entradas }}</p>
                        <p>Descripción: {{ $evento->descripcion }}</p>
                        <p>Precio: {{ $evento->precio }}</p>

                        <img src="{{ asset('imagenes_eventos/' . $evento->foto) }}" alt="Foto del evento" style="max-width: 100%; height: auto;">

                        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
