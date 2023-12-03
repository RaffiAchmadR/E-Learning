<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- css files -->
    <link rel="stylesheet" href="<?php echo e(asset('css/system.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
    <!-- js files -->
    <?php echo $__env->yieldContent('scriptHead'); ?>
</head>
<body class="flex-row" id="align-item-start">
    <header class="flex-column vh100 header-clicked" id="header-side">
        <div class="flex-row nav-head js-item animate-normal" id="j-center">
            <img class="animate-normal" src="<?php echo e(asset('img/icon/navbar-logo.svg')); ?>" alt="logo" style="display: none;">
            <button onclick="navbarActive()" type="button" class="flex-row rotate animate-normal"><img src="<?php echo e(asset('img/icon/navbar-arrow-right.svg')); ?>"></button>
        </div>
        <nav class="flex-column nav-list js-item">
            <a href="<?php echo e(Auth::check() ? route('dashboard') : route('login')); ?>" class="flex-row poppins <?php echo $__env->yieldContent('dashboard'); ?>" id="j-center">
                <img src="<?php echo e(asset('img/icon/navbar-dashboard.svg')); ?>">
                <span class="animate" style="display: none;"><?php echo e(Auth::check() ? 'Dashboard' : 'Login'); ?></span>
            </a>
            <?php if(Auth::check()): ?>
                <svg height="2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 1H1000" stroke="#FBFEFD" stroke-opacity="0.5"/>
                </svg>
                <a href="<?php echo e(route('roomIndex')); ?>" class="flex-row poppins <?php echo $__env->yieldContent('kelas'); ?>" id="j-center">
                    <img src="<?php echo e(asset('img/icon/navbar-kelas.svg')); ?>">
                    <span class="animate" style="display: none;">Kelas</span>
                </a>
                <?php if(Auth::user()->status != 'admin'): ?>
                    <a href="<?php echo e(route('taskIndex')); ?>" class="flex-row poppins <?php echo $__env->yieldContent('tugas'); ?>" id="j-center">
                        <img src="<?php echo e(asset('img/icon/navbar-tugas.svg')); ?>">
                        <span class="animate" style="display: none;">Tugas</span>
                    </a>
                    <?php if(Auth::user()->status == 'student'): ?>
                        <a href="<?php echo e(route('grade')); ?>" class="flex-row poppins <?php echo $__env->yieldContent('nilai'); ?>" id="j-center">
                            <img src="<?php echo e(asset('img/icon/navbar-nilai.svg')); ?>">
                            <span class="animate" style="display: none;">Nilai</span>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                <svg height="2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 1H1000" stroke="#FBFEFD" stroke-opacity="0.5"/>
                </svg>
                <a href="<?php echo e(route('setting')); ?>" class="flex-row poppins <?php echo $__env->yieldContent('settings'); ?>" id="j-center">
                    <img src="<?php echo e(asset('img/icon/navbar-pengaturan.svg')); ?>">
                    <span class="animate" style="display: none;">Pengaturan</span>
                </a>
            <?php endif; ?>
            <a href="<?php echo e(route('helpdesk')); ?>" class="flex-row poppins <?php echo $__env->yieldContent('helpdesk'); ?>" id="j-center">
                <img src="<?php echo e(asset('img/icon/navbar-helpdesk.svg')); ?>">
                <span class="animate" style="display: none;">Helpdesk</span>
            </a>
            <?php if(Auth::check()): ?>
                <svg height="2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 1H1000" stroke="#FBFEFD" stroke-opacity="0.5"/>
                </svg>
                <a href="<?php echo e(route('logout')); ?>" class="flex-row poppins" id="j-center">
                    <img src="<?php echo e(asset('img/icon/navbar-logout-2.svg')); ?>">
                    <span class="animate" style="display: none;">Keluar</span>
                </a>
            <?php endif; ?>
        </nav>
        <div class="flex-row nav-profile js-item" id="j-center">
            <?php if(Auth::check()): ?>
                <?php if(Auth::user()->status == 'employee'): ?>
                    <img <?php echo e(str_replace('$',"'", 'onclick=location.href=$' . route('setting') . '$')); ?> src="<?php echo e(Auth::user()->employee->photo != null ? asset('img/photo/' . Auth::user()->employee->photo) : asset('img/photo/pp1.jpg')); ?>" alt="profile <?php echo e(Auth::user()->employee->name); ?>"> 
                <?php elseif(Auth::user()->status == 'student'): ?>
                    <img <?php echo e(str_replace('$',"'", 'onclick=location.href=$' . route('setting') . '$')); ?> src="<?php echo e(Auth::user()->student->photo != null ? asset('img/photo/' . Auth::user()->student->photo) : asset('img/photo/pp1.jpg')); ?>" alt="profile <?php echo e(Auth::user()->student->name); ?>"> 
                <?php else: ?>
                    <img src="<?php echo e(asset('img/photo/pp1.jpg')); ?>" alt="profile admin <?php echo e(Auth::user()->username); ?>"> 
                <?php endif; ?>
            <?php else: ?>
                <img src="<?php echo e(asset('img/photo/pp1.jpg')); ?>" alt="profile user"> 
            <?php endif; ?>
            <div class="flex-column nav-profile-detail" style="display: none;">
                <?php if(isset(Auth::user()->student->name)): ?>
                    <h5 class="poppins"><?php echo e(Auth::user()->student->name); ?></h5>
                <?php elseif(isset(Auth::user()->employee->name)): ?>
                    <h5 class="poppins"><?php echo e(Auth::user()->employee->name); ?></h5>
                <?php elseif(isset(Auth::user()->status) and Auth::user()->status == 'admin'): ?>
                    <h5 class="poppins">Admin <?php echo e(Auth::user()->id); ?></h5>
                <?php else: ?>
                    <h5 class="poppins"><?php echo e("Silahkan Login"); ?></h5>
                <?php endif; ?>
                <h6 class="poppins"><?php echo e(isset(Auth::user()->username) ? Auth::user()->username : ''); ?></h6>
            </div>
        </div>
    </header>
    <?php echo $__env->yieldContent('container'); ?>
    <?php echo $__env->yieldContent('scriptBody'); ?>
    <script src="<?php echo e(asset('js/navbar.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\Raffi\File Raffi\SEM 4\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/template/system.blade.php ENDPATH**/ ?>