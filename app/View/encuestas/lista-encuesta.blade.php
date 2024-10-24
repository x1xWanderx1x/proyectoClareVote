<!DOCTYPE html>
<html>
<head>
    <title>Lista de Encuestas</title>
</head>
<body>
    <h1>Lista de Encuestas</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Verificar si hay encuestas -->
    @if($encuestas->isEmpty())
        <p>No hay encuestas disponibles.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pregunta</th>
                    <th>Descripción</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                <!-- Recorrer las encuestas y mostrarlas -->
                @foreach($encuestas as $encuesta)
                    <tr>
                        <td>{{ $encuesta->id }}</td>
                        <td>{{ $encuesta->pregunta }}</td>
                        <td>{{ $encuesta->descripcion }}</td>
                        <td>{{ $encuesta->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>