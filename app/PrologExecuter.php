<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrologExecuter  
{
    
    public $rutaArchivo = "C:/xampp/htdocs/SistemaExpertoPrestamos/prolog/prueba.pl";



    public function ejecutarComando($comandos){
             
        
        $output =  shell_exec('swipl -s '.$this->rutaArchivo.' -g '.$comandos.' -t halt.');  
        
        //var_dump($output);
        return $output;
    }




}
