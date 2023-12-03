<?php $__env->startSection('title', 'Buat Kelas Baru - E-Learning Cakrawala'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/form.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('kelas', 'nav-active'); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column container" id="container">
        <div class="flex-row container-row">
            <form action="<?php echo e(route('roomCreate')); ?>" method="POST" class="flex-column container-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="flex-column form-title">
                    <h3 class="poppins">Buat Kelas Baru</h3>
                    <p class="montserrat">Isilah dengan teliti pada data-data pembuatan ruangan kelas di bawah ini!</p>
                </div>
                <?php if($errors->any()): ?>
                <div class="notif-warning flex-row montserrat">
                    <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                    <?php if($errors->has('name','teacher_id','year','description')): ?>
                        <span>Silahkan isi semua data yang diperlukan terlebih dahulu!</span>
                    <?php elseif($errors->has('name')): ?>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php elseif($errors->has('teacher_id')): ?>
                        <?php $__errorArgs = ['teacher_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php elseif($errors->has('year')): ?>
                        <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php elseif($errors->has('description')): ?>
                        <?php $__errorArgs = ['description'];
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
                <div class="flex-column form-input">
                    <div class="formel" id="input-star">
                        <input type="text" name="name" id="name" placeholder="Nama kelas" value="<?php echo e(old('name')); ?>">
                    </div>
                    <div class="formel flex-row">
                        <div class="formel" id="input-user">
                            <select name="teacher_id" id="teacher_id">
                                <?php if(count($data) == 0): ?>
                                    <option disabled selected>Tidak ada tenaga didik</option>
                                <?php else: ?>
                                    <option disabled <?php echo e(old('teacher_id') == null ? 'selected' : ''); ?>>Wali Kelas</option>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old('teacher_id') == $teacher->nip ? 'selected' : ''); ?> value="<?php echo e($teacher->nip); ?>"><?php echo e($teacher->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="formel" id="input-date-square">
                            <?php if(old('year') == null): ?>
                                <input type="text" onfocus="(this.type='month')" name="year" id="year" placeholder="Tahun ajaran">
                            <?php else: ?>
                                <input type="month" name="year" id="year" placeholder="Tahun ajaran" value="<?php echo e(old('year')); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="formel" id="input-3dots">
                        <input type="text" onfocus="(this.type='file')" accept="image/*" name="photo" id="photo" placeholder="Upload foto (opsional)">
                    </div>
                    <div class="formel" id="input-edit">
                        <textarea name="description" id="description" placeholder="Deskripsi" cols="30" rows="10"><?php echo e(old('description')); ?></textarea>
                    </div>
                </div>
                <div class="formel small-btn-submit">
                    <button type="submit" class="poppins" onclick="(document.getElementById('photo').type='file')">Buat Kelas</button>
                </div>
            </form>
            <div class="container-illust">
                <img class="illust-center" src="<?php echo e(asset('img/illust-kelas.svg')); ?>" alt="" style="right: 15px; max-width: 625px;">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\File Raffi\SEM 4\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/admin/room/create.blade.php ENDPATH**/ ?>