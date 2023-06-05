<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Factura;
use Illuminate\Support\Facades\Auth;


class PdfController extends Controller
{
    public function generarPdf(Request $request, $facturaId)
    {
        $factura = Factura::find($facturaId);
        $content_uns = unserialize($factura->content);
        $address_uns = unserialize($factura->address);
        // dd($content_uns);
        $data = [
            'nameuser' => $factura->nameuser,
            'last_name' => $factura->last_name,
            'email' => $factura->email,
            'tel' => Auth::user()->tel,
            'nif' => Auth::user()->nif,
            'address' => $address_uns,
            'delivery_day' => $factura->purchase_date,
            'delivery_time' => $factura->purchase_time,
            'content' => $content_uns,
            'date' => $factura->created_at,
            'id' => $factura->id,
            'total' => $factura->sell_price_total
        ];

        $pdf = PDF::loadView('pdf.pdf_factura', $data);
        return $pdf->download('Factura.pdf');
    }

}