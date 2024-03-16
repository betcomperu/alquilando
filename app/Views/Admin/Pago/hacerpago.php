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
      <a href="<?php echo base_url(); ?>/usuarios/pagos" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Todos los pagos Pago</a>
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
      <h2>Registrar nuevo pago</h2>
      <form action="<?= base_url('usuarios/guardarpago') ?>" method="post">
        <div class="form-group">
          <label for="id_usuario">Inquilino:</label>
          <select name="id_usuario" id="id_usuario" class="form-control">
            <!-- Iterar sobre la lista de usuarios para mostrar las opciones -->
            <?php foreach ($usuarios as $usuario) : ?>
              <option value="<?= esc($usuario['idusuario']) ?>"><?= esc($usuario['nombre']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="metodo_pago">Método de Pago:</label>
          <select name="metodo_pago" id="metodo_pago" class="form-control">
            <option value="">Seleccione el método de pago</option>
            <option value="Transferencia">Transferencia</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Yape">Yape</option>
          </select>
        </div>


        <div class="form-group">
          <label for="numero_operacion">Número de Operación:</label>
          <input type="text" name="numero_operacion" id="numero_operacion" class="form-control">
        </div>
        <div class="form-group">
          <label for="monto">Monto S/:</label>
          <input type="text" name="monto" id="monto" class="form-control">
        </div>
        <div class="form-group">
          <label for="comprobante">Comprobante:</label>
          <input type="text" name="comprobante" id="comprobante" class="form-control">
        </div>
        <div class="form-group">
          <label for="fecha_pago">Fecha de Pago:</label>
          <input type="date" name="fecha_pago" id="fecha_pago" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_inmueble">Inmueble:</label>
          <select name="id_inmueble" id="id_inmueble" class="form-control">
            <!-- Iterar sobre la lista de inmuebles para mostrar las opciones -->
            <?php foreach ($inmuebles as $inmueble) : ?>
              <option value="<?= esc($inmueble['id_inmueble']) ?>"><?= esc($inmueble['direccion']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Pago</button>
      </form>
    </div>

    <div class="margin-top">

    </div>

  </div>



  <!-- /.content -->
</div>

<?= $this->endSection() ?>