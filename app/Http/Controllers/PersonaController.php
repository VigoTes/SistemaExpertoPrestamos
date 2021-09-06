<?php

namespace App\Http\Controllers;

use App\EstadoPersona;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    const PAGINATION = 15;

    public function listar(){
        $personas = Persona::paginate($this::PAGINATION);

        return view('Persona.listar',compact('personas'));
    }

    public function crear(){
        $estados=EstadoPersona::all();
        return view('Persona.crear',compact('estados'));
    }

    public function editar($id){
        $persona=Persona::findOrFail($id);
        $estados=EstadoPersona::all();
        return view('Persona.editar',compact('estados','persona'));
    }

    public function eliminar($id){
        $persona=Persona::findOrFail($id);
        $persona->delete();
        return redirect()->route('Persona.listar')
                ->with('datos','Persona con DNI:'.$persona->dni.' eliminada exitosamente');
    }


    public function guardar(Request $request){
        try{
            DB::beginTransaction();
            
            $persona=new Persona();
            $persona->codEstado=$request->codEstado;
            $persona->dni=$request->dni;
            $persona->montoAdeudado=$request->montoAdeudado;
            $persona->añoUltimaDeuda=$request->añoUltimaDeuda;
            $persona->save();
            

            db::commit();
            return redirect()->route('Persona.listar')
                ->with('datos','Persona con DNI:'.$persona->dni.' registrado exitosamente');
            
        }catch (\Throwable $th) {
            //Debug::mensajeError(' ACTOR CONTROLLER guardarcrearactor' ,$th);    
            DB::rollback();

            return redirect()->route('Persona.listar')
                ->with('datos','Error al registrar una persona');
                
        }
         
    }

    public function update(Request $request){
        try{
            DB::beginTransaction();
            
            $persona=Persona::findOrFail($request->codPersona);
            $persona->codEstado=$request->codEstado;
            $persona->dni=$request->dni;
            $persona->montoAdeudado=$request->montoAdeudado;
            $persona->añoUltimaDeuda=$request->añoUltimaDeuda;
            $persona->save();
            

            db::commit();
            return redirect()->route('Persona.listar')
                ->with('datos','Persona con DNI:'.$persona->dni.' editada correctamente');
            
        }catch (\Throwable $th) {
            //Debug::mensajeError(' ACTOR CONTROLLER guardarcrearactor' ,$th);    
            DB::rollback();

            return redirect()->route('Persona.listar')
                ->with('datos','Error al editar una persona');
                
        }
         
    }
}
