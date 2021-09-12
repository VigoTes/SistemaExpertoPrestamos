@extends('Layout.Plantilla')

@section('titulo')
    Editar Tasa
@endsection

@section('contenido')

<form id="frmEditarTasa" name="frmEditarTasa" role="form" action="{{route("TasaInteres.update")}}" class="form-horizontal form-groups-bordered" method="post">
<input type="hidden" name="codTasaInteres" id="codTasaInteres" value="{{$tasa->codTasaInteres}}">
@csrf 


<div class="well">
    <H3 style="text-align: center;">
        Editar Tasa
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
                                value="{{$tasa->valor}}" placeholder="" >
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
        
        confirmarConMensaje('Confirmacion','¿Desea editar la tasa de interes?','warning',ejecutarSubmit);
    }

    function ejecutarSubmit(){

        document.frmEditarTasa.submit(); // enviamos el formulario	  

    }

 
    function validarFormulario(){
        limpiarEstilos(
            ['valor']);
        msj = "";
        
        msj = validarPositividadYNulidad(msj,'valor','Valor');
        

        return msj;

    }
    
</script>
@endsection