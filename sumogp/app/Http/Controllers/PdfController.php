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
        $data = [
            'title' => $factura->nameuser,
            'content' => $factura->content,
            'date' => $factura->created_at
        ];

        $pdf = PDF::loadView('pdf.ejemplo', $data);
        return $pdf->download('Factura.pdf');
    }

}