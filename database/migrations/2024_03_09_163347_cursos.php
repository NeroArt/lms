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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso');
            $table->string('descripcion_curso');
            $table->string('nombre_disenador');
            $table->string('nombre_facilitador');
            $table->string('lugar_instruccion');
            $table->string('duracion');
            $table->string('fechas');
            $table->string('no_participantes');
            $table->string('perfil_participante');
            $table->string('perfil_participante_conocimientos');
            $table->string('perfil_participante_habilidades');
            $table->string('perfil_participante_producto');
            $table->string('perfil_participante_ahv');
            $table->string('beneficios_del_curso');
            $table->bigInteger('users_id')->unsigned()->index()->nullable();
            $table->timestamps();
            //Forma de referenciar las llaves foraneas
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
