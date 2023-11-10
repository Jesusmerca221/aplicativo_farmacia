<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Producto;


class FacturaController extends Controller
{
    public function create()
    {
        return view('facturas.create');
    }

    public function store(Request $request)
    {
        $productos = session('productos', collect());
        $total = $request->input('total');
        $factura = new Factura([
            'numero' => $request->input('numero'),
            'fecha' => $request->input('fecha'),
            'total' => $total,
            // otros campos necesarios
        ]);
        $factura->save();
        foreach ($productos as $producto) {
            $factura->productos()->attach($producto->id, [
                'precio' => $producto->precio,
                'cantidad' => $producto->cantidad,
                'subtotal' => $producto->precio * $producto->cantidad,
            ]);
        }
        session()->forget('productos');
        return redirect()->route('facturas.show', $factura);
    }

    public function show(Factura $factura)
    {
        return view('facturas.show', compact('factura'));
    }
}
