<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multi One Plus</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.min.css">
    <!-- sweetalert -->
<script src="<?= base_url(); ?>/assets/admin/dist/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>/assets/admin/dist/js/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/dist/js/sweetalert2.min.css">
<!-- end sweet aler -->
<style>
      a:hover {
    color: #28a745;
    text-decoration: none;
}
  </style>
</head>
<body class="hold-transition login-page">
    <?= $this->session->flashdata('message'); ?>
    <div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
      <div class="card-header text-center">
          <a href="../../index2.html" class="h1"><b>Multi One Plus</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            
      <form action="<?= base_url('login/validlogin') ?>" method="post">
      <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        
        <div class="social-auth-links text-center mt-2 mb-3">
            <button type="submit" class="btn btn-block btn-primary">Sign in</button>
        <!-- /.social-auth-links -->
    </form>
    
    
    
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
