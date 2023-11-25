@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2>
                    <div class="card-header">{{ __('Editar Evento') }}</div>
                </h2>

                <div class="card-body">
                    <!-- Formulario de edición -->
                    <form action="{{ route('actualizar.evento', ['id' => $evento->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="codigo" class="form-label">Codigo</label>
                            <input type="text" class="form-control" id="codigo" name="codigo"
                                placeholder="Codigo del evento" value="{{ $evento->codigo }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del evento</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Nombre del evento" value="{{ $evento->nombre }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion"
                                placeholder="Ubicación" value="{{ $evento->ubicacion }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha del Evento</label>
                            <input type="date" class="form-control" id="fecha" name="fecha"
                                min="{{ now()->toDateString() }}" value="{{ $evento->fecha }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                placeholder="Descripción" value="{{ $evento->descripcion }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="entradas" class="form-label">Numero de Entradas Disponibles</label>
                            <input type="number" class="form-control" id="entradas" name="entradas"
                                placeholder="Numero de Entradas Disponibles" min="0" value="{{ $evento->entradas }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio"
                                placeholder="Precio del evento" value="{{ old('precio') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Subir foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar evento</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection