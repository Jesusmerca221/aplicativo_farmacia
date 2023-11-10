@extends('adminlte::page')

@section('title', 'Enviar Factura')

@section('content_header')
    
@stop

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Enviar PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Enviar Factura</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('enviar.pdf') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="pdf">PDF:</label>
                <input type="file" name="pdf" id="pdf" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="destinatario">Correo Destinatario:</label>
                <input type="email" name="destinatario" id="destinatario" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop            