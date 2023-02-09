<div class="modal fade" id="modal-update-product-{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.products.update', $product->id) }}" method="product">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">product</label> 
                        <input type="text" name="title" class="form-control" id="category" value="{{ $product->title }}">
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
