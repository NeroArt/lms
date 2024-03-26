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
        Schema::create('temarios', function (Blueprint $table) {
            $table->id();
            $table->string('tema');
            $table->bigInteger('objetivos_id')->unsigned()->index()->nullable();
            $table->bigInteger('tipos_temas_id')->unsigned()->index()->nullable();
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('objetivos_id')->references('id')->on('objetivos');
            $table->foreign('tipos_temas_id')->references('id')->on('tipo_temas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temarios');
    }
};
