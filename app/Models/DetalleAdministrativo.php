<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAdministrativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'institucion',
        'modulo',
        'educacion',
        'nivel',
        'grado',
        'modalidad',
        'especialidad',
        'bimestre',
        'cantidad',
        'usuarioCreador',
        'usuarioEditor',
        'idUsuario',
    ];

    //Relacion inversa de uno a muchos con la tabla usuario
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'idUsuario');
    }
    //////////////////////////////////////////////////////

    public function setModalidadAttribute($value)
    {
        if ($value == "Presencial" || $value == "1") {
            # code...
            $this->attributes['modalidad'] = 1;
        }
        if ($value == "SemiPresencial" || $value == "2") {
            # code...
            $this->attributes['modalidad'] = 2;
        }
        if ($value == "Distancia" || $value == "3") {
            # code...
            $this->attributes['modalidad'] = 3;
        }
        
    
    }

    public function getModalidadAttribute($value)
    {
        if ($value === 1) {
            return 'Presencial';
        }
        if ($value === 2) {
            return 'SemiPresencial';
        }
        if ($value === 3) {
            return 'Distancia';
        }
    }
    ///////////////////////////////////////////////////////////////////
    public function setModuloAttribute($value)
    {
        if ($value == "Matriculados" || $value == "1") {
            # code...
            $this->attributes['modulo'] = 1;
        }
        if ($value == "Asistencias" || $value == "2") {
            # code...
            $this->attributes['modulo'] = 2;
        }
        if ($value == "Nivel de Logro" || $value == "3") {
            # code...
            $this->attributes['modulo'] = 3;
        }
        if ($value == "Riesgo de Abandono" || $value == "4") {
            # code...
            $this->attributes['modulo'] = 4;
        }
        if ($value == "Vacunados" || $value == "5") {
            # code...
            $this->attributes['modulo'] = 5;
        }
        if ($value == "Docentes" || $value == "6") {
            # code...
            $this->attributes['modulo'] = 6;
        }
        
    
    }

    public function getModuloAttribute($value)
    {
        if ($value === 1) {
            return 'Matriculados';
        }
        if ($value === 2) {
            return 'Asistencias';
        }
        if ($value === 3) {
            return 'Nivel de Logro';
        }
        if ($value === 4) {
            return 'Riesgo de Abandono';
        }
        if ($value === 5) {
            return 'Vacunados';
        }
        if ($value === 6) {
            return 'Docentes';
        }
    }
    //////////////////////////////////////////////////

    public function setNivelAttribute($value)
    {
        if ($value == "Inicial" || $value == "1") {
            # code...
            $this->attributes['nivel'] = 1;
        }
        if ($value == "Primaria" || $value == "2") {
            # code...
            $this->attributes['nivel'] = 2;
        }
        if ($value == "Secundaria" || $value == "3") {
            # code...
            $this->attributes['nivel'] = 3;
        }
        if ($value == "Intermedio" || $value == "4") {
            # code...
            $this->attributes['nivel'] = 4;
        }
        if ($value == "Avanzado" || $value == "5") {
            # code...
            $this->attributes['nivel'] = 5;
        }
        
    
    }
    public function getNivelAttribute($value)
    {
        if ($value === 1) {
            return 'Inicial';
        }
        if ($value === 2) {
            return 'Primaria';
        }
        if ($value === 3) {
            return 'Secundaria';
        }
        if ($value === 4) {
            return 'Intermedio';
        }
        if ($value === 5) {
            return 'Avanzado';
        }
    }
    ///////////////////////////////////////////////////////
    public function setEducacionAttribute($value)
    {
        if ($value == "Basica Regular" || $value == "1") {
            # code...
            $this->attributes['educacion'] = 1;
        }
        if ($value == "Basica Alternativa" || $value == "2") {
            # code...
            $this->attributes['educacion'] = 2;
        }
        if ($value == "Basica Especial" || $value == "3") {
            # code...
            $this->attributes['educacion'] = 3;
        }       
    
    }
    public function getEducacionAttribute($value)
    {
        if ($value === 1) {
            return 'Basica Regular';
        }
        if ($value === 2) {
            return 'Basica Especial';
        }
        if ($value === 3) {
            return 'Basica Alternativa';
        }
    }
    ///////////////////////////////////////////////////////


    public function setGradoAttribute($value)
    {
        if ($value == "3 años" || $value == "1") {
            # code...
            $this->attributes['grado'] = 1;
        }
        if ($value == "4 años" || $value == "2") {
            # code...
            $this->attributes['grado'] = 2;
        }
        if ($value == "5 años" || $value == "3") {
            # code...
            $this->attributes['grado'] = 3;
        }
        if ($value == "Primer Grado" || $value == "4") {
            # code...
            $this->attributes['grado'] = 4;
        }
        if ($value == "Segundo Grado" || $value == "5") {
            # code...
            $this->attributes['grado'] = 5;
        }
        if ($value == "Tercer Grado" || $value == "6") {
            # code...
            $this->attributes['grado'] = 6;
        }
        if ($value == "Cuarto Grado" || $value == "7") {
            # code...
            $this->attributes['grado'] = 7;
        }
        if ($value == "Quinto Grado" || $value == "8") {
            # code...
            $this->attributes['grado'] = 8;
        }
        if ($value == "Sexto Grado" || $value == "9") {
            # code...
            $this->attributes['grado'] = 9;
        }
        if ($value == "Primer Año" || $value == "10") {
            # code...
            $this->attributes['grado'] = 10;
        }
        if ($value == "Segundo Año" || $value == "11") {
            # code...
            $this->attributes['grado'] = 11;
        }
        if ($value == "Tercer Año" || $value == "12") {
            # code...
            $this->attributes['grado'] = 12;
        }
        if ($value == "Cuarto Año" || $value == "13") {
            # code...
            $this->attributes['grado'] = 13;
        }
        if ($value == "Quinto Año" || $value == "14") {
            # code...
            $this->attributes['grado'] = 14;
        }
        if ($value == "Intermedio" || $value == "15") {
            # code...
            $this->attributes['grado'] = 15;
        }
        if ($value == "Avanzado" || $value == "16") {
            # code...
            $this->attributes['grado'] = 16;
        }
    
    }
    public function getGradoAttribute($value)
    {
        if ($value === 1) {
            return '3 años';
        }
        if ($value === 2) {
            return '4 años';
        }
        if ($value === 3) {
            return '5 años';
        }
        if ($value === 4) {
            return 'Primer Grado';
        }
        if ($value === 5) {
            return 'Segundo Grado';
        }
        if ($value === 6) {
            return 'Tercer Grado';
        }
        if ($value === 7) {
            return 'Cuarto Grado';
        }
        if ($value === 8) {
            return 'Quinto Grado';
        }
        if ($value === 9) {
            return 'Sexto Grado';
        }
        if ($value === 10) {
            return 'Primer Año';
        }
        if ($value === 11) {
            return 'Segundo Año';
        }
        if ($value === 12) {
            return 'Tercer Año';
        }
        if ($value === 13) {
            return 'Cuarto Año';
        }
        if ($value === 14) {
            return 'Quinto Año';
        }
        if ($value === 15) {
            return 'Intermedio';
        }
        if ($value === 16) {
            return 'Avanzado';
        }
    }
    ////////////////////////////////////////////////

    public function setBimestreAttribute($value)
    {
        if ($value == "Primero" || $value == "1") {
            # code...
            $this->attributes['bimestre'] = 1;
        }
        if ($value == "Segundo" || $value == "2") {
            # code...
            $this->attributes['bimestre'] = 2;
        }
        if ($value == "Tercero" || $value == "3") {
            # code...
            $this->attributes['bimestre'] = 3;
        }
    
    }
    public function getBimestreAttribute($value)
    {
        if ($value === 1) {
            return 'Primero';
        }
        if ($value === 2) {
            return 'Segundo';
        }
        if ($value === 3) {
            return 'Tercero';
        }
    }
    ////////////////////////////////////////////////
    public function setEspecialidadAttribute($value)
    {
        if ($value == "Comunicacion" || $value == "1") {
            # code...
            $this->attributes['especialidad'] = 1;
        }
        if ($value == "Matematica" || $value == "2") {
            # code...
            $this->attributes['especialidad'] = 2;
        }
        if ($value == "Historia" || $value == "3") {
            # code...
            $this->attributes['especialidad'] = 3;
        }
        if ($value == "Ciencias Sociales" || $value == "4") {
            # code...
            $this->attributes['especialidad'] = 4;
        }
        if ($value == "Ciencia y Tecnologia" || $value == "5") {
            # code...
            $this->attributes['especialidad'] = 5;
        }
    
    }
    public function getEspecialidadAttribute($value)
    {
        if ($value === 1) {
            return 'Comunicacion';
        }
        if ($value === 2) {
            return 'Matematica';
        }
        if ($value === 3) {
            return 'Historia';
        }
        if ($value === 4) {
            return 'Ciencias Sociales';
        }
        if ($value === 5) {
            return 'Ciencia y Tecnologia';
        }
    }
}
