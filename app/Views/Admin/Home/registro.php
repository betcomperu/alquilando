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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Ingresa Inmuebles en Alquiler</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="form_validation method="post" action="<?php echo base_url();?>/insertar">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Dirección</label>
                <input type="texto" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección del inmueble">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Detalles</label>
                <input type="texto" class="form-control" id="detalles" name="detalles" placeholder="Detalles del inmueble">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Foto del inmueble</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto" name="foto">
                    <label class="custom-file-label" for="exampleInputFile">Cambiar archivo</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Subir</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Estado </label>
                <select class="form-control" id="estado" name="estado">
                  <option value="0">Sin Alquilar</option>
                  <option value="1">Alquilado</option>
                </select>
              </div>
              <div class="form-group">
                <label for="precio">Precio en Soles (S/)</label>
                <input type="texto" value="<?= old('precio') ?>" id="precio" name="precio" class="form-control" placeholder="Precio">
              </div>

              <div class="form-group">
                <label for="precio">Nombre Inmueble</label>
                <input type="texto" value="<?= old('nombre_inmueble') ?>" id="nombre_inmueble" name="nombre_inmueble" class="form-control" placeholder="Apodo del inmueble">
              </div>

              <div class="form-group">
                <label for="precio">Distrito</label>
                <input type="texto" value="<?= old('distrito') ?>" id="distrito" name="distrito" class="form-control" placeholder="Distrito">
              </div>

            </div>
   
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
        </form>
      </div>
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?= $this->endSection() ?>