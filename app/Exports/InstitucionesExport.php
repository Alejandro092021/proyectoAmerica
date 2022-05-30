<?php

namespace App\Exports;

use App\Models\Instituciones;
use Maatwebsite\Excel\Concerns\FromCollection;

class InstitucionesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Instituciones::all();
    }
}
