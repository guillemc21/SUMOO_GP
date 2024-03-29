<div class="modal fade" id="modal-update-product-{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <!-- Form actualizar producto -->
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_product">Producto</label> 
                        <input type="text" name="name_product" class="form-control" id="name_product" value="{{ $product->name_product }}">
                    </div>
                    <div class="form-group">
                        <label for="sell_price">Precio</label> 
                        <input type="decimal" name="sell_price" class="form-control" id="sell_price" value="{{ $product->sell_price }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Contenido</label> 
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ $product->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label> 
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Marca</label> 
                        <select name="brand_id" id="brand_id" class="form-control">
                            
                            <option value="{{ $product->brand_id }}">{{ $product->brand->name }}</option>
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}"> {{$brand->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label> 
                        <input type="decimal" name="stock" class="form-control" id="stock" value="{{ $product->stock }}">
                    </div>
                    <div class="form-group">
                        <label for="featured">Imagen del producto</label> 
                        <input type="file" name="featured" class="form-control" id="featured" accept="image/*" value="{{ $product->image_product }}" onchange="validarFile(this);">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form> 
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function validarFile(all){
        var extensiones_permitidas = [".png", ".bmp", ".jpg", ".jpeg", ".doc", ".docx", ".gif"];
        var rutayarchivo = all.value;
        var ultimo_punto = all.value.lastIndexOf(".");
        var extension = rutayarchivo.slice(ultimo_punto, rutayarchivo.length);
        if(extensiones_permitidas.indexOf(extension) == -1){
            Swal.fire(
                'Error!',
                'El formato no es correcto.',
                'error',
            )
            document.getElementById(all.id).value = "";
            return;
        }
    }
    
</script>
