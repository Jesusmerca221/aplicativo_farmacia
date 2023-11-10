@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR USUARIOS</h2>

<form action="/users/{{$user->id}}" method="POST">
@csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">nombre</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$user->name}}">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input id="email" name="email" type="text" class="form-control" value="{{$user->email}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Rol</label>
    <input id="rol" name="rol" type="text" class="form-control" value="{{$user->rol}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input id="password" name="password" type="password" class="form-control" value="{{$user->password}}">
  </div>
  
  <a href="user" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection