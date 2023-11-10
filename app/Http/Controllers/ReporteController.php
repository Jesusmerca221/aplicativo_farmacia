<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\Producto;
use Barryvdh\DomPDF\PDF;

class ReporteController extends Controller
{
    public function generarPDF()
    {
        $datos = Producto::all();
        
        $pdf = PDF::loadView('reporte.pdf', compact('datos'));

        return $pdf->download('reporte.pdf');
    }
}
