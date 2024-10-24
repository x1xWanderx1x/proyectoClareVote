<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta Blockchain</title>
</head>
<body>
    <h1>{{ $pregunta }}</h1>
    
    @if(session('mensaje'))
        <p>{{ session('mensaje') }}</p>
    @endif  

    <form action="{{ route('votar') }}" method="POST">
        @csrf
        @foreach ($opciones as $opcion)
            <div>
                <input type="radio" name="opcion" value="{{ $opcion }}"> {{ $opcion }}
            </div>
        @endforeach
        <button type="submit">Votar</button>
    </form>

    <!-- Formulario para enviar recompensa después de votar varias veces -->
    <h2>Enviar Recompensa</h2>
    <form action="{{ route('enviarRecompensa') }}" method="POST">
        @csrf
        <label for="wallet">Wallet del Estudiante:</label>
        <input type="text" id="wallet" name="wallet" required>
        <button type="submit">Enviar Recompensa</button>
    </form>
</body>
</html>
