<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multi One Plus</title>
  <link rel="shortcut icon" href="<?= base_url('assets/admin/img/logo ig mop.png') ?>" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <style>
      a:hover {
    color: #28a745;
    text-decoration: none;
}
.register-page{
  background-image:url('https://images.pexels.com/photos/5086020/pexels-photo-5086020.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
  background-size: cover;
  background-repeat: no-repeat;
}
  </style>
</head>
<body class="hold-transition register-page">
  <?= $this->session->flashdata('message'); ?>
  <div class="register-box">
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <div >
              <img src="<?= base_url('assets/customer/img/logo ig mop.png') ?>" style="width:50px;height:30px;"  alt=""> 
            </div>
      <a href="" class="h1"><b>Multi One Plus</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?= base_url('register/index') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Name" name="nama" value="<?= set_value('nama'); ?>">
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <?= form_error('nama', '<small class="text-danger">','</small>') ?>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <?= form_error('email', '<small class="text-danger">','</small>') ?>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password2">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
        <div class="row">
         
            <!-- /.col -->
            <div style="width:100%">
                <a href="<?= base_url('login/customer') ?>" class="btn btn-danger float-right " >Cancel</a> 
                <button type="submit" class="btn btn-primary float-right mr-2">Submit</button>
            </div>
                
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
