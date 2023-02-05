<?php $__env->startSection('title'); ?>
Transaksi
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
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="<?php echo e(route('transaksi.store')); ?> ">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kd_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                                    <div class="col-sm-9">
                                        <select name="kd_produk" id="kd_produk" class="form-control <?php echo e($errors->first('kd_produk') ? 'is-invalid' : ''); ?>">
                                            <option value=""> -Pilih- </option>
                                            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($p->kd_produk); ?>" data-harga="<?php echo e($p->harga); ?>"> <?php echo e($p->nama_produk); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('kd_produk')); ?>

                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="harga" value="">

                                <div class="form-group row">
                                    <label for="tgl_transaksi" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control <?php echo e($errors->first('tgl_transaksi') ? 'is-invalid' : ''); ?> " name="tgl_transaksi" id="tgl_transaksi" placeholder="Tanggal Transaksi" value="<?php echo e(old('tgl_transaksi')); ?>">
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('tgl_transaksi')); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control <?php echo e($errors->first('jumlah') ? 'is-invalid' : ''); ?> " name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo e(old('jumlah')); ?>" data-date-format="yyyy-mm-dd">
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('jumlah')); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bayar" class="col-sm-3 col-form-label">Total Bayar</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control <?php echo e($errors->first('bayar') ? 'is-invalid' : ''); ?> " name="bayar" id="bayar" placeholder="Total" value="<?php echo e(old('bayar')); ?>" readonly>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('bayar')); ?>

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

            <script>
                $('#kd_produk').change(function(e) {
                    var harga = $(this).find(':selected').data('harga')
                    $('#harga').val(harga);
                });

                $('#jumlah').change(function(e) {
                    var jumlah = $(this).val();
                    var harga = $('#harga').val();

                    var total = harga * jumlah;

                    $('#bayar').val(total);

                });
            </script>

            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/transaksi/create.blade.php ENDPATH**/ ?>