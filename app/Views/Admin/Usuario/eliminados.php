<?= $this->extend('Admin/Layout/main.php') ?>

<?= $this->section('titulo') ?>
<?php echo $titulo; ?>

<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">


            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de <?php echo $titulo; ?></h1>
                </div>
                <div cl ass="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Listado de <?php echo $titulo; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabla de <?php echo $titulo; ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <!--Pintar mensaje de Flashdata

            <?php if (session()->getFlashdata('registrado')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('registrado'); ?>
                </div>
            <?php endif; ?>-->

            <div class="swal" data-swal="<?= session()->get('registrado') ?>"></div>



            <div class="card-body">
                <div class="box-header with-border">
                    <a href="<?php echo base_url(); ?>/usuarios/" class="btn btn-secondary"><i class="fa fa-plus-circle"></i> Listar Usuarios
                    </a>
                    <a href="<?php echo base_url(); ?>/usuarios/eliminados" class="btn btn-warning"><i class="fas fa-list-ol"></i> Eliminados
                    </a>
                    <div class="box-tools pull-right">
                        <br>
                    </div>
                </div>

                <div class="margin-top">
                    <table id="tabla1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
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
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['correo']; ?></td>
                                    <td><?php echo $dato['usuario']; ?></td>
                                    <td>
                                        <?php
                                        $valrol = $dato['rol'];
                                        switch ($valrol) {
                                            case 'Administrador':
                                                //  echo '<p class="text-green">'.$valrol.'</p>';
                                                echo '<p class="text-success"><b>' . $valrol . '</b></p>';
                                                break;
                                            case 'Vendedor':
                                                echo '<p class="text-info"><b>' . $valrol . '</b></p>';
                                                break;
                                            case 'Supervisor':
                                                echo '<p class="text-primary"><b>' . $valrol . '</b></p>';
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
                                        <a class="btn btn-info" href="<?= base_url('Usuarios/recuperar/' . $dato['idusuario']) ?>" role="button"><i class="fas fa-reply-all"></i> Recuperar</a>
                                        <a class="btn btn-danger eliminar" href="<?= base_url('Usuarios/borrar/' . $dato['idusuario'] )?>" role="button">Borrar</a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <tfoot>
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

                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>

            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>