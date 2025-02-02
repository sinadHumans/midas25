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
        Schema::create('entornohabitacionals', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('tipoZona', 250);
            $table->string('tipoVivienda', 250);
            $table->string('edificacion', 250);
            $table->string('titular', 250);
            $table->string('parentesco', 250);
            $table->string('numRecamaras', 250);
            $table->string('sala', 250);
            $table->string('comedor', 250);
            $table->string('cocina', 250);
            $table->string('garaje', 250);
            $table->string('jardin', 250);
            $table->string('nomBano', 250);
            $table->string('tipobano', 250);
            $table->string('viasdeacceso', 250);
            $table->string('medioTransporte', 250);
            $table->string('tiempoServicio', 250);
            $table->string('entreCalles', 250);
            $table->string('color', 250);
            $table->string('porton', 250);
            $table->string('referencias', 250);
            $table->longText('observaciones');
            $table->string('idUSuario', 250);
            $table->string('agua', 250);
            $table->string('luz', 250);
            $table->string('pavimentacion', 250);
            $table->string('telefono', 250);
            $table->string('transporte', 250);
            $table->string('vigilancia', 250);
            $table->string('areas', 250);
            $table->string('drenaje', 250);
            $table->string('paredes', 250);
            $table->string('techos', 250);
            $table->string('pisos', 250);
            $table->string('telNormal', 250);
            $table->string('telPlasma', 250);
            $table->string('estereo', 250);
            $table->string('dvd', 250);
            $table->string('blueray', 250);
            $table->string('estufa', 250);
            $table->string('horno', 250);
            $table->string('lavadora', 250);
            $table->string('centrolavado', 250);
            $table->string('refrigerador', 250);
            $table->string('computadora', 250);
            $table->string('extensionInmueble', 250);
            $table->string('condicionesInmueble', 250);
            $table->string('condicionesMobiliario', 250);
            $table->string('orden', 250);
            $table->string('limpieza', 250);
            $table->string('delincuencia', 250);
            $table->string('vandalismo', 250);
            $table->string('drogadiccion', 250);
            $table->string('alcoholismo', 250);
            $table->string('estudio', 250);
            $table->string('zotehuela', 250);
            $table->string('patio', 250);
            $table->string('internet', 250);
            $table->string('renta', 250);
            $table->string('regadera', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entornohabitacionals');
    }
};
