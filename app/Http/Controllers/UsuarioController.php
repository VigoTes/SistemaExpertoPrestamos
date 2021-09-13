<?php

namespace App\Http\Controllers;

use App\User;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    const PAGINATION = 15;

    public function listar(){
        $usuarios = User::paginate($this::PAGINATION);

        return view('Usuario.listar',compact('usuarios'));
    }

    public function crear(){
        return view('Usuario.crear');
    }

    public function editar($id){
        $usuario=Usuario::findOrFail($id);
        return view('Usuario.editar',compact('usuario'));
    }

    public function eliminar($id){
        $usuario=User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('Usuario.listar')
                ->with('datos','Usuario '.$usuario->usuario.' eliminado exitosamente');
    }



    public function guardar(Request $request){
        try{
            DB::beginTransaction();
            
            $usuario=new User();
            $usuario->usuario=$request->usuario;
            $usuario->password=hash::make($request->password1);
            $usuario->save();
            

            db::commit();
            return redirect()->route('Usuario.listar')
                ->with('datos','Usuario '.$usuario->usuario.' registrado exitosamente');
            
        }catch (\Throwable $th) {
            //Debug::mensajeError(' ACTOR CONTROLLER guardarcrearactor' ,$th);    
            DB::rollback();

            return redirect()->route('Usuario.listar')
                ->with('datos','Error al registrar un usuario');
                
        }
         
    }
    public function update(Request $request){
        try{
            DB::beginTransaction();
            
            $usuario=User::findOrFail($request->codUsuario);
            $usuario->usuario=$request->usuario;
            $usuario->password=hash::make($request->password1);
            $usuario->save();
            

            db::commit();
            return redirect()->route('Usuario.listar')
                ->with('datos','Usuario '.$usuario->usuario.' editado exitosamente');
            
        }catch (\Throwable $th) {
            //Debug::mensajeError(' ACTOR CONTROLLER guardarcrearactor' ,$th);    
            DB::rollback();

            return redirect()->route('Usuario.listar')
                ->with('datos','Error al editar un usuario');
                
        }
         
    }

}
