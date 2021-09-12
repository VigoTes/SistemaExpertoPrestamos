
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
    <h2> Ver Antecedentes Infocorp  </h2>
    <br>
    
    <div class="row">
        <div class="col-md-2">
            <a href="{{route("Persona.crear")}}" class = "btn btn-primary" style="margin-bottom: 5px;"> 
            <i class="fas fa-plus"> </i> 
                Registrar persona
            </a>
        </div>
        <div class="col-md-10">
            
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
                <td>{{$itemPersona->getEstado()->nombreParaVista}}</td>
                <td>{{$itemPersona->montoAdeudado}}</td>
                <td>{{$itemPersona->añoUltimaDeuda}}</td>
                <td>
                    <a href="{{route("Persona.editar",$itemPersona->codPersona)}}" class="btn btn-warning btn-xs btn-icon icon-left">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-xs btn-icon icon-left" 
                        onclick="clickEliminarPersona({{$itemPersona->codPersona}},'{{$itemPersona->dni}}')">
                    <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    {{$personas->links()}}
</div>
@endsection

@section('script')

@include('Layout.ValidatorJS')

<script>

    codPersonaAEliminar = 0;
    function clickEliminarPersona(codPersona,dni){
        codPersonaAEliminar = codPersona;
        confirmarConMensaje("Confirmación","¿Desea eliminar a la persona ?","warning",ejecutarEliminarPersona);
    }
    function ejecutarEliminarPersona(){
        window.location.href='/Persona/'+codPersonaAEliminar+'/eliminar';
    }
    
</script>

@endsection