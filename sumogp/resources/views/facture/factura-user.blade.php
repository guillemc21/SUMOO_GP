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
                <a data-toggle="modal" data-target="#modal-update-facture" class="custom-btn btn-14 w-25 m-auto mt-5 mb-4">Incidencia en algun pedido</a>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facturas as $factura)
                            
                                <tr>
                                    <td>{{ $factura->nameuser }}</td>
                                    <td>{{ $factura->last_name }}</td>
                                    <td>{{ $factura->email }}</td>
                                    <td>{{ number_format($factura->sell_price_total,2) }} €</td>
                                    <td class="td_date">{{ $factura->updated_at }}</td>
                                    <td style="padding:0;width: 235px;">
                                        <a href="/generar-pdf/{{$factura->id}}">
                                            <button class="button_pdf" type="button">
                                                <span class="button__text">Descargar</span>
                                                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                                            </button>
                                        </a>
                                    </td>
                                
                                </tr>
                                
                        @endforeach
                        <!-- modal UPDATE -->
                        @include('facture.modal-update-facture')
                        <!-- /.modal -->
                    </tbody>
                </table><hr style="width: 50%; margin-top:7px; margin-bottom:10px;">
                <h3>
                    <span class="badge badge-success text-black">
                        
                    </span> 
                </h3>
            </div>
            @else
                <h3><span class="badge badge-warning text-black"><b>Aun no tienes facturas.</b></span></h3>
                <h5 style="line-height:35px;">La proxima vez que realices alguna compra se guardara la factura en este sitio.</h5>
            @endif
            <hr>
            <div class="d-flex justify-content-center flex-column w-25 m-auto">
                <a href="{{route('home')}}" class="custom-btn btn-14 w-100">
                    Volver al Inicio
                </a>
                
            </div>
    </div>
</div>
@endsection