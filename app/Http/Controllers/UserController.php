<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Muestra el formulario para agregar un nuevo usuario
    public function create()
    {
        return view('components.crear-usuario');
    }

    // Almacena el nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string|unique:users,usuario',
            'password' => 'required|string|min:6',
            'id_wallet' => 'nullable|string',
            'nombres' => 'required|string',
            'primer_apellido' => 'required|string',
            'segundo_apellido' => 'nullable|string',
            'correo' => 'required|email',
        ]);

        User::create([
            'usuario' => $request->usuario,
            'password' => Hash::make($request->password),
            'id_wallet' => $request->id_wallet,
            'nombres' => $request->nombres,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'correo' => $request->correo,
        ]);

        return redirect()->route('users.create')->with('success', 'Usuario agregado correctamente.');
    }
}

