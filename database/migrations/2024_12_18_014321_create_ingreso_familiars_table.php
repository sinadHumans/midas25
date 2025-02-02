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
        Schema::create('ingreso_familiars', function (Blueprint $table) {
            $table->id();
            $table->string('quien', 250);
            $table->string('fuente', 250);
            $table->string('monto', 250);
            $table->string('total', 250);
            $table->longText('comentarios');
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingreso_familiars');
    }
};
