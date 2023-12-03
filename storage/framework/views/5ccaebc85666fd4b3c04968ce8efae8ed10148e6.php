<?php $__env->startSection('title', 'Selamat Datang di E-Learning Cakrawala'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/form.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column container vh100" id="container">
        <div class="flex-column container-title">
            <h1 class="montserrat">e-Learning</h1>
            <h2 class="montserrat">SMAN 15 Cakrawala</h2>
        </div>
        <div class="flex-row container-row">
            <form action="<?php echo e(url('login')); ?>" method="POST" class="flex-column container-form">
                <?php echo csrf_field(); ?>
                <div class="flex-column form-title">
                    <h3 class="poppins">Login</h3>
                    <p class="montserrat">Selamat datang di web e-learning SMAN 15 Cakrawala. E-Learning adalah konsep pendidikan yang memanfaatkan Teknologi Informasi dan Komunikasi dalam proses belajar mengajar.</p>
                </div>
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
                <?php if(Session::has('error')): ?>
                <div class="notif-danger flex-row montserrat">
                    <img src="<?php echo e(asset('img/icon/notif-danger.svg')); ?>" alt="danger image">
                    <span><?php echo e(Session::get('error')); ?></span>
                </div>
                <?php endif; ?>
                <div class="flex-column form-input">
                    <div class="formel" id="input-id">
                        <input type="number" name="username" id="id" value="<?php echo e(old('username')); ?>" placeholder="NIP/NIS">
                    </div>
                    <div class="formel" id="input-pass">
                        <input type="password" name="password" id="password" value="<?php echo e(old('password')); ?>" placeholder="Password">
                    </div>
                    <div class="formel flex-row">
                        <div class="remember flex-row">
                            <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label for="remember" class="montserrat link">Ingat saya</label>
                        </div>
                        <a href="#" class="montserrat link"> Lupa password?</a>
                    </div>
                </div>
                <div class="formel">
                    <button type="submit" class="poppins">Login</button>
                </div>
            </form>
            <div class="container-illust">
                <img src="<?php echo e(asset('img/illust-index.svg')); ?>" alt="">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\Transfer File Raffi\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/index.blade.php ENDPATH**/ ?>