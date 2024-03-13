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
        Schema::create('seguimiento_actividades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('actividad_avance_id')->unsigned()->index()->nullable();
            $table->boolean('status')->default(false);
            $table->bigInteger('cursos_id')->unsigned()->index()->nullable();
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('actividad_avance_id')->references('id')->on('actividades_avance');
            $table->foreign('cursos_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_actividades');
    }
};
