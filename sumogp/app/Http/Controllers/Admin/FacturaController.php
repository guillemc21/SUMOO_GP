<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Factura;

class FacturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $facturas = Factura::all();
       return view('admin.facturas.index', ['facturas' => $facturas]);
    }

    public function store(Request $request)
    {
       // dd( \App\Models\Models\Factura::all());

       $newFactura = new Factura();
       $newFactura->name  = $request->name;
       $newFactura->save();
       //dd($request->Factura);
       //dd($request->all());
       return redirect()->back();
    }
    
    public function update(Request $request, $facturaId)
    {
       // dd( \App\Models\Models\Category::all());
        
       $factura = Factura::find($facturaId); 
       
       $factura->name  = $request->name;
       $factura->save();
       //dd($request->factura);
       //dd($request->all());
       return redirect()->back();
    }

    public function delete(Request $request, $facturaId)
    {
       // dd( \App\Models\Models\Category::all());
        
       $factura = Factura::find($facturaId); 
       $factura->delete();
       //dd($request->factura);
       //dd($request->all());
       return redirect()->back()->with('eliminar_factura', 'OK');
    }
}
