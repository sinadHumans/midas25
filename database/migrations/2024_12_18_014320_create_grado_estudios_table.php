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
        Schema::create('grado_estudios', function (Blueprint $table) {
            $table->id();
            $table->string('grado', 250);
            $table->string('nombre', 250);
            $table->string('lugar', 250);
            $table->string('periodo', 250);
            $table->string('documento', 250);
            $table->string('folio', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grado_estudios');
    }
};
