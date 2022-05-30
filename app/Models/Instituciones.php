<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'numero', 'direccion','tipoZona','tipoModalidad',
        'distrito', 'tieneSfl', 'tipoNombreSfl','tieneDocumentoSfl','tieneProcesoSfl',
        'tipoProcesoSfl', 'tieneCerco', 'tipoCerco','estadoCerco','requiereRecreacion',
        'tipoRecreacion', 'tieneIntenet', 'tipoIntenet','cancelaIntenet','estadoIntenet',
        'tieneLuz', 'tipoLuz', 'cancelaLuz','estadoLuz','tieneAgua',
        'tipoAgua', 'cancelaAgua', 'estadoAgua','tieneDesague','tipoDesague',
        'cancelaDesague', 'estadoDesague', 'tieneReserva','tipoReserva','cancelaReserva',
        'estadoReserva', 'tieneVigilancia', 'tipoVigilancia','cancelaVigilancia','estadoVigilancia',
    ];
}
