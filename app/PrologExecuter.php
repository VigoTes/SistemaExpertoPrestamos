<?php

namespace App;


class PrologExecuter  
{
    
    public $rutaArchivoReglas = "C:/xampp/htdocs/SistemaExpertoPrestamos/prolog/MotorRazonamiento.pl";


    public function ejecutarComando($comandos){
        error_log("Ejecutando el comando:".$comandos);
        $resultadoEjecucion =  shell_exec('swipl -s '.$this->rutaArchivoReglas.' -g '.$comandos.' -t halt.');  
        
        //var_dump($output);
        return $resultadoEjecucion;
    }




}
