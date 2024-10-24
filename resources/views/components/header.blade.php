<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ClearVote</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        /* Header Styles */
        header {
            background-color: #007bff;
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .title-header h1 {
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            margin: 0;
            letter-spacing: 1px;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a, .btn-custom {
            color: white;
            font-size: 1rem;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav ul li a:hover, .btn-custom:hover {
            background-color: #00b4ff;
            color: #fff;
        }

        /* Línea decorativa debajo del header */
        header:after {
            content: '';
            display: block;
            height: 4px;
            background: linear-gradient(90deg, #00b4ff, #007bff);
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
                gap: 10px;
            }
        }

        /* Estilos para el botón "Iniciar Sesión" */
        .btn-login {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #218838;
        }

        /* Estilos para el botón "Cerrar Sesión" */
        .btn-logout {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        /* Estilos para los botones de encuestas */
        .btn-survey {
            background-color: #007bff; /* Color azul */
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-survey:hover {
            background-color: #0056b3; /* Azul más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="title-header">
            <a href="/dashboard" style="text-decoration: none;"><h1>ClearVote</h1></a>
            </div>

            <nav>
                <ul>
                    <li>
                        <a href="/encuestas/create" class="btn-survey">Crear Encuesta</a>
                    </li>
                    <li>
                        <a href="encuesta-lista" class="btn-survey">Lista de Encuestas</a>
                    </li>
                    @guest
                        <li>
                            <a href="/login" class="btn-login">Iniciar Sesión</a>
                        </li>
                    @endguest

                    @auth
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                                @csrf
                                <button type="submit" class="btn-logout">Cerrar Sesión</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <div class="login-container">
        <!-- Aquí va tu contenido específico o formulario de login -->
    </div>
</body>
</html>
