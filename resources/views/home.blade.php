@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('guardar.evento') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Codigo</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo del evento" required>
                            </div>

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del evento</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del evento" required>
                            </div>

                            <div class="mb-3">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ubicación" required>
                            </div>

                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha del Evento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" min="{{ now()->toDateString() }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" required>
                            </div>

                            <div class="mb-3">
                                <label for="entradas" class="form-label">Numero de Entradas Disponibles</label>
                                <input type="number" class="form-control" id="entradas" name="entradas" placeholder="Numero de Entradas Disponibles" min="0" required>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio del evento sin comas ni puntos" value="{{ old('precio') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Subir foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Añadir evento</button>
                        </div>
                    </div>
                    <br>
                    @if ($errors->any())
                        <div class="mt-3">
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Eventos Registrados</h2>
                @if(isset($eventos) && $eventos->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Número de Entradas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eventos as $evento)
                                <tr>
                                    <td>{{ $evento->codigo }}</td>
                                    <td>{{ $evento->nombre }}</td>
                                    <td>{{ $evento->entradas }}</td>
                                    <td>
                                        <a href="{{ route('editar.evento', ['id' => $evento->id]) }}" class="btn btn-primary">Editar</a>
                                        <a href="{{ route('eliminar.evento', ['id' => $evento->id]) }}" class="btn btn-danger">Eliminar</a>
                                        <a href="{{ route('ver.evento', ['id' => $evento->id]) }}" class="btn btn-info">Ver Detalles</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
