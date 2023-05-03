<div class="modal fade" id="modal-update-facture">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Cuentanos qué problema has tenido</h4>
                <button style="border:none; background:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.5rem;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('facture.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="facture_id"><b>Selecciona el identificador de la factura que nos deseas informar:</b></label> 
                        <select name="facture_id" id="facture_id" class="form-control">
                            <option value="">-- Elegir factura --</option>
                            @foreach ($facturas as $factura)
                            <option value="{{$factura->id}}"> {{$factura->id}} </option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="comment"><b>Escribe un comentario:</b></label> 
                        <textarea name="comment" id="comment" class="form-control truncate-text-content" placeholder="Escribe que incidencia has tenido..." rows="11"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="custom-btn btn-14 w-50 m-auto">Enviar comentario</button>
                </div>
            </form> 
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->