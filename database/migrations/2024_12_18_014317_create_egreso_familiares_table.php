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
        Schema::create('egreso_familiares', function (Blueprint $table) {
            $table->id();
            $table->string('ahorro', 250);
            $table->string('alimentacion', 250);
            $table->string('transporte', 250);
            $table->string('seguros', 250);
            $table->string('luz', 250);
            $table->string('tv', 250);
            $table->string('gas', 250);
            $table->string('celular', 250);
            $table->string('agua', 250);
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
        Schema::dropIfExists('egreso_familiares');
    }
};
