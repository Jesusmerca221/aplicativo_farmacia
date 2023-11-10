@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    
@stop

@section('content')

<h1>Registrar nuevo usuario</h1>

<div class="table-container table-black table-striped mt-1">
    <table class="table table-dark table-striped mt-1">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" required>
                    @foreach ($errors->all() as $error)
                    <li>El gmail ya fue registrado</li>
                    @endforeach
                </div>
            </div>
            <div class="mb-3 row">
                <label for="rol" class="col-sm-2 col-form-label">Rol:</label>
                <div class="col-sm-10">   
                    <select name="rol" id="rol" class="form-control" required>
                        <option value="estandar">estandar</option>
                        <option value="administrador">administrador</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmar contraseña:</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a class="btn btn-secondary" href="{{ route('users.index') }}">Volver al listado</a>
            </div>
        </form>
    </table>
</div>
@endsection