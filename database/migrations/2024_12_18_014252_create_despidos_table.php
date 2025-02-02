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
        Schema::create('despidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250);
            $table->string('periodo', 250);
            $table->longText('motivo');
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
        Schema::dropIfExists('despidos');
    }
};
