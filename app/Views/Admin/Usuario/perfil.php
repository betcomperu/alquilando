<?= $this->extend('Admin/Layout/main.php') ?>

<?= $this->section('titulo') ?>
<?php echo $titulo; ?>

<?= $this->endSection() ?>

<?= $this->section('contenido') ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $titulo; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $titulo; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">

          <div class="box box-widget widget-user-2">


<div class="box box-widget widget-user-2">
<div class="widget-user-header bg-yellow">
<div class="widget-user-image">
<div class="widget-user-image text-center">
<img class="  img-circle" src="<?= base_url('uploads') . "/" . $usuario['foto']; ?>" alt="User Avatar"  style="width: 180px; height: 180px;>


<h3 class="widget-user-username"><?php echo $usuario['nombre']?></h3>
<h5 class="widget-user-desc"><?php 
                    $rol=$usuario['rol'];
                    switch ($rol) {
                        case '3':
                            echo "Inquilino";
                            break;
                        
                        default:
                        echo "Administrador";
                            break;
                    }
                    ?></h5>
</div md-4>
                <ul class="list-group list-group-unbordered md-4">
                  <li class="list-group-item">
                    <b>Condición</b> <a class="float-right"><?php 
                    $condicion=$usuario['condicion'];
                    switch ($condicion) {
                        case '1':
                            echo "Activo";
                            break;
                        
                        default:
                        echo "De baja";
                            break;
                    }
                    ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $usuario['correo']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha de Alta</b> <a class="float-right"><?php echo $fecha->toLocalizedString('d - MMMM - yyyy'); ?></a>
                  </li>
                </ul>

  <div class="card">
    
    <div class="card-body">
    <div class="card-header">
                <h3 class="card-title">Sobre Alquiler</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Predio Ocupado</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class=" fas fa-dollar-sign"></i> Costo Alquiler</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Ultimo mes pagado</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notas</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
  

          </div>
        </div></div>  
 
    </section>
    <!-- /.content -->
  </div>

<?= $this->endSection() ?>