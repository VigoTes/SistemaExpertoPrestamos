<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\Debug;
use App\Http\Controllers\Controller;
use App\PlazoPago;
use App\Prestamo;
use App\RazonPrestamo;
use App\RespuestaAPI;
use App\TasaInteres;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{


    public function verEvaluar(){

        $listaRazonesPrestamo = RazonPrestamo::All();
        $listaPlazos = PlazoPago::All();
        return  view('Prestamos.EvaluarPrestamo',compact('listaRazonesPrestamo','listaPlazos'));
    }

    //se llama desde javascript y retorna un MODAL
    public function Evaluar(Request $request){
        try {
            Debug::mensajeSimple("El request es: ".json_encode($request->toArray()));
        
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
            $tasaRetorno = RazonPrestamo::findOrFail($codRazonCredito)->tasa;
             
            $condicionMorosidad = Prestamo::buscarEnInfocorp($dni);
            
            $caracteristicas = [
                'utilidad'=>$utilidad,
                'importePrestamo'=>$importePrestamo,
                'edad'=>$edad,
                'tasaRetorno' => $tasaRetorno,
                'patrimonioTotal' => $patrimonioTotal,
                'condicionMorosidad'=> $condicionMorosidad
            ];     

            $evaluacionPrestamo = Prestamo::evaluarPrestamo($caracteristicas);
            $tasaInteres = TasaInteres::getTasaActual()->valor;
            
            $listaCuotasPosibles = Prestamo::generarCuotas(6,1000,$tasaInteres);

            return view('Prestamos.Invocables.inv_EvaluacionPrestamo',compact('evaluacionPrestamo','listaCuotasPosibles'));
        
        } catch (\Throwable $th) {
            Debug::mensajeError("prestam controller",$th);
            return "ERROR";
        }
    }


    public function CrearPrestamo(Request $request){
        return $request;

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
