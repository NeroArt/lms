<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objetivos_particulares', function (Blueprint $table) {
            $table->id();
            $table->string('desc_objetivo');
            $table->bigInteger('cursos_id')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('objetivos_particulares');
    }
};
