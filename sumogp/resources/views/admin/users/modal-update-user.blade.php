<div class="modal fade" id="modal-update-user-{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Marca</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label> 
                        <input type="text" name="name" class="form-control" id="user">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label> 
                        <input type="text" name="last_name" class="form-control" id="user">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label> 
                        <input type="text" name="email" class="form-control" id="user">
                    </div>
                    <div class="form-group">
                        <label for="password">Contrasenya</label> 
                        <input type="text" name="passw0rd" class="form-control" id="user">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label> 
                        <input type="checkbox" name="role" class="form-control" id="user">
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
