<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo e(asset('adminlte')); ?>/index2.html"><b>Penjualan App</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
        <?php if(session('loginFailed')): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo e(session('loginFailed')); ?>

        </div>
        <?php endif; ?>
        <form action="<?php echo e(route('login')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="username" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo e(asset('adminlte')); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo e(asset('adminlte')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(asset('adminlte')); ?>/dist/js/adminlte.min.js"></script>

</body>

</html><?php /**PATH D:\Onedrive\OneDrive - Bina Nusantara\KULIAH\Material\Semester 7\Periode 1\Web Programming\TUGAS\TK 3\TK3\resources\views/auth/login_new.blade.php ENDPATH**/ ?>