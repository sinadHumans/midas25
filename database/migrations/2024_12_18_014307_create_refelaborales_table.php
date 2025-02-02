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
        Schema::create('refelaborales', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('empresa', 250);
            $table->string('giro', 250);
            $table->string('direccion', 250);
            $table->string('telefono', 250);
            $table->string('fechaIngreso', 250);
            $table->string('fechaEgreso', 250);
            $table->string('puesto', 250);
            $table->string('area', 250);
            $table->string('salario', 250);
            $table->longText('motivoSalida');
            $table->string('quienProporciono', 250);
            $table->string('puestoProporciono', 250);
            $table->string('calificacion', 250);
            $table->string('demanda', 250);
            $table->string('volveria', 250);
            $table->longText('porque');
            $table->longText('observaciones');
            $table->string('idUsuario', 250);
            $table->string('candidatoes', 250);
            $table->string('periodosInactivo', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refelaborales');
    }
};
