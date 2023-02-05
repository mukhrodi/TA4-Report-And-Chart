<?php $__env->startSection('title'); ?>
Tambah User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-1 mb-2">
            <a href=" <?php echo e(route('pembeli.index')); ?> " class="btn btn-block btn-success">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- form start -->
            <form class="form-horizontal" method="post" action="  <?php echo e(route('pembeli.store')); ?> " enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo e($errors->first('nama_lengkap') ? 'is-invalid' : ''); ?> " name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo e(old('nama_lengkap')); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('nama_lengkap')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select id="jenis_kelamin" class="form-control <?php echo e($errors->first('jenis_kelamin') ? 'is-invalid' : ''); ?> " name="jenis_kelamin">
                      <option value="laki-laki">Laki-Laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('jenis_kelamin')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo e($errors->first('tempat_lahir') ? 'is-invalid' : ''); ?> " name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo e(old('tempat_lahir')); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('tempat_lahir')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control <?php echo e($errors->first('tgl_lahir') ? 'is-invalid' : ''); ?> " name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo e(old('tgl_lahir')); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('tgl_lahir')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo e($errors->first('username') ? 'is-invalid' : ''); ?> " name="username" id="username" placeholder="username" value="<?php echo e(old('username')); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('username')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control <?php echo e($errors->first('password') ? 'is-invalid' : ''); ?> " id="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('password')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control <?php echo e($errors->first('alamat') ? 'is-invalid' : ''); ?> " id="alamat" name="alamat" placeholder="alamat"><?php echo e(old('alamat')); ?>

                    </textarea>
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('password')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control <?php echo e($errors->first('foto_ktp') ? 'is-invalid' : ''); ?> " id="foto_ktp" name="foto_ktp" value="<?php echo e(old('foto_ktp')); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('foto_ktp')); ?>

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
<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/pembeli/create.blade.php ENDPATH**/ ?>