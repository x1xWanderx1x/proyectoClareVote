<?php

namespace App\Http\Controllers;

use App\Models\RespuestaEncuesta;
use Illuminate\Http\Request;

class RespuestaEncuestaController extends Controller
{
    // Mostrar todas las respuestas
    public function index()
    {
        $respuestas = RespuestaEncuesta::with('encuesta')->get();
        return response()->json($respuestas);
    }

    // Almacenar una nueva respuesta
    public function store(Request $request)
    {
        $request->validate([
            'encuesta_id' => 'required|exists:encuesta,id',
            'respuesta' => 'required|string|max:255',
        ]);

        $respuesta = RespuestaEncuesta::create($request->all());
        return response()->json($respuesta, 201);
    }

    // Mostrar una respuesta específica
    public function show($id)
    {
        $respuesta = RespuestaEncuesta::with('encuesta')->findOrFail($id);
        return response()->json($respuesta);
    }

    // Actualizar una respuesta
    public function update(Request $request, $id)
    {
        $request->validate([
            'encuesta_id' => 'exists:encuesta,id',
            'respuesta' => 'string|max:255',
        ]);

        $respuesta = RespuestaEncuesta::findOrFail($id);
        $respuesta->update($request->all());
        return response()->json($respuesta);
    }

    // Eliminar una respuesta
    public function destroy($id)
    {
        $respuesta = RespuestaEncuesta::findOrFail($id);
        $respuesta->delete();
        return response()->json(null, 204);
    }
}
