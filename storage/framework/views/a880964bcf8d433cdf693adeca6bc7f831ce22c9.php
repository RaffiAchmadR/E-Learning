<?php $__env->startSection('title', 'Daftar Kelas E-Learning Cakrawala (Admin ' . Auth::user()->id . ')'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('kelas', 'nav-active'); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column" id="container-dashboard">
        <div class="flex-row container-title">
            <h1 class="poppins">Daftar Kelas</h1>
        </div>
        <div class="container-content flex-row">
            <div class="container-mapel flex-column" style="border-width: 0; padding: 0;">
                <?php if(!$hasRoom): ?>
                    <div class="notif-warning flex-row montserrat">
                        <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                        <?php if(Auth::user()->employee->status == 'Tenaga Didik'): ?>
                            <span>Akun anda (<?php echo e(Auth::user()->employee->name); ?>) tidak terdaftar pada kelas manapun! Silahkan hubungin admin untuk mendaftarkan anda pada suatu kelas.</span>
                        <?php else: ?>
                            <span>Tidak ada kelas yang terdaftar pada sistem! Silahkan hubungin admin untuk melakukan pengecekan apabila terjadi error.</span>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                  <div class="row row-cols-1 row-cols-md-4 g-4">
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
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\Transfer File Raffi\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/employee/room/index.blade.php ENDPATH**/ ?>