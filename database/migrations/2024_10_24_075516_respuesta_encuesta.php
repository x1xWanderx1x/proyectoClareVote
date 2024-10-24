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
        Schema::create('respuesta_encuesta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encuesta_id') // Llave foránea referenciando la encuesta
                ->constrained('encuesta') // Se refiere a la tabla 'encuesta'
                ->onDelete('cascade'); // Eliminar respuestas si se elimina la encuesta
            $table->string('respuesta'); // Texto de la respuesta
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas_encuesta');
    }
};
