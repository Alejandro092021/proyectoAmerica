<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAdministrativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'institucion',
        'tipoModulo',
        'tipoEducacion',
        'nivel',
        'grado',
        'tipoModalidad',
        'especialidad',
        'bimestre',
        'cantidad',
        'usuarioCreador',
        'usuarioEditor',
        'idUsuario',
    ];

    //Relacion inversa de uno a muchos
    public function personas()
    {
        return $this->belongsTo('App\Models\User', 'idUsuario');
    }
}
