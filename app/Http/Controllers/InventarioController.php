<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use Illuminate\Http\Request;
use App\Models\Producto;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=$request->input('busqueda');
        $productos = Producto::
                    where('codigo', 'LIKE', '%' . $texto . '%')
                    ->orWhere('descripcion', 'like', '%'.$texto.'%')->get();  
                     
        return view('inventario.index')->with('productos',$productos);
    }

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {   

        
        $productos = new Producto();
        $productos->codigo = $request->get('codigo');
        $productos->descripcion = $request->get('descripcion');
        $productos->precio_compra = $request->get('precio_compra');
        $productos->precio_venta = $request->get('precio_venta');
        $productos->existencia = $request->get('existencia');
        $productos->save();

        

        return redirect('/inventario');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('inventario.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        
        $producto = Producto::find($id); 
        $producto->delete();       
        return view('inventario.edit')->with('producto',$producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCreateRequest $request, string $id)
    {
        $producto = Producto::find($id);
        
        $producto = new Producto();
        $producto->codigo = $request->get('codigo');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio_compra = $request->get('precio_compra');
        $producto->precio_venta = $request->get('precio_venta');
        $producto->existencia = $request->get('existencia');

        $producto->save();

        

        return redirect('/inventario');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);        
        $producto->delete();

        return redirect('/inventario');
    }

}
