@extends('adminlte::page')

@section('title', 'AdminUsuarios - SUMOGP')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
    <link rel="shortcut icon" href="{{asset('images/logo/sumogp.png')}}">
@stop

@section('content_header')
    <h1 style="font-family: system-ui">
        <a>Usuarios</a>
    </h1>
    <hr>
    <button data-toggle="modal" data-target="#modal-create-user" class="icon-btn add-btn">
            <div class="add-icon"></div>
            <div class="btn-txt">Añadir usuario</div>
    </button>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Usuarios</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td class="btn_td">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-user-{{$user->id}}">
                                    Editar
                                    </button>
                                    <form class="form-elimiar" action="{{route('admin.users.delete', $user->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            <!-- modal UPDATE -->
                            @include('admin.users.modal-update-user')
                            <!-- /.modal -->
                        
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Role</th>
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
<div class="modal fade" id="modal-create-user">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{ route('admin.users.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label> 
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label> 
                        <input type="text" name="last_name" class="form-control" id="last_name">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label> 
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contrasenya</label> 
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label> 
                        <input type="checkbox" name="role" class="form-control" id="role">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'OK')
        <script>
            Swal.fire(
                'Eliminado!',
                'El usuario a sido eliminado.',
                'success',
            )
        </script>
    @endif
    <script>
    $(document).ready(function() {
        $('#users').DataTable( {
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



