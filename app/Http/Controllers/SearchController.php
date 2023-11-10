<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Search;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $productos = Producto::where('nombre', 'like', '%'.$query.'%')
                                ->orWhere('descripcion', 'like', '%'.$query.'%')
                                ->get();

        return view('productos.index', ['productos' => $productos]);
    }
}
