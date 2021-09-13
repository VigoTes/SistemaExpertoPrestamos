<!-- Sidebar Menu -->
    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->


      <li class="nav-item">
        <a href="{{route('Prestamos.Listar')}}" class="nav-link">
          <i class="far fa-address-card nav-icon"></i>
          <p>Préstamos</p>
        </a>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="far fa-building nav-icon"></i>
          <p>
            MANTENEDORES
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
         
              <li class="nav-item">
                <a href="{{route('Usuario.listar')}}" class="nav-link">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route("Persona.listar")}}" class="nav-link">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Personas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route("TasaInteres.listar")}}" class="nav-link">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Tasas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route("PlazoPago.listar")}}" class="nav-link">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Plazos de Pago</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('RazonPrestamo.listar')}}" class="nav-link">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Razón de prestamo</p>
                </a>
              </li>
              
              
              
            

        </ul>

      </li>



 
      


      



      

 