
@extends ('Layout.Plantilla')
@section('titulo')
  Listar usuarios
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
    <h2> Listar usuarios </h2>
    <br>
    
    <div class="row">
        <div class="col-md-2">
            <a href="{{route("Usuario.crear")}}" class = "btn btn-primary" style="margin-bottom: 5px;"> 
            <i class="fas fa-plus"> </i> 
                Registrar usuario
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
                <th>Usuario</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($usuarios as $itemUsuario)
            <tr>
                <td>{{$itemUsuario->codUsuario}}</td>
                <td>{{$itemUsuario->usuario}}</td>
                <td>
                    <a href="{{route("Usuario.editar",$itemUsuario->codUsuario)}}" class="btn btn-warning btn-xs btn-icon icon-left">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-xs btn-icon icon-left" 
                        onclick="clickEliminarUsuario({{$itemUsuario->codUsuario}})">
                    <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    {{$usuarios->links()}}
</div>
@endsection

@section('script')

@include('Layout.ValidatorJS')

<script>

codUsuarioAEliminar = 0;
    function clickEliminarUsuario(codUsuario){
        codUsuarioAEliminar = codUsuario;
        confirmarConMensaje("Confirmación","¿Desea eliminar el usuario?","warning",ejecutarEliminarUsuario);
    }
    function ejecutarEliminarUsuario(){
        window.location.href='/Usuario/'+codUsuarioAEliminar+'/eliminar';
    }
    
</script>

@endsection