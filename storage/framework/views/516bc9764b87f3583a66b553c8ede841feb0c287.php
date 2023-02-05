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
        <a href="#" class="d-block"> <?php echo e(Auth::user()->name); ?> </a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'admin' && request()->segment(2) == '' ? 'active' : '')); ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?php echo e(in_array(request()->segment(2),['user','kategori','produk','pembeli']) ? 'menu-open' : ''); ?>">
          <a href="" class="nav-link in_array(request()->segment(2),['user','kategori','produk','pembeli']) ? 'active' : '' ">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Master data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php if(Auth::user()->level == 'admin'): ?>
            <li class="nav-item">
              <a href="<?php echo e(route('user.index')); ?>" class="nav-link <?php echo e(in_array(request()->segment(2),['user']) ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p> User</p>
              </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a href="<?php echo e(route('pembeli.index')); ?>" class="nav-link <?php echo e(in_array(request()->segment(2),['pembeli']) ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p> Pembeli</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('kategori.index')); ?>" class="nav-link  <?php echo e(in_array(request()->segment(2),['kategori']) ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p> Kategori Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('produk.index')); ?>" class="nav-link  <?php echo e(in_array(request()->segment(2),['produk']) ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p> Produk</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route('brgmasuk.index')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'admin' && request()->segment(2) == 'brgmasuk' ? 'active' : '')); ?> ">
            <i class="nav-icon fas fa-cube"></i>
            <p>
              Barang Masuk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route('transaksiadmin.index')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'admin' && request()->segment(2) == 'transaksiadmin' ? 'active' : '')); ?>">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p>
              Transaksi Penjualan
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/layouts_admin/sidebar.blade.php ENDPATH**/ ?>