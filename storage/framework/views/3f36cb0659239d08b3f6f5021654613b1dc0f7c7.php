<?php $__env->startSection('title', 'Setting E-Learning Cakrawala (' . Auth::user()->employee->name . ')'); ?>

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
                <?php if($errors->has('fname','address','salary','tenure')): ?>
                    <span>Silahkan isi semua data yang diperlukan terlebih dahulu!</span>
                <?php elseif($errors->has('username')): ?>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php elseif($errors->has('phone')): ?>
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php elseif($errors->has('password')): ?>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php elseif($errors->has('photo')): ?>
                    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="flex-row container-data">
            <div class="flex-column box-container">
                <div class="flex-column container-preview" style="border-radius: 5px;border: 1px solid #DDDDDD; padding-bottom:10px; gap:5px;">
                    <img src="<?php echo e(Auth::user()->employee->photo != null ? asset('img/photo/' . Auth::user()->employee->photo) : asset('img/photo/default.jpg')); ?>" alt="foto <?php echo e(Auth::user()->employee->name); ?>" style="border-bottom-left-radius: 0;border-bottom-right-radius: 0;">
                    <h2 class="poppins"><?php echo e(Auth::user()->employee->name); ?></h2>
                    <p class="montserrat"><?php echo e(Auth::user()->employee->status); ?></p>
                    <p class="montserrat"><?php echo e(Auth::user()->employee->phone); ?></p>
                    <p class="montserrat" style="padding: 0 10px;"><?php echo e(Auth::user()->employee->address); ?></p>
                </div>
                <?php if(Auth::user()->employee->photo == null): ?>
                    <span class="notif-warning montserrat">Anda tidak memiliki foto profil, untuk saat ini akan menggunakan foto <b>default</b> dari sistem.</span>
                <?php endif; ?>
            </div>
            <form class="flex-column container-input" action="<?php echo e(route('setting')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <h2 class="poppins">Biodata Diri</h2>
                <div class="flex-row container-question">
                    <span class="montserrat question">Nama Lengkap</span>
                    <span class="montserrat question-mark">:</span>
                    <div class="formel" id="input-id">
                        <input type="text" name="name" id="name" placeholder="Nama lenkap" value="<?php echo e(old('name') != null ? old('name') : Auth::user()->employee->name); ?>">
                    </div>
                </div>
                <div class="flex-row container-question">
                    <span class="montserrat question">Nomor HP</span>
                    <span class="montserrat question-mark">:</span>
                    <div class="formel" id="input-phone">
                        <input type="text" name="phone" id="phone" placeholder="Nomor HP" value="<?php echo e(old('phone') != null ? old('phone') : Auth::user()->employee->phone); ?>">
                    </div>
                </div>
                <div class="flex-row container-question" style="align-items: flex-start">
                    <span class="montserrat question">Alamat</span>
                    <span class="montserrat question-mark">:</span>
                    <div class="formel" id="input-address">
                        <textarea name="address" id="address" placeholder="Alamat" cols="30" rows="10"><?php echo e(old('address') != null ? old('address') : Auth::user()->employee->address); ?></textarea>
                    </div>
                </div>
                <div class="flex-row container-question">
                    <span class="montserrat question">Foto</span>
                    <span class="montserrat question-mark">:</span>
                    <div class="formel" id="input-3dots">
                        <input type="text" onfocus="(this.type='file')" accept="image/*" name="photo" id="photo" placeholder="Ganti foto (opsional)">
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
                    <button type="submit" class="poppins" onclick="(document.getElementById('photo').type='file')">Simpan</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\Transfer File Raffi\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/employee/setting.blade.php ENDPATH**/ ?>