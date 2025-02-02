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
        Schema::create('investigacions', function (Blueprint $table) {
            $table->id();
            $table->string('cuentaConstancia', 250);
            $table->string('proporciono', 250);
            $table->string('casoNo', 250);
            $table->string('demandado', 250);
            $table->string('actualmente', 250);
            $table->string('estabilidad', 250);
            $table->string('inactividad', 250);
            $table->string('registoPatronal', 250);
            $table->string('referenciayPeriodos', 250);
            $table->string('dosEmpleos', 250);
            $table->string('ausentismo', 250);
            $table->string('abandono', 250);
            $table->string('desempenoRegular', 250);
            $table->string('omitio', 250);
            $table->string('informacion', 250);
            $table->string('referencias', 250);
            $table->string('confiable', 250);
            $table->longText('comentarios');
            $table->string('notasLegales', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigacions');
    }
};
