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
            $table->string('nombre', 200);
            $table->string('codigoModular', 10)->unique();
            $table->string('codigoLocal', 10);
            $table->string('provincia', 50);
            $table->string('distrito', 50);
            $table->string('direccion', 200);
            $table->string('tipoZona', 50);
            $table->string('Modalidad', 50);
            
            $table->timestamps();
           // $table->unsignedBigInteger('idUgel');
            //$table->foreign('idUgel')->references('id')->on('ugeles');
            //directores
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
