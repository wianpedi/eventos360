@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Comprar boletas para:  {{ $evento->nombre }}</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('imagenes_eventos/' . $evento->foto) }}" class="img-fluid" alt="Foto del evento">
            </div>
            <div class="col-md-6">
                @if ($evento->entradas > 0)
                    <p>{{ $evento->descripcion }}</p>
                    <p><strong>Dirección:</strong> {{ $evento->ubicacion }}</p>
                    <p><strong>Fecha:</strong> {{ $evento->fecha }}</p>
                    <p><strong>Precio:</strong> ${{ $evento->precio }}</p>

                    <form action="{{ route('procesar.compra', ['eventoId' => $evento->id]) }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="cantidad_boletas" class="form-label">Cantidad de boletas:</label>
                            <input type="number" class="form-control" id="cantidad_boletas" name="cantidad_boletas" required min="1">
                        </div>

                        <div class="mb-3">
                            <label for="usuario_id" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="usuario_id" name="usuario_id" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                        <!-- Agrega más campos según tus necesidades -->

                        <button type="submit" class="btn btn-primary">Comprar Ahora</button>
                    </form>
                @else
                    <p>Lo sentimos, la boletería para este evento está agotada.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
