@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Ventas <i class="fa fa-list"></i></h1>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Fecha</th>                        
                        <th>Total</th>
                        <th>Ticket de venta</th>
                        <th>Detalles</th>
                        @can('ocultar-opcion')
                        <th>Eliminar</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ventas as $venta)
                        <tr>
                            <td>{{$venta->created_at}}</td>
                            
                            <td>${{number_format($venta->total, 2)}}</td>
                            <td>
                                <a class="btn btn-info" href="{{route("ventas.ticket", ["id"=>$venta->id])}}">
                                    <i class="fa fa-print"></i>
                                </a>
                                <a class="btn btn-info" href="{{route("formulario.pdf", ["id"=>$venta->id])}}">
                                     <i class="fa fa-sharp fa-solid fa-paper-plane"></i>
                                </a>
                            </td>
                    
                            <td>
                                <a class="btn btn-success" href="{{route("ventas.show", $venta)}}">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            @can('ocultar-opcion')
                            <td>
                                <form action="{{route("ventas.destroy", [$venta])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
@stop

@section('js')
<script src="{{ asset('js/adminlte.js') }}"></script>
@stop            

