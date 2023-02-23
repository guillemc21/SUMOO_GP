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

    private function total()
    {
        $cart=Session::get('cart');
        $total=0;
        foreach ($cart as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }
}
