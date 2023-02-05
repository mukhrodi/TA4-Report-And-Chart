<?php $__env->startSection('title'); ?>
Pembeli
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
        <div class="col-sm-1 mb-2">
          <a href=" <?php echo e(route('pembeli.create')); ?> " class="btn btn-block btn-primary">Tambah Data</a>
        </div>
      </div>
      <div class="row">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir </th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>Foto Ktp</th>
                <th style="width:30%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              ?>
              <?php $__currentLoopData = $pembeli; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($no++); ?></td>
                <td> <?php echo e($row->nama_lengkap); ?> </td>
                <td><?php echo e($row->username); ?></td>
                <td><?php echo e($row->jenis_kelamin); ?></td>
                <td><?php echo e($row->tempat_lahir); ?></td>
                <td><?php echo e($row->tgl_lahir); ?></td>
                <td><?php echo e($row->alamat); ?></td>
                <td>
                  <img src="<?php echo e(asset('upload/'.$row->foto_ktp)); ?>" class="thumbnail" width="100" alt="">
                </td>
                <td>
                  <form action=" <?php echo e(route('pembeli.destroy',$row->kd_pembeli)); ?> " method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                    <?php echo e(method_field('DELETE')); ?>

                    <?php echo csrf_field(); ?>
                    <a href="<?php echo e(route('pembeli.edit',$row->kd_pembeli)); ?> " class="btn btn-warning"> Edit</a>
                    <button type="submit" class="btn btn-danger"> Delete</button>
                  </form>
                </td>
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
<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/pembeli/index.blade.php ENDPATH**/ ?>