@extends('maestra')

@section('title', 'Productos')

@section('content_header')
    <h1></h1>
@stop

@section('content')


<form action="{{ url('/buscarProductos') }}" method="GET">
    <input type="text" name="busqueda" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>

<div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>                        
                        <th>Precio de venta</th>                        
                        <th>Existencia</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->codigo}}</td>
                            <td>{{$producto->descripcion}}</td>                            
                            <td>{{$producto->precio_venta}}</td>                            
                            <td>{{$producto->existencia}}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>                
            </div>    

            

    @stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
@stop

@section('js')
<script src="{{ asset('js/adminlte.js') }}"></script>
@stop            






