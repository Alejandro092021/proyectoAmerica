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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('tipoEstudio');/* referencia de la tabla maestro*/
            $table->smallInteger('nivel');/* referencia de la tabla maestro*/
            $table->smallInteger('grado');/* referencia de la tabla maestro*/
            $table->smallInteger('tipoModalidad');/* referencia de la tabla maestro*/
            $table->smallInteger('cantidad');
            $table->unsignedBigInteger('idInstitucion');
            $table->foreign('idInstitucion')->references('id')->on('instituciones');
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
        Schema::dropIfExists('docentes');
    }
};
