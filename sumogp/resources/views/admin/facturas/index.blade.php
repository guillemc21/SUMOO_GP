@extends('adminlte::page')

@section('title', 'AdminFacturas - SUMOGP')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
    <link rel="shortcut icon" href="{{asset('images/logo/sumogp.png')}}">
@stop

@section('content_header')
    <h1 style="font-family: system-ui">
        <a>Facturas</a>
    </h1>
    <hr>
    
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de facturas</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="facturas" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Id Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Informacion de la factura</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $factura)
                            <tr>
                                <td>{{$factura->id}}</td>
                                <td>{{$factura->iduser}}</td>
                                <td>{{$factura->nameuser}}</td>
                                <td>{{$factura->content}}</td>
                                <td class="btn_td">
                                    <button type="button" class="btn btn-secondary w-50">
                                    Descargar
                                    </button>
                                    <form class="w-50 form-eliminar" action="{{route('admin.facturas.delete', $factura->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            
                        
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Id Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Informacion de la factura</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>


@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar_factura') == 'OK')
        <script>
            Swal.fire(
                'Eliminado!',
                'La factura a sido eliminada.',
                'success',
            )
        </script>
    @endif
    <script>
    $(document).ready(function() {
        $('#facturas').DataTable( {
            "order": [[ 0, "asc" ]],
            "language": {
                "search":       "Buscar",
                "lengthMenu":       "Mostrar _MENU_ registros por página",
                "info":         "Mostrando página _PAGE_ de _PAGES_",
                "paginate":         {
                            "previous":"Anterior",
                            "next":"Siguiente",
                            "first":"Primero",
                            "last":"Último"           
                } 
            }
        } );
    } );


    $('.form-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Estas seguro?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar ahora!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            
            this.submit()
            
        }
        });
    });
    </script>
@stop
