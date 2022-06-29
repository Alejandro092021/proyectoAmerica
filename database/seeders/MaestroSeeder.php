<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Importamos el modelo Maestro
use App\Models\Maestro;

use Illuminate\Support\Facades\Storage;

class MaestroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array =
            array(
                //Cargo
                array("nombreTabla"=>"Cargo","campo"=>"Administrador","valor"=>"1"),
                array("nombreTabla"=>"Cargo","campo"=>"Gerente General","valor"=>"2"),
                array("nombreTabla"=>"Cargo","campo"=>"Director de Ugel","valor"=>"3"),
                array("nombreTabla"=>"Cargo","campo"=>"Director de Colegio","valor"=>"4"),

                //Especialidad
                array("nombreTabla"=>"Especialidad","campo"=>"Comunicación","valor"=>"1"),
                array("nombreTabla"=>"Especialidad","campo"=>"Matemática","valor"=>"2"),
                array("nombreTabla"=>"Especialidad","campo"=>"Historia","valor"=>"3"),
                array("nombreTabla"=>"Especialidad","campo"=>"Ciencias Sociales","valor"=>"4"),
                array("nombreTabla"=>"Especialidad","campo"=>"Ciencia y Tecnología","valor"=>"5"),

                //Tipo de Estudio
                array("nombreTabla"=>"TipoEstudio","campo"=>"Basica Regular","valor"=>"1"),
                array("nombreTabla"=>"TipoEstudio","campo"=>"Basica Especial","valor"=>"2"),
                array("nombreTabla"=>"TipoEstudio","campo"=>"Basica Alternativa","valor"=>"3"),

                //Nivel de Estudio
                array("nombreTabla"=>"Nivel","campo"=>"Inicial","valor"=>"1"),
                array("nombreTabla"=>"Nivel","campo"=>"Primaria","valor"=>"2"),
                array("nombreTabla"=>"Nivel","campo"=>"Secundaria","valor"=>"3"),
                array("nombreTabla"=>"Nivel","campo"=>"Intermedio","valor"=>"4"),
                array("nombreTabla"=>"Nivel","campo"=>"Avanzado","valor"=>"5"),

                //Grado Academico
                array("nombreTabla"=>"Grado","campo"=>"3años","valor"=>"1"),
                array("nombreTabla"=>"Grado","campo"=>"4años","valor"=>"2"),
                array("nombreTabla"=>"Grado","campo"=>"5años","valor"=>"3"),
                array("nombreTabla"=>"Grado","campo"=>"Primer Grado","valor"=>"4"),
                array("nombreTabla"=>"Grado","campo"=>"Segundo Grado","valor"=>"5"),
                array("nombreTabla"=>"Grado","campo"=>"Tercer Grado","valor"=>"6"),
                array("nombreTabla"=>"Grado","campo"=>"Cuarto Grado","valor"=>"7"),
                array("nombreTabla"=>"Grado","campo"=>"Quinto Grado","valor"=>"8"),
                array("nombreTabla"=>"Grado","campo"=>"Sexto Grado","valor"=>"9"),
                array("nombreTabla"=>"Grado","campo"=>"Primer Año","valor"=>"10"),
                array("nombreTabla"=>"Grado","campo"=>"Segundo Año","valor"=>"11"),
                array("nombreTabla"=>"Grado","campo"=>"Tercer Año","valor"=>"12"),
                array("nombreTabla"=>"Grado","campo"=>"Cuarto Año","valor"=>"13"),
                array("nombreTabla"=>"Grado","campo"=>"Quinto Año","valor"=>"14"),
                
                //Modalidad de Estudio
                array("nombreTabla"=>"TipoModalidad","campo"=>"Presencial","valor"=>"1"),
                array("nombreTabla"=>"TipoModalidad","campo"=>"SemiPresencial","valor"=>"2"),
                array("nombreTabla"=>"TipoModalidad","campo"=>"Distancia","valor"=>"3"),

                //Tipo de la Zona
                array("nombreTabla"=>"TipoZona","campo"=>"Rural","valor"=>"1"),
                array("nombreTabla"=>"TipoZona","campo"=>"Urbano","valor"=>"2"),

                //Bimestre
                array("nombreTabla"=>"Bimestre","campo"=>"Primero","valor"=>"1"),
                array("nombreTabla"=>"Bimestre","campo"=>"Segundo","valor"=>"2"),
                array("nombreTabla"=>"Bimestre","campo"=>"Tercero","valor"=>"3"),

                //Tipo de Modulo
                array("nombreTabla"=>"Modulo","campo"=>"Matriculados","valor"=>"1"),
                array("nombreTabla"=>"Modulo","campo"=>"Asistencias","valor"=>"2"),
                array("nombreTabla"=>"Modulo","campo"=>"Nivel de Logro","valor"=>"3"),
                array("nombreTabla"=>"Modulo","campo"=>"Riesgo de Abandono","valor"=>"4"),
                array("nombreTabla"=>"Modulo","campo"=>"Vacunados","valor"=>"5"),
                array("nombreTabla"=>"Modulo","campo"=>"Docentes","valor"=>"6"),
                
                //Tipo de Nombre Saneamiento Fisico Legal
                array("nombreTabla"=>"NombreSfl","campo"=>"Ugel","valor"=>"1"),
                array("nombreTabla"=>"NombreSfl","campo"=>"Director","valor"=>"2"),
                array("nombreTabla"=>"NombreSfl","campo"=>"Comunidad","valor"=>"3"),
                array("nombreTabla"=>"NombreSfl","campo"=>"Empresa Privada","valor"=>"4"),

                //Tipo de Proceso de Saneamiento Fisico Legal
                array("nombreTabla"=>"ProcesoSfl","campo"=>"Preventiva","valor"=>"1"),
                array("nombreTabla"=>"ProcesoSfl","campo"=>"Definitiva","valor"=>"2"),
                array("nombreTabla"=>"ProcesoSfl","campo"=>"Estudio","valor"=>"3"),

                //Tipo de Cerco Perimetrico
                array("nombreTabla"=>"Cerco","campo"=>"Alambre","valor"=>"1"),
                array("nombreTabla"=>"Cerco","campo"=>"Adobe","valor"=>"2"),
                array("nombreTabla"=>"Cerco","campo"=>"Material Noble","valor"=>"3"),

                //Estado del Servicio
                array("nombreTabla"=>"Estado","campo"=>"Bueno","valor"=>"1"),
                array("nombreTabla"=>"Estado","campo"=>"Malo","valor"=>"2"),
                array("nombreTabla"=>"Estado","campo"=>"Regular","valor"=>"3"),

                //Tipo de Internet
                array("nombreTabla"=>"TipoInternet","campo"=>"Cableado","valor"=>"1"),
                array("nombreTabla"=>"TipoInternet","campo"=>"Satelital","valor"=>"2"),
                array("nombreTabla"=>"TipoInternet","campo"=>"Fibra Optica","valor"=>"3"),

                //Encargado de Cancelar el Servicio
                array("nombreTabla"=>"CancelaServicio","campo"=>"Ugel","valor"=>"1"),
                array("nombreTabla"=>"CancelaServicio","campo"=>"Municipalidad","valor"=>"2"),
                array("nombreTabla"=>"CancelaServicio","campo"=>"Comunidad","valor"=>"3"),
                array("nombreTabla"=>"CancelaServicio","campo"=>"Empresa Privada","valor"=>"4"),

                //Tipo de Luz
                array("nombreTabla"=>"TipoLuz","campo"=>"Panel Solar","valor"=>"1"),
                array("nombreTabla"=>"TipoLuz","campo"=>"Cableado","valor"=>"2"),
                array("nombreTabla"=>"TipoLuz","campo"=>"Motor","valor"=>"3"),
                
                //Tipo de Agua
                array("nombreTabla"=>"TipoAgua","campo"=>"Entubado","valor"=>"1"),
                array("nombreTabla"=>"TipoAgua","campo"=>"Pozo","valor"=>"2"),

                //Tipo de Desague
                array("nombreTabla"=>"Desague","campo"=>"Entubado","valor"=>"1"),
                array("nombreTabla"=>"Desague","campo"=>"Pozo Ciego","valor"=>"2"),
                array("nombreTabla"=>"Desague","campo"=>"Cilo","valor"=>"3"),

                //Tipo de Abastecimiento de Agua
                array("nombreTabla"=>"AbastecimientoAgua","campo"=>"Tanque","valor"=>"1"),
                array("nombreTabla"=>"AbastecimientoAgua","campo"=>"Reservorio","valor"=>"2"),

                //Vigilancia
                array("nombreTabla"=>"Vigilancia","campo"=>"Camara de Seguridad","valor"=>"1"),
                array("nombreTabla"=>"Vigilancia","campo"=>"Guardian","valor"=>"2"),

            );
        foreach($array as $data){
            $maestro = new Maestro();
            $maestro->nombreTabla = $data['nombreTabla'];
            $maestro->campo =  $data['campo'];
            $maestro->valor =  $data['valor'];
            $maestro->save();
        }
    }
}
