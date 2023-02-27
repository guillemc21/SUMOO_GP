@extends('layouts.app')

@section('title', 'Detalles del pedido')

@section('content')
<div class="container text-center">
    <div class="detalle-title">
        <h1><i class="fa fa-shopping-cart"></i>Carrito de compra</h1>
    </div>
    <div class="table-cart">
        <div class="table-responsive">
            <h3>Datos del usuario</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr><td>Nombre:</td><td> {{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
                <tr><td>Correo::</td><td> {{ Auth::user()->email }}</td></tr>
                <!-- <tr><td>Direccion:</td><td> {{ Auth::user()->address }}</td></tr> -->
            </table>
        </div>
    </div>
</div>
@endsection