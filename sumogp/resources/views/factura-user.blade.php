@extends('layouts.app')

@section('title', 'Facturas del usuario')

@section('content')
<div class="container text-center login-container" style="height: 55rem;">
    <div>
        <h1><i class="fa fa-shopping-cart"></i>Facturas de {{ Auth::user()->name }}</h1>
    </div>
    <div class="tsble-cart" id="main_transition">
        @if(count($facturas)>0)
        <p>
            <a class="btn btn-outline-danger">Facturas de {{ Auth::user()->name }}</a>
        </p>
        <div class="table-responsive" style="max-height: 500px;">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Precio total</th>
                        <th>Fecha de creacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facturas as $factura)
                        
                            <tr>
                                <td>{{ $factura->nameuser }}</td>
                                <td>{{ $factura->last_name }}</td>
                                <td>{{ $factura->email }}</td>
                                <td>{{ $factura->sell_price_total }}</td>
                                <td>{{ $factura->updated_at }}</td>
                            
                            </tr>
                        
                    @endforeach
                </tbody>
            </table><hr style="width: 50%; margin-top:7px; margin-bottom:10px;">
            <h3>
                <span class="badge badge-success text-black">
                    
                </span> 
            </h3>
        </div>
        
            <h3><span class="badge badge-warning text-black"><b>Aun no tienes facturas.</b></span></h3>
            <h5 style="line-height:35px;">La proxima vez que realices alguna compra se guardara la factura en este sitio..</h5>
        
        <hr>
        <div class="d-flex justify-content-center flex-column w-25 m-auto">
            <a href="{{route('home')}}" class="custom-btn btn-14 w-100">
                Volver al Inicio
            </a>
            
        </div>
    </div>
</div>
@endsection