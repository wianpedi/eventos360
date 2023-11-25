@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h1>Bienvenido a Eventos 360</h1>
    <p class="lead">La Plataforma Todo en Uno para Eventos</p>

    <div class="mt-4">
        <a class="btn btn-success" href="{{ route('login') }}">Iniciar Sesión</a>
        <a class="btn btn-secondary" href="{{ route('register') }}">Registrarse</a>
    </div>

    <div class="mt-5">
        <h2>Eventos Disponibles</h2>
        @if(isset($eventos) && count($eventos) > 0)
        <div class="row">
            @foreach($eventos as $evento)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('imagenes_eventos/' . $evento->foto) }}" class="card-img-top"
                        alt="Foto del evento">
                    <div class="card-body">
                        <h3 class="card-title">{{ $evento->nombre }}</h3>
                        <p class="card-text">{{ $evento->descripcion }}</p>
                        <p class="card-text">Direccion: {{ $evento->ubicacion }}</p>
                        <p class="card-text">Fecha: {{ $evento->fecha }}</p>
                        <p class="card-text">Precio: ${{ $evento->precio }}</p>

                        <a href="{{ route('comprar.boletas.formulario', ['eventoId' => $evento->id]) }}"
                            class="btn btn-primary">
                            Comprar Ahora <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p>No hay eventos disponibles.</p>
        @endif
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>