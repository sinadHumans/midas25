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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('idUsuario', 250);
            $table->string('parentesco', 250);
            $table->string('nombre', 250);
            $table->string('edad', 250);
            $table->string('ocupacion', 250);
            $table->string('donde', 250);
            $table->string('calle', 250);
            $table->string('numero', 250);
            $table->string('colonia', 250);
            $table->string('delegacion', 250);
            $table->string('ciudad', 250);
            $table->string('estado', 250);
            $table->string('cp', 250);
            $table->string('tiempo', 250);
            $table->string('telefono', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
