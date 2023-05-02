<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Factura;
use Carbon\Carbon;


class CartController extends Controller
{
    public function store()
    {
        Carbon::setLocale('es');
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::paginate(9);
        return view('store.store',compact('products','categories','brands'));
    }

    public function productByCategory($category)
    {
        Carbon::setLocale('es');
        $brands = Brand::all();
        $categories=Category::all();
        $category = Category::where('name', '=' ,$category)->first();
        $categoryIdSelected = $category->id;
        $products = Product::where('category_id', '=' , $categoryIdSelected)->paginate(6);
       
        return view('store.store', [
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
            'categoryIdSelected' => $categoryIdSelected
        ]);
    }

    public function productByBrand($brand)
    {
        Carbon::setLocale('es');
        $categories=Category::all();
        $brands=Brand::all();
        $brand = Brand::where('name', '=' ,$brand)->first();
        $brandIdSelected = $brand->id;
        $products = Product::where('brand_id', '=' , $brandIdSelected)->paginate(6);
       
        return view('store.store', [
            'brands' => $brands,
            'products' => $products,
            'categories' => $categories,
            'brandIdSelected' => $brandIdSelected
        ]);
    }

    public function factureById($facture)
    {
        Carbon::setLocale('es');
        $factures = Factura::all();
        $facture = Factura::where('id', '=' ,$facture)->first();
        $factureID = $facture->id;

        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::paginate(9);
        
        return view('store.store',compact('products','categories','brands','factureID'));      
        
    }
    
}
