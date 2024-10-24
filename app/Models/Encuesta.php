<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'encuesta';

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'pregunta',
        'descripcion'
    ];

    // Relación con el modelo RespuestaEncuesta
    public function respuestas()
    {
        return $this->hasMany(RespuestaEncuesta::class);
    }

    // Relación con el modelo RespuestaAlumno
    public function respuestasAlumnos()
    {
        return $this->hasMany(RespuestaAlumno::class);
    }
}
