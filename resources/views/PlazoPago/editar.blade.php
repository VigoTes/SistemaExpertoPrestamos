@extends('Layout.Plantilla')

@section('titulo')
    Editar Plazo
@endsection

@section('contenido')

<form id="frmEditarPlazo" name="frmEditarPlazo" role="form" action="{{route("PlazoPago.update")}}" class="form-horizontal form-groups-bordered" method="post">
@csrf 
<input type="hidden" name="codPlazo" id="codPlazo" value="{{$plazo->codPlazo}}">

<div class="well">
    <H3 style="text-align: center;">
        Nuevo Plazo
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
                        <label class="" style="">Valor:</label>
                        <div class="">
                            <input type="number" class="form-control" id="valor" name="valor" 
                                value="{{$plazo->valor}}" placeholder="" >
                        </div>
                    </div>
                    <div class="col">
                        <label class="" style="">Unidad de Tiempo:</label>
                        <div class="">
                            <input type="text" class="form-control" id="unidadTiempo" name="unidadTiempo" 
                                value="{{$plazo->unidadTiempo}}" placeholder="" >
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
                        
                        <a href="{{route('TasaInteres.listar')}}" class='btn btn-info float-left'>
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
        
        confirmarConMensaje('Confirmacion','¿Desea editar el plazo?','warning',ejecutarSubmit);
    }

    function ejecutarSubmit(){

        document.frmEditarPlazo.submit(); // enviamos el formulario	  

    }

 
    function validarFormulario(){
        limpiarEstilos(
            ['valor','unidadTiempo']);
        msj = "";
        
        msj = validarPositividadYNulidad(msj,'valor','Valor');
        msj = validarTamañoMaximoYNulidad(msj,'unidadTiempo',100,'Unidad de Tiempo');

        return msj;

    }
    
</script>
@endsection