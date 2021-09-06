<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{


    protected $table = "prestamo";
    protected $primaryKey = "codPrestamo";
    public $timestamps = false; 


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
         
        
        $nivelPrestamo = $motor->ejecutarComando("calcularNivelPrestamo(".$caracteristicas['importePrestamo'].").");
        $nivelCapacidadFinanciera = $motor->ejecutarComando("calcularCapacidadFinanciera('$nivelUtilidades','$condicionMorosidad','$riesgoPorEdad','$riesgoNoRetorno').");
        $nivelRespaldoFinanciero = $motor->ejecutarComando("calcularRespaldoFinanciero(".$caracteristicas['patrimonioTotal'].").");

        //respaldo,capacidad,nivel   
        $condicionEvaluacionPrestamo = $motor->ejecutarComando("evaluarPrestamo('$nivelRespaldoFinanciero','$nivelCapacidadFinanciera','$nivelPrestamo').");
        
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

    /* 
        Le entra: 
            cantidadCuotas, monto, tasaInteres

        Le sale: 
            Un vector en el que 
            cada elemento es un vector de tipo
                [
                    'item', 
                    'pago'=>$,
                    'montoInteres'=>$montoInteres,
                    'montoAmortizacion'=>$montoPagado
                    'saldoDeuda' //lo que queda despues de pagar esta cuota

                ]
            cuota = interes + deudaCanc
    */
    public static function generarCuotas($cantidadCuotas,$monto,$tasaInteres){
        $vectorFinal = [];
        $pago=$monto*(($tasaInteres*pow(1+$tasaInteres,$cantidadCuotas))/(pow(1+$tasaInteres,$cantidadCuotas)-1));
        
        $saldoAnterior=0;
        $i=0;
        do {
            if($i==0){
                $vector1=[
                    'item'=>$i,
                    'pago'=>0,
                    'montoInteres'=>0,
                    'montoAmortizacion'=>0,
                    'saldoDeuda'=>round($monto, 2)
                ];
                $saldoAnterior=$monto;
            }else{
                $vector1=[
                    'item'=>$i,
                    'pago'=>round($pago, 2),
                    'montoInteres'=>round($saldoAnterior*$tasaInteres, 2),
                    'montoAmortizacion'=>round($pago-$saldoAnterior*$tasaInteres, 2),
                    'saldoDeuda'=>round($saldoAnterior-($pago-$saldoAnterior*$tasaInteres), 2)
                ];
                $saldoAnterior=$saldoAnterior-($pago-$saldoAnterior*$tasaInteres);
            }
            array_push($vectorFinal,$vector1);
            $i++;
        } while ($i <= $cantidadCuotas);

        
        return $vectorFinal;

    }

    public static function buscarEnInfocorp($dni){
        return "sin_antecedentes";
    }

}
