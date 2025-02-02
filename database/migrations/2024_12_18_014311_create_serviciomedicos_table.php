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
        Schema::create('serviciomedicos', function (Blueprint $table) {
            $table->id();
            $table->string('idUsuario', 250);
            $table->string('infonavit', 250);
            $table->string('clinicai', 250);
            $table->string('incidentei', 250);
            $table->string('tipoi', 250);
            $table->string('imss', 250);
            $table->string('clinicaim', 250);
            $table->string('incidenteim', 250);
            $table->string('tipoim', 250);
            $table->string('issste', 250);
            $table->string('clinicais', 250);
            $table->string('incidenteis', 250);
            $table->string('tipois', 250);
            $table->string('seguro', 250);
            $table->string('clinicase', 250);
            $table->string('incidentese', 250);
            $table->string('tipose', 250);
            $table->string('privado', 250);
            $table->string('aseguradora', 250);
            $table->string('incidentepri', 250);
            $table->string('tipopri', 250);
            $table->string('issemym', 250);
            $table->string('clinicaisse', 250);
            $table->string('incidenteisse', 250);
            $table->string('tipoisse', 250);
            $table->string('idEstudio', 250);
            $table->string('notiene', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serviciomedicos');
    }
};
