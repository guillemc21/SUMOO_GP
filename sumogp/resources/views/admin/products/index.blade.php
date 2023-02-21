@extends('adminlte::page')

@section('title', 'AdminProductos - SUMOGP')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop


@section('content_header')
    <h1 style="font-family: system-ui">
        Productos
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-product">
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
                    <h3 class="card-title">Listado de productos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="products" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Informacion</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name_product}}</td>
                                <td>{{$product->sell_price}} €</td>
                                <td>{{$product->content}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->stock}}</td>
                                <td>
                                    <img src="{{asset($product->image_product)}}" alt="{{ $product->name_product }}" class="img-fluid img-thumbnail" width="100px">
                                </td>
                                <td class="btn_td">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-product-{{$product->id}}">
                                    Editar
                                    </button>
                                    <form action="{{route('admin.products.delete', $product->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button  class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- modal UPDATE -->
                            @include('admin.products.modal-update-product')
                            <!-- /.modal -->
                        
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Informacion</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Stock</th>
                            <th>Imagen</th>
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
<div class="modal fade" id="modal-create-product">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_product">Producto</label> 
                        <input type="text" name="name_product" class="form-control" id="name_product">
                    </div>
                    <div class="form-group">
                        <label for="sell_price">Precio</label> 
                        <input type="decimal" name="sell_price" class="form-control" id="sell_price">
                    </div>
                    <div class="form-group">
                        <label for="content">Contenido</label> 
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
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
                        <label for="brand_id">Marca</label> 
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option value="">-- Elegir marca --</option>
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}"> {{$brand->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label> 
                        <input type="decimal" name="stock" class="form-control" id="stock">
                    </div>
                    <div class="form-group">
                        <label for="featured">Imagen del producto</label> 
                        <input type="file" name="featured" class="form-control" id="featured">
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
        $('#products').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
    } );


    

    </script>
@stop
