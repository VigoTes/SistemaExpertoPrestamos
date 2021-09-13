
{{-- CONTENIDO DEL MODAL UNA VEZ QUE YA SE EVALUÓ EL PRESTAMO --}}


<style>

    /* 
        CODIGO OBTENIDO DE
        https://www.it-swarm-es.com/es/html/tabla-con-encabezado-fijo-y-columna-fija-en-css-puro/1072563817/
    */
    .divTablaFijada { /* Este se pone al div table */
        max-width: 100%;
        max-height: 400px;
        overflow: scroll;
    }

    /* ESTE ES EL QUE FIJA LA ROW */
    .filaFijada { 
        position: -webkit-sticky; /* for Safari */
        position: sticky;
        top: 0;
    }
    .fondoAzul{
        background-color:#3c8dbc;
    }

    .letrasBlancas{
        color: #fff;
    }

</style>

@php
    if($evaluacionPrestamo['condicionEvaluacionPrestamo']=='aprobado'){
        $nombreImagen = "ok-amico.svg";
        $colorDecFinal = "green";
        $no = "";
    }else{
        $nombreImagen = "Cancel-amico.svg";
        $colorDecFinal = "red";
        $no =" no ";
    }
@endphp

<div class="row">
    <div class="col text-center">
        <br>
        <br>
        <h1 class="mt-5" style="color:{{$colorDecFinal}}">
            Crédito {{$no}} aprobado
        </h1>
    </div>
    <div class="col">

        <img style="height:250px" src="/img/{{$nombreImagen}}" alt="">

    </div>
</div>
<div class="row">

    
    <div class="col">
        <label for="">Utilidad neta:</label>
        <input type="text" class="form-control" value="{{$caracteristicas['utilidad']}}" readonly>

    </div>
    
    <div class="col">
        <label for="">Patrimonio Neto:</label>
        <input type="text" class="form-control" value="{{$caracteristicas['patrimonioTotal']}}" readonly>

    </div>
     
    
    <div class="w-100"></div>
    

    <div class="col">
        <label for="">Nivel Utilidades:</label>
        <input type="text" class="form-control" value="{{$evaluacionPrestamo['nivelUtilidades']}}" readonly>

    </div>
    <div class="col">
        <label for="">Calificación por edad:</label>
        <input type="text" class="form-control" value="{{$evaluacionPrestamo['riesgoPorEdad']}}" readonly>

    </div>
    <div class="col">
        <label for="">Riesgo de no retorno:</label>
        <input type="text" class="form-control" value="{{$evaluacionPrestamo['riesgoNoRetorno']}}" readonly>

    </div>
    <div class="w-100"></div>
    
    <div class="col">
        <label for="">Nivel del préstamo:</label>
        <input type="text" class="form-control" value="{{$evaluacionPrestamo['nivelPrestamo']}}" readonly>

    </div>
    <div class="col">
        <label for="">Nivel de capacidad financiera:</label>
        <input type="text" class="form-control" value="{{$evaluacionPrestamo['nivelCapacidadFinanciera']}}" readonly>

    </div>
    <div class="col">
        <label for="">Nivel de respaldo financiero:</label>
        <input type="text" class="form-control" value="{{$evaluacionPrestamo['nivelRespaldoFinanciero']}}" readonly>

    </div>
     
    <div class="w-100"></div>

    <div class="col">
        <label for="">Antecedente crediticio:</label>
        <input type="text" class="form-control" style="color:{{$estadoPersona->getColor()}}" value="{{$estadoPersona->nombreParaVista}}" readonly>

    </div>
    
    
    <div class="col">
        <label for="">Decisión final:</label>
        <input style="color:{{$colorDecFinal}}" type="text" class="form-control" value="{{$evaluacionPrestamo['condicionEvaluacionPrestamo']}}" readonly>

    </div>
    


    <div class="col">
        <label for="">Monto solicitado:</label>
        <input type="text" class="form-control" value="{{$caracteristicas['importePrestamo']}}" readonly>
    </div>
    
    <div class="col">
        <label for="">Plazo pago:</label>
        <input type="text" class="form-control" value="{{$plazo->getString() }}" readonly>

    </div>
    <div class="w-100"></div>
    

</div>

@if($evaluacionPrestamo['condicionEvaluacionPrestamo'] == 'aprobado')
        

    <div class="table-responsive divTablaFijada mt-2" >          
        <table id="tabla01" class="table table-striped table-bordered table-condensed table-hover table-sm fontSize11" style='background-color:#FFFFFF;'> 
            <thead class="filaFijada fondoAzul letrasBlancas">
                <tr>
                    <th>Nro</th>
                    <th>Valor cuota</th>
                    <th>Interes pagado</th>
                    <th>Amortizacion</th>
                    <th>Saldo restante</th>
                     
                </tr>
            </thead>
            <tbody>
            
                @foreach($listaCuotasPosibles as $cuota)  
                    <tr>
                        <td class="text-right">
                            {{$cuota['item']}}
                        </td>
  
                        <td class="text-right">
                            {{$cuota['pago']}}
                        </td>
  
                        <td class="text-right">
                            {{$cuota['montoInteres']}}
                        </td>
  
                        <td class="text-right">
                            {{$cuota['montoAmortizacion']}}
                        </td>
  
                        <td class="text-right">
                            {{$cuota['saldoDeuda']}}
                        </td>
  
                        
                    </tr>
                @endforeach
                

            </tbody>
        </table>
        {{-- 
            
            ****************************************************************************************
            TABLA RES -> ACTIVIDADES -> INDICADORES
            --}}

    </div> 

    <div class="row">
        <div class="col m-2 text-right">

            
            <button type="button" class="btn btn-primary" id="btnRegistrar" data-loading-text="<i class='fa a-spinner fa-spin'></i> Registrando" 
                onclick="clickGuardarPréstamo()">
                <i class='fas fa-save'></i> 
                Guardar préstamo
            </button> 
    
        </div>

    </div>

@endif

