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
        <div class="d-flex" style="justify-content: flex-end">
            <a href="/admin/transaksi/cetak_pdf" class="btn btn-info">print</a>
        </div>
        <br>
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Trans_id</th>
              <th>Tgl Transaksi</th>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Action</th>
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
              <td>
                <?php if($row->status == 'menunggu'): ?>
                <form action=" <?php echo e(route('transaksiadmin.update',$row->kd_transaksi)); ?> " method="post" onsubmit="return confirm('Apakah anda yakin ?')">
                  <?php echo e(method_field('PUT')); ?>

                  <?php echo csrf_field(); ?>
                  <button type="submit" class="btn btn-primary"> Konfirmasi</button>
                </form>
                <?php endif; ?>
              </td>
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

<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kigamekun/Downloads/CRUD Data Barang (1)/CRUD Data Barang/resources/views/transaksi_admin/index.blade.php ENDPATH**/ ?>