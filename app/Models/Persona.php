<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres', 'apellidoPaterno','apellidoMaterno', 'correo','telefono'
    ];


//Relacion de uno a muchos
public function users(){
    return $this->hasMany('App\Models\User');
}

    
}
