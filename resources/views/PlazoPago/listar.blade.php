
@extends ('Layout.Plantilla')
@section('titulo')
  Listar plazos
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
    <h2> Listar plazos </h2>
    <br>
    
    <div class="row">
        <div class="col-md-2">
            <a href="{{route("PlazoPago.crear")}}" class = "btn btn-primary" style="margin-bottom: 5px;"> 
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
                <th>Unidad</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($plazos as $itemPlazo)
            <tr>
                <td>{{$itemPlazo->codPlazo}}</td>
                <td>{{$itemPlazo->valor}}</td>
                <td>{{$itemPlazo->unidadTiempo}}</td>
                <td>
                    <a href="{{route("PlazoPago.editar",$itemPlazo->codPlazo)}}" class="btn btn-warning btn-xs btn-icon icon-left">
                        <i class="fas fa-edit"></i>
                    </a> 
                    <a href="#" class="btn btn-danger btn-xs btn-icon icon-left" onclick="swal({//sweetalert
                        title:'¿Está seguro de eliminar el plazo?',
                        text: '',     //mas texto
                        //type: 'warning',  
                        type: '',
                        showCancelButton: true,//para que se muestre el boton de cancelar
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText:  'SÍ',
                        cancelButtonText:  'NO',
                        closeOnConfirm:     true,//para mostrar el boton de confirmar
                        html : true
                    },
                    function(){//se ejecuta cuando damos a aceptar
                        window.location.href='{{route('PlazoPago.eliminar',$itemPlazo->codPlazo)}}';
                    });"><i class="fas fa-trash-alt"></i></a>   
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    {{$plazos->links()}}
</div>
@endsection

