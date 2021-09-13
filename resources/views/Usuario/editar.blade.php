@extends('Layout.Plantilla')

@section('titulo')
    Editar Usuario
@endsection

@section('contenido')

<form id="frmEditarUsuario" name="frmEditarUsuario" role="form" action="{{route("Usuario.update")}}" class="form-horizontal form-groups-bordered" method="post">
@csrf 
<input type="hidden" name="codUsuario" id="codUsuario" value="{{$usuario->codUsuario}}">


<div class="well">
    <H3 style="text-align: center;">
        Editar Usuario
    </H3>
</div>

<div class="container">
    <div class="row">
        <div class="col-2" style="">
            
        
        </div>
        

        <div class="col" style="">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <label class="" style="">usuario:</label>
                        <div class="">
                            <input type="text" class="form-control" id="usuario" name="usuario" 
                                value="{{$usuario->usuario}}" placeholder="Usuario..." >
                        </div>
                    </div>
                    <div class="col">
                        <label class="" style="">Contraseña:</label>
                        <div class="">
                            <input type="password" class="form-control" id="password1" name="password1" 
                                value="" placeholder="Contraseña..." >
                        </div>
                    </div>
                    <div class="col">
                        <label class="" style="">Repetir Contraseña:</label>
                        <div class="">
                            <input type="password" class="form-control" id="password2" name="password2" 
                                value="" placeholder="Contraseña..." >
                        </div>
                    </div>

                    <div class="w-100"></div>
                    <br>

                    <div class="col" style=" text-align:center">
                        
                        <button type="button" class="btn btn-primary float-right" id="btnRegistrar" data-loading-text="<i class='fa a-spinner fa-spin'></i> Registrando" 
                            onclick="clickGuardar()">
                            <i class='fas fa-save'></i> 
                            Registrar
                        </button> 
                        
                        <a href="{{route('Persona.listar')}}" class='btn btn-info float-left'>
                            <i class="fas fa-arrow-left"></i> 
                            Regresar al Menú
                        </a>
    
                    </div>

                </div>

            </div>
               
        </div>
        <div class="col-2" >
         
        
        </div>


    </div>


</div>

</form>

@include('Layout.ValidatorJS')
<script type="text/javascript"> 
       

    function clickGuardar(){
        msj = validarFormulario();
        if(msj!=''){
            alerta(msj);
            return;
        }
        
        confirmarConMensaje('Confirmacion','¿Desea editar el usuario?','warning',ejecutarSubmit);
    }

    function ejecutarSubmit(){

        document.frmEditarUsuario.submit(); // enviamos el formulario	  

    }

 
    function validarFormulario(){
        limpiarEstilos(
            ['usuario','password1','password2']);
        msj = "";

        msj = validarTamañoMaximoYNulidad(msj,'usuario',100,'Usuario');
        msj = validarTamañoMaximoYNulidad(msj,'password1',200,'Contraseña');
        msj = validarTamañoMaximoYNulidad(msj,'password2',200,'Repetir contraseña');
        msj = validarContenidosIguales(msj,'password1','password2','Las contraseñas deben coincidir');

        return msj;

    }
    
</script>
@endsection