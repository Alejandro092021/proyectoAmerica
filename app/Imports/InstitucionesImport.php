<?php

namespace App\Imports;

use App\Models\Instituciones;
use Maatwebsite\Excel\Concerns\ToModel;

class InstitucionesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Instituciones([
            //nombre numero direccion
            'nombre'    => $row[0],//A
            'numero'    => $row[1],//B
            'direccion' => $row[2],//C
            
        ]);
    }
}
