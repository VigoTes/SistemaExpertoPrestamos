<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use Illuminate\Support\Facades\Auth;
class Usuario extends Model
{


    protected $table = "USUARIO";
    protected $primaryKey = "codUsuario";
    public $timestamps = false;  //para que no trabaje con los campos fecha 


    protected $fillable = [
        'codCliente', 'email','password','fechaActualizacion','isAdmin'
    ];

 

}
