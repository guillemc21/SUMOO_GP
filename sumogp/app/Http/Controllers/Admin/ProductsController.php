<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

     public function store(Request $request)
     {
        // dd( \App\Models\Models\Category::all());
        $newPost = new Product();
        $newPost->title  = $request->title;
        $newPost->category_id  = $request->category_id;
        $newPost->content  = $request->content;
        $newPost->author  = $request->author;
        $newPost->save();
        //dd($request->category);
        //dd($request->all());
        return redirect()->back();
     }
    
     public function update(Request $request, $productId)
     {
        // dd( \App\Models\Models\Category::all());
      
        $new_product = Product::find($productId); 
     
        $new_product->name_product  = $request->name_product;
        $new_product->sell_price  = $request->sell_price;
        $new_product->content  = $request->content;
        $new_product->category_id  = $request->category_id;
        $new_product->brand_id  = $request->brand_id;
        $new_product->stock  = $request->stock;
        $new_product->save();
        //dd($request->category);
        //dd($request->all());
        return redirect()->back();
     }

     public function delete(Request $request, $postId)
     {
        // dd( \App\Models\Models\Category::all());
  
        $post = Product::find($postId); 
        $post->delete();
        //dd($request->category);
        //dd($request->all());
        return redirect()->back();
     }
}
