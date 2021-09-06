@extends('Layout.Plantilla')

@section('titulo')
    Editar Persona
@endsection

@section('contenido')

<form id="frmEditarPersona" name="frmEditarPersona" role="form" action="{{route("Persona.update")}}" class="form-horizontal form-groups-bordered" method="post">
<input type="hidden" name="codPersona" id="codPersona" value="{{$persona->codPersona}}">
@csrf 


<div class="well">
    <H3 style="text-align: center;">
        Editar Persona
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
                        <label class="" style="">Estado Financiero:</label>
                        <div class="">
                            <select class="form-control" name="codEstado" id="codEstado">
                                <option value="-1">- Estado -</option>
                                @foreach ($estados as $itemEstado)
                                    <option value="{{$itemEstado->codEstado}}" {{$persona->codEstado==$itemEstado->codEstado ? 'selected':''}}>
                                        {{$itemEstado->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label class="" style="">DNI:</label>
                        <div class="">
                            <input type="text" class="form-control" id="dni" name="dni" 
                                value="{{$persona->dni}}" placeholder="DNI..." >
                        </div>
                    </div>

                    <div class="w-100"></div>

                    <div class="col">
                        <label class="" style="">Monto Adeudado:</label>
                        <div class="">
                            <input type="number" class="form-control" id="montoAdeudado" name="montoAdeudado" 
                                value="{{$persona->montoAdeudado}}" placeholder="Monto Adeudado..." >
                        </div>
                    </div>
                    <div class="col">
                        <label class="" style="">Año de Ultima Deuda:</label>
                        <div class="">
                            <input type="number" class="form-control" id="añoUltimaDeuda" name="añoUltimaDeuda" 
                                value="{{$persona->añoUltimaDeuda}}" placeholder="Año..." >
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
        
        confirmarConMensaje('Confirmacion','¿Desea editar la persona?','warning',ejecutarSubmit);
    }

    function ejecutarSubmit(){

        document.frmEditarPersona.submit(); // enviamos el formulario	  

    }

 
    function validarFormulario(){
        limpiarEstilos(
            ['codEstado','dni','montoAdeudado','añoUltimaDeuda']);
        msj = "";
        
        msj = validarSelect(msj,'codEstado',-1,'Estado');
        msj = validarTamañoMaximoYNulidad(msj,'dni',8,'DNI');

        msj = validarPositividadYNulidad(msj,'montoAdeudado','Monto Adeudado');
        msj = validarPositividadYNulidad(msj,'añoUltimaDeuda','Año de ultima deuda');
        

        return msj;

    }
    
</script>
@endsection