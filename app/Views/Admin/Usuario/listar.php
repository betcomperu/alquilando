<?= $this->extend('Admin/Layout/main.php') ?>

<?= $this->section('titulo') ?>
<?php echo $titulo; ?>

<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?php echo $titulo; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $titulo; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="swal" data-swal="<?= session()->get('registrado') ?>"></div>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <div class="card-body">
    <div class="box-header with-border">
      <a href="<?php echo base_url(); ?>/usuarios/nuevo" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Agregar Usuario </a>
      <a href="<?php echo base_url(); ?>/usuarios/eliminados" class="btn btn-warning"><i class="fas fa-list-ol"></i> Eliminados
      </a>
      <div class="box-tools pull-right">
        <br>
      </div>
    </div>
    <?php
    echo session()->getFlashdata('info');
    ?>

    <div class="margin-top">
      <table id="tabla1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nombre Completo</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Imagen</th>

            <th>Opciones</th>
          </tr>
        </thead>

        <tbody>

          <?php foreach ($usuarios as $dato) : ?>
            <tr>
              <td>
                <a href="<?= base_url('Usuarios/perfil/' . $dato['idusuario']) ?>">
                  <?php echo $dato['nombre']; ?>
                </a>

              <td><?php echo $dato['correo']; ?></td>
              <td><?php echo $dato['usuario']; ?></td>
              <td>
                <?php
                $valrol = $dato['nombre_rol'];
                switch ($valrol) {
                  case 'Administrador':
                    //  echo '<p class="text-green">'.$valrol.'</p>';
                    echo '<p class="text-success"><b>' . $valrol . '</b></p>';
                    break;

                  default:
                    echo '<p class="text-danger"><b>' . $valrol . '</b></p>';
                    break;
                }
                ?>
              </td>
              <td>
                <img src="<?= base_url('uploads') . "/"; ?><?php echo $dato['foto']; ?>" alt="img-responsive" width="80">
              </td>

              <td>
                <a class="btn btn-primary" href="<?= base_url('Usuarios/edit/' . $dato['idusuario']) ?>" role="button">Editar</a>
                <a class="btn btn-danger eliminar" href="<?= base_url('Usuarios/eliminar/' . $dato['idusuario']) ?>" role="button">Eiminar</a>

              </td>

            </tr>
          <?php endforeach; ?>

        <tfoot>
          <tr>
          <tr>
            <th>Nombre Completo</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Imagen</th>

            <th>Opciones</th>
          </tr>
        </tfoot>
      </table>
    </div>

  </div>


  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>