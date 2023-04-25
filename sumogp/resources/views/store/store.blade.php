@extends('layouts.app')

@section('title', 'Tienda')

@section('content')

 <!-- Contenido -->
    <section class="container-fluid content">
        
        <!-- Categorías -->
        <div id="bg_images" class="row justify-content-center">
            <div class="col-2" id="bg_cat">
                <nav class="text-center my-5 d-flex flex-column">
                    <a href="{{route('products.store')}}" class="mx-3 pb-3 link-category d-block d-md-inline {{isset($categoryIdSelected)? '': 'selected-category' }}" >Todas</a>
                    @foreach ($categories as $category)
                        <a href="{{route('store.category', $category->name)}}" class="my-3 pb-3 link-category d-block d-md-inline {{  (isset($categoryIdSelected) && $category->id == $categoryIdSelected)? 'selected-category': '' }}" >{{$category->name}}</a>
                    @endforeach
                    
                </nav>
            </div>

            <div class="col-10" id="filter_images">
                
                <!-- <div class="row d-flex justify-content-center my-4">
                    <a class="btn btn-primary w-25" href="{{route('cart.show')}}">Ir al carrito</a>    
                    <button class="custom-btn btn-14">Read More</button>
                </div> -->
                <div class="frame">
                    <a href="{{route('cart.show')}}" class="custom-btn btn-14">Ir al carrito</a>
                </div>

                <div class="row">
                    <!-- Post 1 -->
                    @foreach ($products as $product)
                    <div class="col-xl-4 col-md-6 col-12 justify-content-center mb-5">
                        <div class="card m-auto p-3" style="width: 18rem; display:flex !important; align-items:center;justify-content:center;">
                            <img style="width:75px;height:75px;" class="m-2" src="{{asset($product->image_product)}}" alt="{{$product->name_product}}">
                            <div class="card-body" >
                                <small class="card-txt-category">Categoría: {{$product->category->name}}</small>
                                <h5 class="card-title my-2">{{$product->name_product}}</h5>
                                <div class="d-card-text truncate-text">
                                    <p>{{$product->content}}</p>
                                </div>
                                @include('store.modal-item-content')
                                <a data-toggle="modal" data-target="#modal-item-content-{{$product->id}}" class="post-link"><b>Leer más</b></a>
                                <hr>
                                <div class="row">
                                    <a class="btn btn-warning btn-block" href="{{route('cart.add',$product->name_product)}}">Añadir al carrito</a>
                                </div>
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
                    <div class="row">
                        <div class="col-12 d-flex pt-5 justify-content-center pagination-lg">
                            {{ $products->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
