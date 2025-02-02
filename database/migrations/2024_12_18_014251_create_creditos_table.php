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
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha', 250);
            $table->string('entidad', 250);
            $table->string('monto', 250);
            $table->string('total', 250);
            $table->string('estatus', 250);
            $table->longText('comentario');
            $table->string('endeudamiento', 250);
            $table->string('hipoteca', 250);
            $table->string('score', 250);
            $table->string('idUsuario', 250);
            $table->string('idEstudio', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditos');
    }
};
