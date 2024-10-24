<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaEncuesta extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'respuesta_encuesta';

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'encuesta_id',
        'respuesta',
    ];

    // Relación con la tabla Encuesta
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }
}
