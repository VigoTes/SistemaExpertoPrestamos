
@extends ('Layout.Plantilla')
@section('titulo')
  Listar prestamos
@endsection


@section('contenido')
<style>
  .col{
    margin-top: 15px;
    }
  .colLabel{
    width: 13%;
    margin-top: 18px;
  }
</style>
<div style="text-align: center">
    <h2>
         Prestamos
     </h2>
    <br>
    <div class="row">
        <div class="col-md-2">
            <a href="{{route('Prestamos.VerEvaluar')}}" class = "btn btn-primary"> 
            <i class="fas fa-plus"> </i> 
                Evaluar préstamo
            </a>
        </div>
    </div>
    
    @include('Layout.MensajeEmergenteDatos')
      
    <table class="table table-sm" style="font-size: 10pt; margin-top:10px;">
        <thead class="thead-dark">
            <tr>
                <th>COD</th>
                <th>Cliente</th>
                <th>DNI</th>
                <th>Fecha</th>
                <th>Monto prestado</th>
                <th>Monto Real Pagado</th>
                <th>Cuotas</th>
                <th>% Pagado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($listaPrestamos as $prestamo)
            <tr>
                <td>{{$prestamo->codPrestamo}}</td>
                <td>{{$prestamo->cliente_nombres}}</td>
                <td>{{$prestamo->cliente_dni}}</td>
                <td>
                    {{$prestamo->fechaHoraCreacion}}
                </td>
                <td>
                    {{$prestamo->montoPrestado}}
                </td>
                <td>
                    {{$prestamo->getMontoRealPagado()}}
                </td>
                <td> {{$prestamo->getCantidadCuotasPagadas()}} / {{$prestamo->getCantidadCuotasTotal()}}</td>
                
                
                <td style="color: {{$prestamo->getColorPorcentajePagado()}}">
                    {{$prestamo->getPorcentajePagado()}} %
                </td>
                <td>

                    <a href="{{route('Prestamos.VerPrestamo',$prestamo->codPrestamo)}}" class="btn btn-warning btn-xs btn-icon icon-left">
                        <i class="fas fa-eye"></i>
                    </a>     
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
 
</div>
@endsection

