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
        Schema::create('deudas', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('cuentaDeuda', 250);
            $table->string('conQuien', 250);
            $table->string('monto', 250);
            $table->string('abonoMensual', 250);
            $table->string('apagaren', 250);
            $table->string('cuentaauto', 250);
            $table->string('modelo', 250);
            $table->string('placas', 250);
            $table->string('valorAuto', 250);
            $table->string('propiedad', 250);
            $table->string('ubicacon', 250);
            $table->string('idUsuario', 250);
            $table->string('tarjetaCredito', 250);
            $table->string('bancotarjetaCredito', 250);
            $table->string('creditoAutorizado', 250);
            $table->string('tarjetaTienda', 250);
            $table->string('conquienTienda', 250);
            $table->string('creditoAutorizadotienda', 250);
            $table->longText('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudas');
    }
};
