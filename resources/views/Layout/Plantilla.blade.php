<!DOCTYPE html>
<html >
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('titulo') </title>
  

  {{-- Cambiar esto por una url d --}}

  <link rel="shortcut icon" href="/img/LogoCedepas.png" type="image/png">
  
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
 <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
 <link rel="stylesheet" href="/css/siderbarstyle.css">
 <link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
 <link rel="stylesheet" href="/select2/bootstrap-select.min.css">
 
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  


  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <style>
    .fondoPlomoCircular{
            border-radius: 10px;
            background-color:rgb(190, 190, 190)
      }
    .fontSize8{
      font-size: 8pt;
    }
    .fontSize9{
      font-size: 9pt;
    }
    .fontSize10{
      font-size: 10pt;
    }
    
    .fontSize11{
      font-size: 11pt;
    }

    .notificacionXRendir{
      background-color: rgb(87, 180, 44);
      
    }

    .notificacionObservada{
      background-color: rgb(209, 101, 101);
          
    }
    .form-control-undefined {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        box-shadow: 0 0 5px 3px #dc354599;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .loader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url('/img/espera.gif') 50% 50% no-repeat rgb(249,249,249);
      background-size: 10%;
      opacity: .8;
    }


    .hovered:hover{
        background-color:rgb(97, 170, 170);
        border-radius: 3px;
    }
  </style>
  @yield('estilos')

</head>
<body class="hold-transition sidebar-mini">
  <!--<div class="loader"></div>-->
  @yield('tiempoEspera')
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item">
          <a id="aRefOcultarMenuLateral"  class="nav-link"  data-widget="pushmenu" onclick="clicMenuLateral()" href="#"
           role="button">
              <i id="iconoOcultarMenuLateral" class="fas fa-chevron-left"></i>
          </a>
      </li>
      
      <a class="btn btn-primary"  title="Volver al Inicio" href="{{route('user.home')}}" >
        Home
      </a>

      {{-- <a class="btn btn-primary" onclick="clickeoButton()" title="Volver al Inicio" href="#" >
        CLICK AQUI
      </a> --}}

  

    </ul>
    

    <ul class="navbar-nav ml-auto" style="margin-right:10%;">
      <!-- Messages Dropdown Menu --> {{-- VER CARRITO RAPIDAMENTE --}}
      
      @include('Layout.Notificaciones.Solicitudes')
      
    </ul>
      




    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu --> {{-- VER CARRITO RAPIDAMENTE --}}
        @include('Layout.Notificaciones.Usuario')
    </ul>
      







    
  </nav>
  <!-- /.navbar -->
 {{--  {{route('bienvenido')}} --}}
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.home') }}" class="brand-link">
      <img src="/img/logo cuadrado.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SISTEMA WEB</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/usuario.png" class="img-circle elevation-2" alt="User Image">
        </div>

      
            <div class="info">
              <a href="/verMisDatos" class="d-block"></a>
             
                <label for="" style="color: rgb(255, 255, 255))">
                 Diego Vigo, Admin
                </label>
      
            </div>
   
      </div>

      
<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" 
          role="menu" data-accordion="false">

          
           @include('Layout.MenuLateral.AdminSistema')  {{-- Este tiene todo --}}
           

           

        </ul>
      </nav>



      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        @yield('contenido')
     
    </section>
    <!-- /.content -->
  </div>
 
  <footer class="main-footer" style="padding: 4px; font-size:9pt;">
    <div style="text-align:right;">
      <strong>Copyright &copy; 2021 
          
        .
      </strong> 
      Powered by Maracsoft
    </div>
        
  </footer>
   

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>

<script src="/select2/bootstrap-select.min.js"></script>   

<!-- PARA SOLUCIONAR EL PROBLEMA DE 'funcion(){' EN js--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<!-- LIBRERIAS PARA NOTIFICACION DE ELIMINACION--->
<script src="/adminlte/dist/js/sweetalert.min.js"></script>

<script src="/calendario/js/bootstrap-datepicker.js"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>    
<script src="{{ asset('plugins/bootstrap-sweetalert/sweetalert.min.js') }}"></script>


<script src="{{ asset('dist/js/admin/app.js') }}"></script>
 

