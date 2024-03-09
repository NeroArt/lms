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
        Schema::create('inicio_actividades', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->integer('duracion');
            $table->string('tecnicas');
            $table->string('material_equipo_apoyo');
            $table->bigInteger('inicio_cursos_id')->unsigned()->index()->nullable();
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('inicio_cursos_id')->references('id')->on('inicio_cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inicio_actividades');
    }
};
