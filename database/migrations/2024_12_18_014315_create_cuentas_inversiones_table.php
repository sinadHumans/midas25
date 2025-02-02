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
        Schema::create('cuentas_inversiones', function (Blueprint $table) {
            $table->id();
            $table->string('institucion', 250);
            $table->string('tipo', 250);
            $table->string('objetivo', 250);
            $table->string('deposito', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas_inversiones');
    }
};
