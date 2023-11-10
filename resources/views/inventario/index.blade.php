@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1></h1>
@stop

@section('content')


<form action="{{ url('/buscarProductos') }}" method="GET">
    <input type="text" name="busqueda" placeholder="Ingresar Busqueda">
    <button type="submit">Buscar</button>
</form>

<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#agregarProductoModal">Agregar Producto</a>
@include("notificacion")
<div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Utilidad</th>
                        <th>Existencia</th>

                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->codigo}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->precio_compra}}</td>
                            <td>{{$producto->precio_venta}}</td>
                            <td>{{$producto->precio_venta - $producto->precio_compra}}</td>
                            <td>{{$producto->existencia}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("inventario.edit",[$producto])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("inventario.destroy", [$producto])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>                
            </div>    

            <div class="modal fade" id="agregarProductoModal" tabindex="-1" role="dialog" aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarProductoModalLabel">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí se puede agregar el formulario para agregar nuevos productos -->
                <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route("inventario.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Código</label>
                    <input required autocomplete="off" name="codigo" class="form-control"
                           type="text" placeholder="Código">
                </div>
                @foreach ($errors->all() as $error)
                    <li>El codigo ya esta en uso</li>
                @endforeach
                <div class="form-group">
                    <label class="label">Descripción</label>
                    <input required autocomplete="off" name="descripcion" class="form-control"
                           type="text" placeholder="Descripción">
                </div>
                <div class="form-group">
                    <label class="label">Precio de compra</label>
                    <input required autocomplete="off" name="precio_compra" class="form-control"
                           type="text" placeholder="Precio de compra">
                </div>
                <div class="form-group">
                    <label class="label">Precio de venta</label>
                    <input required autocomplete="off" name="precio_venta" class="form-control"
                           type="text" placeholder="Precio de venta">
                </div>
                <div class="form-group">
                    <label class="label">Existencia</label>
                    <input required autocomplete="off" name="existencia" class="form-control"
                           type="text" placeholder="Existencia">
                </div>

                

                
                <button class="btn btn-success">Guardar</button>
                
            </form>
        </div>
    </div>
   

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop            



@stop

