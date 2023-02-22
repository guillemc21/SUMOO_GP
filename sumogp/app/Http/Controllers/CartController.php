<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{

    public function add(Request $request){
        $pro = Product::find($request->id);
        Cart::add(
            $pro->id,
            $pro->name_product,
            $pro->sell_price,
            $pro->content,
            $pro->categoryId,
            $pro->brandId,
            $pro->stock,
            $pro->image_product
        );
    }
    // public function shop()
    // {
    //     $products = Product::all();
    //    //dd($products);
    //     return view('shop')->with('SUMO-GP | TIENDA')->with(['products' => $products]);
    // }

    // public function cart()  {
    //     $cartCollection = \Cart::getContent();
    //     //dd($cartCollection);
    //     return view('cart')->with('SUMO-GP | CARRITO')->with(['cartCollection' => $cartCollection]);;
    // }
    // public function remove(Request $request){
    //     \Cart::remove($request->id);
    //     return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    // }

    // public function add(Request $request){
    //     \Cart::add(array(
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'quantity' => $request->quantity,
    //         'attributes' => array(
    //             'image' => $request->img,
    //             'slug' => $request->slug
    //         )
    //     ));
    //     return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    // }

    // public function update(Request $request){
    //     \Cart::update($request->id,
    //         array(
    //             'quantity' => array(
    //                 'relative' => false,
    //                 'value' => $request->quantity
    //             ),
    //     ));
    //     return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    // }

    // public function clear(){
    //     \Cart::clear();
    //     return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    // }

 

}
