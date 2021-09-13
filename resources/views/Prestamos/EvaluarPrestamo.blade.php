@extends('Layout.Plantilla')

@section('titulo')
    Evaluar Prestamo
@endsection
 

@section('contenido')

@section('tiempoEspera')
    <div class="loader" id="pantallaCarga">
        <br>
        <br>
        <br>
        
        <br>
        <br>
        <br>
        <h1 class="text-center" id="mensajeCarga" for=""></h1>
    </div>
@endsection




<div class="well">
    <H3 style="text-align: center; font-weight: bold">
        EVALUACIÓN DE CREDITO
    </H3>
</div>

<form name="formularioPrestamo" id="formularioPrestamo" method="POST" action="{{route('Prestamos.Crear')}}">


    @csrf
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

                                                <div class="col-4">
                                                    <button class="col btn btn-success" type="button" onclick="clickBuscarDNI()">
                                                        <i class="fas fa-search"></i>
                                                        
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="" style="">Nombre:</label>
                                            <div class="">
                                                <input type="text" class="form-control col" id="nombresApellidos" name="nombresApellidos" value="" readonly placeholder="Nombres y apellidos" >
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <label class="" style="">Edad:</label>
                                            <div class="">
                                                <input type="number" class="form-control col" min="18" id="edad" name="edad" value="" placeholder="Edad">
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
                                                <input type="number" class="form-control text-right" id="ingresos" name="ingresos">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="" style="">Egresos:</label>
                                            <div class="">
                                                <input type="number" class="form-control text-right" id="egresos" name="egresos">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="" style="">Razon de credito:</label>
                                            <select class="form-control" name="razonCredito" id="razonCredito">
                                                <option value="-1">- Seleccionar Razon -</option>
                                                @foreach ($listaRazonesPrestamo as $razon)
                                                <option value="{{$razon->codRazon}}">
                                                    {{$razon->nombre}}
                                                </option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                    
                                        <div class="w-100"></div>
                    
                                        <div class="col">
                                            <label class="" style="">Respaldo inmueble:</label>
                                            <div class="">
                                                <input type="number" class="form-control text-right" id="respaldoInmueble" name="respaldoInmueble">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="" style="">Respaldo capital:</label>
                                            <input type="number" class="form-control text-right" id="respaldoCapital" name="respaldoCapital">
                                        </div>

                                        <div class="w-100"></div>
                                        <div class="col text-center">
                                                <label class="" style="">Monto solicitado:</label>
                                                <input type="number" class="form-control text-right" id="importePrestamo" name="importePrestamo" >
                                        </div>

                                        <div class="col">
                                            <label for="">
                                                Cuotas
                                            </label>
                                            <select class="form-control" name="codPlazo" id="codPlazo">
                                                <option value="-1">- Plazo -</option>
                                                @foreach ($listaPlazos as $plazo)
                                                <option value="{{$plazo->codPlazo}}">
                                                    {{$plazo->getString()}}
                                                </option>
                                                    
                                                @endforeach
                                            </select>
                                                
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                         

                        <div class="w-100"></div>
                        <div class="col text-left">
                            <a class="btn btn-primary" href="{{route('Prestamos.Listar')}}">
                                <i class="fas fa-backward"></i>
                                Volver al listado
                            </a>
                        </div>
                        <div class="col" style=" text-align:right">                            
                            <button type="button" class="btn btn-success" id="btnRegistrar" 
                                data-loading-text="<i class='fa a-spinner fa-spin'></i> Registrando" onclick="clickEvaluar()">
                                <i class='fas fa-save'></i> 
                                Evaluar
                            </button> 
                        </div>
                        

                    </div>

                </div>
                
            </div>


            <div class="col-2" >
            
            
            </div>


        </div>


    </div>

        
</form>

<div class="modal fade" id="ModalEvaluacionPrestamo" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            

                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModalContactoFinanciera">
                        Resultado de la evaluación
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="cuerpoModal" class="modal-body">

                    

                </div>
                <div class="modal-footer">
                

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Salir
                    </button>

                </div>
            
        </div>
    </div>
</div>
 

@endsection

@section('script')


@include('Layout.ValidatorJS')

