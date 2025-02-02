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
        Schema::create('entornos', function (Blueprint $table) {
            $table->id();
            $table->longText('comentarios');
            $table->string('tiempoVivir', 250);
            $table->string('calle', 250);
            $table->string('numero', 250);
            $table->string('interior', 250);
            $table->string('colonia', 250);
            $table->string('entre', 250);
            $table->string('delegacionMunicpio', 250);
            $table->string('estado', 250);
            $table->string('cp', 250);
            $table->string('color', 250);
            $table->string('tipo', 250);
            $table->string('dondeEs', 250);
            $table->string('ubicación', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entornos');
    }
};
