<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrologExecuter  
{
    
    public $rutaArchivoReglas = "C:/xampp/htdocs/SistemaExpertoPrestamos/prolog/prueba.pl";





    public function ejecutarComando($comandos){
        $resultadoEjecucion =  shell_exec('swipl -s '.$this->rutaArchivoReglas.' -g '.$comandos.' -t halt.');  
        //var_dump($output);
        return $resultadoEjecucion;
    }




}
