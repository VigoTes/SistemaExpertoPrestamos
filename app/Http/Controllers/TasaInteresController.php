<?php

namespace App\Http\Controllers;

use App\TasaInteres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasaInteresController extends Controller
{
    const PAGINATION = 15;

    public function listar(){
        $tasas = TasaInteres::paginate($this::PAGINATION);

        return view('TasaInteres.listar',compact('tasas'));
    }

    public function crear(){
        return view('TasaInteres.crear');
    }

    public function editar($id){
        $tasa=TasaInteres::findOrFail($id);
        return view('TasaInteres.editar',compact('tasa'));
    }

    public function guardar(Request $request){
        try{
            DB::beginTransaction();
            
            foreach (TasaInteres::all() as $item) {
                if($item->activo==1){
                    $item->activo=0;
                    $item->fechaEliminacion=date('y-m-d');
                    $item->save();
                    break;
                }
            }

            $tasa=new TasaInteres();
            $tasa->valor=$request->valor;
            $tasa->activo=1;
            $tasa->fechaEliminacion=null;
            $tasa->fechaCreacion=date('y-m-d');
            $tasa->save();
            

            db::commit();
            return redirect()->route('TasaInteres.listar')
                ->with('datos','Tasa '.$tasa->codTasaInteres.' registrado exitosamente');
            
        }catch (\Throwable $th) {
            //Debug::mensajeError(' ACTOR CONTROLLER guardarcrearactor' ,$th);    
            DB::rollback();

            return redirect()->route('TasaInteres.listar')
                ->with('datos','Error al registrar una tasa');
                
        }
         
    }

    public function update(Request $request){
        try{
            DB::beginTransaction();
            
            $tasa=TasaInteres::findOrFail($request->codTasaInteres);
            $tasa->valor=$request->valor;
            $tasa->save();
            

            db::commit();
            return redirect()->route('TasaInteres.listar')
                ->with('datos','Tasa '.$tasa->codTasaInteres.' editada exitosamente');
            
        }catch (\Throwable $th) {
            //Debug::mensajeError(' ACTOR CONTROLLER guardarcrearactor' ,$th);    
            DB::rollback();

            return redirect()->route('TasaInteres.listar')
                ->with('datos','Error al editar una tasa');
                
        }
         
    }
}
