<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';

    protected $fillable = ['name','departamento'];


    public static function provincias($id){
        return Provincia::where('departamento','=',$id)
            ->get();
    }
}
