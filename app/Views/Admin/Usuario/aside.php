  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>/home" class="brand-link">
      <img src="<?php echo base_url('dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Alquilando.com</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('uploads') . "/". session()->get('foto') ; ?>" class="img-circle elevation-2" alt="User Image" width='100'>
        </div>
        <div class="info">
          <a href="<?= base_url('Usuarios/perfil/' . session()->get('idusuario'))?>" class="d-block"><?= $_SESSION['nombre'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="" class="nav-link">
            <i class="fa fa-home fa-fw"></i>
              <p>
                Inmueble
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
         
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/inmuebles/listar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-home fa-fw"></i>
              <p>
                Alquileres
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>/usuarios/pagos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pagos</p>
                </a>
              </li>
        
              
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-print"></i>
              <p>Reportes</p>
            </a>
          </li>
          <li class="nav-header">USUARIO</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Configuración</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Perfil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/salir" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Salir</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>