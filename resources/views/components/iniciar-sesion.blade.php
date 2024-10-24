<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            }

            body {
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .login-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
            }

            .login-box {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                display: flex;
                width: 600px;
                height: 300px;
            }

            .left {
                flex: 1;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .left img {
                max-width: 280px;
            }

            .right {
                flex: 1;
                padding-left: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .input-group {
                margin-bottom: 15px;
                text-align: left;
            }

            .input-group label {
                font-weight: bold;
                margin-bottom: 5px;
                display: block;
            }

            .input-group input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .btn-login {
                background-color: #007bff;
                color: #fff;
                padding: 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .btn-login:hover {
                background-color: #0056b3;
            }

    </style>
</head>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="login-container">
        <div class="login-box">
            <div class="left">
                <img src="{{ asset('img/logo.png') }}" alt="ClearVote Logo" class="logo">
            </div>
            <div class="right">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" required placeholder="@gmail.com">
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" required placeholder="Ingresa una contraseña">
                    </div>
                    <button type="submit" class="btn-login">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
