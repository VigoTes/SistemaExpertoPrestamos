<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\Http\Controllers\Controller;
use App\Prestamo;
use App\RazonPrestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{


    public function verEvaluar(){

        $listaRazonesPrestamo = RazonPrestamo::All();
        return  view('Prestamos.EvaluarPrestamo',compact('listaRazonesPrestamo'));
    }

    //se llama desde javascript
    public function Evaluar(Request $request){

        $dni = $request->dni;
        $codRazonCredito = $request->codRazonCredito;

        $ingresos = $request->ingresos;
        $egresos = $request->egresos;
        $importeInmuebles = $request->importeInmuebles;
        $importeCapital = $request->importeCapital;

        $utilidad = $ingresos-$egresos;
        $edad = $request->edad;
        $patrimonioTotal = $importeInmuebles + $importeCapital;
        $importePrestamo = $request->importePrestamo;
        $tasaRetorno = RazonPrestamo::findOrFail($codRazonCredito);
        $condicionInfocorp = Prestamo::buscarEnInfocorp($dni);
        
        $caracteristicas = [
            'utilidad'=>$utilidad,
            'importePrestamo'=>$importePrestamo,
            'edad'=>$edad,
            'tasaRetorno' => $tasaRetorno,
            'patrimonioTotal' => $patrimonioTotal
        ];     

        $evaluacionPrestamo = Prestamo::evaluarPrestamo($caracteristicas);
        
        return $evaluacionPrestamo;

    }

    
    public function ConsultarAPISunatDNI($dni){
        
                
            $token = Configuracion::tokenParaAPISunat;
            $linkConsulta = "https://dniruc.apisperu.com/api/v1/dni/".$dni."?token=".$token;
            
            $resultado = file_get_contents($linkConsulta);
            

            $vector =  json_decode($resultado, true);
            if($vector['apellidoPaterno']!="")//si encontró
                return $vector;
            
            return 0;

    }


    




}
