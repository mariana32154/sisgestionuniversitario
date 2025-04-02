@extends('adminlte::page')

@section('content_header')
    <h1><b>Crear Nuevo Nivel</b></h1>
    <hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llena los datos del formulario</h3>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/niveles') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre del Nivel:</label><b> (*)</b>
                                <div class="input-group md-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nombre" 
                                           value="{{ old('nombre') }}" 
                                           placeholder="Escriba aquí..." required>
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/niveles') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- Cierra card-body -->
        </div> <!-- Cierra card -->
    </div> <!-- Cierra col-md-6 -->
</div> <!-- Cierra row -->
@stop

@section('css')
@stop

@section('js')
@stop