<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!-- #216645 -->
<body class="hold-transition login-page" style="background-color: #28a745;">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url();?>assets/index2.html" style="color:#fff"><b>Sistem</b>Prediksi</a>
  </div>
  <!-- /.login-logo -->
  <div class="card elevation-5" >
    <div class="card-body login-card-body">
      <div class=" row justify-content-md-center">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
          <img src="<?=base_url()?>assets/img/logo.png" style="border: 0px grey solid" width="100px">
        </div>
        <div class="col-md-4"></div>
      </div>
      <p class="login-box-msg">PT Herba Penawar Alwahida Indonesia</p>
      <?=  $this->session->flashdata('message'); ?>
      <form action="<?= base_url();?>login" method="post">
        <?= form_error('username', '<small class="text-danger pl-3">','</small>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
