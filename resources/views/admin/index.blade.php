@extends('adminlte::page')



@section('content_header')
    <h1>Sistema Universitario</h1>
@stop

@section('content')
<div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            
            <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">

            <div class="info-box-content">
            <span class="info-box-text"><b>Gestiones Registrados</b></span>
                <span class="info-box-number">{{ $total_gestiones }} Gestiones</span>
              </div>
</div><!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <img src="{{ url('/img/diploma.gif') }}" width="70px" alt="">
              <div class="info-box-content">
                <span class="info-box-text"><b>Carreras Registradas</b></span>
                <span class="info-box-number">{{ $total_carreras }} Carreras</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <img src="{{ url('/img/grafico-de-linea.gif') }}" width="70px" alt="">
              <div class="info-box-content">
                <span class="info-box-text"><b>Niveles registrados</b></span>
                <span class="info-box-number">{{ $total_niveles }} Niveles</span>
              </div>
</div>
</div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop