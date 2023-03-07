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

        if( $request->hasFile('featured') ){
            $file = $request->file('featured');
            $destinationPath = 'images/featureds/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);
            $newPost->image_product = $destinationPath . $filename;
        }

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
        
        if( $request->hasFile('featured') ){
            $file = $request->file('featured');
            $destinationPath = 'images/featureds/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);
            $product->image_product = $destinationPath . $filename;
        }
        $product->save();
        //dd($request->category);
        //dd($request->all());
        return redirect()->back();
     }

     public function delete(Request $request, $productId)
     {
        // dd( \App\Models\Models\Category::all());
  
        $product = Product::find($productId); 
        $product->delete();
        //dd($request->category);
        //dd($request->all());
        return redirect()->route('admin.products')->with('eliminar', 'OK');
     }
}
