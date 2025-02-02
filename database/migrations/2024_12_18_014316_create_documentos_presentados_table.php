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
        Schema::create('documentos_presentados', function (Blueprint $table) {
            $table->id();
            $table->string('documento', 250);
            $table->string('ine', 250);
            $table->string('comprobante', 250);
            $table->string('acta', 250);
            $table->string('cartas', 250);
            $table->string('aviso', 250);
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
        Schema::dropIfExists('documentos_presentados');
    }
};
