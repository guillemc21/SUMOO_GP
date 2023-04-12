@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    
    <!-- Contenido -->
    <section class="container-fluid content">
        <!-- Tienda -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center my-1">
                    <a href="/admin" class="btn btn-primary button-text" >Panel Administrador</a>
                    <a href="{{ route('products.store') }}" class="btn btn-danger button-text" >Tienda</a>
                </nav>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-75" src="/images/main/background1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-75" src="/images/main/background4.avif" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-75" src="/images/main/background3.jpg" alt="Third slide">
                </div>
            </div>
        </div>
    </section>

@endsection