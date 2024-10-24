<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class   AuthController extends Controller
{
    // Muestra el formulario de login
    public function showLoginForm()
    {
        return view('components.iniciar-sesion');
    }

    // Maneja la autenticación con 'usuario' y 'password'
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('usuario', 'password');

        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        // Si la autenticación falla
        return back()->withErrors([
            'usuario' => 'Invalid credentials.',
        ]);
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}


