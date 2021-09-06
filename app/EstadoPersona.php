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
}
