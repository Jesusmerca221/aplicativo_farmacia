@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1></h1>
@stop


@section('content')
@can('ocultar-opcion')
<div class="button-container">
    
    <a href="users/create" class="btn btn-primary">Crear Usuario</a>   
        
    </div>

    <h1></h1>
<div class="table-responsive">
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Fecha de registro</th>

            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->rol }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                     
              @csrf
              @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>          
            </td>       
        </tr>
        @endforeach
    </tbody>
</table>

    
</div>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop  

@else
    <li><span class="text-muted">Opción solo para administradores</span></li>
@endcan
@stop

