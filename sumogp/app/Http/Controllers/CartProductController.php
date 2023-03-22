<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartProductController extends Controller
{
     public function __construct()
     {
         if(!Session::has('cart')) Session::put('cart',array());
     }
    // public function prueba()
    // {
    //     Session::put('name', 'Guille Mendoza');
    //     return view('store.cart');
    // }
    
    public function show()
    {
        $cart = Session::get('cart');
        $total = $this->total();
        return view('store.cart',compact('cart','total'));
    }
    

    public function add($product)
    {
        
        $cart = Session::get('cart');
        $product = Product::where('name_product', '=' ,$product)->first();
        $product->quantity = 1;
        $cart[$product->name_product] = $product;
        Session::put('cart',$cart);
        return redirect()->route('cart.show');

    }

    public function delete($product)
    {
        
        $cart = Session::get('cart');
        $product = Product::where('name_product', '=' ,$product)->first();
        unset($cart[$product->name_product]);
        Session::put('cart',$cart);
        return redirect()->route('cart.show');

    }

     public function add_order_details()
     {
        $cart = Session::get('cart');
        
        foreach ($cart as $key => $item) {
            $product = Product::where('id', '=' ,$item->id)->first();
            $product->stock -= $item->quantity;
            $product->save();
        }
        // return redirect()->route('cart.trash');
     }

    public function update(Request $request)
    {
        
        $cart = Session::get('cart');
        $product = Product::where('name_product', '=' ,$request->name_product)->first();
        $cart[$product->name_product]->quantity = $request->cantidad;
        Session::put('cart',$cart);
        return redirect()->route('cart.show');
        

    }

    public function trash()
    {
        
        Session::forget('cart');
        Session::put('cart',array());
        return redirect()->route('cart.show');

    }

    private function total()
    {
        $cart=Session::get('cart');
        $total=0;
        foreach ($cart as $item) {
            $total += $item->sell_price * $item->quantity;
        }
        return $total;
    }
}
