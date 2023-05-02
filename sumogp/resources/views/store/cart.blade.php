@extends('layouts.app')

@section('title', 'Carrito')

@section('content')
<div class="container text-center login-container" style="height: 55rem;">
    <div>
        <h1><i class="fa fa-shopping-cart"></i>Carrito de compra</h1>
    </div>
    <div class="tsble-cart">
        @if(count($cart)>2)
        <p>
            <a href="{{ route('cart.trash') }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i>Vaciar carrito</a>
        </p>
        <div class="table-responsive" style="max-height: 500px;">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        @if($item!=$cart['created_at'] or $item!=$cart['updated_at'])
                            <tr>
                                <td><img style="width:75px;height:75px;" src="{{ asset($item->image_product) }}" alt=""></td>
                                <td>{{ $item->name_product }}</td>
                                <td><a>{{ number_format($item->sell_price,2) }} €</a></td>
                                <td>
                                    <form class="form-update" action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                        <div class="form-group row">
                                            <input type="hidden" value="{{ $item->name_product }}" id="name_product" name="name_product">
                                            <input min="1"
                                            max="100" type="number" class="form-control form-control-sm" value="{{ $item->quantity }}" id="cantidad" name="cantidad" style="width: 70px; margin:10px; " onchange="this.form.submit()">
                                            
                                        </div>
                                    </form>
                                
                                </td>
                                <td>
                                    {{ number_format($item->sell_price * $item->quantity,2) }} €
                                </td>
                                <td>
                                    <a href="{{ route('cart.delete',$item->name_product) }}" class="btn_delete">
                                        <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                                        <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table><hr style="width: 50%; margin-top:7px; margin-bottom:10px;">
            <h3>
                <span class="badge badge-success text-black">
                    Total: {{ number_format($total,2) }} €
                </span> 
            </h3>
        </div>
        @else
            <h3><span class="badge badge-warning text-black"><b>Tu carrito está vació</b></span></h3>
            <h5 style="line-height:35px;">Los productos permanecen en tu carrito durante 30 minutos<br>en el caso de que no haya ninguna modificación agregando nuevos productos.</h5>
        @endif
        <hr>
        <div class="d-flex justify-content-center flex-column w-25 m-auto">
            <a href="{{ route('products.store') }}" class="custom-btn btn-14 w-100">
                Seguir comprando
            </a>
            <br>
            @if(count($cart)>2)
                <button type="button" class="custom-btn btn-14 w-100" data-toggle="modal" data-target="#modal-detail-cart-{{count($cart)}}">
                    Continuar
                </button>            
                <!-- modal DETAIL -->
                @include('store.modal-detail-cart')
                <!-- /.modal -->
            @endif
        </div>
    </div>
</div>
@endsection