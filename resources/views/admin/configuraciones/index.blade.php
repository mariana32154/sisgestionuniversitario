@extends('adminlte::page')


@section('content_header')
    <h1>Configuraciones</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lleno los datos del formulario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/configuraciones/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ old('nombre', $configuracion->nombre ?? '') }}" name="nombre" placeholder>
                                            </div>
                                            @error('nombre')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ old('descripcion', $configuracion->descripcion ?? '') }}" name="descripcion">
                                            </div>
                                            @error('descripcion')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Direccion</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input class="form-control" value="{{ old('direccion', $configuracion->direccion ?? '') }}" name="direccion" placeholder>
                                    </div>
                                    @error('direccion')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('telefono', $configuracion->telefono ?? '') }}" name="telefono" placeholder>
                                    </div>
                                    @error('telefono')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" value="{{ old('email', $configuracion->email ?? '') }}" name="email" placeholder>
                                    </div>
                                    @error('email')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="web">Sitio Web</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('web', $configuracion->web ?? '') }}" name="web" placeholder>
                                    </div>
                                    @error('web')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="logo">Logo</label><b> (*)</b>
                                <input type="file" id="file" name="logo" accept=".jpg, .jpeg, .png" class="form-control" required>
                                @error('logo')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                                <br>
                                <center>
                                    <output id="list">
                                        @if(isset($configuracion->logo))
                                            <img class="thumb thumbnail" src="{{ url($configuracion->logo) }}" width="70%" title="Logo">
                                        @endif
                                    </output>
                                </center>
                                <script>
                                    function archivo(evt) {
                                        var files = evt.target.files; // FileList object
                                        // Obtenemos la imagen del campo "file".
                                        for (var i = 0, f; f = files[i]; i++) {
                                            //Solo admitimos imágenes.
                                            if (!f.type.match('image.*')) {
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function(theFile) {
                                                return function(e) {
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="70%"]'].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                    document.getElementById('file').addEventListener('change', archivo, false);
                                </script>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ url('admin/configuraciones') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div> <!-- .card-body -->
            </div>
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
   
@stop
