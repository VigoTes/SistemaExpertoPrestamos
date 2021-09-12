
@extends ('Layout.Plantilla')
@section('titulo')
  Listar tasas
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
    <h2> Listar tasas </h2>
    <br>
    
    <div class="row">
        <div class="col-md-2">
            <a href="{{route("TasaInteres.crear")}}" class = "btn btn-primary" style="margin-bottom: 5px;"> 
            <i class="fas fa-plus"> </i> 
                Registrar tasa
            </a>
        </div>
        <div class="col-md-10">
            <!--
                <form class="form-inline float-right">


                <button class="btn btn-success " type="submit">Buscar</button>
                </form>
            -->
        </div>
    </div>
    
    @include('Layout.MensajeEmergenteDatos')
      
    <table class="table table-sm" style="font-size: 10pt; margin-top:10px;">
        <thead class="thead-dark">
            <tr>
                <th>COD</th>
                <th>Valor</th>
                <th>Estado</th>
                <th>Fecha de Creacion</th>
                <th>Fecha de Deshabilitacion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($tasas as $itemTasa)
            <tr>
                <td>{{$itemTasa->codTasaInteres}}</td>
                <td>{{$itemTasa->valor}}</td>
                <td>
                    @if($itemTasa->activo==1)
                        <b style="color: red">HABILITADO</b>
                    @else
                        <b>DESHABILITADO</b>
                    @endif
                </td>
                <td>{{$itemTasa->fechaCreacion}}</td>
                <td>{{$itemTasa->fechaEliminacion}}</td>
                <td>
                    @if($itemTasa->activo==1)
                    <a href="{{route("TasaInteres.editar",$itemTasa->codTasaInteres)}}" class="btn btn-warning btn-xs btn-icon icon-left">
                        <i class="fas fa-edit"></i>
                    </a>    
                    @endif
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    {{$tasas->links()}}
</div>
@endsection

