<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Factura;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;

//Fecha y hora actuales
date_default_timezone_set("Europe/Madrid");


class CartProductController extends Controller
{
     public function __construct()
     {
        if(!Session::has('cart')) {
            Session::put('cart',array()); 
            $cart = Session::get('cart'); 
            $cart['created_at'] = now()->toDateTimeString(); 
            $cart['updated_at'] = now()->toDateTimeString();
            Session::put('cart',$cart);
            // Session::push('cart',['created_at' => now()->toDateTimeString(), 'updated_at' => now()->toDateTimeString()]);
            // dd(Session::get('cart'));
        }
     }
    // public function prueba()
    // {
    //     Session::put('name', 'Guille Mendoza');
    //     return view('store.cart');
    // }
    
    public function show()
    {
        $cart = Session::get('cart');
        // dd($cart);
        // session::forget('cart');
        $total = $this->total();
        return view('store.cart',compact('cart','total'));
    }
    

    public function add($product)
    {
        $cart = Session::get('cart');
        $product = Product::where('name_product', '=' ,$product)->first();
        $product->quantity = 1;
        $cart[$product->name_product] = $product;
        $cart['created_at'] = now()->toDateTimeString();
        $cart['updated_at'] = now()->toDateTimeString();
        Session::put('cart',$cart);
        return redirect()->route('cart.show');

    }

    public function delete($product)
    {
        
        $cart = Session::get('cart');
        $product = Product::where('name_product', '=' ,$product)->first();
        // $cart['updated_at'] = now()->toDateTimeString();
        unset($cart[$product->name_product]);
        Session::put('cart',$cart);
        return redirect()->route('cart.show');

    }

     public function add_order_details()
     {
        $cart = Session::get('cart');
        
        //Reducir la cantidad del stock de x producto mediante la compra del cliente
        foreach ($cart as $key => $item) {
            if($item!=$cart['created_at'] or $item!=$cart['updated_at']) {
                $product = Product::where('id', '=' ,$item->id)->first();
                $product->stock -= $item->quantity;
                $product->save();
            }
        }

        //Datos de factura
        $content_factura = null;
        foreach ($cart as $key => $item) {
            if($item!=$cart['created_at'] or $item!=$cart['updated_at']){
                $content_factura = $content_factura.'|'.$item->name_product.','.$item->quantity.','.$item->sell_price.'.';
            }
        }

        //Vaciar carrito
        Session::forget('cart');
        Session::put('cart',array());
        $cart = Session::get('cart');
        $cart['created_at'] = now()->toDateTimeString();
        $cart['updated_at'] = now()->toDateTimeString();
        Session::put('cart',$cart);

        //Crear factura
        $newFactura = new Factura();
        $newFactura->iduser  = Auth::user()->id;
        $newFactura->nameuser  = Auth::user()->name;
        $newFactura->content  = $content_factura;
        $newFactura->save();

        return redirect()->route('products.store')->with('send', 'OK');
     }

    public function update(Request $request)
    {
        try{
            $cart = Session::get('cart');
            $product = Product::where('name_product', '=' ,$request->name_product)->first();
            $cart[$product->name_product]->quantity = $request->cantidad;
            // $cart['updated_at'] = now()->toDateTimeString();
            Session::put('cart',$cart);
            return redirect()->route('cart.show');
        }catch(Exception $e){
            return redirect()->route('products.store')->with('cart0', 'OK');
        }
        
        

    }

    public function trash()
    {
        
        Session::forget('cart');
        Session::put('cart',array());
        $cart = Session::get('cart');
        $cart['created_at'] = now()->toDateTimeString();
        $cart['updated_at'] = now()->toDateTimeString();
        Session::put('cart',$cart);
        return redirect()->route('cart.show');

    }

    private function total()
    {
        $cart=Session::get('cart');
        $total=0;
        foreach ($cart as $item) {
            
            if($item!=$cart['created_at'] or $item!=$cart['updated_at']){
                $total += $item->sell_price * $item->quantity;
            }
            
        }
        return $total;
    }

}
