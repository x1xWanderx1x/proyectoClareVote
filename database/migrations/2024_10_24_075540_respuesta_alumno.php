<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('respuesta_alumno', function (Blueprint $table) {
            $table->id(); // ID de la respuesta
            $table->foreignId('user_id') // Llave foránea referenciando al usuario (alumno)
                ->constrained('users') // Se refiere a la tabla 'users'
                ->onDelete('cascade'); // Si se elimina el usuario, se elimina esta fila
            $table->foreignId('encuesta_id') // Llave foránea referenciando la encuesta
                ->constrained('encuesta') // Se refiere a la tabla 'encuesta'
                ->onDelete('cascade'); // Si se elimina la encuesta, se eliminan sus respuestas
            $table->foreignId('respuesta_id') // Llave foránea referenciando la respuesta seleccionada
                ->constrained('respuesta_encuesta') // Se refiere a la tabla 'respuestas'
                ->onDelete('cascade'); // Si se elimina la respuesta, se eliminan las selecciones
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuesta_alumno');
    }
};
