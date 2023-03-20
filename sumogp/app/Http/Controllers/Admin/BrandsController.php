<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Brand;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $brands = Brand::all();
       return view('admin.brands.index', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
       // dd( \App\Models\Models\Brand::all());

       $newBrand = new Brand();
       $newBrand->name  = $request->name;
       $newBrand->save();
       //dd($request->Brand);
       //dd($request->all());
       return redirect()->back();
    }
    
    public function update(Request $request, $brandId)
    {
       // dd( \App\Models\Models\Category::all());
        
       $brand = Brand::find($brandId); 
       
       $brand->name  = $request->name;
       $brand->save();
       //dd($request->brand);
       //dd($request->all());
       return redirect()->back();
    }

    public function delete(Request $request, $brandId)
    {
       // dd( \App\Models\Models\brand::all());
        
       $brand = Brand::find($brandId); 
       $brand->delete();
       //dd($request->brand);
       //dd($request->all());
       return redirect()->back()->with('eliminar', 'OK');
    }
}
