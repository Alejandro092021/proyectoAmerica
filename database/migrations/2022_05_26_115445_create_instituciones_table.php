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
        Schema::create('instituciones', function (Blueprint $table) {
            //Datos de la institucion
            $table->id();
            $table->string('nombre', 255);
            $table->string('numero', 20);
            $table->string('direccion', 255);
            $table->smallInteger('tipoZona');/* referencia de la tabla maestro*/
            $table->smallInteger('tipoModalidad');/* referencia de la tabla maestro*/
            $table->string('distrito', 100);
            //Datos Infrastructura
            //Datos Saneamiento fisico legal
            $table->smallInteger('tieneSfl');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoNombreSfl')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('tieneDocumentoSfl')->nullable();/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tieneProcesoSfl')->nullable();/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoProcesoSfl')->nullable();/* referencia de la tabla maestro*/
            //Cerco
            $table->smallInteger('tieneCeco');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoCerco')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('estadoCerco')->nullable();/* referencia de la tabla maestro*/
            //Recreacion
            $table->smallInteger('requiereRecreacion');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoRecreacion')->nullable();/* referencia de la tabla maestro*/

            //Datos Servicios
            //Intenet
            $table->smallInteger('tieneIntenet');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoIntenet')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('cancelaIntenet')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('estadoIntenet')->nullable();/* referencia de la tabla maestro*/
            //Luz
            $table->smallInteger('tieneLuz');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoLuz')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('cancelaLuz')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('estadoLuz')->nullable();/* referencia de la tabla maestro*/
            //Agua
            $table->smallInteger('tieneAgua');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoAgua')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('cancelaAgua')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('estadoAgua')->nullable();/* referencia de la tabla maestro*/

            //Desague
            $table->smallInteger('tieneDesague');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoDesague')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('cancelaDesague')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('estadoDesague')->nullable();/* referencia de la tabla maestro*/
            //Reserva
            $table->smallInteger('tieneReserva');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoReserva')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('cancelaReserva')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('estadoReserva')->nullable();/* referencia de la tabla maestro*/
            //Vigilancia
            $table->smallInteger('tieneVigilancia');/* referencia 1(SI) o 2 (No)*/
            $table->smallInteger('tipoVigilancia')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('cancelaVigilancia')->nullable();/* referencia de la tabla maestro*/
            $table->smallInteger('estadoVigilancia')->nullable();/* referencia de la tabla maestro*/
            $table->unsignedBigInteger('idUgel');
            $table->foreign('idUgel')->references('id')->on('ugeles');
            //directores
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituciones');
    }
};
