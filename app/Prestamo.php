<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    //


    /*  Ejecuta los razonamientos de prolog y retorna si fue aprobado o no
        Le entra: 
            Un vector con las caracteristicas de la solicitud de prestamo
                - Importe solicitado 
                - Utilidad 
                - Morosidad de infocorp (Con / Sin Antecedentes )
                - Edad
                - Tasa de retorno 
                - Patrimonio total
        Le sale:
            un vector de los resultados del razonamiento 
                
                - Nivel de utilidades 
                - Riesgo por edad 
                - Calificacion de la tasa probable de retorno
                
                - Nivel de respaldo financiero 
                - Nivel de capacidad financiera 
                - Nivel de prestamo
                - Evaluacion del crédito 
    */
    public static function evaluarPrestamo($caracteristicas){
        $motor = new PrologExecuter();

        $condicionMorosidad = $caracteristicas['condicionMorosidad'];

        $nivelUtilidades = $motor->ejecutarComando("calcularNivelUtilidades(".$caracteristicas['utilidad'].").");
        
        $riesgoPorEdad = $motor->ejecutarComando("calcularRiesgoPorEdad(".$caracteristicas['edad'].").");
        $riesgoNoRetorno = $motor->ejecutarComando("calcularRiesgoNoRetorno(".$caracteristicas['tasaRetorno'].").");
         
        
        $nivelPrestamo = $motor->ejecutarComando("calcularNivelPrestamo(".$caracteristicas['importeSolicitado'].").");
        $nivelCapacidadFinanciera = $motor->ejecutarComando("calcularCapacidadFinanciera($nivelUtilidades,$condicionMorosidad,$riesgoPorEdad,$riesgoNoRetorno).");
        $nivelRespaldoFinanciero = $motor->ejecutarComando("calcularRespaldoFinanciero(".$caracteristicas['patrimonioTotal'].").");

        $condicionEvaluacionPrestamo = $motor->ejecutarComando("evaluarPrestamo($nivelPrestamo,$nivelCapacidadFinanciera,$nivelRespaldoFinanciero).");
        return [
            'nivelUtilidades' => $nivelUtilidades,
            'riesgoPorEdad' => $riesgoPorEdad,
            'riesgoNoRetorno' => $riesgoNoRetorno,

            'nivelPrestamo' => $nivelPrestamo,
            'nivelCapacidadFinanciera' => $nivelCapacidadFinanciera,
            'nivelRespaldoFinanciero' => $nivelRespaldoFinanciero,
            
            'condicionEvaluacionPrestamo' => $condicionEvaluacionPrestamo
        ];

    }


    public static function buscarEnInfocorp($dni){
        return "SIN ANTECEDENTES";
    }

}
