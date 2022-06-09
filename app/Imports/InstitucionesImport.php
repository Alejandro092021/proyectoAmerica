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

            'nombre' => $row[0], 'numero' => $row[1], 'direccion' => $row[2],'tipoZona' => $row[3],'tipoModalidad' => $row[4],
            'distrito' => $row[5], 'tieneSfl' => $row[6], 'tipoNombreSfl' => $row[7],'tieneDocumentoSfl' => $row[8],'tieneProcesoSfl' => $row[9],
            'tipoProcesoSfl' => $row[10], 'tieneCerco' => $row[11], 'tipoCerco' => $row[12],'estadoCerco' => $row[13],'requiereRecreacion' => $row[14],
            'tipoRecreacion' => $row[15], 'tieneIntenet' => $row[16], 'tipoIntenet' => $row[17],'cancelaIntenet' => $row[18],'estadoIntenet' => $row[19],
            'tieneLuz' => $row[20], 'tipoLuz' => $row[21], 'cancelaLuz' => $row[22],'estadoLuz' => $row[23],'tieneAgua' => $row[24],
            'tipoAgua' => $row[25], 'cancelaAgua' => $row[26], 'estadoAgua' => $row[27],'tieneDesague' => $row[28],'tipoDesague' => $row[29],
            'cancelaDesague' => $row[30], 'estadoDesague' => $row[31], 'tieneReserva' => $row[32],'tipoReserva' => $row[33],'cancelaReserva' => $row[34],
            'estadoReserva' => $row[35], 'tieneVigilancia' => $row[36], 'tipoVigilancia' => $row[37],'cancelaVigilancia' => $row[38],'estadoVigilancia' => $row[39],
            
        ]);
    }
}
