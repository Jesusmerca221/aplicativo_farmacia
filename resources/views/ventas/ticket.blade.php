<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Estilos CSS para el PDF */
        body {
            font-family: Arial, sans-serif;
        }

        h4 {
            margin: 0;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        hr {
            border-top: 1px dashed #000;
        }

        p {
            margin: 0;
        }

        .header {
            text-align: center;
        }

        .info {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .productos {
            margin-bottom: 10px;
        }

        .total {
            margin-top: 10px;
            text-align: right;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h4>FARMACIA LA MILAGROSA</h4>
    </div>
    
    <div class="info">
        <h4>Factura de venta</h4>
        <p>{{ $venta->created_at }}</p>
    </div>
    <div class="info">        
        <h4>Farmacia la milagrosa</h4>
        <h4>NIT: 723478990</h4>
        <h4>Salida a Granada</h4>
        <h4>Sincé - Sucre</h4>
    </div>

    <hr>

    <div class="productos">
        <h4>Productos:</h4>
        @foreach ($venta->productos as $producto)
            <p>{{ $producto->cantidad }}x {{ $producto->descripcion }}</p>
            <p>${{ number_format($producto->cantidad * $producto->precio, 2) }}</p>
        @endforeach
    </div>

    <hr>

    <div class="total">
        <h4>Total: ${{ number_format($total, 2) }}</h4>
    </div>

    <hr>

    <div class="footer">
        <p>Gracias por su compra</p>
        <p>Farmacia la milagrosa manos y corazón al servicio de su salud</p>
    </div>
    
</body>
</html>