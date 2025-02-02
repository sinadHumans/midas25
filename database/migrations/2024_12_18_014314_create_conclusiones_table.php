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
        Schema::create('conclusiones', function (Blueprint $table) {
            $table->id();
            $table->string('acercaCandidato', 250);
            $table->string('acercaFamilia', 250);
            $table->string('conclucionesEntrevistador', 250);
            $table->string('participacion', 250);
            $table->string('entorno', 250);
            $table->string('referencias', 250);
            $table->string('comentariosGenerales', 250);
            $table->string('analisisVerificacion', 250);
            $table->string('atendio', 250);
            $table->string('presento', 250);
            $table->string('documentacionCompartida', 250);
            $table->string('referenciasPersonales', 250);
            $table->string('estatusfinal', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conclusiones');
    }
};
