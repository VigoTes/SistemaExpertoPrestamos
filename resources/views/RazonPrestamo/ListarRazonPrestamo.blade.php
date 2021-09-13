@extends('Layout.Plantilla')

@section('titulo')
    Listar Razones de Prestamo
@endsection
@section('estilos')
<link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
<link rel="stylesheet" href="/select2/bootstrap-select.min.css">
@endsection

@section('contenido')

@include('Layout.MensajeEmergenteDatos')


   
    <div class="row">
        

        <div class="col" style="">
            <div class="container">
                 
                <div class="row">
                    <div class="col">
                        <button type="button" id="" class="btn btn-primary m-2"  onclick="clickAgregarObjEstrategico()"
                            data-toggle="modal" data-target="#ModalRazonPrestamo" >
                            Agregar Razon Préstamo
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                  
               
                </div>

                <div class="row">
                    <div class="col">
                        <table class="table table-bordered table-hover datatable table-sm">
                            <thead>                  
                                <tr>
                                    <th class="text-center">idBD</th>
                                    <th>Nombre</th>
                                    <th class="text-center" >Tasa de retorno</th>
                                    <th  class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($listaRazones as $objEst )
                                    <tr>
                                        <td class="text-center">
                                            {{$objEst->codRazon}}
                                        </td>
                                        <td>    
                                            {{$objEst->nombre}}
                                        </td>
                                        <td class="text-center" >
                                            {{$objEst->tasa}}
                                        </td>
                                       
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
                                                data-target="#ModalRazonPrestamo" onclick="clickEditarRazonPrestamo({{$objEst->codRazon}})"> 
                                                <i class="fas fa-pen"></i>
                                                
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="clickEliminarObjEstrategico({{$objEst->codRazon}})">
                                                <i class="fas fa-trash"></i>

                                            </button>
                                            
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                    </div>

                </div>
                
            
            </div>
            
        </div>
        


    </div>

 


{{-- Este modal sirve tanto para agregar como para editar --}}
<div class="modal fade" id="ModalRazonPrestamo" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalRazonPrestamo"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('RazonPrestamo.agregarEditar')}}" method="POST" id="frmRazonPrestamo" name="frmRazonPrestamo">
                        
                        @csrf
                        {{-- Si se creará uno nuevo, está en 0, si se va a editar tiene el codigo del obj a editar --}}
                        <input type="{{App\Configuracion::getInputTextOHidden()}}" name="codRazon" id="codRazon" value="0">


                        <div class="row">
                            <div class="col">
                                <label for="">Nombre de la razón</label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
        
                            </div>
                            <div class="col">
                                <label for="">Tasa probable de retorno</label>
                                <input type="number" step="0.01" max="1" min="0.01" class="form-control" name="tasa" id="tasa">
                            </div>
                        </div>

                        
                        

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Salir
                    </button>

                    <button type="button" class="btn btn-primary"   onclick="clickGuardarRazonPrestamo()">
                        Guardar <i class="fas fa-save"></i>
                    </button>
                </div>
            
        </div>
    </div>
</div>
                

@endsection

@section('script')
@include('Layout.ValidatorJS')
<script type="text/javascript"> 
    


    var listaRazones= @php echo json_encode($listaRazones); @endphp;
    
    $(window).load(function(){
        
        $(".loader").fadeOut("slow");
    });
 
  

    /* RAZONES DE PRESTAMO */


    function clickGuardarRazonPrestamo(){
        msjError = validarfrmRazonPrestamo();;
        if(msjError!=""){
            alerta(msjError);
            return;
        }

        document.frmRazonPrestamo.submit();

    }

    function validarfrmRazonPrestamo(){
        msj="";
        msj = validarTamañoMaximoYNulidad(msj,'nombre',200,'Razón de préstamo');
        msj = validarPositividadYNulidad(msj,'tasa','Tasa');
        return msj;

    }
 
    
    
    function clickEditarRazonPrestamo(codRazon){
        obj = listaRazones.find(element => element.codRazon == codRazon);

        document.getElementById('TituloModalRazonPrestamo').innerHTML = "Editar Razon Préstamo";
        
        document.getElementById('codRazon').value = obj.codRazon;
        document.getElementById('nombre').value = obj.nombre;
        document.getElementById('tasa').value = obj.tasa;
         

    }

    function clickAgregarObjEstrategico(){
        document.getElementById('TituloModalRazonPrestamo').innerHTML = "Agregar Razon Préstamo";
        
        document.getElementById('codRazon').value = 0;
        document.getElementById('nombre').value = "";
        document.getElementById('tasa').value ="";
         

    }

    codRazonAEliminar = 0;
    function clickEliminarObjEstrategico(codRazon){
        obj = listaRazones.find(element => element.codRazon == codRazon);
        codRazonAEliminar = codRazon;
        confirmarConMensaje("Confirmación",'¿Desea eliminar la Razon Préstamo "'+obj.nombre+'" ?',"warning",ejecutarEliminacionRazonPrestamo);
    }

    function ejecutarEliminacionRazonPrestamo(){
        location.href = "/RazonPrestamo/eliminar/" + codRazonAEliminar;

    }


</script>
 

@endsection