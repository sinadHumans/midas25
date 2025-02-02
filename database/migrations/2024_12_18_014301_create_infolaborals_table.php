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
        Schema::create('infolaborals', function (Blueprint $table) {
            $table->id();
            $table->string('laboral', 250);
            $table->string('campol', 250);
            $table->string('fechal', 250);
            $table->string('acuerdol', 250);
            $table->string('civiles', 250);
            $table->string('campoc', 250);
            $table->string('fechac', 250);
            $table->string('acuerdoc', 250);
            $table->string('familiares', 250);
            $table->string('campof', 250);
            $table->string('fechaf', 250);
            $table->string('acuerdof', 250);
            $table->string('penales', 250);
            $table->string('campop', 250);
            $table->string('fechap', 250);
            $table->string('acuerdop', 250);
            $table->string('administrativa', 250);
            $table->string('campoa', 250);
            $table->string('fechaa', 250);
            $table->string('acuerdoa', 250);
            $table->string('internacional', 250);
            $table->string('campoi', 250);
            $table->string('fechai', 250);
            $table->string('acuerdoi', 250);
            $table->string('sat', 250);
            $table->string('camposat', 250);
            $table->string('fechasat', 250);
            $table->string('acuerdosat', 250);
            $table->string('idUsuario', 250);
            $table->string('idEstudio', 250);
            $table->longText('comentariol');
            $table->longText('comentarioc');
            $table->longText('comentariof');
            $table->longText('comentariop');
            $table->longText('comentarioa');
            $table->longText('comentarioi');
            $table->longText('comentariosat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infolaborals');
    }
};
