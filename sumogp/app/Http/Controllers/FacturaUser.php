<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;

class FacturaUser extends Controller
{
    public function ListFacturas($user)
    {
        
        $facturasUser = Factura::where('iduser', '=' ,$user)->paginate();
        
        return view('factura-user', [
            'facturas' => $facturasUser
        ]);
    }
}
