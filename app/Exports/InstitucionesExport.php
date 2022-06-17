<?php

namespace App\Exports;

use App\Models\Instituciones;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InstitucionesExport implements FromCollection, WithColumnWidths, WithHeadings, WithStyles, WithTitle
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
        return Instituciones::where("codigoModular","LIKE","%" . request("buscar") . "%")
        ->orWhere("codigoLocal","LIKE","%" . request("buscar") . "%")
        ->select("instituciones.nombre","instituciones.codigoModular","instituciones.codigoLocal","instituciones.provincia","instituciones.distrito","instituciones.direccion","instituciones.tipoZona","instituciones.tipoModalidad")
        ->get();
    }
    public function headings(): array
    {
        return [
            'Nombre',
            'Codigo Modular',
            'Codigo Local',
            'Provincia',
            'Distrito',
            'Direccion',
            'Tipo de Zona',
            'Modalidad',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 40,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 40,
            'G' => 15,
            'H' => 15,
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
        return 'Instituciones-La Libertad';
    }
}
