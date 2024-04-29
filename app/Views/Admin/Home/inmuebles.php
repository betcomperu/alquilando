
<?php $userRol = ($_SESSION['rol'] == '1') ? $this->extend('Admin/Layout/main.php') : $this->extend('Admin/Layout/main_user.php'); ?>



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
          <h1 class="m-0"><?php echo $titulo; ?>***</h1>
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
  <div class="swal" data-swal="<?= session()->get('registrado')?>"></div>

  <div class="card-body">
    
  <?php if ( $_SESSION['rol'] == 1) : ?>
    <div class="box-header with-border">
        <a href="<?php echo base_url(); ?>/inmuebles/registro" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Agregar Inmueble </a>
        <a href="<?php echo base_url(); ?>/inmuebles/eliminados" class="btn btn-warning"><i class="fas fa-list-ol"></i>  Eliminados
        </a>
        <div class="box-tools pull-right">
            <br>
        </div>
    </div>
<?php endif; ?>

                <?php 
                echo session()->getFlashdata('info');
                ?>

                <div class="margin-top">
                    <table id="tabla1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Dirección</th>
                                <th>Detalles</th>
                                <th>Foto</th>
                                <th>Estado</th>
                                <th>Precio S/</th>
                                <th>Nombre Inmueble</th>
                                <th>Distrito</th>
                                <th>Usuario Registrante</th>
                                <th>Opciones</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($inmuebles as $dato) : ?>
                                <tr>
                                    <td><?php echo $dato['direccion']; ?></td>
                                    <td><?php echo $dato['detalles']; ?></td>
                                    <td>


<a href="<?= base_url('uploads') . "/"; ?><?php echo $dato['foto']; ?>" data-toggle="lightbox" data-title="sample 11 - white">
<img src="<?= base_url('uploads') . "/"; ?><?php echo $dato['foto']; ?>" class="img-fluid mb-2" alt="white sample" width="80" />
</a>
                                      
                                    </td>
                                    <td><?php echo $dato['estado']; ?></td>
                                    <td><?php echo number_format($dato['precio'], 2, '.', ','); ?></td> 
                                    <td><?php echo $dato['nombre_inmueble']; ?></td>
                                    <td><?php echo $dato['distrito']; ?></td>
                                    
                                    <td>
                                    <a href="<?= base_url('Usuarios/perfil/' . $dato['idusuario']) ?>">
        <?php echo $dato['nombre']; ?>

              </td>
             
                                    <td>
                                        <a class="btn btn-primary" href="<?= base_url('Inmuebles/edit/' . $dato['id_inmueble']) ?>" role="button"><i class="fa fa-keyboard"></i></a>
                                        <a class="btn btn-danger eliminar" href="<?= base_url('Inmuebles/eliminar/' . $dato['id_inmueble'] )?>" role="button"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <tfoot>
                            <tr>
                            <th>Dirección</th>
                                <th>Detalles</th>
                                <th>Foto</th>
                                <th>Estado</th>
                                <th>Precio S/</th>
                                <th>Nombre Inmueble</th>
                                <th>Distrito/</th>
                             <th>Usuario Registrante</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">

      </div>
      <!-- /.row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>