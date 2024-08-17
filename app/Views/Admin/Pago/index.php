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
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>



  <div class="card-body">

  <div class="total-montos">
            Total: S/ <?php echo number_format($totalMontos, 2); ?>
        </div>
    <?php if ($_SESSION['rol'] == 1) : ?>
      <div class="box-header with-border">
        <a href="<?php echo base_url(); ?>/usuarios/hacerpago" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Añadir Pago</a>
        <a href="<?php echo base_url(); ?>/usuarios/pagos" class="btn btn-warning"><i class="fas fa-list-ol"></i> Eliminados
        </a>
        <a href="<?= base_url('pago/generatePDF'); ?>" class="btn btn-success"><i class="fas fa-list-ol"></i> Genera PDF</a>
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
            <th>Inquilino</th>
            <th>Metodo de Pago</th>
            <th>Nro. Operación</th>
            <th>Monto S/</th>
            <th>Entidad Bancaria</th>
            <th>Detalle</th>
            <th>Fecha pago</th>
            <th>Inmueble</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>

        <tbody>

          <?php foreach ($pago as $p) : ?>
            <tr>

              <td>
                <!-- Buscar el nombre del inquilino (usuario) usando el ID del usuario asociado al pago -->
                <?php
                $nombreInquilino = null;
                foreach ($usuarios as $usuario) {
                  if ($usuario['idusuario'] === $p['id_usuario']) {
                    $nombreInquilino = $usuario['nombre'];
                    break;
                  }
                }
                echo esc($nombreInquilino); // Mostrar el nombre del inquilino
                ?>
              </td>
              <td><?= esc($p['metodo_pago']) ?></td>
              <td><?= esc($p['numero_operacion']) ?></td>
              <td><?= esc($p['monto']) ?></td>
              <td><?= esc($p['entidad_bancaria']) ?></td>
              <td><?= esc($p['detalle']) ?></td>
              <td><?= esc($p['fecha_pago']) ?></td>
              <td>
                <!-- Buscar el nombre del inmueble usando el ID del inmueble asociado al pago -->
                <?php
                $nombreInmueble = null;
                foreach ($inmuebles as $inmueble) {
                  if ($inmueble['id_inmueble'] === $p['id_inmueble']) {
                    $nombreInmueble = $inmueble['direccion'];
                    break;
                  }
                }
                echo esc($nombreInmueble); // Mostrar el nombre del inmueble
                ?>
              </td>
              <td>
                <?php
                $estado = $p['activo'];
                $mensajeEstado = '';
                switch ($estado) {
                  case '1':
                    echo '<p class="text-success"><b>Pagado</b></p>';
                    $mensajeEstado = 'pagado';
                    break;

                  default:
                    echo '<p class="text-danger"><b>Pendiente</b></p>';
                    $mensajeEstado = 'pendiente';
                    break;
                }
                ?>
              </td>
              <!-- Inicializa los tooltips -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
              <td>

                <?php if ($_SESSION['rol'] == 1) : ?>
                  <!-- Botones con tooltips -->
<a class="btn btn-primary" href="<?= base_url('pagos/editarReciboPDF/' . $p['idpagos']) ?>" role="button" data-toggle="tooltip" title="Editar Recibo">
    <i class="fas fa-edit"></i>
</a>
<a class="btn btn-danger eliminar" href="<?= base_url('pagos/delete/' . $p['idpagos']) ?>" role="button" data-toggle="tooltip" title="Eliminar Recibo">
    <i class="fas fa-trash"></i>
</a>
<a class="btn btn-warning" href="<?= base_url('pagos/muestraReciboPDF/' . $p['idpagos']) ?>" role="button" data-toggle="tooltip" title="Gemerar Recibo PDF">
    <i class="fas fa-file-pdf"></i>
</a>
<a class="btn btn-success" href="<?= base_url('pagos/enviarConfirmacion/' . $p['idpagos']) ?>" role="button" data-toggle="tooltip" title="Enviar Correo">
    <i class="fas  fa-envelope"></i>
</a>
<button class="btn btn-primary" onclick="mostrarVentanaModal('<?= esc($nombreInquilino) ?>', '<?= esc($nombreInmueble) ?>', '<?= esc($p['numero_operacion']) ?>', '<?= esc($p['monto']) ?>', '<?= esc($p['entidad_bancaria']) ?>', '<?= esc($p['fecha_pago']) ?>', '<?= esc($p['detalle']) ?>', '<?= $mensajeEstado ?>')" data-toggle="tooltip" title="Enviar Msj Whatsapp">
    <i class="fas fa-comment"></i>
</button>




                  <?php
                  // Determinar la clase CSS del botón según el estado activo del pago
                  $claseBoton = ($p['activo'] == 0) ? 'btn-info' : 'btn-danger';

                  // Determinar el icono del botón según el estado activo del pago
                  $iconoBoton = ($p['activo'] == 0) ? 'check' : 'clock';
                  ?>
                  <a class="btn <?= $claseBoton ?>" href="<?= base_url('pagos/validarpago/' . $p['idpagos']) ?>" role="button">
                    <i class="fas fa-check >?= $iconoBoton ?>"></i>
                  </a>
                <?php else : ?>
                  <a class="btn btn-warning" href="<?= base_url('pagos/muestraReciboPDF/' . $p['idpagos']) ?>" role="button">
                    <i class="fas fa-file-pdf"></i> PDF</a>
                <?php endif; ?>
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
            <th>Entidad Bancaria</th>
            <th>Detalle</th>
            <th>Fecha pago</th>
            <th>Inmueble</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </tfoot>
      </table>
    </div>

  </div>


  <!-- /.content -->
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<?= $this->endSection() ?>