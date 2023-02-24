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
            <a href="{{ route('cart-trash') }}" class="btn btn-danger"><i class="fa fa-trash"></i>Vaciar carrito</a>
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
                        <th>
                            <td><img src="{{ $item->image_product }}" alt=""></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price,2) }}</td>
                            <td>
                                <input 
                                    type="number"
                                    class="input-update-item"
                                    min="1"
                                    max="100"
                                    value="{{ $item->quantity }}"
                                    id="product_{{ $item->id }}"
                                >
                                <a 
                                    href="#"
                                    class="btn btn-warning btn-update-item"
                                    data-href="{{ route('cart-update' ,$item->name) }}"
                                    data-id="{{ $item->id }}"
                                    >
                                        <i class="fa fa-refresh"></i>
                                </a>
                            </td>
                            <td>
                                {{ number_format($item->price * $item->quantity,2) }}
                            </td>
                            <td>
                                <a href="{{ route('cart-delete',$item->name) }}" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </th>
                    @endforeach
                </tbody>
            </table><hr>
            <h3>
                <span class="badge badge-success">
                    Total: ${{ number_format($total,2) }}
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
            <a href="{{ route('order-detail') }}" class="btn btn-primary">Continuar<i class="fa fa-chevron-circle-right"></i></a>
            @endif
        </p>
    </div>
</div>
@endsection