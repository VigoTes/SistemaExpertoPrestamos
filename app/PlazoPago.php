<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlazoPago extends Model
{


    protected $table = "plazos_posibles_paga";
    protected $primaryKey = "codPlazo";
    public $timestamps = false; 


    public function getString(){
        return $this->valor." ".$this->unidadTiempo;

    }

}
