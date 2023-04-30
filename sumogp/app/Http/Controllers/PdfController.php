<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Factura;


class PdfController extends Controller
{
    public function generarPdf(Request $request, $facturaId)
    {
        $factura = Factura::find($facturaId);
        $content_uns = unserialize($factura->content);
        // dd($content_uns);
        $data = [
            'nameuser' => $factura->nameuser,
            'last_name' => $factura->last_name,
            'email' => $factura->email,
            'content' => $content_uns,
            'date' => $factura->created_at,
            'total' => $factura->sell_price_total
        ];

        $pdf = PDF::loadView('pdf.pdf_factura', $data);
        return $pdf->download('Factura.pdf');
    }

}