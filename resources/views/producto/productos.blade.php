@extends('layouts.plantillabase')

@section('content')
    <div class="container">
        <h1>Agregar productos</h1>

        <form method="post" action="/productos">
            @csrf

            <div class="form-group">
                <label for="identificacion">Identificación del cliente:</label>
                <input type="text" class="form-control" id="identificacion" name="identificacion">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>

            <button type="submit" class="btn btn-primary">Agregar producto</button>
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session()->get('productos', []) as $producto)
                    <tr>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio_venta }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>Total:</td>
                    <td>{{ collect(session()->get('productos', []))->sum('precio_venta') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
