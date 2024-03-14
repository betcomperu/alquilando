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
      <a href="<?php echo base_url(); ?>/usuarios/hacerpago" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Añadir Pago</a>
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
            <th>Inquilino</th>
            <th>Metodo de Pago</th>
            <th>Nro. Operación</th>
            <th>Monto S/</th>
            <th>Comprobante</th>
            <th>Fecha pago</th>
            <th>Inmueble</th>
            <th>Opciones</th>
          </tr>
        </thead>

        <tbody>

          <?php foreach ($pago as $p) : ?>
            <tr>

              <td><?= esc($p['id_usuario']) ?></td>
              <td><?= esc($p['metodo_pago']) ?></td>
              <td><?= esc($p['numero_operacion']) ?></td>
              <td><?= esc($p['monto']) ?></td>
              <td><?= esc($p['comprobante']) ?></td>
              <td><?= esc($p['fecha_pago']) ?></td>
              <td><?= esc($p['id_inmueble']) ?></td>
              <td> <a class="btn btn-primary" href="<?= base_url('Usuarios/edit/' . $p['id_usuario']) ?>" role="button">Editar</a>
                <a class="btn btn-danger eliminar" href="<?= base_url('Usuarios/eliminar/' . $p['id_usuario']) ?>" role="button">Eiminar</a>
              </td>
            </tr>
          <?php endforeach; ?>

        <tfoot>
          <tr>
          <tr>
            <th>Inquilino</th>
            <th>Metodo de Pago</th>
            <th>Nro. Operación</th>
            <th>Monto S/</th>
            <th>Comprobante</th>
            <th>Fecha pago</th>
            <th>Inmueble</th>
            <th>Opciones</th>
          </tr>
        </tfoot>
      </table>
    </div>

  </div>


  <!-- /.content -->
</div>

<?= $this->endSection() ?>