<?php $__env->startSection('title', 'Kelas ' . $room->name . ' E-Learning Cakrawala'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/kelas.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <style>
        #button-group {
            /* addition */
            transition: 0.35s;
            /* style */
            opacity: 0;
        }
        tr:hover #button-group {
            /* style */
            opacity: 100;
        }
        .container-notif {
            /* size */
            width: 100%;
            /* layout */
            box-sizing: border-box; 
            padding: 20px 75px; 
        }
        @media  only screen and (max-width: 720px) {
            .container-notif {
                padding: 20px 15px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('kelas', 'nav-active'); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column" id="container-kelas">
        <?php if(!$hasRoom): ?>
            <div class="container-notif">
                <div class="notif-danger flex-row montserrat">
                    <img src="<?php echo e(asset('img/icon/notif-danger.svg')); ?>" alt="danger image">
                    <span>Akun anda (<?php echo e(Auth::user()->student->name); ?>) tidak terdaftar pada kelas manapun silahkan hubungin admin untuk mendaftarkan anda pada suatu kelas.</span>
                </div>
            </div>
        <?php else: ?>
            <div class="flex-column head-content">
                <img src="<?php echo e(asset('img/room/'. ($room->photo == null ? 'default.jpg' : $room->photo))); ?>" alt="foto <?php echo e($room->name); ?>">
                <div class="flex-row head-text poppins">
                    <h1><?php echo e(Str::limit($room->name, 25, $end='...')); ?></h1>
                    <h1>-</h1>
                    <h1><?php echo e(Str::limit($room->employee->name, 25, $end='...')); ?></h1>
                </div>
            </div>
            <div class="flex-row detail-content">
                <div class="flex-column content-group">
                    <div class="flex-column content-description">
                        <h2 class="poppins">Deskripsi</h2>
                        <p class="montserrat"><?php echo e($room->description); ?></p>
                    </div>
                    <div class="flex-column content-student">
                        <h2 class="poppins">Teman Sekelas</h2>
                        <?php if(count($room->student) < 1): ?>
                            <div class="notif-warning flex-row montserrat">
                                <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                                <span>Belum ada siswa yang terdaftar pada kelas <?php echo e($room->name); ?>! Silahkan hubungi admin jika memang terjadi error.</span>
                            </div>
                        <?php else: ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NIS</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e($data->nis == Auth::user()->username ? 'table-secondary' : ''); ?>">
                                            <th scope="row"><?php echo e($loop->index + 1); ?></th>
                                            <td><?php echo e($data->nis); ?></td>
                                            <td><?php echo e($data->name); ?> <?php echo e($data->nis == Auth::user()->username ? '(Saya)' : ''); ?></td>
                                            <td><?php echo e($data->gender); ?></td>
                                            <td><?php echo e($data->address); ?></td>
                                            <td>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-start" id="button-group">
                                                    <a href="<?php echo e(route('studentDetail', $data->id)); ?>" class="btn btn-success me-md-2" type="button">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                    <div class="flex-column content-student">
                        <div class="flex-row task-title" style="gap:10px;">
                            <h2 class="poppins">Tugas</h2>
                        </div>
                        <?php if(count($room->assignment) < 1): ?>
                            <div class="notif-warning flex-row montserrat">
                                <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                                <span>Belum ada tugas yang diberikan pada kelas <?php echo e($room->name); ?>! Silahkan hubungi guru <b><?php echo e($room->employee->name); ?></b> untuk membuatkan tugas jika diperlukan.</span>
                            </div>
                        <?php else: ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tanggal dibuka</th>
                                        <th scope="col">Tanggal ditutup</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $assignment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e((time() > strtotime($data->release) and time() < strtotime($data->deadline)) ? 'table-warning' : ''); ?> <?php echo e(time() < strtotime($data->release) ? 'table-danger' : ''); ?> <?php echo e((time() < strtotime($data->release) or (time() > strtotime($data->release) and time() < strtotime($data->deadline))) ? '' : 'table-success'); ?>">
                                            <th scope="row"><?php echo e($loop->index + 1); ?></th>
                                            <td><?php echo e($data->name); ?></td>
                                            <td>
                                                <?php if(time() > strtotime($data->release) and time() < strtotime($data->deadline)): ?>
                                                    <span class="badge bg-warning text-dark">Berjalan</span>
                                                <?php elseif(time() < strtotime($data->release)): ?>
                                                    <span class="badge bg-danger">Tertunda</span>
                                                <?php else: ?>
                                                    <span class="badge bg-success">Selesai</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(date('l, d F - H:i', strtotime($data->release))); ?></td>
                                            <td><?php echo e(date('l, d F - H:i', strtotime($data->deadline))); ?></td>
                                            <td>
                                                <?php if(count($data->grade->where('nis', Auth::user()->username)) >= 1): ?>
                                                    <?php echo e($data->grade->where('nis', Auth::user()->username)->first()->mark); ?>

                                                <?php elseif(count($data->submission->where('nis', Auth::user()->username)) >= 1): ?>
                                                    <span class="badge bg-warning text-dark">Belum dinilai</span>
                                                <?php elseif(time() > strtotime($data->deadline)): ?>
                                                    <span class="badge bg-danger">Tidak Mengumpulkan</span>
                                                <?php elseif(time() > strtotime($data->release) and time() < strtotime($data->deadline)): ?>
                                                    <span class="badge bg-warning text-dark">Belum Mengerjakan</span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning text-dark">Belum Dibuka</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-start" id="button-group">
                                                    <a href="<?php echo e(route('taskDetail', $data->id)); ?>" class="btn btn-success me-md-2" type="button">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex-column title-teacher">
                    <h2 class="poppins">Pengajar</h2>
                    <div class="flex-column content-teacher">
                        <?php if($room->employee->photo == null): ?>
                            <span class="notif-warning montserrat"><?php echo e($room->employee->name); ?> tidak memiliki foto profil, untuk saat ini akan menggunakan foto <b>default</b> dari sistem.</span>
                        <?php endif; ?>
                        <img src="<?php echo e(asset('img/photo/'. ($room->employee->photo == null ? 'default.jpg' : $room->employee->photo))); ?>" alt="foto <?php echo e($room->employee->name); ?>">
                        <h3 class="montserrat"><?php echo e(Str::limit($room->employee->name, 22, $end='...')); ?></h3>
                        <p class="montserrat"><?php echo e(Str::limit($room->employee->phone, 22, $end='...')); ?></p>
                        <p class="montserrat" style="box-sizing: border-box; padding-left: 15px; padding-right: 15px;"><?php echo e(Str::limit($room->employee->address, 100, $end='...')); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\File Raffi\SEM 4\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/student/room/index.blade.php ENDPATH**/ ?>