@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR PRODUCTOS</h2>

<form action="/inventario/{{$producto->id}}" method="POST" >
  
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input id="codigo" name="codigo" type="text" class="form-control" value="{{$producto->codigo}}">    
  </div>
  @foreach ($errors->all() as $error)
    <li>El codigo ya esta en uso</li>
  @endforeach
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$producto->descripcion}}">
  </div>  
  <div class="mb-3">
    <label for="" class="form-label">Precio compra</label>
    <input id="precio_compra" name="precio_compra" type="number" step="any" class="form-control" value="{{$producto->precio_compra}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio venta</label>
    <input id="precio_venta" name="precio_venta" type="number" step="any" class="form-control" value="{{$producto->precio_venta}}">
  </div>  
  <div class="mb-3">
    <label for="" class="form-label">existencia</label>
    <input id="existencia" name="existencia" type="number" class="form-control" value="{{$producto->existencia}}">
  </div>
  
  <a href="/inventario" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection