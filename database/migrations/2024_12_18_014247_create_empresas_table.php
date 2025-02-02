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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250);
            $table->longText('direccion');
            $table->string('telefono', 250);
            $table->string('correo', 250);
            $table->string('contacto', 250);
            $table->string('paginaWeb', 250);
            $table->longText('idUsuario');
            $table->longText('comentarios');
            $table->longText('archivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
