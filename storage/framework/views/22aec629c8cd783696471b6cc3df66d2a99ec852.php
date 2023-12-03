<?php $__env->startSection('title', 'Buat Tugas Baru - E-Learning Cakrawala (' . $room->name . ')'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/form.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tugas', 'nav-active'); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column container" id="container">
        <div class="flex-row container-row">
            <form action="<?php echo e(route('taskCreate', $room->id)); ?>" method="POST" class="flex-column container-form">
                <?php echo csrf_field(); ?>
                <div class="flex-column form-title">
                    <h3 class="poppins">Buat Tugas Baru Kelas <?php echo e($room->name); ?></h3>
                    <p class="montserrat">Isilah dengan teliti pada data-data di bawah ini!</p>
                </div>
                <?php if($errors->any()): ?>
                <div class="notif-warning flex-row montserrat">
                    <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                    <?php if($errors->has('name','type','release','deadline','description')): ?>
                        <span>Silahkan isi semua data yang diperlukan terlebih dahulu!</span>
                    <?php elseif($errors->has('type')): ?>
                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span>Silahkan pilih type tugas yang akan dibuat!</span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php elseif($errors->has('release')): ?>
                        <?php $__errorArgs = ['release'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php elseif($errors->has('deadline')): ?>
                        <?php $__errorArgs = ['deadline'];
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
                <?php if(session('warning')): ?>
                <div class="notif-warning flex-row montserrat">
                    <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                    <span><?php echo e(session('warning')); ?></span>
                </div>
                <?php endif; ?>
                <div class="flex-column form-input">
                    <div class="formel" id="input-star">
                        <input type="text" name="name" id="name" placeholder="Judul tugas" value="<?php echo e(old('name')); ?>">
                    </div>
                    <div class="formel" id="input-3dots">
                        <select name="type" id="type">
                            <option disabled <?php echo e(old('type') == null ? 'selected' : ''); ?>>Tipe Tugas</option>
                            <option <?php echo e(old('type') == 'Online Teks' ? 'selected' : ''); ?> value="Online Teks">Online Teks</option>
                            <option <?php echo e(old('type') == 'Upload File' ? 'selected' : ''); ?> value="Upload File">Upload File</option>
                            <option <?php echo e(old('type') == 'Keduanya' ? 'selected' : ''); ?> value="Keduanya">Keduanya</option>
                        </select>
                    </div>
                    <div class="formel flex-row">
                        <div class="formel" id="input-date">
                            <?php if(old('release') == null): ?>
                                <input type="text" onfocus="(this.type='datetime-local')" name="release" id="release" placeholder="Tanggal dibuka" min="<?php echo e(str_replace(' ','T', \Carbon\Carbon::now()->format('Y-m-d H:i'))); ?>">
                            <?php else: ?>
                                <input type="datetime-local" name="release" id="release" placeholder="Tanggal dibuka" value="<?php echo e(old('release')); ?>" min="<?php echo e(str_replace(' ','T', \Carbon\Carbon::now()->format('Y-m-d H:i'))); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="formel" id="input-date">
                            <?php if(old('deadline') == null): ?>
                                <input type="text" onfocus="(this.type='datetime-local')" name="deadline" id="deadline" placeholder="Tanggal ditutup" min="<?php echo e(str_replace(' ','T', \Carbon\Carbon::now()->format('Y-m-d H:i'))); ?>">
                            <?php else: ?>
                                <input type="datetime-local" name="deadline" id="deadline" placeholder="Tanggal ditutup" value="<?php echo e(old('deadline')); ?>" min="<?php echo e(str_replace(' ','T', \Carbon\Carbon::now()->format('Y-m-d H:i'))); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="formel" id="input-edit">
                        <textarea name="description" id="description" placeholder="Deskripsi tugas" cols="30" rows="10"><?php echo e(old('description')); ?></textarea>
                    </div>
                </div>
                <div class="formel small-btn-submit">
                    <button type="submit" class="poppins">Buat Tugas</button>
                </div>
            </form>
            <div class="container-illust">
                <img class="illust-center" src="<?php echo e(asset('img/illust-tugas.svg')); ?>" alt="">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\File Raffi\SEM 4\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/employee/tasks/create.blade.php ENDPATH**/ ?>