<?php

use Illuminate\Database\Seeder;

class EmisoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emisoras')->insert([

            'nombrecadena'=>'CABLE VISION ICA',
            'representanteLegal'=>'AUGUSTO PEÑA ARAUJO ',
            'representanteComercial'=>'SIN FRECUENCIA',
            'frecuencia'=>'-',
            'direccion'=>'-',
            'numeroRadio'=>'-',
            'email'=>'cablevisionoroya@hotmail.com',
            'ruc'=>'-',
            'descripcion'=>'-',
            'telefono'=>'064 391 123 / 999 903 467 / 98',
            'estacion'=>'RADIO',
            'estado'=>'1',
            'departamento'=>'12',
            'provincia'=>'1208',
            'distrito'=>'120808'
        ]);
    }
}


