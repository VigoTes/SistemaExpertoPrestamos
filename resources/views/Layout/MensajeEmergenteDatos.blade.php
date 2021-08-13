
@if (session('datos'))
<div class ="alert alert-warning alert-dismissible fade show mt-3" role ="alert" id="msjEmergenteDatos">
    {{session('datos')}}
  <button type = "button" class ="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true"> &times;</span>
  </button>
  
</div>
@endif