<script type="application/javascript">

  var menuLateralOcultado = true;


  clicMenuLateral();

  //YA FUNCIONA YA XD LE HABIA PUESTO TITLE AL icoono Y NO AL A REF
  function clicMenuLateral(){
    document.getElementById('iconoOcultarMenuLateral').classList="";
    document.getElementById('iconoOcultarMenuLateral').classList.add('fas');
    
    if(menuLateralOcultado){
      document.getElementById('aRefOcultarMenuLateral').title = "Expandir menú lateral";
      document.getElementById('iconoOcultarMenuLateral').classList.add('fa-chevron-left');
      //console.log('ENTRA 1' + menuLateralOcultado);
    }else{
      
      document.getElementById('aRefOcultarMenuLateral').title = "Ocultar menu lateral";  
      document.getElementById('iconoOcultarMenuLateral').classList.add('fa-chevron-right');
      //console.log('ENTRA 2' + menuLateralOcultado);
    }
    
    menuLateralOcultado = !menuLateralOcultado;


  }


  function clickeoButton(){
    confirmarConMensaje(funcionAEjecutarSiSí);

  }


  function funcionAEjecutarSiSí(){
    console.log('oye ya estamos adentro');

  }


  
  function confirmarConMensaje(titulo,texto,tipoMensaje,nombreFuncionAEjecutar){
    swal(
          {//sweetalert
              title: titulo,
              text: texto,     //mas texto
              type: tipoMensaje,//e=[success,error,warning,info]
              showCancelButton: true,//para que se muestre el boton de cancelar
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText:  'SÍ',
              cancelButtonText:  'NO',
              closeOnConfirm:     true,//para mostrar el boton de confirmar
              html : true
          },
          function(value){//se ejecuta cuando damos a aceptar
            if(value)
              nombreFuncionAEjecutar();
          }
      );

      
  }

  Number.prototype.toFixedDown = function(digits) {
      //var re = new RegExp("([-+]?\\d+\\.\\d{"+digits+"})(\\d)"),
      var re = new RegExp("(\\d+\\.\\d{" + digits + "})(\\d)"),
          m = this.toString().match(re);
      return m ? parseFloat(m[1]) : this.valueOf();
  };

  function number_format(amount, decimals) {
          amount += ''; // por si pasan un numero en vez de un string
          amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
          decimals = decimals || 0; // por si la variable no fue fue pasada
          // si no es un numero o es igual a cero retorno el mismo cero
          if (isNaN(amount) || amount === 0) 
              return parseFloat(0).toFixed(decimals);
          // si es mayor o menor que cero retorno el valor formateado como numero
          //amount = '' + amount.toFixed(decimals);
          amount = '' + amount.toFixedDown(decimals);//(esto editó felix)
          var amount_parts = amount.split('.'),
              regexp = /(\d+)(\d{3})/;

          //(esto editó felix)
          zero='0';
          if (amount % 1 == 0) {//entero
            amount_parts[1]=zero.repeat(3);
          } else {//decimal
            amount_parts[1]=amount_parts[1]+zero.repeat(decimals - amount_parts[1].length);
          }
          //

          while (regexp.test(amount_parts[0]))
              amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
          return amount_parts.join('.');
  }


  
  function confirmar(msj,type,formName){
      swal(
          {//sweetalert
              title: msj,
              text: '',     //mas texto
              type: type,//e=[success,error,warning,info]
              showCancelButton: true,//para que se muestre el boton de cancelar
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText:  'SÍ',
              cancelButtonText:  'NO',
              closeOnConfirm:     true,//para mostrar el boton de confirmar
              html : true
          },
          function(value){//se ejecuta cuando damos a aceptar
              if(value) document.getElementById(formName).submit();
          }
      );
      
  }
  function alerta(msj){
      swal(//sweetalert
          {
              title: 'Error',
              text: msj,     //mas texto
              type: 'warning',//e=[success,error,warning,info]
              showCancelButton: false,//para que se muestre el boton de cancelar
              confirmButtonColor: '#3085d6',
              //cancelButtonColor: '#d33',
              confirmButtonText:  'OK',
              //cancelButtonText:  'NO',
              closeOnConfirm:     true,//para mostrar el boton de confirmar
              html : true
          },
          function(){//se ejecuta cuando damos a aceptar
              
          }
      );
  }
  function alertaMensaje(title,msj,type){
      swal(//sweetalert
          {
              title: title,
              text: msj,     //mas texto
              type: type,//e=[success,error,warning,info]
              showCancelButton: false,//para que se muestre el boton de cancelar
              confirmButtonColor: '#3085d6',
              //cancelButtonColor: '#d33',
              confirmButtonText:  'OK',
              //cancelButtonText:  'NO',
              closeOnConfirm:     true,//para mostrar el boton de confirmar
              html : true
          },
          function(){//se ejecuta cuando damos a aceptar
              
          }
      );
  }

  function confirmarCerrarSesion(){
      swal(
          {//sweetalert
              title: "Cerrar Sesión",
              text: '¿Seguro que desea finalizar su sesión?',     //mas texto
              type: "warning",//e=[success,error,warning,info]
              showCancelButton: true,//para que se muestre el boton de cancelar
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText:  'SÍ',
              cancelButtonText:  'NO',
              closeOnConfirm:     true,//para mostrar el boton de confirmar
              html : true
          },
          function(value){//se ejecuta cuando damos a aceptar
              if(value)
                location.href = "{{route('user.cerrarSesion')}}"
          }
      );


    }


  /*                       input= id del elemento del que vamos a contar caracteres
    output = bold que está dentro del label en el que pondremos el avance */
  function contadorCaracteres(input,output,valValidacion) {
      //console.log('entro');
      setInterval(function(){
          var c = $('#'+input).val();
          var longMax=valValidacion;
          longMax=parseInt(longMax);
          
          if(c.length>longMax){
              color = "red"; 
          }else{
              color = "rgba(0, 0, 0, 0.548)"; 
          }
          document.getElementById(output).style.color = color; 
          document.getElementById(output).innerHTML='('+c.length+'/'+longMax+')';
      }, 0300);


  }


</script>


@yield('script')
<link rel="stylesheet" href="/adminlte/dist/css/sweetalert.css">

</body>
</html>