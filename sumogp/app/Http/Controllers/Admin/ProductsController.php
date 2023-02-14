<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
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
        $brands = Brand::all();
        return view('admin.products.index', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

     public function store(Request $request)
     {
        // dd( \App\Models\Models\Category::all());
        $newPost = new Product();
        $newPost->name_product  = $request->name_product;
        $newPost->sell_price  = $request->sell_price;
        $newPost->content  = $request->content;
        $newPost->category_id  = $request->category_id;
        $newPost->brand_id  = $request->brand_id;
        $newPost->stock  = $request->stock;
        
        $newPost->save();
        //dd($request->category);
        //dd($request->all());
        return redirect()->back();
     }
    
     public function update(Request $request, $productId)
     {
        // dd( \App\Models\Models\Category::all());
      
        $product = Product::find($productId); 
     
        $product->name_product  = $request->name_product;
        $product->sell_price  = $request->sell_price;
        $product->content  = $request->content;
        $product->category_id  = $request->category_id;
        $product->brand_id  = $request->brand_id;
        $product->stock  = $request->stock;
        $product->save();
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
