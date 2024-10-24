<?php

namespace App\Http\Controllers;

use App\Models\RespuestaAlumno;
use Illuminate\Http\Request;

class RespuestaAlumnoController extends Controller
{
    // Mostrar todas las respuestas de los alumnos
    public function index()
    {
        $respuestas = RespuestaAlumno::with(['user', 'encuesta', 'respuesta'])->get();
        return response()->json($respuestas);
    }

    // Almacenar una nueva respuesta de alumno
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'encuesta_id' => 'required|exists:encuesta,id',
            'respuesta_id' => 'required|exists:respuesta_encuesta,id',
        ]);

        $respuestaAlumno = RespuestaAlumno::create($request->all());
        return response()->json($respuestaAlumno, 201);
    }

    // Mostrar una respuesta específica
    public function show($id)
    {
        $respuestaAlumno = RespuestaAlumno::with(['user', 'encuesta', 'respuesta'])->findOrFail($id);
        return response()->json($respuestaAlumno);
    }

    // Actualizar una respuesta de alumno
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'exists:users,id',
            'encuesta_id' => 'exists:encuesta,id',
            'respuesta_id' => 'exists:respuesta_encuesta,id',
        ]);

        $respuestaAlumno = RespuestaAlumno::findOrFail($id);
        $respuestaAlumno->update($request->all());
        return response()->json($respuestaAlumno);
    }

    // Eliminar una respuesta de alumno
    public function destroy($id)
    {
        $respuestaAlumno = RespuestaAlumno::findOrFail($id);
        $respuestaAlumno->delete();
        return response()->json(null, 204);
    }
}
