<?php

namespace App\Http\Controllers;

use App\Prestamo;
use App\RazonPrestamo;
use App\RespuestaAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RazonPrestamoController extends Controller
{


    public function listar(){
        $listaRazones = RazonPrestamo::All();

        return view('RazonPrestamo.ListarRazonPrestamo',compact('listaRazones'));
    }
    public function agregarEditarRazonPrestamo(Request $request){
        try{

            DB::beginTransaction();
            
            if($request->codRazon=="0"){//NUEVO REGISTRO
                $razon = new RazonPrestamo();
                $mensaje = "agregado";
            }else{ //registro ya existente estamos editando
                $razon = RazonPrestamo::findOrFail($request->codRazon);
                $mensaje = "editado";
            }
            $razon->nombre = $request->nombre;
            $razon->tasa = $request->tasa;
            $razon->save();
            $nombre =$razon->nombre;

            db::commit();

            return redirect()->route('RazonPrestamo.listar')->with('datos',"Se ha $mensaje la razón de préstamo $nombre");
        }catch(\Throwable $th){
            DB::rollBack();
            
            return RespuestaAPI::respuestaError("Ha ocurrido un error interno: $th");
        }


    }

    public function eliminar($codRazon){
        try {
            DB::beginTransaction();
            $registro =  RazonPrestamo::findOrFail($codRazon); 
            $nombre = $registro->nombre;
             
            //verificamos si está siendo usado
            $listaPrestamos = Prestamo::where('codRazon','=',$codRazon)->get();
            if(count($listaPrestamos)!=0){
                $prestamo = $listaPrestamos[0];
                $codPrestamo = $prestamo->codPrestamo;
                return RespuestaAPI::respuestaError("No se puede borrar, está siendo usado en el préstamo $codPrestamo");
            }

            $registro->delete();
            DB::commit();
            return redirect()->route('RazonPrestamo.listar')->with('datos',"Se ha eliminado la razon de préstamo $nombre");
        } catch (\Throwable $th) {
            DB::rollBack();
            return RespuestaAPI::respuestaError("Ha ocurrido un error interno: $th");
        }
       


    }


}
