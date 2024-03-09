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
        Schema::create('etapas_avance', function (Blueprint $table) {
            $table->id();
            $table->string('etapa');
            $table->integer('porcentaje_etapa');
            $table->boolean('status')->default(false);
            $table->bigInteger('actividades_avance_id')->unsigned()->index()->nullable();
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('actividades_avance_id')->references('id')->on('actividades_avance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etapas_avance');
    }
};
