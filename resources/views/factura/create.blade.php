@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nueva factura</h1>
        <form action="{{ route('facturas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" name="numero" id="numero" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('productos', collect()) as $producto)
                        <tr>
                            <td>{{ $producto->codigo }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->cantidad * $producto->precio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" name="total" id="total" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection