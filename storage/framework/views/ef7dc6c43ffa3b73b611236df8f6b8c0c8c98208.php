<?php $__env->startSection('title'); ?>
    Tambah Supplier
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/css/datepicker.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <a href=" <?php echo e(route('transaksi_masuk.index')); ?> " class="btn btn-block btn-success">Kembali</a> 
                    </div>
              </div> 
              <div class="row">
                 <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="<?php echo e(route('transaksi_masuk.store')); ?> "  >
                            <?php echo csrf_field(); ?>
                          <div class="card-body">
                            <div class="form-group row">
                                <label for="kd_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                                <div class="col-sm-9">
                                <select name="kd_produk" id="kd_produk" class="form-control <?php echo e($errors->first('kd_produk') ? 'is-invalid' : ''); ?>" >
                                    <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($p->kd_produk); ?>"> <?php echo e($p->nama_produk); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('kd_produk')); ?>

                                </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="nama_supplier" class="col-sm-3 col-form-label">Nama Suplier</label>
                                <div class="col-sm-9">
                                <select name="kd_supplier" id="kd_supplier" class="form-control <?php echo e($errors->first('kd_supplier') ? 'is-invalid' : ''); ?>" >
                                    <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($s->kd_supplier); ?>"> <?php echo e($s->nama_supplier); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('kd_supplier')); ?>

                                </div>
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <label for="tgl_transaksi" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control <?php echo e($errors->first('tgl_transaksi') ? 'is-invalid' : ''); ?> " name="tgl_transaksi" id="tgl_transaksi" placeholder="Tanggal Transaksi" value="<?php echo e(old('tgl_transaksi')); ?>"  data-date-format="yyyy-mm-dd" readonly >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('tgl_transaksi')); ?>

                                </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control <?php echo e($errors->first('jumlah') ? 'is-invalid' : ''); ?> " name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo e(old('jumlah')); ?>"  data-date-format="yyyy-mm-dd" >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('jumlah')); ?>

                                </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control <?php echo e($errors->first('harga') ? 'is-invalid' : ''); ?> " name="harga" id="harga" placeholder="Harga" value="<?php echo e(old('harga')); ?>"  data-date-format="yyyy-mm-dd" >
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('harga')); ?>

                                </div>
                                </div>
                              </div>

                            <div class="form-group row">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-block btn-primary">Save</button>
                                </div>
                            </div>
                         
                        </form>
                </div>
            </div>    
   </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script>
    $('#tgl_transaksi').click(function (e) { 
        $('#tgl_transaksi').datepicker('show');
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/transaksi_masuk/create.blade.php ENDPATH**/ ?>