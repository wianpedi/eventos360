@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h2><div class="card-header">{{ __('Crear Eventos') }}</div></h2>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ url('/guardar-evento') }}" method="post" enctype="multipart/form-data">
                            @csrf <!-- Agrega el token CSRF de Laravel -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="codigo" class="form-label">Codigo</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo del evento">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre del evento</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del evento">
                                    </div>

                                    <div class="mb-3">
                                        <label for="ubicacion" class="form-label">Ubicación</label>
                                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ubicación">
                                    </div>

                                    <div class="mb-3">
                                        <label for="fecha" class="form-label">Fecha del Evento</label>
                                        <input type="date" class="form-control" id="fecha" name="fecha">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                                    </div>

                                    <div class="mb-3">
                                        <label for="entradas" class="form-label">Numero de Entradas Disponibles</label>
                                        <input type="number" class="form-control" id="entradas" name="entradas" placeholder="Numero de Entradas Disponibles">
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Subir foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Añadir evento</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
