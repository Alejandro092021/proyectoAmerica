<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'codigoModular', 'codigoLocal','provincia','distrito',
        'direccion', 'tipoZona', 'tipoModalidad',
    ];
    
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }
    public function getNombreAttribute($value)
    {
        return strtolower($value);
    }

    public function setProvinciaAttribute($value)
    {
        $this->attributes['provincia'] = ucwords($value);
    }
    public function getProvinciaAttribute($value)
    {
        return strtolower($value);
    }

    public function setDistritoAttribute($value)
    {
        $this->attributes['distrito'] = ucwords($value);
    }
    public function getDistritoAttribute($value)
    {
        return strtolower($value);
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] = ucwords($value);
    }
    public function getDireccionAttribute($value)
    {
        return strtolower($value);
    }

    public function setTipoZonaAttribute($value)
    {
        $this->attributes['tipoZona'] = ucfirst($value);
    }
    public function getTipoZonaAttribute($value)
    {
        return strtolower($value);
    }

    public function setTipoModalidadAttribute($value)
    {
        $this->attributes['tipoModalidad'] = ucfirst($value);
    }
    public function getTipoModalidadAttribute($value)
    {
        return strtolower($value);
    }

    

}
