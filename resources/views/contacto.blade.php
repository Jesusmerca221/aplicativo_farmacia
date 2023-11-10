<form method="post" action="{{ route('enviarCorreo') }}">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" required></textarea>
    </div>
    <button type="submit">Enviar</button>
</form>
