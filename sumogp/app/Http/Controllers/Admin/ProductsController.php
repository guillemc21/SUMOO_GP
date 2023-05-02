<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

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
        try{
            // dd( \App\Models\Models\Category::all());
            $newProduct = new Product();

            if( $request->hasFile('featured') ){
                $file = $request->file('featured');
                $destinationPath = 'images/featureds/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);
                $newProduct->image_product = $destinationPath . $filename;
            }

            $newProduct->name_product  = $request->name_product;
            $newProduct->sell_price  = $request->sell_price;
            $newProduct->content  = $request->content;
            $newProduct->category_id  = $request->category_id;
            $newProduct->brand_id  = $request->brand_id;
            $newProduct->stock  = $request->stock;
            $newProduct->quantity  = 0;
            $newProduct->save();
            //dd($request->category);
            //dd($request->all());
            return redirect()->back();
        }catch(Exception $e){
            return redirect()->back()->with('error', 'OK');
        }
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
