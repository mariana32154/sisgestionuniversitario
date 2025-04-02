@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Gestiones </h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Gestiones registradas</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/gestiones/create') }}" class="btn btn-primary">Crear nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th style="text-align: center">Nro</th>
                                <th style="text-align: center">Nombre de los gestiones</th>
                                <th style="text-align: center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp

                            @foreach($gestiones as $gestion)

                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td>{{ $gestion->nombre }}</td>   
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ url('/admin/gestiones/' . $gestion->id . '/edit') }}" 
                                               class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.gestiones.destroy', $gestion->id) }}" method="POST" 
      onsubmit="return confirmarEliminacion(event, {{ $gestion->id }})" 
      id="miFormulario{{ $gestion->id }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i>
    </button>
</form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
    #example1_wrapper.dt-buttons {
        background-color: transparent;
        box-shadow: none;
        border: none;
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    #example1_wrapper .btn {
        color: #fff;
        border-radius: 4px;
        padding: 5px 15px;
        font-size: 14px;
    }

    .btn-danger { background-color: #dc3545; border: none; }
    .btn-success { background-color: #28a745; border: none; }
    .btn-info { background-color: #17a2b8; border: none; } 
    .btn-warning { background-color: #ffc107; color: #212529; border: none; } 
    .btn-default { background-color: #6e7176; color: #212529; border: none; } 
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script> 
    function confirmarEliminacion(event, id) {
        event.preventDefault();

        Swal.fire({
            title: '¿Seguro que quieres eliminar esta gestion?',
            text: "No podrás revertir esta acción.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'eliminar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('miFormulario' + id).submit();
            }
        });
    }

    $(function () { 
        $("#example1").DataTable({ 
            "pageLength": 5,
            "language": { 
                "emptyTable": "No hay información", 
                "info": "Mostrando START a END de TOTAL Gestiones",
                "infoEmpty": "Mostrando 0 a 0 de 0 Gestiones", 
                "infoFiltered": "(Filtrado de MAX Gestiones)", 
                "lengthMenu": "Mostrar MENU Gestiones", 
                "loadingRecords": "Cargando...", 
                "processing": "Procesando...", 
                "search": "Buscador:", 
                "zeroRecords": "Sin resultados encontrados", 
                "paginate": {
                    "first": "Primero", 
                    "last": "Último", 
                    "next": "Siguiente", 
                    "previous": "Anterior"
                }
            },
            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false, 
            buttons: [
                {text: '<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className: 'btn btn-default'},
                {text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-danger'},
                {text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-info'},
                {text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-success'},
                {text: '<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className: 'btn btn-warning'},
            ]
        }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
    });
</script>
@stop