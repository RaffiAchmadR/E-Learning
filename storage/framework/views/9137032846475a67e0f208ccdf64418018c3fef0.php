<?php $__env->startSection('title', 'Daftar Tugas (' . Auth::user()->employee->name . ') - E-Learning Cakrawala'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tugas', 'nav-active'); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column" id="container-dashboard">
        <div class="flex-row container-title">
            <h1 class="poppins">Daftar Tugas</h1>
        </div>
        <div class="container-content flex-row">
            <div class="container-mapel flex-column" style="border-width: 0; padding: 0; gap:30px;">
                <?php if(!$hasRoom): ?>
                    <div class="notif-warning flex-row montserrat">
                        <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                        <span>Akun anda (<?php echo e(Auth::user()->employee->name); ?>) tidak terdaftar pada kelas manapun silahkan hubungin admin untuk mendaftarkan anda pada suatu kelas.</span>
                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = array_keys($task); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex-column container-task" style="align-items: flex-start; gap:10px; width:100%;">
                            <div class="flex-row task-title" style="gap: 15px;">
                                <h2 class="poppins" style="margin: 0;font-size: 26px;font-weight: 600;font-style: normal;color: #212121;"><?php echo e($room); ?></h2>
                                <?php if(Auth::user()->employee->status == 'Tenaga Didik'): ?>
                                <a href="<?php echo e(route('taskCreate', $roomKey[$room])); ?>" class="btn btn-primary poppins" style="background-color: #52B788; border-color: #52B788;font-weight: 600;color: #FBFEFD;">+ Tugas</a>
                                <?php endif; ?>
                            </div>
                            <?php if(count($task[$room]) >= 1): ?>
                                <div class="row row-cols-1 row-cols-md-4 g-4" style="width: 100%">
                                    <?php $__currentLoopData = $task[$room]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col">
                                            <<?php echo e(Auth::user()->employee->status != 'Tenaga Didik' ? 'a' : 'div'); ?> class="card h-100 <?php echo e(Auth::user()->employee->status != 'Tenaga Didik' ? 'hover-shadow' : ''); ?>" <?php echo e(Auth::user()->employee->status != 'Tenaga Didik' ? 'href=' . route('taskDetail', $assignment->id) : ''); ?> style="text-decoration: none; color: #212121;">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <?php echo e(Str::limit($assignment->name, 25, $end='...')); ?>

                                                        <?php if(time() > strtotime($assignment->release) and time() < strtotime($assignment->deadline)): ?>
                                                            <span class="badge bg-warning text-dark">Berjalan</span>
                                                        <?php elseif(time() < strtotime($assignment->release)): ?>
                                                            <span class="badge bg-danger">Tertunda</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-success">Selesai</span>
                                                        <?php endif; ?>
                                                    </h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        <?php if(time() > strtotime($assignment->release) and time() < strtotime($assignment->deadline)): ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInDays($assignment->deadline) >= 1): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInDays($assignment->deadline)); ?> hari
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInHours($assignment->deadline) >= 1): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInHours($assignment->deadline) - (\Carbon\Carbon::now()->diffInDays($assignment->deadline) * 24)); ?> jam
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInMinutes($assignment->deadline) >= 1 and \Carbon\Carbon::now()->diffInDays($assignment->deadline) == 0): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInMinutes($assignment->deadline) - (\Carbon\Carbon::now()->diffInHours($assignment->deadline) * 60)); ?> menit
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInSeconds($assignment->deadline) >= 1 and \Carbon\Carbon::now()->diffInHours($assignment->deadline) == 0): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInSeconds($assignment->deadline) - (\Carbon\Carbon::now()->diffInMinutes($assignment->deadline) * 60)); ?> detik
                                                            <?php endif; ?>
                                                            lagi
                                                        <?php elseif(time() < strtotime($assignment->release)): ?>
                                                            Dibuka
                                                            <?php if(\Carbon\Carbon::now()->diffInDays($assignment->release) >= 1): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInDays($assignment->release)); ?> hari
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInHours($assignment->release) >= 1): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInHours($assignment->release) - (\Carbon\Carbon::now()->diffInDays($assignment->release) * 24)); ?> jam
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInMinutes($assignment->release) >= 1 and \Carbon\Carbon::now()->diffInDays($assignment->release) == 0): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInMinutes($assignment->release) - (\Carbon\Carbon::now()->diffInHours($assignment->release) * 60)); ?> menit
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInSeconds($assignment->release) >= 1 and \Carbon\Carbon::now()->diffInHours($assignment->release) == 0): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInSeconds($assignment->release) - (\Carbon\Carbon::now()->diffInMinutes($assignment->release) * 60)); ?> detik
                                                            <?php endif; ?>
                                                            lagi
                                                        <?php else: ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInDays($assignment->deadline) >= 1): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInDays($assignment->deadline)); ?> hari
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInHours($assignment->deadline) >= 1): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInHours($assignment->deadline) - (\Carbon\Carbon::now()->diffInDays($assignment->deadline) * 24)); ?> jam
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInMinutes($assignment->deadline) >= 1 and \Carbon\Carbon::now()->diffInDays($assignment->deadline) == 0): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInMinutes($assignment->deadline) - (\Carbon\Carbon::now()->diffInHours($assignment->deadline) * 60)); ?> menit
                                                            <?php endif; ?>
                                                            <?php if(\Carbon\Carbon::now()->diffInSeconds($assignment->deadline) >= 1 and \Carbon\Carbon::now()->diffInHours($assignment->deadline) == 0): ?>
                                                                <?php echo e(\Carbon\Carbon::now()->diffInSeconds($assignment->deadline) - (\Carbon\Carbon::now()->diffInMinutes($assignment->deadline) * 60)); ?> detik
                                                            <?php endif; ?>
                                                            yang lalu
                                                        <?php endif; ?>
                                                    </h6>
                                                    <p class="card-text" style="min-width: 100%; text-align: justify;"><?php echo e($assignment->description); ?></p>
                                                    <?php if(Auth::user()->employee->status == 'Tenaga Didik'): ?>
                                                        <div class="d-grid gap-1 d-md-flex justify-content-md-start" id="button-group">
                                                            <a href="<?php echo e(route('taskDetail',$assignment->id)); ?>" class="btn btn-success me-md-2" type="button">Detail</a>
                                                            <a href="<?php echo e(route('taskEdit',$assignment->id)); ?>" class="btn btn-warning me-md-2" type="button">Edit</a>
                                                            <form action="<?php echo e(route('taskDelete',$assignment->id)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('delete'); ?>
                                                                <button class="btn btn-danger" type="submit">Delete</button>
                                                            </form>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </<?php echo e(Auth::user()->employee->status != 'Tenaga Didik' ? 'a' : 'div'); ?>>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php else: ?>
                                <span class="montserrat" style="margin-top: -5px">Tidak ada tugas pada kelas ini</span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\Transfer File Raffi\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/employee/tasks/index.blade.php ENDPATH**/ ?>