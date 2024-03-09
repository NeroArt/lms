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
        Schema::create('previo_inicios_actividades', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->bigInteger('previo_inicios_id')->unsigned()->index()->nullable();
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('previo_inicios_id')->references('id')->on('previo_inicios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previo_inicios_actividades');
    }
};