<script type="text/javascript"> 
          
    $( document ).ready(function() {
       
         
        $(".loader").fadeOut("slow");
    });
 

    function clickEvaluar(){
        msjError = validarFormulario();
        if(msjError!=""){
            alerta(msjError);
            return;
        }

        dni = document.getElementById('DNI').value;
        codRazonCredito = document.getElementById('razonCredito').value;
        ingresos = document.getElementById('ingresos').value;
        egresos = document.getElementById('egresos').value;
        importeInmuebles = document.getElementById('respaldoInmueble').value;
        importeCapital = document.getElementById('respaldoCapital').value;
        importePrestamo = document.getElementById('importePrestamo').value;
        edad = document.getElementById('edad').value;
        codPlazo = document.getElementById('codPlazo').value;

        csrf = document.getElementsByName('_token')[0].value;
        
        datosAEnviar = {
            _token:   csrf,
            dni : dni,
            codRazonCredito : codRazonCredito,
            ingresos : ingresos,
            egresos : egresos,
            importeInmuebles : importeInmuebles,
            importeCapital : importeCapital,
            importePrestamo : importePrestamo,
            edad: edad,
            codPlazo : codPlazo
        }; 
        ruta = "/Prestamos/EvaluarPrestamo/";
         
        abrirVentanaCarga("Evaluando préstamo...");
        $.get(ruta, datosAEnviar, function(dataRecibida){
            console.log('DATA RECIBIDA:');
            console.log(dataRecibida);

            body = document.getElementById('cuerpoModal').innerHTML = dataRecibida;
            $('#ModalEvaluacionPrestamo').modal('show')
            cerrarVentanaCarga();
        });
 
    }

    function validarFormulario(){

        limpiarEstilos(['DNI','nombresApellidos','edad','ingresos','egresos','razonCredito',
            'respaldoInmueble','respaldoCapital','importePrestamo','codPlazo']);

        msjError = "";

        msjError = validarTamañoMaximoYNulidad(msjError,'DNI',8,'DNI');
        msjError = validarNulidad(msjError,'nombresApellidos','Nombres y Apellidos');
        msjError = validarPositividadYNulidad(msjError,'edad','Edad');
        msjError = validarPositividadYNulidad(msjError,'ingresos','Ingresos');
        msjError = validarPositividadYNulidad(msjError,'egresos','Egresos');
        msjError = validarPositividadYNulidad(msjError,'importePrestamo','Monto solicitado');

        msjError = validarSelect(msjError,'codPlazo','-1','Cuotas');
        msjError = validarSelect(msjError,'razonCredito','-1','Razon de Credito');
        msjError = validarNoNegatividad(msjError,'respaldoInmueble','Respaldo Inmueble');
        msjError = validarNoNegatividad(msjError,'respaldoCapital','Respaldo Capital');
         
        return msjError;

    }


    function clickBuscarDNI(){
        limpiarEstilos(['DNI']);
        msjError ="";
        msjError = validarTamañoExacto(msjError,'DNI',8,'DNI');
        if( msjError != ""){
            alerta(msjError);
            return;
        }

        dni = document.getElementById('DNI').value;
        
        abrirVentanaCarga("Buscando persona...");
        
        $.get('/consultarDNI/'+dni,
            function(data)
            {     
                console.log("IMPRIMIENDO DATA como llegó:");
                
                objetoRespuesta = JSON.parse(data);
                console.log(objetoRespuesta);
                if(objetoRespuesta.ok=='1'){
                    alertaMensaje(objetoRespuesta.titulo,"Se encontró a " + objetoRespuesta.mensaje,objetoRespuesta.tipoWarning);
                    document.getElementById('nombresApellidos').value = objetoRespuesta.mensaje;
                }else{
                    alerta("No se ha encontrado a la persona.");
                }
                cerrarVentanaCarga();
                
            }
        );


    }

    function abrirVentanaCarga(mensajeCarga){
        $(".loader").fadeIn('slow');
        document.getElementById('mensajeCarga').innerHTML = mensajeCarga;
    }

    function cerrarVentanaCarga(){
        $(".loader").fadeOut("slow");
        document.getElementById('mensajeCarga').innerHTML = "";
            

    }
 
    
</script>



{{-- CODIGO QUE LLAMA DESDE EL MODAL --}}
<script>
    function clickGuardarPréstamo(){

        confirmarConMensaje("Confirmación","¿Desea guardar el préstamo?","warning",ejecutarGuardarPrestamo);
        
    }

    function ejecutarGuardarPrestamo(){
        document.formularioPrestamo.submit();

    }


</script>

@endsection