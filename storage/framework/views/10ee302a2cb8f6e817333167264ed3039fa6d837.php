<?php $__env->startSection('title'); ?>
Tambah Produk
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
                        <form class="form-horizontal" method="post" action="  <?php echo e(route('produk.update',$produk->kd_produk)); ?> " enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PUT')); ?>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?php echo e($errors->first('nama_produk') ? 'is-invalid' : ''); ?> " name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo e($produk->nama_produk); ?>">
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('nama_produk')); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_produk" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select name="kd_kategori" id="kd_kategori" class="form-control <?php echo e($errors->first('kd_kategori') ? 'is-invalid' : ''); ?>">
                                            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->kd_kategori); ?>" <?php echo e($row->kd_kategori == $produk->kd_kategori ? 'selected' : ''); ?>> <?php echo e($row->kategori); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('kd_kategori')); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control <?php echo e($errors->first('harga') ? 'is-invalid' : ''); ?> " name="harga" id="harga" placeholder="Harga" value="<?php echo e($produk->harga); ?>">
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('harga')); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gambar_produk" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <img src="<?php echo e(asset('upload/'.$produk->gambar_produk)); ?>" class="thumbnail mb-2" width="300" alt="">
                                        <input type="file" class="form-control <?php echo e($errors->first('gambar_produk') ? 'is-invalid' : ''); ?> " name="gambar_produk" id="gambar_produk">
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('gambar_produk')); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-block btn-primary">Update</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/produk/edit.blade.php ENDPATH**/ ?>