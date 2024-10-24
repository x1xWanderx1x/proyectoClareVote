<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaAlumno extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'respuesta_alumno';

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'encuesta_id',
        'respuesta_id',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Encuesta
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }

    // Relación con el modelo RespuestaEncuesta
    public function respuesta()
    {
        return $this->belongsTo(RespuestaEncuesta::class);
    }
}
