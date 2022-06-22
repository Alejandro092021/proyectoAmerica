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
        Schema::create('detalleadministrativos', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('tipoModulo');
            $table->smallInteger('tipoEducacion');
            $table->smallInteger('nivel');
            $table->smallInteger('grado');
            $table->smallInteger('tipoModalidad');
            $table->smallInteger('especialidad');
            $table->smallInteger('bimestre');
            $table->integer('cantidad');

            $table->unsignedBigInteger('idUsuario')->unique();

            $table->foreign('idUsuario')->references('id')->on('users');
            
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
        Schema::dropIfExists('detalleadministrativos');
    }
};
