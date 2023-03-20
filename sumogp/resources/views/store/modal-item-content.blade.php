<div class="modal fade" id="modal-item-content-{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Contenido del producto</h4>
                <button style="border:none; background:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.5rem;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>       
                <div class="modal-body">
                    <div class="form-group">
                        <textarea disabled readonly class="form-control truncate-text-content" rows="11">{{ $product->content }}</textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form> 
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
