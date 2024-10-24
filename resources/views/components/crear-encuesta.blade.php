<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Encuesta</title>
    
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Estilo para el contenedor principal */
        .container {
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            box-sizing: border-box;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 20px auto; /* Centra el formulario */
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        label {
            font-size: 1rem;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        #contenedor-respuestas {
            margin-bottom: 15px;
        }

        button[type="button"],
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        button[type="button"]:hover,
        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        button[type="button"] {
            margin-right: 10px;
            background-color: #28a745;
        }

        button[type="button"]:hover {
            background-color: #218838;
        }
        .btn-create-survey {
    display: inline-block;
    background-color: #4CAF50; /* Color de fondo */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno */
    font-size: 16px; /* Tamaño de la fuente */
    text-align: center; /* Centrar el texto */
    text-decoration: none; /* Eliminar el subrayado */
    border-radius: 5px; /* Bordes redondeados */
    border: none; /* Sin borde */
    transition: background-color 0.3s ease; /* Suave transición de color */
}

.btn-create-survey:hover {
    background-color: #45a049; /* Color de fondo al pasar el mouse */
}
    </style>
    <script>
        function agregarRespuesta() {
            const contenedorRespuestas = document.getElementById('contenedor-respuestas');
            const nuevoDiv = document.createElement('div');
            nuevoDiv.classList.add('respuesta');

            const nuevoInput = document.createElement('input');
            nuevoInput.type = 'text';
            nuevoInput.name = 'respuestas[]';
            nuevoInput.required = true;
            nuevoInput.placeholder = 'Ingresa una respuesta';

            nuevoDiv.appendChild(nuevoInput);
            contenedorRespuestas.appendChild(nuevoDiv);
        }
    </script>
</head>
<body>
        <div class="container">
        <form action="{{ route('encuesta.store') }}" method="POST">
            @csrf
            <div>
                <h2>Crear encuesta</h2>
                <label for="pregunta">Pregunta</label>
                <input type="text" id="pregunta" name="pregunta" required>
            </div>

            <div>
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
            </div>

            <!-- Contenedor de respuestas dinámicas -->
            <div id="contenedor-respuestas">
                <div class="respuesta">
                    <input type="text" name="respuestas[]" placeholder="Ingresa una respuesta" required>
                </div>
            </div>

            <!-- Botón para agregar más respuestas -->
            <button type="button" onclick="agregarRespuesta()">Agregar otra respuesta</button>

            <br><br>

            <button type="submit" >Crear Encuesta</button>
            <a href="{{ url('/encuesta-lista') }}" class="btn-create-survey">Ver la lista</a>
            </form>
    </div>
</body>
</html>
