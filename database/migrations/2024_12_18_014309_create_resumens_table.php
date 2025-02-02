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
        Schema::create('resumens', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('social', 250);
            $table->string('escolar', 250);
            $table->string('economica', 250);
            $table->string('laboral', 250);
            $table->string('actitud', 250);
            $table->longText('observaciones');
            $table->longText('recomendacion');
            $table->string('idUsuario', 250);
            $table->longText('observacionesPersonal');
            $table->longText('observacionesLaboral');
            $table->string('cali', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumens');
    }
};
