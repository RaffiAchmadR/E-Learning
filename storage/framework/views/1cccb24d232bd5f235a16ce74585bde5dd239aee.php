<?php $__env->startSection('title', 'Dashboard E-Learning Cakrawala (' . Auth::user()->employee->name . ')'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dashboard', 'nav-active'); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column" id="container-dashboard">
        <div class="flex-row container-title">
            <h1 class="poppins">Dashboard</h1>
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
        <?php if(!$hasRoom): ?>
            <div class="notif-warning flex-row montserrat">
                <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                <span>Akun anda (<?php echo e(Auth::user()->employee->name); ?>) tidak terdaftar pada kelas manapun silahkan hubungin admin untuk mendaftarkan anda pada suatu kelas.</span>
            </div>
        <?php else: ?>
            <div class="container-content flex-row">
                <div class="container-mapel flex-column">
                    <div class="title-section flex-row">
                        <button type="button" class="btn btn-primary" style="opacity: 0; cursor:default;">Primary</button>
                        <h2 class="poppins">Daftar Kelas</h2>
                        <button type="button" class="btn btn-primary" style="opacity: 0; cursor:default;">Primary</button>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col">
                                <a href="<?php echo e(route('roomDetail', $data->id)); ?>" class="card h-100 hover-shadow" style="text-decoration: none; color: #212121;">
                                    <img src="<?php echo e($data->photo == null ? asset('img/room/default.jpg') : asset('img/room/' . $data->photo)); ?>" class="card-img-top" alt="foto kelas" style="height: 200px;object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($data->name); ?></h5>
                                        <p class="card-text" style="text-align: justify"><?php echo e($data->description); ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="flex-column container-assignment">
                    <div class="title-section">
                        <h2 class="poppins">List Tugas</h2>
                    </div>
                    <?php if(isset($room)): ?>
                        <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="list-group montserrat" id="list-admin">
                                <li class="list-group-item active d-flex justify-content-between align-items-center" aria-current="true" style="background-color: #023047;border-color: #023047;font-weight: 500;">
                                    <?php echo e($data->name); ?>

                                    <?php if(Auth::user()->employee->status == 'Tenaga Didik'): ?>
                                        <a href="<?php echo e(route('taskCreate', $data->id)); ?>" class="btn btn-warning">+ Task</a>
                                    <?php else: ?>
                                        <div class=""></div>
                                    <?php endif; ?>
                                </li>
                            <?php $__empty_1 = true; $__currentLoopData = $data->assignment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="list-item list-group-item d-flex justify-content-between align-items-center">
                                    <div class="list-detail flex-column" style="justify-content: normal; gap:5px; align-items: flex-start;">
                                        <span class="flex-row" style="justify-content: normal; gap:5px">
                                            <?php echo e(Str::limit($assignment->name, 12, $end='...')); ?>

                                            <?php if(time() > strtotime($assignment->release) and time() < strtotime($assignment->deadline)): ?>
                                                <span class="badge bg-warning text-dark">Berjalan</span>
                                            <?php elseif(time() < strtotime($assignment->release)): ?>
                                                <span class="badge bg-danger">Tertunda</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">Selesai</span>
                                            <?php endif; ?>
                                        </span>
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
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end" id="button-group">
                                        <?php if(Auth::user()->employee->status == 'Tenaga Didik'): ?>
                                            <a href="<?php echo e(route('taskEdit', $assignment->id)); ?>" class="btn btn-warning me-md-2" type="button">Edit</a>
                                            <form action="<?php echo e(route('taskDelete', $assignment->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('taskDetail', $assignment->id)); ?>" class="btn btn-success me-md-2" type="button">Check</a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="list-item list-group-item d-flex justify-content-between align-items-center">
                                    Belum ada tugas yang diberikan
                                </li>
                            <?php endif; ?>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\Transfer File Raffi\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/employee/dashboard.blade.php ENDPATH**/ ?>