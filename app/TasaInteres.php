<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TasaInteres extends Model
{
    //
    protected $table = "tasa_interes";
    protected $primaryKey = "codTasaInteres";
    public $timestamps = false; 


    public static function getTasaActual(){
        return TasaInteres::where('activo','=','1')->get()[0];


    }
}
