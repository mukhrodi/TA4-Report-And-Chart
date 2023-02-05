<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo e(asset('adminlte')); ?>/index3.html" class="brand-link">
    <img src="<?php echo e(asset('adminlte')); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">App Penjualan</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo e(asset('adminlte')); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">

        <?php if(Auth::check()): ?>
        <a href="#" class="d-block"> <?php echo e(Auth::user()->nama_lengkap); ?> </a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'home' ? 'active' : '')); ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route('transaksi.create')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'transaksi' && request()->segment(2) == 'create'  ? 'active' : '')); ?> ">
            <i class="nav-icon fas fa-cube"></i>
            <p>
              Buat Transaksi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route('transaksi.index')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'transaksi'  && request()->segment(2) == ''  ? 'active' : '')); ?> ">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p>
              History Transaksi
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>