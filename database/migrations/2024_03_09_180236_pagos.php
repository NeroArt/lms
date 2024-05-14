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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaccion')->default('No aplica');
            $table->string('status');
            $table->dateTime('fecha_pago');
            $table->integer('monto_pago');
            $table->string('concepto_pago');
            $table->string('metodo_pago');
            $table->bigInteger('cursos_id')->unsigned()->index()->nullable();
            $table->string('nombre_usuario');
            $table->string('email_usuario');
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
        Schema::dropIfExists('pagos');
    }
};
