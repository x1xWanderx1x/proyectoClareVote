<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Encuesta</title>
</head>
<body>

    <h1>Crear Nueva Encuesta</h1>

    <!-- Mostrar errores de validación si existen -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear una encuesta -->
    <form action="{{ route('encuestas.store') }}" method="POST">
        @csrf <!-- Token de seguridad de Laravel -->

        <div>
            <label for="pregunta">Pregunta:</label>
            <input type="text" id="pregunta" name="pregunta" value="{{ old('pregunta') }}" required>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
        </div>

        <div>
            <button type="submit">Crear Encuesta</button>
        </div>
    </form>

</body>
</html>
