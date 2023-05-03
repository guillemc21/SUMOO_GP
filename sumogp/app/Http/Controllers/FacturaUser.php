<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;

class FacturaUser extends Controller
{
    public function ListFacturas($user)
    {
        
        $facturasUser = Factura::where('iduser', '=' ,$user)->first();
        dd($facturasUser);
        return view('factura-user', [
            'facturas' => $facturasUser
        ]);
    }
}
