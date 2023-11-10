@extends('adminlte::page')

@section('title', 'Enviar Factura')

@section('content_header')
    
@stop

@section('content')

  <div class="row">
      <div class="col-12">          
          @include("notificacion")
          <div class="row">
              <div class="col-12 col-md-6">
                  <form action="{{route("terminarOCancelarVenta")}}" method="post">
                      @csrf
                      
                      @if(session("productos") !== null)
                          <div class="form-group">
                              <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                  venta
                              </button>
                              <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                  venta
                              </button>
                          </div>
                      @endif
                  </form>
              </div>
              <div class="col-12 col-md-6">
                <form action="{{route("agregarProductoVenta")}}" method="post">
                    @csrf
                    <div class="form-group">
                    <div class="input-group">
                        <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text" class="form-control" placeholder="Código" style="width: 50%;">
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                    </div>
               </form>
              </div>
          </div>
          @if(session("productos") !== null)
              <h2>Total: ${{number_format($total, 2)}}</h2>
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                      <tr>
                          <th>Código</th>
                          <th>Descripción</th>
                          <th>precio_venta</th>
                          <th>Cantidad</th>
                          <th>Quitar</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach(session("productos") as $producto)
                          <tr>
                              <td>{{$producto->codigo}}</td>
                              <td>{{$producto->descripcion}}</td>
                              <td>${{number_format($producto->precio_venta, 2)}}</td>
                              <td>{{$producto->cantidad}}</td>
                              <td>
                                  <form action="{{route("quitarProductoDeVenta")}}" method="post">
                                      @method("delete")
                                      @csrf
                                      <input type="hidden" name="indice" value="{{$loop->index}}">
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
          @else
              <h2>Aquí aparecerán los productos de la venta
                  <br>
                  Escanea el código de barras o escribe y presiona Enter</h2>
          @endif
      </div>
  </div>


  @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop              
