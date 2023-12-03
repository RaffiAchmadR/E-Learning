<?php $__env->startSection('title', 'Buat Student Baru - E-Learning Cakrawala'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/form.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column container" id="container">
        <div class="flex-row container-row">
            <form action="<?php echo e(route('studentCreate')); ?>" method="POST" class="flex-column container-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="flex-column form-title">
                    <h3 class="poppins">Buat Student Baru</h3>
                    <p class="montserrat">Isilah dengan teliti pada data-data pembuatan akun student di bawah ini!</p>
                </div>
                <?php if($errors->any()): ?>
                <div class="notif-warning flex-row montserrat">
                    <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                    <?php if($errors->has('fname','address','room','gender','birthday')): ?>
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
                    <?php else: ?>
                        <span>Silahkan isi semua data yang diperlukan terlebih dahulu!</span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="flex-column form-input">
                    <div class="formel" id="input-id">
                        <input type="text" name="username" id="username" placeholder="Username" value="<?php echo e(old('username')); ?>">
                    </div>
                    <div class="formel" id="input-pass">
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="formel flex-row">
                        <div class="formel" id="input-user">
                            <input type="text" name="fname" id="fname" placeholder="Nama depan" value="<?php echo e(old('fname')); ?>">
                        </div>
                        <div class="formel" id="input-user">
                            <input type="text" name="lname" id="lname" placeholder="Nama belakang" value="<?php echo e(old('lname')); ?>">
                        </div>
                    </div>
                    <div class="formel" id="input-status">
                        <select name="room" id="room">
                            <?php if(count($room) == 0): ?>
                                <option disabled selected>Tidak ada kelas yang tersedia</option>
                            <?php else: ?>
                                <option disabled <?php echo e(old('room') == null ? 'selected' : ''); ?>>Pilih ruangan kelas</option>
                                <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('room') == $data->id ? 'selected' : ''); ?> value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="formel flex-row">
                        <div class="formel" id="input-gender">
                            <select name="gender" id="gender">
                                <option disabled <?php echo e(old('gender') == null ? 'selected' : ''); ?>>Jenis Kelamin</option>
                                <option <?php echo e(old('gender') == 'Laki-laki' ? 'selected' : ''); ?> value="Laki-laki">Laki-laki</option>
                                <option <?php echo e(old('gender') == 'Perempuan' ? 'selected' : ''); ?> value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="formel" id="input-date">
                            <?php if(old('birthday') == null): ?>
                                <input type="text" onfocus="(this.type='date')" name="birthday" id="birthday" placeholder="Tanggal lahir">
                            <?php else: ?>
                                <input type="date" name="birthday" id="birthday" placeholder="Tanggal lahir" value="<?php echo e(old('birthday')); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="formel" id="input-3dots">
                        <input type="text" onfocus="(this.type='file')" accept="image/*" name="photo" id="photo" placeholder="Upload foto (opsional)">
                    </div>
                    <div class="formel" id="input-address">
                        <textarea name="address" id="address" placeholder="Alamat" cols="30" rows="10"><?php echo e(old('address')); ?></textarea>
                    </div>
                </div>
                <div class="formel small-btn-submit">
                    <button type="submit" class="poppins" onclick="(document.getElementById('photo').type='file')">Buat Student</button>
                </div>
            </form>
            <div class="container-illust">
                <img class="illust-center" src="<?php echo e(asset('img/illust-settings-students.svg')); ?>" alt="" style="right: 15px; max-width: 625px;">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\File Raffi\SEM 4\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/admin/account/student/create.blade.php ENDPATH**/ ?>