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
    
     public function update(Request $request, $postId)
     {
        // dd( \App\Models\Models\Category::all());
      
        $post = Product::find($postId); 
     
        $post->title  = $request->title;
        $post->save();
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
