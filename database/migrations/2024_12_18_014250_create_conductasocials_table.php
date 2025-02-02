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
        Schema::create('conductasocials', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('quienEstuvo', 250);
            $table->string('conductaEntrevistado', 250);
            $table->string('relacionVecinos', 250);
            $table->string('pertenecegrupo', 250);
            $table->string('problemasLegales', 250);
            $table->string('familiarRecluido', 250);
            $table->string('familiaresAdentro', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductasocials');
    }
};
