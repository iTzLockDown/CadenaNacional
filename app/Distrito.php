<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';

    protected $fillable = ['name','departamento', 'provincia'];


    public static function distritos($id){
        return Distrito::where('provincia','=',$id)
            ->get();
        }


}
