<?php $__env->startSection('title', 'Setting E-Learning Cakrawala (Admin ' . Auth::user()->id . ')'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/setting.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('settings', 'nav-active'); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column" id="container-setting">
        <div class="flex-row container-title">
            <h1 class="poppins">Pengaturan</h1>
        </div>
        <?php if(Session::has('error')): ?>
            <div class="notif-danger flex-row montserrat">
                <img src="<?php echo e(asset('img/icon/notif-danger.svg')); ?>" alt="danger image">
                <span><?php echo e(Session::get('error')); ?></span>
            </div>
        <?php endif; ?>
        <?php if(Session::has('warning')): ?>
            <div class="notif-warning flex-row montserrat">
                <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                <span><?php echo e(Session::get('warning')); ?></span>
            </div>
        <?php endif; ?>
        <?php if(Session::has('success')): ?>
            <div class="notif-success flex-row montserrat">
                <img src="<?php echo e(asset('img/icon/notif-success.svg')); ?>" alt="success image">
                <span><?php echo e(Session::get('success')); ?></span>
            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
        <div class="notif-warning flex-row montserrat">
            <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
            <?php if($errors->has('username','password')): ?>
                <span>Silahkan isi username dan password terlebih dahulu!</span>
            <?php else: ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span><?php echo e($error); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="flex-row container-data">
            <div class="flex-column container-preview">
                <img src="<?php echo e(asset('img/photo/default-admin.jpg')); ?>" alt="foto admin <?php echo e(Auth::user()->username); ?>">
                <h2 class="poppins">Admin <?php echo e(Auth::user()->username); ?></h2>
                <span class="montserrat">Admin tidak memiliki foto profil, hanya dapat menggunakan foto <b>default</b></span>
            </div>
            <form class="flex-column container-input" action="<?php echo e(route('adminEdit', Auth::user()->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <h2 class="poppins">Data Admin</h2>
                <div class="flex-row container-question">
                    <span class="montserrat question">Username</span>
                    <span class="montserrat question-mark">:</span>
                    <div class="formel" id="input-id">
                        <input type="text" name="username" id="username" placeholder="Username" value="<?php echo e(old('username') != null ? old('username') : Auth::user()->username); ?>">
                    </div>
                </div>
                <div class="flex-row container-question">
                    <span class="montserrat question">Ganti password</span>
                    <span class="montserrat question-mark">:</span>
                    <div class="formel" id="input-pass">
                        <input type="password" name="password" id="password" placeholder="Ganti password? (opsional)">
                    </div>
                </div>
                <div class="formel small-btn-submit">
                    <button type="submit" class="poppins">Simpan</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\Transfer File Raffi\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/admin/setting.blade.php ENDPATH**/ ?>