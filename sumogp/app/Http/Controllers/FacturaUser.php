<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use Exception;

class FacturaUser extends Controller
{
    public function ListFacturas($user)
    {
        
        $facturasUser = Factura::where('iduser', '=' ,$user)->paginate();
        
        return view('facture.factura-user', [
            'facturas' => $facturasUser
        ]);
    }

    public function IncidFacturas(Request $request)
    {
        
        try{

            $facturaComment = Factura::where('id', '=' ,$request->facture_id)->first();
            $facturaComment->comments  = $request->comment;
            $facturaComment->save();
            return redirect()->back()->with('send_comment', 'OK');
        }catch(Exception $e){
            return redirect()->back()->with('error_comment', 'OK');
        }
    }
    
}
