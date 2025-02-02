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
        Schema::create('infonavits', function (Blueprint $table) {
            $table->id();
            $table->string('estatus', 250);
            $table->string('puntos', 250);
            $table->string('subcuenta', 250);
            $table->string('maximo', 250);
            $table->string('hipoteca', 250);
            $table->string('idEstudio', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infonavits');
    }
};
