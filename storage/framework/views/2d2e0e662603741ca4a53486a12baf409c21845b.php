<?php $__env->startSection('title', 'Tugas ' . str_replace('Tugas','',$assignment->name)  . ' Kelas ' . $assignment->room->name . ' E-Learning Cakrawala'); ?>

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
        /* Chrome, Safari, Edge, Opera */
        input[type='number']::-webkit-outer-spin-button,
        input[type='number']::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type='number'] {
            -moz-appearance: textfield;
        }

        .modal-body a {
            /* text style */
            text-decoration: none;
        }

        .modal-body a:hover {
            /* text style */
            text-decoration: underline;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tugas', 'nav-active'); ?>

<?php $__env->startSection('container'); ?>
    <div class="flex-column" id="container-kelas">
        <div class="flex-column head-content">
            <img src="<?php echo e(asset('img/room/'. ($assignment->room->photo == null ? 'default.jpg' : $assignment->room->photo))); ?>" alt="foto <?php echo e($assignment->room->name); ?>">
            <div class="flex-row head-text poppins">
                <h1><?php echo e(Str::limit($assignment->name, 50, $end='...')); ?></h1>
                <h1>-</h1>
                <h1><?php echo e(Str::limit($assignment->room->name, 20, $end='...')); ?></h1>
            </div>
        </div>
        <div class="flex-row detail-content">
            <div class="flex-column content-group">
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
                        <?php if($errors->has('file')): ?>
                            <?php $__errorArgs = ['file'];
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
                        <?php else: ?>
                            <span>Silahkan isi semua data yang diperlukan terlebih dahulu sebelum mengirim jawaban!</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="flex-column content-description">
                    <h2 class="poppins">Deskripsi</h2>
                    <p class="montserrat"><?php echo e($assignment->description); ?></p>
                </div>
                <div class="flex-column content-submission">
                    <h2 class="poppins">Pengerjaan</h2>
                    <?php if(time() < strtotime($assignment->release)): ?>
                        <div class="notif-warning flex-row montserrat" style="margin-bottom: 10px">
                            <img src="<?php echo e(asset('img/icon/notif-warning.svg')); ?>" alt="warning image">
                            <span>Belum bisa mengumpulkan jawaban, tugas dibuka pada 
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
                                lagi.
                            </span>
                        </div>
                    <?php elseif(time() > strtotime($assignment->deadline) and count($submission) < 1): ?>
                        <div class="notif-danger flex-row montserrat">
                            <img src="<?php echo e(asset('img/icon/notif-danger.svg')); ?>" alt="danger image">
                            <span>Anda tidak mengumpulkan tugas, tidak dapat mengecek jawaban!</span>
                        </div>
                    <?php endif; ?>
                    <div class="flex-column submission-list">
                        <div class="flex-row submission-detail" style="border-bottom: 1px solid #E05780">
                            <h3 class="poppins">Status</h3>
                            <p class="montserrat">
                                <?php if(count($submission) >= 1): ?>
                                    <?php if($submission->first()->updated_at != null): ?>
                                        Terkumpul 
                                        <?php if(\Carbon\Carbon::now()->diffInDays($submission->first()->updated_at) >= 1): ?>
                                            <?php echo e(\Carbon\Carbon::now()->diffInDays($submission->first()->updated_at)); ?> hari
                                        <?php endif; ?>
                                        <?php if(\Carbon\Carbon::now()->diffInHours($submission->first()->updated_at) >= 1): ?>
                                            <?php echo e(\Carbon\Carbon::now()->diffInHours($submission->first()->updated_at) - (\Carbon\Carbon::now()->diffInDays($submission->first()->updated_at) * 24)); ?> jam
                                        <?php endif; ?>
                                        <?php if(\Carbon\Carbon::now()->diffInMinutes($submission->first()->updated_at) >= 1 and \Carbon\Carbon::now()->diffInDays($submission->first()->updated_at) == 0): ?>
                                            <?php echo e(\Carbon\Carbon::now()->diffInMinutes($submission->first()->updated_at) - (\Carbon\Carbon::now()->diffInHours($submission->first()->updated_at) * 60)); ?> menit
                                        <?php endif; ?>
                                        <?php if(\Carbon\Carbon::now()->diffInSeconds($submission->first()->updated_at) >= 1 and \Carbon\Carbon::now()->diffInHours($submission->first()->updated_at) == 0): ?>
                                            <?php echo e(\Carbon\Carbon::now()->diffInSeconds($submission->first()->updated_at) - (\Carbon\Carbon::now()->diffInMinutes($submission->first()->updated_at) * 60)); ?> detik
                                        <?php endif; ?>
                                        yang lalu
                                        <?php else: ?>
                                            -
                                    <?php endif; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="flex-row submission-detail" style="border-bottom: 1px solid #E05780">
                            <h3 class="poppins">Penilaian</h3>
                            <p class="montserrat">
                                <?php if(count($assignment->grade->where('nis', Auth::user()->username)) >= 1): ?>
                                    <?php echo e($assignment->grade->where('nis', Auth::user()->username)->first()->mark); ?>

                                <?php elseif(count($submission) >= 1): ?>
                                    Belum dinilai
                                <?php else: ?>
                                    Tidak dinilai
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="flex-row submission-detail" style="border-bottom: 1px solid #E05780">
                            <h3 class="poppins">Tgl Pengumpulan</h3>
                            <p class="montserrat"><?php echo e(date('l, d F - H:i', strtotime($assignment->deadline))); ?></p>
                        </div>
                        <div class="flex-row submission-detail" style="border-bottom: 1px solid #E05780">
                            <h3 class="poppins">Waktu Tersisa</h3>
                            <p class="montserrat">
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
                                <?php elseif(time() > strtotime($assignment->deadline)): ?>
                                    Sudah ditutup
                                <?php else: ?>
                                    Belum dibuka
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="flex-row submission-detail">
                            <h3 class="poppins">Terakhir Diubah</h3>
                            <p class="montserrat">
                                <?php if(count($submission) >= 1): ?>
                                    <?php if($submission->first()->updated_at != null): ?>
                                        <?php echo e(date('l, d F - H:i', strtotime($submission->first()->updated_at))); ?>

                                    <?php else: ?>
                                        Belum mengumpulkan
                                    <?php endif; ?>
                                <?php else: ?>
                                    Belum mengumpulkan
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <?php if(time() > strtotime($assignment->release)): ?>
                        <div class="flex-row submission-button">
                            <?php if((time() > strtotime($assignment->deadline) and count($submission) >= 1) or count($assignment->grade->where('nis', Auth::user()->username)) >= 1): ?>
                                <button type="button" class="small-btn-submit submit-success" data-bs-toggle="modal" data-bs-target="#check">Cek Jawaban</button>
                            <?php elseif(time() < strtotime($assignment->deadline) and count($submission) < 1): ?>
                                <button type="button" class="small-btn-submit submit-success" data-bs-toggle="modal" data-bs-target="#create">Tambahkan Jawaban</button>
                            <?php elseif((time() < strtotime($assignment->deadline) and count($submission) >= 1) and count($assignment->grade->where('nis', Auth::user()->username)) < 1): ?>
                                <button type="button" class="small-btn-submit submit-edit" data-bs-toggle="modal" data-bs-target="#edit">Edit Jawaban</button>
                                <button type="button" class="small-btn-submit submit-danger" data-bs-toggle="modal" data-bs-target="#delete">Hapus Jawaban</button>
                            <?php endif; ?>
                        </div>
                            <?php if((time() > strtotime($assignment->deadline) and count($submission) >= 1) or count($assignment->grade->where('nis', Auth::user()->username)) >= 1): ?>
                                
                                <div class="modal fade" id="check" tabindex="-1" aria-labelledby="checkLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="checkLabel">Hasil Pengerjaan <?php echo e($assignment->name); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <b>Nilai : </b>
                                                    <?php if(count($assignment->grade->where('nis', Auth::user()->username)) >= 1): ?>
                                                        <?php echo e($assignment->grade->where('nis', Auth::user()->username)->first()->mark); ?>

                                                    <?php elseif(count($submission) >= 1): ?>
                                                        Belum dinilai
                                                    <?php else: ?>
                                                        Tidak dinilai
                                                    <?php endif; ?>
                                                </p>
                                                <?php if($assignment->grade->where('nis', Auth::user()->username)->first()->description != null): ?>
                                                    <p style="text-align: justify">
                                                        <b>Keterangan : </b>
                                                        <?php echo e($assignment->grade->where('nis', Auth::user()->username)->first()->description); ?>

                                                    </p>
                                                <?php endif; ?>
                                                <?php if($submission->first()->file != null): ?>
                                                    <p>
                                                        <b>File Upload:</b>
                                                        <a href="<?php echo e(route('submissionDownload', $submission->first()->id)); ?>" style="text-align: justify"><?php echo e($submission->first()->file); ?></a>
                                                    </p>
                                                <?php endif; ?>
                                                <?php if($submission->first()->description != null): ?>
                                                    <p style="text-align: justify"><b>Jawaban:</b> <?php echo e($submission->first()->description); ?></p>
                                                <?php endif; ?>
                                                <?php if($submission->first()->description == null and $submission->first()->file == null): ?>
                                                    <p><b>Jawaban:</b> Tidak ada jawaban</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif(time() < strtotime($assignment->deadline) and count($submission) < 1): ?>    
                                
                                <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form class="modal-content" action="<?php echo e(route('submission', $assignment->id)); ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createLabel">Kirim Pengerjaan <?php echo e($assignment->name); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo csrf_field(); ?>
                                                <?php if($assignment->type == 'Online Teks'): ?>
                                                    <div class="mb-3">
                                                        <label for="description" class="col-form-label">Deskripsi Jawaban:</label>
                                                        <textarea name="description" class="form-control" id="description" rows="8" placeholder="Isi deskripsi jawaban sesuai dengan soal yang diberikan dan diharapkan tetap menjaga kejujuran!"><?php echo e(old('description') != null ? old('description') : ''); ?></textarea>
                                                    </div>
                                                <?php elseif($assignment->type == 'Upload File'): ?>
                                                    <div class="mb-3">
                                                        <label for="file" class="col-form-label">Upload file:</label>
                                                        <input class="form-control" name="file" type="file" id="file">
                                                    </div>
                                                <?php else: ?>
                                                    <div class="mb-3">
                                                        <label for="file" class="col-form-label">Upload file:</label>
                                                        <input class="form-control" name="file" type="file" id="file">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="col-form-label">Deskripsi Jawaban:</label>
                                                        <textarea name="description" class="form-control" id="description" rows="8" placeholder="Isi deskripsi jawaban sesuai dengan soal yang diberikan dan diharapkan tetap menjaga kejujuran!"><?php echo e(old('description') != null ? old('description') : ''); ?></textarea>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" value="submit" class="btn btn-primary" style="background-color: #52B788; border-color: #52B788;font-weight: 400;color: #FBFEFD;">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php elseif((time() < strtotime($assignment->deadline) and count($submission) >= 1) and count($assignment->grade->where('nis', Auth::user()->username)) < 1): ?>
                                
                                <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form class="modal-content" action="<?php echo e(route('submissionEdit', $assignment->id)); ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLabel">Hasil Pengerjaan <?php echo e($assignment->name); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('patch'); ?>
                                                <?php if($submission->first()->file != null): ?>
                                                    <b>File Lama:</b>
                                                    <a href="<?php echo e(route('submissionDownload', $submission->first()->id)); ?>" style="text-align: justify"><?php echo e($submission->first()->file); ?></a>
                                                <?php endif; ?>
                                                <?php if($assignment->type == 'Online Teks'): ?>
                                                    <div class="mb-3">
                                                        <label for="description" class="col-form-label">Deskripsi Jawaban:</label>
                                                        <?php if($submission->first()->description == null): ?>
                                                            <textarea name="description" class="form-control" id="description" rows="8" placeholder="Isi deskripsi jawaban sesuai dengan soal yang diberikan dan diharapkan tetap menjaga kejujuran!"><?php echo e(old('description') != null ? old('description') : ''); ?></textarea>
                                                        <?php else: ?>
                                                            <textarea name="description" class="form-control" id="description" rows="8" placeholder="Isi deskripsi jawaban sesuai dengan soal yang diberikan dan diharapkan tetap menjaga kejujuran!"><?php echo e(old('description') != null ? old('description') : $submission->first()->description); ?></textarea>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php elseif($assignment->type == 'Upload File'): ?>
                                                <div class="mb-3">
                                                    <label for="file" class="col-form-label">Upload file:</label>
                                                    <input class="form-control" name="file" type="file" id="file">
                                                </div>
                                                <?php else: ?>
                                                    <div class="mb-3">
                                                        <label for="file" class="col-form-label">Upload file:</label>
                                                        <input class="form-control" name="file" type="file" id="file">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="col-form-label">Deskripsi Jawaban:</label>
                                                        <?php if($submission->first()->description == null): ?>
                                                            <textarea name="description" class="form-control" id="description" rows="8" placeholder="Isi deskripsi jawaban sesuai dengan soal yang diberikan dan diharapkan tetap menjaga kejujuran!"><?php echo e(old('description') != null ? old('description') : ''); ?></textarea>
                                                        <?php else: ?>
                                                            <textarea name="description" class="form-control" id="description" rows="8" placeholder="Isi deskripsi jawaban sesuai dengan soal yang diberikan dan diharapkan tetap menjaga kejujuran!"><?php echo e(old('description') != null ? old('description') : $submission->first()->description); ?></textarea>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-warning">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="delete" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteLabel">Hapus Pengerjaan <?php echo e($assignment->name); ?> ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <?php if($assignment->type == 'Online Teks' or $assignment->type == 'Keduanya'): ?>
                                                        <b>Jawaban:</b>
                                                        <?php if($submission->first()->description != null): ?>
                                                            <p style="text-align: justify"><?php echo e($submission->first()->description); ?></p>
                                                        <?php else: ?>
                                                            <p>Tidak ada deskripsi jawaban.</p>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($assignment->type == 'Upload File' or $assignment->type == 'Keduanya'): ?>
                                                        <p><b>File Upload:</b>
                                                        <?php if($submission->first()->file != null): ?>
                                                        <a href="<?php echo e(route('submissionDownload', $submission->first()->id)); ?>" style="text-align: justify"><?php echo e($submission->first()->file); ?></a>
                                                        <?php else: ?>
                                                            Tidak file upload jawaban.
                                                        <?php endif; ?>
                                                        </p>
                                                    <?php endif; ?>
                                                    <b>Catatan:</b>
                                                    <p style="text-align: justify">Berhati-hati sebelum menghapus jawaban pada sistem! Serta jangan lupa untuk mengirim jawabanmu yang baru apabila menghapus jawaban.</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="<?php echo e(route('submissionDelete', $assignment->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex-column title-teacher">
                <h2 class="poppins">Nilai Tertinggi</h2>
                <div class="flex-column content-teacher">
                    <?php if($hasRank): ?>
                        <img src="<?php echo e(asset('img/photo/'. ($ranker->photo == null ? 'default-student.jpg' : $ranker->photo))); ?>" alt="foto <?php echo e($ranker->name); ?>">
                        <h3 class="montserrat"><?php echo e(Str::limit($ranker->name, 22, $end='...')); ?></h3>
                        <?php if($rank->mark > 75): ?>
                            <span class="badge bg-success poppins" style="font-size: 18px; font-weight: 500;"><?php echo e($rank->mark); ?></span>  
                        <?php elseif($rank->mark > 50): ?>
                            <span class="badge bg-warning poppins" style="font-size: 18px; font-weight: 500;"><?php echo e($rank->mark); ?></span>
                        <?php else: ?>
                            <span class="badge bg-danger poppins" style="font-size: 18px; font-weight: 500;"><?php echo e($rank->mark); ?></span>
                        <?php endif; ?>
                        <p class="montserrat"><?php echo e(Str::limit($ranker->gender, 22, $end='...')); ?></p>
                        <p class="montserrat" style="box-sizing: border-box; padding-left: 15px; padding-right: 15px;"><?php echo e(Str::limit($ranker->address, 100, $end='...')); ?></p>
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/photo/'. 'default-student.png')); ?>" alt="foto default">
                        <h3 class="montserrat">Belum ada siswa yang dinilai</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Raffi\File Raffi\SEM 4\Pweb\Pemrogaman Web PRAK\E-LearningCakrawala-main\E-LearningCakrawala-main\resources\views/student/tasks/detail.blade.php ENDPATH**/ ?>