@extends('layouts.layout')

@section('title', 'Posts')

@section('contenido')
    
    <!-- Contenido -->
    <section class="container-fluid content">
        <!-- Categorías -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center my-5">
                    @foreach ($categories as $category)
                        <a href="{{route('products.category', $category->name)}}" class="mx-3 pb-3 link-category d-block d-md-inline selected-category" >{{$category->name}}</a>
                    @endforeach
                    
                </nav>
            </div>
        </div>

        <!-- Posts -->
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    <!-- Post 1 -->
                    @foreach ($products as $product)
                    <div class="col-md-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset($product->image_product)}}" alt="{{$product->name_product}}">
                            <div class="card-body">
                                <small class="card-txt-category">Categoría: {{$product->category->name}}</small>
                                <h5 class="card-title my-2">{{$product->name_product}}</h5>
                                <div class="d-card-text">
                                    {{$product->content}}
                                </div>
                                <a href="#" class="post-link"><b>Leer más</b></a>
                                <hr>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <span class="card-txt-author">{{$product->sell_price}} €</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <span class="card-txt-date">{{$product->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Post 2 -->
                    
                </div>
            </div>

            <div class="col-12">
                <!-- Paginador -->

            </div>
        </div>
    </section>

@endsection