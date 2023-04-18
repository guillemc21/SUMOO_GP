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
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="images\main\background3.jpg" height="600" width="800" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hola mundo</h5>
                        <p>HOla mundo que tal estas</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="images\main\background4.jpg" height="600" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hola mundo</h5>
                        <p>HOla mundo que tal estas</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="images\main\background5.jpg" height="600" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hola mundo</h5>
                        <p>HOla mundo que tal estas</p>
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12 mb-5 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/286x180.png?text=Imagen+1" class="card-img-top" alt="Imagen 1">
                    <div class="card-body">
                        <h5 class="card-title">Título de la carta 1</h5>
                        <p class="card-text">Texto de la carta 1. Aquí puedes escribir una descripción corta del contenido de la carta.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12 mb-5 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/286x180.png?text=Imagen+2" class="card-img-top" alt="Imagen 2">
                    <div class="card-body">
                        <h5 class="card-title">Título de la carta 2</h5>
                        <p class="card-text">Texto de la carta 2. Aquí puedes escribir una descripción corta del contenido de la carta.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12 mb-5 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/286x180.png?text=Imagen+3" class="card-img-top" alt="Imagen 3">
                    <div class="card-body">
                        <h5 class="card-title">Título de la carta 3</h5>
                        <p class="card-text">Texto de la carta 3. Aquí puedes escribir una descripción corta del contenido de la carta.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        
        </div>
        
        <div class="cart_hover">
            <h5><b>Catálogo escolar</b></h5>
            <p>Aqui podras ver una pequeña muestra de los materiales escolares que vendemos, compralo ya en nuestra tienda!.</p>
            <br>
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12 d-flex justify-content-center">
                    <article>
                        <img src="images\main\mochila_hover.jpg" alt="">
                        <img src="images\main\mochila_hover_after.png" alt="">
                    </article>
                </div>
                <div class="col-xl-4 col-md-6 col-12 d-flex justify-content-center">
                    <article>
                        <img src="images\main\mochila_hover.jpg" alt="">
                        <img src="images\main\mochila_hover_after.png" alt="">
                    </article>
                </div>
                <div class="col-xl-4 col-md-6 col-12 d-flex justify-content-center">
                    <article>
                        <img src="images\main\mochila_hover.jpg" alt="">
                        <img src="images\main\mochila_hover_after.png" alt="">
                    </article>
                </div>
                <div class="col-xl-4 col-md-6 col-12 d-flex justify-content-center">
                    <article>
                        <img src="images\main\mochila_hover.jpg" alt="">
                        <img src="images\main\mochila_hover_after.png" alt="">
                    </article>
                </div>
                <div class="col-xl-4 col-md-6 col-12 d-flex justify-content-center">
                    <article>
                        <img src="images\main\mochila_hover.jpg" alt="">
                        <img src="images\main\mochila_hover_after.png" alt="">
                    </article>
                </div>
                <div class="col-xl-4 col-md-6 col-12 d-flex justify-content-center">
                    <article>
                        <img src="images\main\mochila_hover.jpg" alt="">
                        <img src="images\main\mochila_hover_after.png" alt="">
                    </article>
                </div>
            </div>
            
        </div>
        
    </section>

@endsection
