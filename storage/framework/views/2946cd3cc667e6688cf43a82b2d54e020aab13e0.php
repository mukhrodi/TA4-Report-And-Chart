<?php $__env->startSection('title'); ?>
Edit User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-1 mb-2">
            <a href=" <?php echo e(route('user.index')); ?> " class="btn btn-block btn-success">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- form start -->
            <form class="form-horizontal" method="post" action="  <?php echo e(route('user.update',$user->id)); ?> ">
              <?php echo csrf_field(); ?>
              <?php echo e(method_field('PUT')); ?>

              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo e($errors->first('name') ? 'is-invalid' : ''); ?> " name="name" id="name" placeholder="Nama" value="<?php echo e($user->name); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('name')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo e($errors->first('username') ? 'is-invalid' : ''); ?> " name="username" id="username" placeholder="username" value="<?php echo e($user->username); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('username')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select id="jenis_kelamin" class="form-control <?php echo e($errors->first('jenis_kelamin') ? 'is-invalid' : ''); ?> " name="jenis_kelamin">
                      <option value="laki-laki" <?php echo e($user->level == 'laki-laki' ? 'selected' : ''); ?>>Laki-Laki</option>
                      <option value="perempuan" <?php echo e($user->level == 'perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('jenis_kelamin')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control <?php echo e($errors->first('email') ? 'is-invalid' : ''); ?> " id="email" name="email" placeholder="Email" value="<?php echo e($user->email); ?>">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('email')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control <?php echo e($errors->first('password') ? 'is-invalid' : ''); ?> " id="password" name="password" placeholder="Password" value="">
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('password')); ?>

                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Level</label>
                  <div class="col-sm-10">
                    <select id="level" class="form-control <?php echo e($errors->first('level') ? 'is-invalid' : ''); ?> " name="level">
                      <option value="admin" <?php echo e($user->level == 'admin' ? 'selected' : ''); ?>>Administrator</option>
                      <option value="staff" <?php echo e($user->level == 'staff' ? 'selected' : ''); ?>>Staff</option>
                    </select>
                    <div class="invalid-feedback">
                      <?php echo e($errors->first('level')); ?>

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
<?php echo $__env->make('layouts_admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp74\htdocs\penjualanapp\resources\views/user/edit.blade.php ENDPATH**/ ?>