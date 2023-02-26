@extends('layouts.app')

@section('title', 'Carrito')

@section('content')
<div class="container text-center login-container">
    <div>
        <h1><i class="fa fa-shopping-cart"></i>Carrito de compra</h1>
    </div>
    <div class="tsble-cart">
        @if(count($cart))
        <p>
            <a href="{{ route('cart.trash') }}" class="btn btn-danger"><i class="fa fa-trash"></i>Vaciar carrito</a>
        </p>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td><img style="width:75px;height:75px;" src="{{ asset($item->image_product) }}" alt=""></td>
                            <td>{{ $item->name_product }}</td>
                            <td>{{ number_format($item->sell_price,2) }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST">
                                {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->name_product }}" id="name_product" name="name_product">
                                        <input min="1"
                                        max="100" type="number" class="form-control form-control-sm" value="{{ $item->stock }}" id="cantidad" name="cantidad" style="width: 70px; margin:10px;">
                                        <button class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></button>
                                    </div>
                                </form>
                               
                            </td>
                            <td>
                                {{ number_format($item->sell_price * $item->stock,2) }}
                            </td>
                            <td>
                                <a href="{{ route('cart.delete',$item->name_product) }}" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table><hr>
            <h3>
                <span class="badge badge-success text-black">
                    Total: €{{ number_format($total,2) }}
                </span> 
            </h3>
        </div>
        @else
            <h3><span class="badge badge-warning text-black">No hay productos en el carrito :(</span></h3>
        @endif
        <hr>
        <p>
            <a href="{{ route('products.store') }}" class="btn btn-primary">
                <i class="fa fa-chevron-circle-left"></i> Seguir comprando
            </a>
            @if(count($cart))
            <a href="{{ route('order.detail') }}" class="btn btn-primary">Continuar<i class="fa fa-chevron-circle-right"></i></a>
            @endif
        </p>
    </div>
</div>
@endsection