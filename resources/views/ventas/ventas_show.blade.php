<h1>Ticket de venta</h1>
<p>Fecha: {{ $venta->created_at }}</p>

<h2>Productos:</h2>
<ul>
    @foreach ($venta->productos as $producto)
        <li>{{ $producto->descripcion }} ({{ $producto->cantidad }} x ${{ $producto->precio }})</li>
    @endforeach
</ul>

<h2>Total: ${{ $total }}</h2>

