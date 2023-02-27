<div class="modal fade" id="modal-detail-cart-{{count($cart)}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Carrito de compra</h4>
                <button style="border:none; background:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.5rem;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Datos del usuario</h3>
                    <div class="form-group">
                        <table class="table table-striped table-hover table-bordered">
                            <tr><td>Nombre:</td><td> {{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
                            <tr><td>Correo::</td><td> {{ Auth::user()->email }}</td></tr>
                            <!-- <tr><td>Direccion:</td><td> {{ Auth::user()->address }}</td></tr> -->
                        </table>
                    </div>
                    <div class="form-group">
                        <h3>Datos del usuario</h3>
                    </div>
                    <div class="form-group">
                       
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
