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
        Schema::create('documentacions', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('titulo', 250);
            $table->longText('observaciones');
            $table->longText('archivo');
            $table->string('idUsuario', 250);
            $table->string('folio', 250);
            $table->string('seccion', 250);
            $table->string('tipo', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentacions');
    }
};
