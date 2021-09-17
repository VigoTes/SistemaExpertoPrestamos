@extends('Layout.Plantilla')

@section('titulo')
    Evaluar Prestamo
@endsection
@section('contenido')

@include('Layout.MensajeEmergenteDatos')

<div class="well">
    <H3 style="text-align: center; font-weight: bold">
        Prestamo #{{$prestamo->getCodigoDigitado()}}
    </H3>
</div>

 


<div class="row m-2">

    {{-- CARD DATOS PERSONALES --}}
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
                    <div class="col-3">
                        <label for="">DNI</label>
                        <input style="" type="text" class="form-control" readonly value="{{$prestamo->cliente_dni}}">
                    </div>
                    <div class="col">
                        <label for="">Nombres</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->cliente_nombres}}">
                    </div>
                    <div class="col-2">
                        <label for="">Edad</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->cliente_edad}}">
                    </div>
                    
                    


                    </div>
            </div><!-- /.card-body -->
        </div>
    </div>
        
    
    {{-- CARD DATOS FINACNIEROS --}}
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
                        <label for="">Ingresos</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->cliente_ingresos}}">
                    </div>
                    <div class="col">
                        <label for="">Egresos</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->cliente_egresos}}">
                    </div>
                    <div class="col">
                        <label for="">Utilidad</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->cliente_utilidad}}">
                    </div>
                    <div class="col">
                        <label for="">Patrimonio Total</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->cliente_patrimonioTotal}}">
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
    <div class="w-100"></div>

    {{-- CARD EVALUACION DEL PRESTAMO --}}
    <div class="col">
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-coins mr-1"></i>
                Evaluación del préstamo
            </h3>
            <div class="card-tools">

            </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                
                <div class="row">
                    
                    <div class="col">
                        <label for="">Nivel de Utilidades</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->evaluacion_nivelUtilidades}}">
                    </div>
                    <div class="col">
                        <label for="">Calificación por edad</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->evaluacion_riesgoPorEdad}}">
                    </div>
                    <div class="col">
                        <label for="">Nivel de retorno</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->evaluacion_nivelRetorno}}">
                    </div>
                    <div class="w-100"></div>

                    <div class="col">
                        <label for="">Nivel del préstamo</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->evaluacion_nivelPrestamo}}">
                    </div>
                    <div class="col">
                        <label for="">Nivel de capacidad financiera</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->evaluacion_nivelCapacidadFinanciera}}">
                    </div>
                    <div class="col">
                        <label for="">Nivel de respaldo financiero</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->evaluacion_nivelRespaldoFinanciero}}">
                    </div>
                    <div class="w-100"></div>

                    <div class="col">
                        <label for="">Decisión final</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->evaluacion_condicionEvaluacionPrestamo}}">
                    </div>
                    


                </div>
                <div class="row mt-1 fontSize9 text-right">
                    <div class="col">
                        <b>
                            Evaluación realizada el {{$prestamo->getFechaHora()}}.
                        </b>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
    <div class="w-100"></div>
    {{-- CARD ESTADO DEL PRESTAMO --}}
    <div class="col">
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-coins mr-1"></i>
                Estado del prestamo
            </h3>
            <div class="card-tools">

            </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Monto prestado</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->montoPrestado}}">
                    </div>
                    <div class="col">
                        <label for="">Valor cuota</label>
                        <input type="text" class="form-control" readonly  value="{{$prestamo->valorCuota}}">
                    </div>

                    <div class="col">
                        <label for="">Plazo de pago</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->getPlazoEscrito()}}">
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <label for="">Monto Pagado Neto</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->montoPagado}}">
                    </div>
                    
                    <div class="col">
                        <label for="">Monto restante Neto</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->saldoRestante}}">
                    </div>
                    <div class="col">
                        <label for="">Porcentaje de Pago</label>
                        <input type="text" class="form-control"  readonly value="{{$prestamo->getPorcentajePagado()}}">
                    </div>
                    
                    <div class="w-100"></div>

                    <div class="col">
                        <table class="table table-sm" style="font-size: 10pt; margin-top:10px;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Item</th>
                                    <th>Pago</th>
                                    <th>Interes</th>
                                    <th>Amortización</th>
                                    <th>Saldo Deuda</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($listaCuotas as $cuota)
                                <tr>
                                    <td>{{$cuota->item}}</td>
                                    <td>{{$cuota->pago}}</td>
                                    <td>{{$cuota->montoInteres}}</td>
                                    <td>{{$cuota->montoAmortizacion}}</td>
                                    <td>{{$cuota->saldoDeuda}}</td>
                                    <td>{{$cuota->getStringPagado()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
                

</div>
<div class="row ml-4 mb-2">
    <div class="col text-left">
        <a class="btn btn-primary" href="{{route('Prestamos.Listar')}}">
            <i class="fas fa-backward"></i>
            Regresar al listado

        </a>
    </div>
</div>

 
 
 

@endsection
 