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
        Schema::create('nivelacademicos', function (Blueprint $table) {
            $table->id();
            $table->string('ultimo', 250);
            $table->string('periodo', 250);
            $table->string('profesional', 250);
            $table->string('cedula', 250);
            $table->string('especialidad', 250);
            $table->string('caso', 250);
            $table->string('idUsuario', 250);
            $table->string('idEstudio', 250);
            $table->longText('otros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivelacademicos');
    }
};
