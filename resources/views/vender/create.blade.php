@extends('layouts.plantillabase')

@section('contenido')
<h2>Registrar venta</h2>

<form action="/ventas" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1">    
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">nombre producto</label>
    <input id="nombre_producto" name="nombre_producto" type="text" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="4">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="5">
  </div>
  <a href="/ventas" class="btn btn-secondary" tabindex="6">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>

@endsection