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
        Schema::create('detalle_administrativos', function (Blueprint $table) {
            $table->id();

            
            $table->smallInteger('modulo');
            $table->smallInteger('educacion');
            $table->smallInteger('nivel');
            $table->smallInteger('grado');
            $table->smallInteger('modalidad');
            $table->smallInteger('especialidad')->nullable();
            $table->smallInteger('bimestre')->nullable();
            $table->integer('cantidad');
            $table->string('usuarioCreador', 100)->nullable();
            $table->string('usuarioEditor', 100)->nullable();

                   

            $table->unsignedBigInteger('idUsuario');

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
        Schema::dropIfExists('detalle_administrativos');
    }
};
