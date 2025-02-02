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
        Schema::create('refepersonales', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('nombre', 250);
            $table->string('tiempoConocerlo', 250);
            $table->string('relacion', 250);
            $table->string('domicilio', 250);
            $table->string('tel1', 250);
            $table->longText('opinion');
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refepersonales');
    }
};
