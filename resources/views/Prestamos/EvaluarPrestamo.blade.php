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
    <H3 style="text-align: center;">
        Registrar nuevo prestamo
    </H3>
</div>

<br>
<div class="container">
    <div class="row">
        <div class="col-2" style="">
            
        
        </div>
        

        <div class="col" style="">
            <div class="container">
                <div class="row">

                    <div class="col">

                        
                        <label class="" style="">DNI:</label>
                        
                        
                        <div class="">
                            <input type="text" class="form-control" id="DNI" name="DNI" 
                                value="" placeholder="DNI..." >
                        </div>
                    </div>

                    <div class="col">
                        <label class="" style="">Nombre cliente:</label>
                        <div class="row">

                         
                            <input style="width:50%"  type="text" class="form-control col" id="nombresApellidos" name="nombresApellidos" 
                            value="" placeholder="Nombres y apellidos" readonly >


                            <button   style="width:20%"  class="btn btn-success col-3 ml-2" type="button">
                                <i class="fas fa-search"></i>
                                Buscar
                            </button>

                        </div>
                       
                        
                      

                    </div>
                    
                    
                    <div class="w-100"></div>
                    <div class="col">

                        
                        <label class="" style="">Modalidad:</label>
                        
                        <select class="form-control" name="codModalidad" id="codModalidad">
                            <option value="-1">- Seleccionar Modalidad -</option>
                             

                        </select>
                    </div>
                    <div class="col">

                        <label class="" style="">Valoración CON+:</label>
                        
                        
                        <div class="">
                            <input type="number" class="form-control" id="valoracionPositivaCON" name="valoracionPositivaCON" 
                                value="4.079" placeholder="4.079" >
                        </div>
                    </div>
                    <div class="col">

                        
                        <label class="" style="">Valoración APT+:</label>
                        
                        
                        <div class="">
                            <input type="number" class="form-control" id="valoracionPositivaAPT" name="valoracionPositivaAPT" 
                                value="4.070" placeholder="4.070" >
                        </div>
                    </div>


                    <div class="w-100"></div>
                    <div class="col">

                        
                        <label class="" style="">Valoración CON -:</label>
                        
                        
                        <div class="">
                            <input type="number" class="form-control" id="valoracionNegativaCON" name="valoracionNegativaCON" 
                                value="1.021" placeholder="1.021" >
                        </div>
                    </div>
                    <div class="col">

                        
                        <label class="" style="">Valoración APT -:</label>
                        
                        
                        <div class="">
                            <input type="number" class="form-control" id="valoracionNegativaAPT" name="valoracionNegativaAPT" 
                                value="1.019" placeholder="1.019" >
                        </div>
                    </div>


                    <div class="w-100"></div>
                    <div class="col">

                        
                        <label class="" style="">Fecha rendición:</label>
                        
                                        
                        <div class="input-group date form_date " data-date-format="dd/mm/yyyy" data-provide="datepicker">
                            <input type="text"  class="form-control" name="fechaRendicion" id="fechaRendicion" style="text-align: center"
                                value="" style="text-align:center;font-size: 10pt;">
                            <div class="input-group-btn" >                                        
                                <button class="btn btn-primary date-set" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </div>
                        </div>


                    </div>
                    
                    <div class="col">

                        
                        <label class="" style="">Sede:</label>
                        
                        
                        <div class="">
                           
                            <select class="form-control" name="codSede" id="codSede">
                                <option value="-1">- Sedes -</option>
                            
                        </select>
                        </div>
                    </div>
                    

                    
                    <div class="col">

                        
                        <label class="" style="">Área:</label>
                        
                        
                        <div class="">
                           
                            <select class="form-control" name="codArea" id="codArea">
                                <option value="-1">- Áreas -</option>
                            
                        </select>
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
                        
                        <a href="" class='btn btn-info float-left'>
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

        limpiarEstilos(['valoracionPositivaCON','valoracionPositivaAPT','valoracionNegativaCON','valoracionNegativaAPT'
           , 'año','fechaRendicion','codModalidad','codSede']);

        msjError = "";

         
        msjError = validarPositividadYNulidad(msjError,'valoracionPositivaCON','Valoración Positiva de pregunta Aptitud');
        msjError = validarPositividadYNulidad(msjError,'valoracionPositivaAPT','Valoración Positiva de pregunta Conocimiento');
        msjError = validarPositividadYNulidad(msjError,'valoracionNegativaCON','Valoración Negativa de pregunta Aptitud');
        msjError = validarPositividadYNulidad(msjError,'valoracionNegativaAPT','Valoración Negativa de pregunta Conocimiento');
        

        msjError = validarTamañoMaximoYNulidad(msjError,'año',4,'Año');
        msjError = validarTamañoMaximoYNulidad(msjError,'fechaRendicion',10,'');
        
        msjError = validarSelect(msjError,'codModalidad','-1','Modalidad');
        msjError = validarSelect(msjError,'codSede','-1','Sede');
         
        return msjError;

    }

    
</script>
@endsection