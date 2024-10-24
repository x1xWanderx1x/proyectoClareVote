<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Encuestas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Fondo suave */
            margin: 0;
            padding: 0;
        }

        /* Estilos para el header */
        x-header {
            width: 100%;
            background-color: #007bff; /* Color azul */
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        main {
            padding: 20px;
            max-width: 1200px; /* Máximo ancho del contenido */
            margin: 0 auto; /* Centrado horizontal */
        }

        h1 {
            text-align: center;
            color: #333; /* Color del texto */
        }

        p {
            text-align: center;
            color: #28a745; /* Color para mensajes de éxito */
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Colapsar bordes */
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para la tabla */
        }

        thead {
            background-color: #007bff; /* Encabezado azul */
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc; /* Bordes de celda */
        }

        tbody tr:hover {
            background-color: #f1f1f1; /* Color de fondo al pasar el ratón */
        }

        /* Mensaje si no hay encuestas */
        .no-encuestas {
            text-align: center;
            font-size: 1.2rem;
            color: #dc3545; /* Rojo para mensajes negativos */
        }
    </style>
</head>
<body>
    <!-- Incluye el componente Header -->
    <x-header />

    <main>
        <h1>Lista de Encuestas</h1>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <!-- Verificar si hay encuestas -->
        @if($encuestas->isEmpty())
            <p class="no-encuestas">No hay encuestas disponibles.</p>
        @else
            <table>
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
    </main>
</body>
</html>
