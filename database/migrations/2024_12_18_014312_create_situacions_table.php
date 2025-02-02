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
        Schema::create('situacions', function (Blueprint $table) {
            $table->id();
            $table->string('idEstudio', 250);
            $table->string('nombre', 250);
            $table->string('parentesco', 250);
            $table->string('salario', 250);
            $table->string('ingreso', 250);
            $table->string('concepto', 250);
            $table->string('egresos', 250);
            $table->longText('observaciones');
            $table->string('superavit', 250);
            $table->string('idUsuario', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('situacions');
    }
};
