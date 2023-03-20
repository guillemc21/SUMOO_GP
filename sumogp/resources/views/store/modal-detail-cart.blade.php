<div class="modal fade" id="modal-detail-cart-{{count($cart)}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Detalle de pedido</h4>
                <button style="border:none; background:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.5rem;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="font-weight-bold">Datos del usuario</h4>
                    <div class="form-group">
                        <table class="table table-striped table-hover table-bordered">
                            <tr><th>Nombre:</th><td> {{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
                            <tr><th>Correo:</th><td> {{ Auth::user()->email }}</td></tr>
                            <!-- <tr><td>Direccion:</td><td> {{ Auth::user()->address }}</td></tr> -->
                        </table>
                    </div>
                    <div class="form-group">
                        <h4 class="font-weight-bold">Datos de productos</h4>
                        <table class="table table-striped table-hover table-bordered">
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                            @foreach($cart as $item)
                                <tr>
                                    <td>{{ $item->name_product }}</td>
                                    <td>{{ number_format($item->sell_price,2) }}€</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->sell_price * $item->quantity,2) }}€</td>
                                </tr>
                            @endforeach
                        </table><hr style="width: 50%; margin-top:5px; margin-bottom:5px;">
                        <h3>
                            <span class="badge badge-success text-secondary">
                                Total: {{ number_format($total,2) }} €
                            </span>
                        </h3><hr>
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                    <button href="#" class="btn btn-outline-primary">Pagar con fifapoints</button>
                </div>
            
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
