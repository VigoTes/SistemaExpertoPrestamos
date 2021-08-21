<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RazonPrestamo extends Model
{
    protected $table = "razon_prestamo";
    protected $primaryKey = "codRazon";
    public $timestamps = false;  //para que no trabaje con los campos fecha 



}
