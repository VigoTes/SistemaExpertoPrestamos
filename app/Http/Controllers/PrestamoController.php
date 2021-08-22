<?php

namespace App\Http\Controllers;

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

}
