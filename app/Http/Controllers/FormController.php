<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Muestra el formulario
    public function showForm()
    {
        return view('formulario');
    }

    // Procesa los datos del formulario
    public function submitForm(Request $request)
    {
        // Validación opcional
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
        ]);

        // Procesar los datos (por ejemplo, guardarlos en la base de datos)
        
        return back()->with('success', 'Formulario enviado correctamente');
    }
}
