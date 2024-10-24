<?php
namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\RespuestaEncuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{   

    public function create()
    {
        return view('components.crear-encuesta');
    }

    // Guardar la nueva encuesta en la base de datos
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'pregunta' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'respuestas' => 'required|array', // Validar que haya respuestas
            'respuestas.*' => 'required|string|max:255', // Validar cada respuesta
        ]);

        // Crear la encuesta
        $encuesta = Encuesta::create([
            'pregunta' => $request->input('pregunta'),
            'descripcion' => $request->input('descripcion'),
        ]);

        // Guardar las respuestas dinámicas
        foreach ($request->input('respuestas') as $respuesta) {
            RespuestaEncuesta::create([
                'encuesta_id' => $encuesta->id,
                'respuesta' => $respuesta,
            ]);
        }

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('encuesta.create')->with('success', 'Encuesta y respuestas creadas exitosamente.');
    }

     // Método para mostrar la lista de encuestas
     public function index()
     {
         // Obtener todas las encuestas de la base de datos
         $encuestas = Encuesta::all();
 
         // Retornar la vista y pasarle los datos
         return view('components.lista-encuesta', ['encuestas' => $encuestas]);
     }
}