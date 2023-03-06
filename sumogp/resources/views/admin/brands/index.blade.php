@extends('adminlte::page')

@section('title', 'AdminMarcas - SUMOGP')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('content_header')
    <h1 style="font-family: system-ui">
        Marcas
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-brand">
            Crear
        </button>
    </h1>
    
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Marcas</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                <table id="brands" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td class="btn_td">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-brand-{{$brand->id}}">
                                    Editar
                                    </button>
                                    <form action="{{route('admin.brands.delete', $brand->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            <!-- modal UPDATE -->
                            @include('admin.brands.modal-update-brand')
                            <!-- /.modal -->
                        
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
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

<!-- modal CREATE -->
<div class="modal fade" id="modal-create-brand">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Marca</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{ route('admin.brands.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Marca</label> 
                        <input type="text" name="name" class="form-control" id="brand">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form> 
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



@stop

@section('js')
    <script>
    $(document).ready(function() {
        $('#brands').DataTable( {
            "order": [[ 0, "asc" ]]
        } );
    } );
    </script>
@stop



