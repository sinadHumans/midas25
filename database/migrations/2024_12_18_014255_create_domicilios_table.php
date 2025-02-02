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
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('delegacionMunicipio', 250);
            $table->string('ciudad', 250);
            $table->string('estado', 250);
            $table->string('cp', 250);
            $table->string('tiempoResindir', 250);
            $table->string('tel1', 250);
            $table->string('tel2', 250);
            $table->string('tel3', 250);
            $table->string('cel1', 250);
            $table->string('cel2', 250);
            $table->string('cel3', 250);
            $table->string('calle', 250);
            $table->string('numero', 250);
            $table->string('colonia', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilios');
    }
};
