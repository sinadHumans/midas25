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
        Schema::create('estructurafamiliars', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('familiar', 250);
            $table->string('edad', 250);
            $table->string('ocupacion', 250);
            $table->string('laboraEstudia', 250);
            $table->string('calle', 250);
            $table->string('numero', 250);
            $table->string('colonia', 250);
            $table->string('delegacionMunicipio', 250);
            $table->string('ciudad', 250);
            $table->string('estado', 250);
            $table->string('cpde', 250);
            $table->string('tiempoReside', 250);
            $table->string('tel1', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estructurafamiliars');
    }
};
