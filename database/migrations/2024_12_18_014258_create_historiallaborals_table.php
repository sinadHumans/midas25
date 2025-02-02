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
        Schema::create('historiallaborals', function (Blueprint $table) {
            $table->id();
            $table->string('ultimo', 250);
            $table->string('vida', 250);
            $table->string('nusemana', 250);
            $table->string('porcentaje', 250);
            $table->string('numeroempleadores', 250);
            $table->string('progresion', 250);
            $table->string('finiquito', 250);
            $table->string('liquidacion', 250);
            $table->string('aguinaldo', 250);
            $table->string('vacaciones', 250);
            $table->string('comentarios', 250);
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
        Schema::dropIfExists('historiallaborals');
    }
};
