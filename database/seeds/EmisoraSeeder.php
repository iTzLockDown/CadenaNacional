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

            'nombrecadena'=>'RADIO FIESTA',
            'representanteLegal'=>'FREDY ANDALUZ',
            'representanteComercial'=>'NICODEMO CAJACURI MAROTAZO EIRL',
            'frecuencia'=>'VHF',
            'direccion'=>'-',
            'numeroRadio'=>'CANAL 2',
            'email'=>'elgrupofiesta@hotmail.com',
            'ruc'=>'-',
            'descripcion'=>'-',
            'telefono'=>'993 055 559 / 968 444 410',
            'estacion'=>'TELEVISION',
            'estado'=>'1',
            'departamento'=>'12',
            'provincia'=>'1203',
            'distrito'=>'120301'
        ]);
    }
}	
