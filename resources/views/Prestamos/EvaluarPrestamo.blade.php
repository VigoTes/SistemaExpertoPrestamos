@extends('Layout.Plantilla')

@section('titulo')
    Evaluar Prestamo
@endsection
@section('estilos')
    <link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
    <link rel="stylesheet" href="/select2/bootstrap-select.min.css">
@endsection

@section('contenido')

    

<form id="frmEvaluacion" name="frmEvaluacion" role="form" action=" " 
class="form-horizontal form-groups-bordered" method="post" enctype="multipart/form-data">

@csrf 


<div class="well">
    <H3 style="text-align: center; font-weight: bold">
        EVALUACIÓN DE CREDITO
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
                        <div class="card">
                            <div class="card-header ui-sortable-handle" style="cursor: move;">
                              <h3 class="card-title">
                                <i class="fas fa-user-circle mr-1"></i>
                                Datos Personales
                              </h3>
                              <div class="card-tools">

                              </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="" style="">DNI:</label>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="DNI" name="DNI" value="" placeholder="DNI..." >
                                            </div>
                                            <div class="col">
                                                <button class="col btn btn-success" type="button">
                                                    <i class="fas fa-search"></i>
                                                    Buscar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="" style="">Nombre:</label>
                                        <div class="">
                                            <input type="text" class="form-control col" id="nombresApellidos" name="nombresApellidos" value="" placeholder="Nombres y apellidos" readonly >
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label class="" style="">Edad:</label>
                                        <div class="">
                                            <input type="number" class="form-control col" id="edad" name="edad" value="" placeholder="Edad" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>

                    <div class="w-100"></div>

                    <div class="col">
                        <div class="card">
                            <div class="card-header ui-sortable-handle" style="cursor: move;">
                              <h3 class="card-title">
                                <i class="fas fa-coins mr-1"></i>
                                Datos Financieros
                              </h3>
                              <div class="card-tools">

                              </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label class="" style="">Ingresos:</label>
                                        <div class="">
                                            <input type="number" class="form-control" id="ingresos" name="ingresos">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="" style="">Egresos:</label>
                                        <div class="">
                                            <input type="number" class="form-control" id="egresos" name="egresos">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="" style="">Razon de credito:</label>
                                        <select class="form-control" name="razonCredito" id="razonCredito">
                                            <option value="-1">- Seleccionar Razon -</option>
                                        </select>
                                    </div>
                
                                    <div class="w-100"></div>
                
                                    <div class="col">
                                        <label class="" style="">Respaldo inmueble:</label>
                                        <div class="">
                                            <input type="number" class="form-control" id="respaldoInmueble" name="respaldoInmueble">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="" style="">Respaldo capital:</label>
                                        <div class="">
                                            <input type="number" class="form-control" id="respaldoCapital" name="respaldoCapital">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                    
                    {{-- 
                        
                        lino zanoni
                        mejia miranda
                        
                        
                        --}}
                    

                    <div class="w-100"></div>

                    <div class="col" style=" text-align:center">
                        
                        <button type="button" class="btn btn-primary float-right" id="btnRegistrar" data-loading-text="<i class='fa a-spinner fa-spin'></i> Registrando" 
                            onclick="clickGuardar()">
                            <i class='fas fa-save'></i> 
                            Evaluar
                        </button> 
                        <!--
                        <a href="" class='btn btn-info float-left'>
                            <i class="fas fa-arrow-left"></i> 
                            Regresar al Menú
                        </a>
                        -->
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
          
    function clickGuardar() 
    {
        msjError = validarFormulario();
        if(msjError!=""){
            alerta(msjError);
            return;
        }
        
        document.frmEvaluacion.submit(); // enviamos el formulario	
    }

    function validarFormulario(){

        limpiarEstilos(['DNI','nombresApellidos','edad','ingresos','egresos','razonCredito','respaldoInmueble','respaldoCapital']);

        msjError = "";

        msjError = validarTamañoMaximoYNulidad(msjError,'DNI',8,'DNI');
        msjError = validarNulidad(msjError,'nombresApellidos','Nombres y Apellidos');
        msjError = validarPositividadYNulidad(msjError,'edad','Edad');
        msjError = validarPositividadYNulidad(msjError,'ingresos','Ingresos');
        msjError = validarPositividadYNulidad(msjError,'egresos','Egresos');
        msjError = validarSelect(msjError,'razonCredito','-1','Razon de Credito');
        msjError = validarPositividadYNulidad(msjError,'respaldoInmueble','Respaldo Inmueble');
        msjError = validarPositividadYNulidad(msjError,'respaldoCapital','Respaldo Capital');
         
        return msjError;

    }

    
</script>
@endsection