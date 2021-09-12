<?php

namespace App\Http\Controllers;

use App\PlazoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlazoPagoController extends Controller
{
    const PAGINATION = 15;

    public function listar(){
        $plazos = PlazoPago::paginate($this::PAGINATION);

        return view('PlazoPago.listar',compact('plazos'));
    }

    public function crear(){
        return view('PlazoPago.crear');
    }

    public function editar($id){
        $plazo=PlazoPago::findOrFail($id);
        return view('PlazoPago.editar',compact('plazo'));
    }

    public function eliminar($id){
        $plazo=PlazoPago::findOrFail($id);
        $plazo->delete();
        return redirect()->route('PlazoPago.listar')
                ->with('datos','Plazo '.$plazo->codPlazo.' eliminada exitosamente');
    }

    public function guardar(Request $request){
        try{
            DB::beginTransaction();
            
            $plazo=new PlazoPago();
            $plazo->valor=$request->valor;
            $plazo->unidadTiempo=$request->unidadTiempo;
            $plazo->save();
            

            db::commit();
            return redirect()->route('PlazoPago.listar')
                ->with('datos','Plazo '.$plazo->codPlazo.' registrado exitosamente');
            
        }catch (\Throwable $th) {
            //Debug::mensajeError(' ACTOR CONTROLLER guardarcrearactor' ,$th);    
            DB::rollback();

            return redirect()->route('PlazoPago.listar')
                ->with('datos','Error al registrar un Plazo');
                
        }
         
    }

    public function update(Request $request){
        try{
            DB::beginTransaction();
            
            $plazo=PlazoPago::findOrFail($request->codPlazo);
            $plazo->valor=$request->valor;
            $plazo->unidadTiempo=$request->unidadTiempo;
            $plazo->save();
            

            db::commit();
            return redirect()->route('PlazoPago.listar')
                ->with('datos','Tasa '.$plazo->codPlazo.' editada exitosamente');
            
        }catch (\Throwable $th) {
            //Debug::mensajeError(' ACTOR CONTROLLER guardarcrearactor' ,$th);    
            DB::rollback();

            return redirect()->route('PlazoPago.listar')
                ->with('datos','Error al editar un plazo');
                
        }
         
    }
}
