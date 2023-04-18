@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    
    <!-- Contenido -->
    <section class="container-fluid content" style="padding: 0;">
        <!-- Tienda -->
        <div class="container justify-content-center">
            <div>
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
        </div>
        
        <div class="container cart_hover">
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
                        <img src="images\main\estuche_hover.jpg" alt="">
                        <img src="images\main\estuche_hover_after.png" alt="">
                    </article>
                </div>
                <div class="col-xl-4 col-md-6 col-12 d-flex justify-content-center">
                    <article>
                        <img src="images\main\sacapuntas_hover.jpg" alt="">
                        <img src="images\main\sacapuntas_hover_after.png" alt="">
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

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#190a02" fill-opacity="1" d="M0,224L17.1,202.7C34.3,181,69,139,103,149.3C137.1,160,171,224,206,224C240,224,274,160,309,144C342.9,128,377,160,411,192C445.7,224,480,256,514,266.7C548.6,277,583,267,617,266.7C651.4,267,686,277,720,282.7C754.3,288,789,288,823,250.7C857.1,213,891,139,926,133.3C960,128,994,192,1029,208C1062.9,224,1097,192,1131,186.7C1165.7,181,1200,203,1234,186.7C1268.6,171,1303,117,1337,106.7C1371.4,96,1406,128,1423,144L1440,160L1440,320L1422.9,320C1405.7,320,1371,320,1337,320C1302.9,320,1269,320,1234,320C1200,320,1166,320,1131,320C1097.1,320,1063,320,1029,320C994.3,320,960,320,926,320C891.4,320,857,320,823,320C788.6,320,754,320,720,320C685.7,320,651,320,617,320C582.9,320,549,320,514,320C480,320,446,320,411,320C377.1,320,343,320,309,320C274.3,320,240,320,206,320C171.4,320,137,320,103,320C68.6,320,34,320,17,320L0,320Z"></path></svg>
        <div class="carrusel_hover">

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#190a02" fill-opacity="1" d="M0,256L18.5,240C36.9,224,74,192,111,186.7C147.7,181,185,203,222,197.3C258.5,192,295,160,332,154.7C369.2,149,406,171,443,186.7C480,203,517,213,554,224C590.8,235,628,245,665,229.3C701.5,213,738,171,775,170.7C812.3,171,849,213,886,224C923.1,235,960,213,997,197.3C1033.8,181,1071,171,1108,149.3C1144.6,128,1182,96,1218,90.7C1255.4,85,1292,107,1329,117.3C1366.2,128,1403,128,1422,128L1440,128L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z"></path></svg>
        
    </section>

@endsection
