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
        Schema::create('inicio_cursos', function (Blueprint $table) {
            $table->id();
            $table->string('etapa_encuadre');
            $table->bigInteger('cursos_id')->unsigned()->index()->nullable();
            $table->integer('seccion_encuadre');
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('cursos_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inicio_cursos');
    }
};
