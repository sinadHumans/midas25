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
        Schema::create('saluds', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('droga', 250);
            $table->string('cualDroga', 250);
            $table->string('fuma', 250);
            $table->string('frecuenciaFuma', 250);
            $table->string('bebidas', 250);
            $table->string('frecuenciaBebidas', 250);
            $table->string('cafe', 250);
            $table->string('frecuenciaCafe', 250);
            $table->string('lentes', 250);
            $table->string('diagnostico', 250);
            $table->string('intervenciones', 250);
            $table->string('dequeintervenciones', 250);
            $table->string('enfermedadesCronicas', 250);
            $table->string('dequeCronicas', 250);
            $table->string('hereditarias', 250);
            $table->string('cualHereditarias', 250);
            $table->string('quienConstante', 250);
            $table->string('porqueConstante', 250);
            $table->string('ultimaVez', 250);
            $table->string('considera', 250);
            $table->string('porqueConsidera', 250);
            $table->string('deporte', 250);
            $table->string('pasatiempo', 250);
            $table->string('ultimavezDeque', 250);
            $table->string('embarazo', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saluds');
    }
};
