@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    
    <!-- Contenido -->
    <section class="container-fluid content">
        <!-- Tienda -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center my-5">
                    <a href="/admin" class="btn btn-primary button-text" >Panel Administrador</a>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center my-5">
                    <a href="{{ route('products.store') }}" class="btn btn-danger button-text" >Tienda</a>
                </nav>
            </div>
        </div>
    </section>

@endsection