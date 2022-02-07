<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment('Nombre');
            $table->string('apellido')->comment('Apellido');
            $table->date('fecha_nacimiento')->comment('Fecha de Nacimiento');
            $table->enum('sexo',['Hombre','Mujer'])->comment('género');
            $table->string('foto')->nullable()->comment('Foto de perfil');
            $table->bigInteger('id_user')->unsigned()->comment('Foránea: tabla users');
            $table->timestamps();

            # Foráneas
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
