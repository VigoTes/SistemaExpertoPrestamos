<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    
    protected $table = "cuota";
    protected $primaryKey = "codCuota";
    public $timestamps = false; 


    public function getStringPagado(){
        if($this->pagado)
            return "Pagado";

        return "Pendiente";
    }
}
