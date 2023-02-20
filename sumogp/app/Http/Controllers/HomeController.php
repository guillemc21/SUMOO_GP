<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories=Category::all();
        $products=Product::all();
        
        return view('posts', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function post()
    {
        return view('post');
    }

    public function productByCategory($category)
    {
        $categories=Category::all();
        $category = Category::where('name', '=' ,$category)->first();
        $products = Product::where('category_id', '=' , $category->id)->get();
        return view('posts', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
