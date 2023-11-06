<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA ALQUILANDO| Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/plugins/iCheck-bootstrap/icheck-bootstrap.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="/"><b>Administracion</b> ALQUILANDO</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Iniciar Sesión</p>


    </div>
    <?php echo form_open('login/entrar'); ?>
    <?= csrf_field(); ?>



    <div class="form-group has-feedback">
      <?php $isInvalidUsuario = (session()->getFlashdata('errUsuario')) ? 'is-invalid' : ''; ?>

      <input type="text" class="form-control <?= $isInvalidUsuario; ?>" id="usuario" name="usuario" placeholder="Ingrese su Usuario" value="<?= old('usuario') ?>">
      <p class="text text-danger"><?= session()->getFlashdata('errUsuario'); ?></p>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      

    </div>
    <div class="form-group has-feedback">
      <?php $isInvalidPassword = (session()->getFlashdata('errPassword')) ? 'is-invalid' : ''; ?>
      <input type="password" class="form-control <?= $isInvalidPassword ?>"" id=" password" name="password" placeholder="Ingrese su Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      <p class="text text-danger"><?= session()->getFlashdata('errPassword') ?></p>

    </div>
    <div class="row">

      <div class="col-sm-12">
        <?php if (isset($validation)) : ?>
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              <?= $validation->listErrors() ?>
            </div>
          </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary btn-block btn-flat">INGRESAR</button>
      </div>

      <!-- /.col -->
    </div>
    <?= form_close(); ?>


    <!-- /.social-auth-links -->

    <a href="#">Olvide mi contraseña</a><br>
    <a href="register.html" class="text-center">Registrarme</a>

  </div>
  <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url(); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url(); ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url(); ?>/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>