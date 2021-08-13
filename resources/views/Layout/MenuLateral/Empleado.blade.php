    <li>- - - - - - -   EMPLEADO   - - - - - - - -</li>
    <li class="nav-item">
      <a href="{{route('SolicitudFondos.Empleado.Listar')}}" class="nav-link">
        <i class="far fa-address-card nav-icon"></i>
        <p>Mis Solicitudes</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('RendicionGastos.Empleado.Listar')}}" class="nav-link">
        <i class="far fa-address-card nav-icon"></i>
        <p>Mis Rendiciones</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('ReposicionGastos.Empleado.Listar')}}" class="nav-link">
        <i class="far fa-address-card nav-icon"></i>
        <p>Mis Reposiciones</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('RequerimientoBS.Empleado.Listar')}}" class="nav-link">
        <i class="far fa-address-card nav-icon"></i>
        <p>Mis Requerimientos</p>
      </a>
    </li>


    

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="far fa-building nav-icon"></i>
        <p>
          Dec. Juradas
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('DJMovilidad.Empleado.Listar')}}" class="nav-link">
            <i class="far fa-address-card nav-icon"></i>
            <p>Movilidad</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('DJViaticos.Empleado.Listar')}}" class="nav-link">
            <i class="far fa-address-card nav-icon"></i>
            <p>Viaticos</p>
          </a>
        </li>
        

        
        <li class="nav-item">
          <a href="{{route('DJVarios.Empleado.Listar')}}" class="nav-link">
            <i class="far fa-address-card nav-icon"></i>
            <p>Varios</p>
          </a>
        </li>
       

      </ul>
    </li>
