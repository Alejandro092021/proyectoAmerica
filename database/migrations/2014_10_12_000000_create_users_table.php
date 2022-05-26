<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('direccion',255);
            $table->string('telefono',20);
            $table->smallInteger('operador')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('tipoDocumento')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('estadoCivil')->nullable();/* referencia de la tabla maestro*/
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->enum('cargo',['DIRECTOR','GERENTE UGEL','GERENTE GENERAL']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
