<?php $__env->startSection('title'); ?>
Barang Masuk
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      <?php if(session('status')): ?>
      <div class="alert alert-success fade show" role="alert" id="msg">
        <?php echo e(session('status')); ?>

      </div>
      <?php endif; ?>
      <div class="row mb-4">
        <div class="col-sm-2 mb-2">
          <a href=" <?php echo e(route('brgmasuk.create')); ?> " class="btn btn-block btn-primary">Input Barang Masuk</a>
        </div>
      </div>
      <div class="row">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Tgl Transaksi</th>
                <th>Produk</th>
                <th>Qty Masuk</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $no = 1;
              ?>
              <?php $__currentLoopData = $barang_masuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($no++); ?></td>
                <td> <?php echo e($row->tgl_transaksi); ?> </td>
                <td> <?php echo e($row->produk->nama_produk); ?> </td>
                <td> <?php echo e($row->qty); ?> </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('js'); ?>
  <script>
    setTimeout(() => {
      $('#msg').alert('close')
    }, 2000);
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/barang_masuk/index.blade.php ENDPATH**/ ?>