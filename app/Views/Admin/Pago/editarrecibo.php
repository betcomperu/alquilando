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

      <form action="<?= base_url('pagos/updatepago') ?>" method="post">
      <input type="hidden" name="idpagos" value="<?php
                                                                                echo esc($InquilinoTraido['idpagos']); 
                                                                                ?>" />

        <!-- Nombre de Inquilino -->
        <div class="form-group">
          <label for="id_usuario">Inquilino:</label>
          <input type="text" id="nombreInquilino" name="nombreInquilino" value="<?php
                                                                                echo esc($InquilinoTraido['nombre']); 
                                                                                ?>" class="form-control">
        </div>
        <!-- Metodo de Pago -->
        <div class="form-group">
          <label for="metodo_pago">Método de Pago:</label>
          <select name="metodo_pago" id="metodo_pago" class="form-control">
            <option value="<?= $metododepago ?>"><?= $metododepago ?></option>
            <option value="">Seleccione el método de pago</option>
            <option value="Transferencia">Transferencia</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Yape">Yape</option>
          </select>
        </div>
        <!-- Numero de Operación -->

        <div class="form-group">
          <label for="numero_operacion">Número de Operación:</label>
          <input type="text" name="numero_operacion" id="numero_operacion" class="form-control" value="<?php
                                                                                                        echo esc($InquilinoTraido['numero_operacion']);
                                                                                                        ?>">
        </div>
        <!-- Monto -->
        <div class="form-group">
          <label for="monto">Monto S/:</label>
          <input type="text" name="monto" id="monto" class="form-control" value="<?php
                                                                                  echo esc($InquilinoTraido['monto']);  
                                                                                  ?>">
        </div>
        <!-- Entidad Bancaria -->
        <div class="form-group">
          <label for="metodo_pago">Entidad Bancaria:</label>
          <select name="entidad_bancaria" id="entidad_bancaria" class="form-control">
            <option value="<?php echo esc($InquilinoTraido['entidad_bancaria']); ?>"><?php echo esc($InquilinoTraido['entidad_bancaria']); ?></option>
            <option value="">Seleccione el Banco</option>
            <option value="Banco Interbank">Interbank</option>
            <option value="Banco de Crédito del Perú">BCP</option>
            <option value="Banco Continental">BBVA</option>
          </select>
        </div>
        <!-- Fecha de Pago -->
        <div class="form-group">
          <label for="fecha_pago">Fecha de Pago:</label>
          <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="<?php
                                                                                  echo esc($InquilinoTraido['fecha_pago']);  
                                                                                  ?>">
        </div>
        <!-- Numero de Operación  -->
        <div class="form-group">
          <label for="numero_operacion">Detalles:</label>
          <input type="text" name="detalle" id="detalle" class="form-control" value="<?php
                                                                                  echo esc($InquilinoTraido['detalle']);  
                                                                                  ?>">
        </div>
<!-- Nombre del Inmueble  -->
        <div class="form-group">
          <label for="id_inmueble">Inmueble:</label>
          <select name="id_inmueble" id="id_inmueble" class="form-control">
            <!-- Iterar sobre la lista de inmuebles para mostrar las opciones -->
            <option value="<?= esc($elinmueble['id_inmueble']) ?>"><?= esc($elinmueble['direccion']) ?></option>
              <option value="">Seleccione el Banco</option>
            <?php foreach ($inmuebles as $inmueble) : ?>
            
              <option value="<?= esc($inmueble['id_inmueble']) ?>"><?= esc($inmueble['direccion']) ?></option>
            <?php endforeach; ?>
           
           
          </select>
        </div>
        <td>
        <?php
                $estado = $InquilinoTraido['activo'];
                switch ($estado) {
                  case '1':
                    //  echo '<p class="text-green">'.$valrol.'</p>';
                    echo '<p class="text-success"><b>' . "Pagado" . '</b></p>';
                    break;

                  default:
                    echo '<p class="text-danger"><b>' . "Pendiente" . '</b></p>';
                    break;
                }
                ?>
      </td>
        <button type="submit" class="btn btn-primary registrar"><i class="fa fa-plus-circle"></i> Actualizar</button>
      </form>
    </div>

    <div class="margin-top">

    </div>

  </div>



  <!-- /.content -->
</div>

<?= $this->endSection() ?>