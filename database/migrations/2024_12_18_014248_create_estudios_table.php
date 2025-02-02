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
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->string('idUsuario', 250);
            $table->string('idEmpresa', 250);
            $table->string('nombreCandidato', 250);
            $table->string('apePaterno', 250);
            $table->string('apeMaterno', 250);
            $table->string('puesto', 250);
            $table->string('fechaSolicitud', 250);
            $table->string('valida', 250);
            $table->string('realizo', 250);
            $table->longText('foto');
            $table->string('estatus', 250);
            $table->string('rfc', 250);
            $table->string('curp', 250);
            $table->longText('archivo');
            $table->string('proceso', 250);
            $table->string('fechaTermino', 250);
            $table->longText('motivoCancelacion');
            $table->string('fechaCancelacion', 250);
            $table->string('usuarioCancela', 250);
            $table->string('encuestador', 250);
            $table->string('fechaCita', 250);
            $table->string('horacita', 250);
            $table->string('nss', 250);
            $table->string('tiposervicio', 250);
            $table->string('telefono', 250);
            $table->string('correo', 250);
            $table->string('verdoc', 250);
            $table->string('encuViaticos', 250);
            $table->string('encuTel', 250);
            $table->string('encuDireccion', 250);
            $table->string('estatusper', 250);
            $table->string('sexo', 250);
            $table->string('edad', 250);
            $table->string('estadoCivil', 250);
            $table->string('lugarNacimiento', 250);
            $table->string('fechaNacimiento', 250);
            $table->string('escolaridad', 250);
            $table->string('llamadaEmergencia', 250);
            $table->string('parentesco', 250);
            $table->string('telEmergencia', 250);
            $table->string('hijos', 250);
            $table->string('nacionalidad', 250);
            $table->string('viveCon', 250);
            $table->string('direccion', 250);
            $table->string('celular', 250);
            $table->string('otroContacto', 250);
            $table->string('infonavit', 250);
            $table->string('fonacot', 250);
            $table->longText('cv');
            $table->longText('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudios');
    }
};
