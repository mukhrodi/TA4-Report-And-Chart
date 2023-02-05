<?php $__env->startSection('title'); ?>
Data Transaksi Masuk
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/css/datepicker.css">
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
      <div>
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Trans_id</th>
              <th>Tgl Transaksi</th>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th style="width:30%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            ?>
            <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($no++); ?>.</td>
              <td> <?php echo e($row->kd_transaksi); ?> </td>
              <td><?php echo e($row->produk->nama_produk); ?></td>
              <td><?php echo e($row->tgl_transaksi); ?></td>
              <td><?php echo e($row->jumlah); ?></td>
              <td><?php echo e($row->bayar); ?></td>
              <td> <?php echo e($row->status); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('js'); ?>
  <script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/js/bootstrap-datepicker.js"></script>
  <script>
    $('#start_date').click(function(e) {
      $('#start_date').datepicker('show');
    });
    $('#end_date').click(function(e) {
      $('#end_date').datepicker('show');
    });
  </script>
  <script>
    setTimeout(() => {
      $('#msg').alert('close')
    }, 2000);
  </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/transaksi/index.blade.php ENDPATH**/ ?>