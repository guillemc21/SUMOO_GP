@extends('adminlte::page')

@section('title', 'AdminCategorias - SUMOGP')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
    <link rel="shortcut icon" href="{{asset('images/logo/sumogp.png')}}">
@stop

@section('content_header')
    <h1 style="font-family: system-ui">
        <a>Categorías</a>
    </h1>
    <hr>
    <button data-toggle="modal" data-target="#modal-create-category" class="icon-btn add-btn">
            <div class="add-icon"></div>
            <div class="btn-txt">Añadir categoria</div>
    </button>
    
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td class="btn_td">
                                    <button type="button" class="btn btn-warning w-50" data-toggle="modal" data-target="#modal-update-category-{{$category->id}}">
                                    Editar
                                    </button>
                                    <form class="w-50" action="{{route('admin.categories.delete', $category->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            <!-- modal UPDATE -->
                            @include('admin.categories.modal-update-category')
                            <!-- /.modal -->
                        
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Categoria</th>
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
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Categoria</label> 
                        <input type="text" name="name" class="form-control" id="category">
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
        $('#categories').DataTable( {
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
    </script>
@stop
