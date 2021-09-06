<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";
    protected $primaryKey = "codPersona";
    public $timestamps = false; 


    protected $fillable = [
       'codEstado', 'dni', 'montoAdeudado','añoUltimaDeuda'
    ];

    public function getEstado(){
        return EstadoPersona::findOrFail($this->codEstado);
    }
}
