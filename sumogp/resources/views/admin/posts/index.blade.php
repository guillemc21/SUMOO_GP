@extends('adminlte::page')

@section('title', 'AdminPosts - SUMOGP')

@section('css')
    <!-- <link rel="stylesheet" href="css/admin_custom.css"> -->
@stop

@section('content_header')
    <h1 style="font-family: system-ui">
        Posts
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-post">
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
                    <h3 class="card-title">Listado de Posts</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="posts" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-post-{{$post->id}}">
                                 Editar
                                </button>
                                    <form action="{{route('admin.posts.delete', $post->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            <!-- modal UPDATE -->
                            @include('admin.posts.modal-update-post')
                            <!-- /.modal -->
                        
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
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
<div class="modal fade" id="modal-create-post">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{ route('admin.posts.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Post</label> 
                        <input type="text" name="name" class="form-control" id="post">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label> 
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Elegir categoria --</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Contenido</label> 
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                        
                    </div>
                    <div class="form-group">
                        <label for="author">Autor</label> 
                        <input type="text" name="author" class="form-control" id="author">
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
        $('#posts').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
    } );
    </script>
@stop
