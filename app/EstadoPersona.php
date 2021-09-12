<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPersona extends Model
{
    protected $table = "estado_persona";
    protected $primaryKey = "codEstado";
    public $timestamps = false; 


    protected $fillable = [
       'nombre'
    ];
    public static function getEstadoConAntecedentes(){
        return EstadoPersona::findOrFail(1);
    } 
    public static function getEstadoSinAntecedentes(){
        return EstadoPersona::findOrFail(2);
    }

    //si tiene antecedentes rojo
    public function getColor(){
        if($this->codEstado == 1)
            return "red";
            
        return "green";
    }
}
