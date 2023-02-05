<?php $__env->startSection('title'); ?>
Tambah kategori
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <a href=" <?php echo e(route('kategori.index')); ?> " class="btn btn-block btn-success">Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="  <?php echo e(route('kategori.store')); ?> " enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control <?php echo e($errors->first('kategori') ? 'is-invalid' : ''); ?> " name="kategori" id="kategori" placeholder="Nama Kategori" value="<?php echo e(old('kategori')); ?>">
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('kategori')); ?>

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
<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/kategori/create.blade.php ENDPATH**/ ?>