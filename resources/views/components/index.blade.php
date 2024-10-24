<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Incluye tus estilos CSS -->
</head>
<style>
                    /* General Styles */
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: Arial, sans-serif;
                }

                body {
                    background-color: #f4f4f4;
                    color: #333;
                }

                /* Dashboard Container */
                .dashboard-container {
                    padding: 20px;
                }

                .container {
                    background-color: #fff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    max-width: 800px;
                    margin: 0 auto;
                }

                h1 {
                    color: #007bff;
                    margin-bottom: 20px;
                }

                h2 {
                    color: #0056b3;
                    margin-top: 20px;
                    margin-bottom: 10px;
                }

                ul.user-info {
                    list-style: none;
                    margin-bottom: 20px;
                }

                ul.user-info li {
                    padding: 5px 0;
                }

                .alert-success {
                    background-color: #d4edda;
                    color: #155724;
                    border: 1px solid #c3e6cb;
                    padding: 10px;
                    border-radius: 5px;
                    margin-bottom: 20px;
                }

                /* Button Logout */
                .logout-form {
                    display: flex;
                    justify-content: flex-end;
                }

                .btn-logout {
                    background-color: #dc3545;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                .btn-logout:hover {
                    background-color: #c82333;
                }

                /* Header Styles (Reutiliza el header del login) */
                header {
                    background-color: #007bff;
                    padding: 10px 0;
                }

                .header-container {
                    display: flex;
                    align-items: center;
                    padding: 0 20px;
                    max-width: 1200px;
                    margin: 0 auto;
                }

                .logo-header img {
                    width: 40px;
                    margin-right: 10px;
                }

                .title-header h1 {
                    color: white;
                    font-size: 1.5rem;
                    font-weight: bold;
                    margin: 0;
                }

                header:after {
                    content: '';
                    display: block;
                    height: 3px;
                    background: #00b4ff;
                    width: 100%;
                }
                /* Estilos del botón de crear encuesta */
                .action-buttons {
                    margin-top: 20px;
                    text-align: right; /* Botón alineado a la derecha */
                }

                .btn-create-survey {
                    background-color: #007bff;
                    color: white;
                    padding: 10px 20px;
                    text-decoration: none;
                    border-radius: 5px;
                    transition: background-color 0.3s ease;
                    
                }


</style>
<body>
    <!-- Incluye el componente Header -->
    <x-header />

    <main class="dashboard-container">
        <div class="container">
            <h1>Bienvenido al Dashboard</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h2>Información del Usuario</h2>
            <ul class="user-info">
                <li><strong>Usuario:</strong> {{ $user->usuario }}</li>
                <li><strong>Nombres:</strong> {{ $user->nombres }} {{ $user->primer_apellido }} {{ $user->segundo_apellido }}</li>
                <li><strong>Correo:</strong> {{ $user->correo }}</li>
                <li><strong>ID Wallet:</strong> {{ $user->id_wallet }}</li>
            </ul>

            <!-- Botón para crear encuesta -->
            <div class="action-buttons">
                <a href="{{ url('/encuestas/create') }}" class="btn-create-survey">Crear Nueva Encuesta</a>
            </div>


        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script> <!-- Incluye tus scripts JS -->
</body>
</html>
