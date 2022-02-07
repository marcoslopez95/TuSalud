<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores_especialidades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_doctor')->unsigned()->comment('Foránea: Tabla doctores');
            $table->bigInteger('id_especialidad')->unsigned()->comment('Foránea: Tabla especialidades');
            $table->timestamps();

            #   Foránea
            $table->foreign('id_doctor')->references('id')->on('doctores')->onDelete('cascade');
            $table->foreign('id_especialidad')->references('id')->on('especialidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctores_especialidades');
    }
}
