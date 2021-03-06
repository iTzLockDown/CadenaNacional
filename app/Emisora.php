<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emisora extends Model
{
    protected $table = 'emisoras';

    protected $fillable = ['nombrecadena', 'representanteLegal', 'representanteComercial',
        'frecuencia', 'direccion', 'numeroRadio', 'email', 'ruc', 'descripcion',
        'telefono','estacion','estado', 'nomper1','telper1', 'nomper2', 'telper2', 'autorizacion', 'website' ,'departamento', 'provincia', 'distrito'];

    public static function emisoras($id){
        return Emisora::where('distrito','=',$id)->where('estado',1)
            ->get();
    }

    public static function EmisoraProv($id){
        return Emisora::where('departamento','=',$id)->where('estado',1)
            ->get();
    }

    public static function EmisoraProvincia($id){
        return Emisora::where('provincia','=',$id)->where('estado',1)
            ->get();
    }

    public static function EmisoraDistrito($id){
        return Emisora::where('distrito','=',$id)->where('estado',1)
            ->get();
    }

    public static function emisora($id){
        return Emisora::find($id);
    }

    public static function getEmisoras($id){
        return Emisora::where('estacion', '==', $id);
    }

    public function scopeBusqueda($query, $nombre)
    {
        if($nombre !="")
        {
            $query ->where('nombrecadena','like',"%".$nombre."%")->where('estado',1);
        }

    }


}
