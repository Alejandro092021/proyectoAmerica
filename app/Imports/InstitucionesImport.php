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

            'nombre'=> $row[0], 'codigoModular'=> $row[1], 'codigoLocal'=> $row[2],'provincia'=> $row[3],'distrito'=> $row[4],
            'direccion'=> $row[5], 'tipoZona'=> $row[6], 'Modalidad'=> $row[7],

            
        ]);
    }
}
