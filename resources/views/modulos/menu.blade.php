  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('inicio')}}" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SoporteDGC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">GENERAL</li>    
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"  style="color: orange;"></i>
              <p  style="color: white;">
                Areas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('areas.index')}}" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Areas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('areas.create') }}" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nueva Area</p>
                </a>
              </li>
              
            </ul>
          </li>
       
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"  style="color: lime"></i>
              <p  style="color: white">
                Ubicaciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ubicaciones.index')}}" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Ubicaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ubicaciones.create')}}" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nueva Ubicación</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- PANEL DE IMPRESORA-->
          <li class="nav-header">PANEL IMPRESORA</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"  style="color:rgb(152, 172, 199)"></i>
              <p  style="color: white">
                Impresoras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Impresoras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nueva Impresora</p>
                </a>
              </li>
            
            </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tint"  style="color: red"></i>
              <p  style="color: white">
                Toners
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Toners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nuevo Toner</p>
                </a>
              </li>
            
            </ul>
          </li>  
          <!-- PANEL DE ADMIN-->    
          <li class="nav-header">PANEL ADMIN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"  style="color:rgb(152, 172, 199)"></i>
              <p  style="color: white">
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('usuarios.index') }}" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nuevo Usuario</p>
                </a>
              </li>
            </ul>
          </li> 
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>