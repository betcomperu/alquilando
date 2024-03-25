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



  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="panel">
            <div class="embed-responsive embed-responsive-4by3" style="margin-top: 20px">
              <iframe src="<?php echo base_url() . "/pagos/generarReciboPDF/" . $idpagos ?>" frameborder="0" class="embed-responsive-item"></iframe>

            </div>

          </div>
        </div>
    </main>
  </div>


  <?= $this->endSection() ?>

 