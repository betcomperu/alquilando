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
  <div class="swal" data-swal="<?= session()->get('registrado')?>"></div>
    <div class="container-fluid">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Ingresa Inmuebles en Alquiler</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form enctype="multipart/form-data" id="form_validation" method="post" action="<?php echo base_url()."/inmuebles/update"."/".$inmueble['id_inmueble']?>"
          <div class="card-body">
            <div class="form-group">
              <label for="text">Dirección</label>
              <input type="texto" value="<?= $inmueble['direccion']?>" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección del inmueble">
              <p class="text text-danger"><?= session('errors.direccion') ?></p>
            </div>
            <div class="form-group">
              <label for="text">Detalles</label>
              <input type="texto" value="<?= $inmueble['detalles']?>" class="form-control" id="detalles" name="detalles" placeholder="Detalles del inmueble">
              <p class="text text-danger"><?= session('errors.detalles') ?></p>
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
              <p class="text text-danger"><?= session('errors.foto') ?></p>
            </div>
            <div class="form-group">
              <label>Estado </label>
              <select class="form-control" id="estado" name="estado">
                <option value="<?= $inmueble['estado']?>"><?= $inmueble['estado']?></option>
                <option value="Sin Alquilar">Sin Alquilar</option>
                <option value="Alquilado">Alquilado</option>
              </select>
            </div>
            <div class="form-group">
              <label for="precio">Precio en Soles (S/)</label>
              <input type="texto" value="<?=  $inmueble['precio'] ?>" id="precio" name="precio" class="form-control" placeholder="Precio">
              <p class="text text-danger"><?= session('errors.precio') ?></p>
            </div>

            <div class="form-group">
              <label for="precio">Nombre Inmueble</label>
              <input type="texto" value="<?= $inmueble['nombre_inmueble']?>" id="nombre_inmueble" name="nombre_inmueble" class="form-control" placeholder="Apodo del inmueble">
              <p class="text text-danger"><?= session('errors.nombre_inmueble') ?></p>
            </div>

            <div class="form-group">
              <label for="">Dstrito</label>
              <select id="distrito" class="form-control" name="distrito">
                
                  <option value="<?= $inmueble['distrito']?>"><?= $inmueble['distrito']?></option>
                  <option value="Ancon">ANCON</option>
                  <option value="Ate">ATE</option>
                  <option value="Barranco">BARRANCO</option>
                  <option value="Breña">BREÑA</option>
                  <option value="Carabayllo">CARABAYLLO</option>
                  <option value="Chaclacayo">CHACLACAYO</option>
                  <option value="Chorrillos">CHORRILLOS</option>
                  <option value="Cieneguilla">CIENEGUILLA</option>
                  <option value="Comas">COMAS</option>
                  <option value="El Agustino">EL AGUSTINO</option>
                  <option value="Independencia">INDEPENDENCIA</option>
                  <option value="Jesús María">JESUS MARIA</option>
                  <option value="La Molina">LA MOLINA</option>
                  <option value="La Victoria">LA VICTORIA</option>
                  <option value="Lima">LIMA</option>
                  <option value="Lince">LINCE</option>
                  <option value="Los Olivos">LOS OLIVOS</option>
                  <option value="Lurigancho">LURIGANCHO</option>
                  <option value="Lurin">LURIN</option>
                  <option value="Magdalena del Mar">MAGDALENA DEL MAR</option>
                  <option value="Miraflores">MIRAFLORES</option>
                  <option value="Pachacamac">PACHACAMAC</option>
                  <option value="Pucusana">PUCUSANA</option>
                  <option value="Pueblo Libre">PUEBLO LIBRE</option>
                  <option value="Puente Piedra">PUENTE PIEDRA</option>
                  <option value="Punta Hermosa">PUNTA HERMOSA</option>
                  <option value="Punta Negra">PUNTA NEGRA</option>
                  <option value="Rimac">RIMAC</option>
                  <option value="San Bartolo">SAN BARTOLO</option>
                  <option value="San Borja">SAN BORJA</option>
                  <option value="San Isidro">SAN ISIDRO</option>
                  <option value="San Juan de Lurigancho">SAN JUAN DE LURIGANCHO</option>
                  <option value="San Juan de Miraflores">SAN JUAN DE MIRAFLORES</option>
                  <option value="San Luis">SAN LUIS</option>
                  <option value="San Martin de Porres">SAN MARTIN DE PORRES</option>
                  <option value="San Miguel">SAN MIGUEL</option>
                  <option value="Santa Anita">SANTA ANITA</option>
                  <option value="Santa Maria del Mar">SANTA MARIA DEL MAR</option>
                  <option value="Santa Rosa">SANTA ROSA</option>
                  <option value="Santiago de Surco">SANTIAGO DE SURCO</option>
                  <option value="Surquillo">SURQUILLO</option>
                  <option value="Villa el Salvador">VILLA EL SALVADOR</option>
                  <option value="Villa María del Triunfo">VILLA MARIA DEL TRIUNFO</option>

                </select>
                <p class="text text-danger"><?= session('errors.distrito') ?></p>
            </div>

          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary registrar"><i class="fa fa-plus-circle"></i> Actualizar</button>
        <a href="<?php echo base_url(); ?>/inmuebles/listar" class="btn btn-warning"><i class="fas fa-undo"></i> Regresar</a>
      </div>
    </div>
    </form>
</div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>