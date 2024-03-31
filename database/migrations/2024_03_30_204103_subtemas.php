<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subtemas', function (Blueprint $table) {
            $table->id();
            $table->string('subtema');
            $table->bigInteger('temarios_id')->unsigned()->index()->nullable();
        
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('temarios_id')->references('id')->on('temarios');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtemas');
    }
};
