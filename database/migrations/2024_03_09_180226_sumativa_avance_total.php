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
        Schema::create('sumativa_avance_total', function (Blueprint $table) {
            $table->id();
            $table->integer('porcentaje_total');
            $table->bigInteger('etapas_avance_id')->unsigned()->index()->nullable();
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('etapas_avance_id')->references('id')->on('etapas_avance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumativa_avance_total');
    }
};
