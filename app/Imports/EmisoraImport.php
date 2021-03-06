<?php

namespace App\Imports;

use App\Emisora;
use Maatwebsite\Excel\Concerns\ToModel;

class EmisoraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Emisora([
            'nombrecadena'=>$row[0],
            'representanteLegal'=>$row[1],
            'representanteComercial'=>$row[2],
            'frecuencia'=>$row[3],
            'direccion'=>$row[4],
            'numeroRadio'=>$row[5],
            'email'=>$row[6],
            'ruc'=>$row[7],
            'descripcion'=>$row[8],
            'telefono'=>$row[9],
            'estacion'=>$row[10],
            'estado'=>$row[11],
            'departamento'=>$row[12],
            'provincia'=>$row[13],
            'distrito'=>$row[14],
            'nomper1'=>$row[15],
            'telper1'=>$row[16],
            'nomper2'=>$row[17],
            'telper2'=>$row[18],
            'autorizacion'=>$row[19],
            'website'=>$row[20],
        ]);
    }
}
