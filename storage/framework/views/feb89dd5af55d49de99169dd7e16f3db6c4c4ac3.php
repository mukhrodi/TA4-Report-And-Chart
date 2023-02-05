<?php $__env->startSection('title'); ?>
Tambah Transaksi Barang Masuk
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <a href=" <?php echo e(route('produk.index')); ?> " class="btn btn-block btn-success">Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="  <?php echo e(route('brgmasuk.store')); ?> " enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="nama_produk" class="col-sm-2 col-form-label">Pilih Produk</label>
                                    <div class="col-sm-10">
                                        <select name="kd_produk" id="kd_produk" class="form-control <?php echo e($errors->first('kd_produk') ? 'is-invalid' : ''); ?>">
                                            <option value=""> -Pilih- </option>
                                            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->kd_produk); ?>"> <?php echo e($row->nama_produk); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('kd_produk')); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="qty" class="col-sm-2 col-form-label">Qty Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control <?php echo e($errors->first('qty') ? 'is-invalid' : ''); ?> " name="qty" id="qty" placeholder="masukkan qty" value="<?php echo e(old('qty')); ?>">
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('qty')); ?>

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
<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/barang_masuk/create.blade.php ENDPATH**/ ?>