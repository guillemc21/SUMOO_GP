@extends('layouts.app')

@section('title', 'Tienda')

@section('content')

 <!-- Contenido -->
    <section class="container-fluid content">
        <div class="row">
            <div class="col-12 d-flex pt-5 justify-content-center">
                {{ $products->links("pagination::bootstrap-4") }}
            </div>
        </div>
        <!-- Categorías -->
        <div class="row justify-content-center">
            <div class="col-2">
                <nav class="text-center my-5 d-flex flex-column">
                    <a href="{{route('products.store')}}" class="mx-3 pb-3 link-category d-block d-md-inline {{isset($categoryIdSelected)? '': 'selected-category' }}" >Todas</a>
                    @foreach ($categories as $category)
                        <a href="{{route('store.category', $category->name)}}" class="my-3 pb-3 link-category d-block d-md-inline {{  (isset($categoryIdSelected) && $category->id == $categoryIdSelected)? 'selected-category': '' }}" >{{$category->name}}</a>
                    @endforeach
                    
                </nav>
            </div>

            <div class="col-10">
                <div class="row">
                    <!-- Post 1 -->
                    @foreach ($products as $product)
                    <div class="col-md-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto p-3" style="width: 18rem; display:flex !important; align-items:center;justify-content:center;">
                            <img style="width:75px;height:75px;" class="m-2" src="{{asset($product->image_product)}}" alt="{{$product->name_product}}">
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

        </div>

    </section>

@endsection
