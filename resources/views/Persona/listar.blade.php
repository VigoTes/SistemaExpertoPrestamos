
@extends ('Layout.Plantilla')
@section('titulo')
  Listar personas
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
    <h2> Listar personas </h2>
    <br>
    
    <div class="row">
        <div class="col-md-2">
            <a href="{{route("Persona.crear")}}" class = "btn btn-primary" style="margin-bottom: 5px;"> 
            <i class="fas fa-plus"> </i> 
                Registrar persona
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
                <th>DNI</th>
                <th>Estado</th>
                <th>Monto Deuda</th>
                <th>Año ultima deuda</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($personas as $itemPersona)
            <tr>
                <td>{{$itemPersona->codPersona}}</td>
                <td>{{$itemPersona->dni}}</td>
                <td>{{$itemPersona->getEstado()->nombre}}</td>
                <td>{{$itemPersona->montoAdeudado}}</td>
                <td>{{$itemPersona->añoUltimaDeuda}}</td>
                <td>
                    <a href="{{route("Persona.editar",$itemPersona->codPersona)}}" class="btn btn-warning btn-xs btn-icon icon-left">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-xs btn-icon icon-left" onclick="swal({//sweetalert
                        title:'¿Está seguro de eliminar a la persona?',
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
                        window.location.href='{{route('Persona.eliminar',$itemPersona->codPersona)}}';
                    });"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    {{$personas->links()}}
</div>
@endsection

