<?php

namespace App\Exports;

use App\Models\DetalleAdministrativo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MatriculadosExport implements FromCollection, WithHeadings,WithStyles, WithColumnWidths, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $buscar;
    function __construct($buscar)
    {
        $this->buscar = $buscar;
    }
    public function collection()
    {
        return DetalleAdministrativo::join('users', 'detalle_administrativos.idUsuario','=', 'users.id' )
        ->join('maestros','maestros.valor','=','detalle_administrativos.modulo')
        ->where('maestros.nombreTabla','=','Modulo')
        ->where('modulo', '=', '1')
        //->join('maestros as maestros2','maestros2.valor','=','detalle_administrativos.tipoModalidad')
        //->where('maestros2.nombreTabla','=','TipoModalidad')
        
        ->where("users.name", 'LIKE', "%" . $this->buscar . "%")
        ->select('users.name','detalle_administrativos.modulo','detalle_administrativos.modalidad','detalle_administrativos.educacion',
        'detalle_administrativos.nivel', 'detalle_administrativos.grado','detalle_administrativos.cantidad')
        ->get();
    }
    public function headings(): array
    {
        return [
            'Usuario',
            'Tipo de Modulo',
            'Tipo de Modalidad',
            'Tipo de Educacion',
            'Nivel',
            'Grado',
            'Cantidad',
        
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 25,
            'C' => 25,
            'D' => 25,
            'E' => 35,
            'F' => 15,
            'G' => 20,
            
        ];
    }
    public function styles(Worksheet $sheet)
    {


        return [


            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            //'B' => ['font' => ['italic' => true]],

            // Styling an entire column.
            //'C'  => ['font' => ['size' => 16]],
        ];
    }
    public function title(): string
    {
        return 'Matriculados';
    }

}
