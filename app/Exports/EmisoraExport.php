<?php

namespace App\Exports;

use App\Emidora;
use App\Emisora;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmisoraExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Emisora::all();
    }
}
