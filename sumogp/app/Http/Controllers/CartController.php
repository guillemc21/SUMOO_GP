<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class CartController extends Controller
{
    public function store()
    {
        $categories = Category::all();
        $products = Product::paginate(6);
        return view('store.store',compact('products','categories'));
    }

    public function productByCategory($category)
    {
        $categories=Category::all();
        $category = Category::where('name', '=' ,$category)->first();
        $categoryIdSelected = $category->id;
        $products = Product::where('category_id', '=' , $categoryIdSelected)->paginate(6);
       
        return view('store.store', [
            'categories' => $categories,
            'products' => $products,
            'categoryIdSelected' => $categoryIdSelected
        ]);
    }
    
}
