@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR VENTA</h2>

<form action="/ventas/{{$venta->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input id="codigo" name="codigo" type="text" class="form-control" value="{{$venta->codigo}}">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">id cliente</label>
    <input id="id_cliente" name="id_cliente" type="text" class="form-control" value="{{$venta->id_cliente}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">nombre producto</label>
    <input id="nombre_producto" name="nombre_producto" type="text" class="form-control" value="{{$venta->nombre_producto}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$venta->cantidad}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$venta->precio}}">
  </div>
  <a href="/ventas" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection