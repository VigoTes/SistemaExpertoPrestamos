<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\Cuota;
use App\Debug;
use App\Http\Controllers\Controller;
use App\PlazoPago;
use App\Prestamo;
use App\RazonPrestamo;
use App\RespuestaAPI;
use App\TasaInteres;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{

    public function listarPrestamos(){

        $listaPrestamos = Prestamo::orderBy('codPrestamo','DESC')->get();
        return view('Prestamos.ListarPrestamos',compact('listaPrestamos'));

    }
    public function verPrestamo($codPrestamo){
        $prestamo = Prestamo::findOrFail($codPrestamo);
        $listaCuotas = Cuota::where('codPrestamo','=',$codPrestamo)->get();
        
        return view('Prestamos.VerPrestamo',compact('prestamo','listaCuotas'));
    }

    public function verEvaluar(){

        $listaRazonesPrestamo = RazonPrestamo::All();
        $listaPlazos = PlazoPago::All();
        return  view('Prestamos.EvaluarPrestamo',compact('listaRazonesPrestamo','listaPlazos'));
    }

    //se llama desde javascript y retorna un MODAL
    public function Evaluar(Request $request){
        try {
            DB::beginTransaction();
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
            
            $plazo = PlazoPago::findOrFail($request->codPlazo);
            $estadoPersona = Prestamo::buscarEnInfocorp($dni); //retorna un objeto EstadoPersona
            
            $caracteristicas = [
                'utilidad'=>$utilidad,
                'importePrestamo'=>$importePrestamo,
                'edad'=>$edad,
                'tasaRetorno' => $tasaRetorno,
                'patrimonioTotal' => $patrimonioTotal,
                'condicionMorosidad'=> $estadoPersona->nombre
            ];     
            
            $evaluacionPrestamo = Prestamo::evaluarPrestamo($caracteristicas);
            /* 
                'nivelUtilidades' => $nivelUtilidades,
                'riesgoPorEdad' => $riesgoPorEdad,
                'riesgoNoRetorno' => $riesgoNoRetorno,

                'nivelPrestamo' => $nivelPrestamo,
                'nivelCapacidadFinanciera' => $nivelCapacidadFinanciera,
                'nivelRespaldoFinanciero' => $nivelRespaldoFinanciero,
                
                'condicionEvaluacionPrestamo' => $condicionEvaluacionPrestamo
            */
            

            Debug::mensajeSimple(json_encode($evaluacionPrestamo));

            $tasaInteres = TasaInteres::getTasaActual()->valor;
            
            $listaCuotasPosibles = Prestamo::generarCuotas($plazo->valor,$importePrestamo,$tasaInteres);
            DB::commit();
            return view('Prestamos.Invocables.inv_EvaluacionPrestamo',
                compact('plazo','caracteristicas','evaluacionPrestamo','listaCuotasPosibles','estadoPersona'));
            
        } catch (\Throwable $th) {
            DB::rollback();
            Debug::mensajeError("prestam controller EVALUAR",$th);
            return "ERROR".$th;
        }
    }


    /*  
    Le entra:
        el request con todos los datos del prestamo
    
        Hace: inserta en la tabla Prestamo los datos 
            y en la tabla cuota, los pagos generados del prestamo

    */
    public function CrearPrestamo(Request $request){
        //return Debug::requestEnJS($request);
        try {
            DB::beginTransaction();
            //Debug::mensajeSimple("El request es: ".json_encode($request->toArray()));
            
            $dni = $request->DNI;
            $codRazonCredito = $request->razonCredito;
            
            $ingresos = $request->ingresos;
            $egresos = $request->egresos;
            $importeInmuebles = $request->importeInmuebles;
            $importeCapital = $request->importeCapital;

            $utilidad = $ingresos-$egresos;
            $edad = $request->edad;
            $patrimonioTotal = $importeInmuebles + $importeCapital;
            $importePrestamo = $request->importePrestamo;
            
            $tasaRetorno = RazonPrestamo::findOrFail($codRazonCredito)->tasa;
        
            $plazo = PlazoPago::findOrFail($request->codPlazo); 
            $tasaInteres = TasaInteres::getTasaActual();
                
        
            $listaCuotasPosibles = Prestamo::generarCuotas($plazo->valor,$importePrestamo,$tasaInteres->valor);
            $estadoPersona = Prestamo::buscarEnInfocorp($dni);
                
        
            $caracteristicas = [
                'utilidad'=>$utilidad,
                'importePrestamo'=>$importePrestamo,
                'edad'=>$edad,
                'tasaRetorno' => $tasaRetorno,
                'patrimonioTotal' => $patrimonioTotal,
                'condicionMorosidad'=> $estadoPersona->nombre
            ]; 
            $evaluacionPrestamo = Prestamo::evaluarPrestamo($caracteristicas);
            Debug::mensajeSimple(json_encode($evaluacionPrestamo));
            /* 
            'nivelUtilidades' => $nivelUtilidades,
            'riesgoPorEdad' => $riesgoPorEdad,
            'riesgoNoRetorno' => $riesgoNoRetorno,
            'nivelPrestamo' => $nivelPrestamo,
            'nivelCapacidadFinanciera' => $nivelCapacidadFinanciera,
            'nivelRespaldoFinanciero' => $nivelRespaldoFinanciero,
            'condicionEvaluacionPrestamo' => $condicionEvaluacionPrestamo
            */
            $prestamo = new Prestamo();
            $prestamo->cliente_dni = $dni;
            $prestamo->cliente_nombres = $request->nombresApellidos;
            $prestamo->cliente_utilidad = $utilidad;
            $prestamo->cliente_edad = $edad;
            $prestamo->cliente_patrimonioTotal = $patrimonioTotal;
            $prestamo->cliente_ingresos = $ingresos ;
            $prestamo->cliente_egresos = $egresos;
            
            $prestamo->montoPrestado = $importePrestamo;
            $prestamo->codRazon = $codRazonCredito;
            $prestamo->valorCuota = $listaCuotasPosibles[1]['pago'];
            $prestamo->montoPagado = 0;
            $prestamo->saldoRestante = $importePrestamo; 
            $prestamo->codTasaInteres = $tasaInteres->codTasaInteres;
            $prestamo->codPlazo = $request->codPlazo;

            $prestamo->evaluacion_nivelUtilidades = $evaluacionPrestamo['nivelUtilidades'];
            $prestamo->evaluacion_riesgoPorEdad = $evaluacionPrestamo['riesgoPorEdad'];
            $prestamo->evaluacion_riesgoNoRetorno = $evaluacionPrestamo['riesgoNoRetorno'];
            $prestamo->evaluacion_nivelPrestamo = $evaluacionPrestamo['nivelPrestamo'];
            $prestamo->evaluacion_nivelCapacidadFinanciera = $evaluacionPrestamo['nivelCapacidadFinanciera'];
            $prestamo->evaluacion_nivelRespaldoFinanciero = $evaluacionPrestamo['nivelRespaldoFinanciero'];
            $prestamo->evaluacion_condicionEvaluacionPrestamo = $evaluacionPrestamo['condicionEvaluacionPrestamo'];


            $prestamo->fechaHoraCreacion = Carbon::now();
            $prestamo->save();


            //INSERTAMOS LAS CUOTAS
            for ($i=1; $i <= $plazo->valor ; $i++) {
                $elementoCuota = $listaCuotasPosibles[$i]; //obtenemos del array
                $nuevaCuota = new Cuota();
                $nuevaCuota->codPrestamo = $prestamo->codPrestamo;
                $nuevaCuota->item = $i;
                $nuevaCuota->pago = $elementoCuota['pago'];
                $nuevaCuota->montoInteres = $elementoCuota['montoInteres'];
                $nuevaCuota->montoAmortizacion = $elementoCuota['montoAmortizacion'];
                $nuevaCuota->saldoDeuda = $elementoCuota['saldoDeuda'];
                $nuevaCuota->pagado=0;
                $nuevaCuota->save();
            }
            DB::commit();
            return redirect()->route('Prestamos.VerPrestamo',$prestamo->codPrestamo)
                ->with('datos','Préstamo creado exitosamente.');

        } catch (\Throwable $th) {
            DB::rollback();
            Debug::mensajeError("prestam controller EVALUAR",$th);
            return "ERROR".$th;
        }
    }
    
    public function ConsultarAPISunatDNI($dni){
        
            try {
                $token = Configuracion::tokenParaAPISunat;
                $linkConsulta = "https://dniruc.apisperu.com/api/v1/dni/".$dni."?token=".$token;
                
                $resultado = file_get_contents($linkConsulta);
                // {"dni":"71208489","nombres":"DIEGO ERNESTO","apellidoPaterno":"VIGO","apellidoMaterno":"BRIONES","codVerifica":"3"}
                
                 
                $vector =  json_decode($resultado, true);
                $nombre = $vector['apellidoPaterno']." ".$vector['apellidoMaterno']." ".$vector['nombres'];

                return RespuestaAPI::respuestaOk($nombre);
            } catch (\Throwable $th) {
                return RespuestaAPI::respuestaError("No se encontró a la persona.");
            }
            
            
            return 0;

    }


    




}
