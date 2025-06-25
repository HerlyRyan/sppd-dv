<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Laporan Sasaran Kinerja Pegawai (SKP)</h4>
            </div>

            <div class="card-body">
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Terjadi kesalahan:</strong> Mohon periksa kembali input Anda.
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('skp.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Informasi Umum Laporan SKP</h5>
                        <div class="col-md-6 mb-3">
                            <label for="periode_mulai" class="form-label">Periode Penilaian Mulai</label>
                            <input type="date" class="form-control <?php $__errorArgs = ['periode_mulai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="periode_mulai" name="periode_mulai" value="<?php echo e(old('periode_mulai')); ?>" required>
                            <?php $__errorArgs = ['periode_mulai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="periode_selesai" class="form-label">Periode Penilaian Selesai</label>
                            <input type="date" class="form-control <?php $__errorArgs = ['periode_selesai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="periode_selesai" name="periode_selesai" value="<?php echo e(old('periode_selesai')); ?>" required>
                            <?php $__errorArgs = ['periode_selesai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_penilaian" class="form-label">Tanggal Penilaian</label>
                            <input type="date" class="form-control <?php $__errorArgs = ['tanggal_penilaian'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="tanggal_penilaian" name="tanggal_penilaian" value="<?php echo e(old('tanggal_penilaian', date('Y-m-d'))); ?>" required>
                            <?php $__errorArgs = ['tanggal_penilaian'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pegawai_id" class="form-label">Pegawai Yang Dinilai</label>
                            <select name="pegawai_id" id="pegawai_id"
                                class="form-select <?php $__errorArgs = ['pegawai_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="" selected>-- Pilih Pegawai --</option>
                                
                                <?php $__currentLoopData = $pegawaiOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pegawai->id); ?>" <?php if(old('pegawai_id') == $pegawai->id): echo 'selected'; endif; ?>>
                                        <?php echo e($pegawai->name); ?> (NIP: <?php echo e($pegawai->nip); ?>) - <?php echo e($pegawai->jabatan); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['pegawai_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="penilai_id" class="form-label">Pejabat Penilai Kinerja</label>
                            <select name="penilai_id" id="penilai_id"
                                class="form-select <?php $__errorArgs = ['penilai_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="" selected>-- Pilih Penilai --</option>
                                
                                <?php $__currentLoopData = $penilaiOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($penilai->id); ?>" <?php if(old('penilai_id') == $penilai->id): echo 'selected'; endif; ?>>
                                        <?php echo e($penilai->name); ?> (NIP: <?php echo e($penilai->nip); ?>) - <?php echo e($penilai->jabatan); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['penilai_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Hasil Kerja Utama (Contoh 1)</h5>
                        
                        <input type="hidden" name="work_results[0][type]" value="utama">

                        <div class="col-12 mb-3">
                            <label for="rencana_pimpinan_0" class="form-label">Rencana Hasil Kerja Pimpinan yang Diintervensi</label>
                            <textarea name="work_results[0][rencana_hasil_kerja_pimpinan]" id="rencana_pimpinan_0"
                                class="form-control <?php $__errorArgs = ['work_results.0.rencana_hasil_kerja_pimpinan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                rows="3"><?php echo e(old('work_results.0.rencana_hasil_kerja_pimpinan')); ?></textarea>
                            <?php $__errorArgs = ['work_results.0.rencana_hasil_kerja_pimpinan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="rencana_kerja_0" class="form-label">Rencana Hasil Kerja Individu</label>
                            <textarea name="work_results[0][rencana_hasil_kerja]" id="rencana_kerja_0"
                                class="form-control <?php $__errorArgs = ['work_results.0.rencana_hasil_kerja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                rows="3" required><?php echo e(old('work_results.0.rencana_hasil_kerja')); ?></textarea>
                            <?php $__errorArgs = ['work_results.0.rencana_hasil_kerja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <h6 class="mb-2 text-secondary">Indikator Kinerja Individu</h6>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_aspek_0_0" class="form-label">Aspek (Kuantitas)</label>
                            <input type="text" name="work_results[0][performance_indicators][0][aspek]" value="Kuantitas" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_individu_0_0" class="form-label">Indikator Kinerja</label>
                            <input type="text" name="work_results[0][performance_indicators][0][indikator_kinerja_individu]"
                                id="indikator_individu_0_0" class="form-control <?php $__errorArgs = ['work_results.0.performance_indicators.0.indikator_kinerja_individu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('work_results.0.performance_indicators.0.indikator_kinerja_individu')); ?>" required>
                            <?php $__errorArgs = ['work_results.0.performance_indicators.0.indikator_kinerja_individu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_target_0_0" class="form-label">Target</label>
                            <input type="text" name="work_results[0][performance_indicators][0][target]"
                                id="indikator_target_0_0" class="form-control <?php $__errorArgs = ['work_results.0.performance_indicators.0.target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('work_results.0.performance_indicators.0.target')); ?>" required>
                            <?php $__errorArgs = ['work_results.0.performance_indicators.0.target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="indikator_aspek_0_1" class="form-label">Aspek (Kualitas)</label>
                            <input type="text" name="work_results[0][performance_indicators][1][aspek]" value="Kualitas" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_individu_0_1" class="form-label">Indikator Kinerja</label>
                            <input type="text" name="work_results[0][performance_indicators][1][indikator_kinerja_individu]"
                                id="indikator_individu_0_1" class="form-control <?php $__errorArgs = ['work_results.0.performance_indicators.1.indikator_kinerja_individu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('work_results.0.performance_indicators.1.indikator_kinerja_individu')); ?>" required>
                            <?php $__errorArgs = ['work_results.0.performance_indicators.1.indikator_kinerja_individu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_target_0_1" class="form-label">Target</label>
                            <input type="text" name="work_results[0][performance_indicators][1][target]"
                                id="indikator_target_0_1" class="form-control <?php $__errorArgs = ['work_results.0.performance_indicators.1.target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('work_results.0.performance_indicators.1.target')); ?>" required>
                            <?php $__errorArgs = ['work_results.0.performance_indicators.1.target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="indikator_aspek_0_2" class="form-label">Aspek (Waktu)</label>
                            <input type="text" name="work_results[0][performance_indicators][2][aspek]" value="Waktu" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_individu_0_2" class="form-label">Indikator Kinerja</label>
                            <input type="text" name="work_results[0][performance_indicators][2][indikator_kinerja_individu]"
                                id="indikator_individu_0_2" class="form-control <?php $__errorArgs = ['work_results.0.performance_indicators.2.indikator_kinerja_individu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('work_results.0.performance_indicators.2.indikator_kinerja_individu')); ?>" required>
                            <?php $__errorArgs = ['work_results.0.performance_indicators.2.indikator_kinerja_individu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_target_0_2" class="form-label">Target</label>
                            <input type="text" name="work_results[0][performance_indicators][2][target]"
                                id="indikator_target_0_2" class="form-control <?php $__errorArgs = ['work_results.0.performance_indicators.2.target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('work_results.0.performance_indicators.2.target')); ?>" required>
                            <?php $__errorArgs = ['work_results.0.performance_indicators.2.target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Perilaku Kerja (Contoh: Berorientasi Pelayanan)</h5>
                        
                        <input type="hidden" name="work_behaviors[0][perilaku_kerja]" value="Berorientasi Pelayanan">
                        <div class="col-12 mb-3">
                            <label for="deskripsi_perilaku_0" class="form-label">Deskripsi Perilaku</label>
                            <textarea name="work_behaviors[0][deskripsi_perilaku]" id="deskripsi_perilaku_0"
                                class="form-control <?php $__errorArgs = ['work_behaviors.0.deskripsi_perilaku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                rows="3"><?php echo e(old('work_behaviors.0.deskripsi_perilaku', 'Memahami dan memenuhi kebutuhan masyarakat, Ramah, cekatan, solutif, dan dapat diandalkan, Melakukan perbaikan tiada henti')); ?></textarea>
                            <?php $__errorArgs = ['work_behaviors.0.deskripsi_perilaku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="ekspektasi_pimpinan_0" class="form-label">Ekspektasi Khusus Pimpinan</label>
                            <input type="text" name="work_behaviors[0][ekspektasi_pimpinan]"
                                id="ekspektasi_pimpinan_0" class="form-control <?php $__errorArgs = ['work_behaviors.0.ekspektasi_pimpinan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('work_behaviors.0.ekspektasi_pimpinan', 'Sesuai Ekspektasi')); ?>" required>
                            <?php $__errorArgs = ['work_behaviors.0.ekspektasi_pimpinan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Dukungan Sumber Daya (Pisahkan dengan koma jika lebih dari satu)</h5>
                        <div class="col-12 mb-3">
                            <label for="resource_names" class="form-label">Nama Sumber Daya</label>
                            <textarea name="resource_names" id="resource_names"
                                class="form-control <?php $__errorArgs = ['resource_names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                rows="3"><?php echo e(old('resource_names', 'sumber daya manusia, anggaran, peralatan kerja, pendampingan Pimpinan, sarana dan prasarana')); ?></textarea>
                            <small class="form-text text-muted">Contoh: sumber daya manusia, anggaran, peralatan kerja</small>
                            <?php $__errorArgs = ['resource_names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Pertanggungjawaban (Skema)</h5>
                        <div class="col-12 mb-3">
                            <label for="accountability_description" class="form-label">Deskripsi Pertanggungjawaban</label>
                            <textarea name="accountability_description" id="accountability_description"
                                class="form-control <?php $__errorArgs = ['accountability_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                rows="3"><?php echo e(old('accountability_description', 'Pimpinan dan Pegawai juga harus menyepakati waktu pelaporan perkembangan hasil kerja untuk pemantauan kinerja Pegawai. Untuk pekerjaan yang sifatnya rutin, Pimpinan dan Pegawai dapat menyepakati waktu pelaporan perkembangan hasil kerja secara periodik/ berkala.')); ?></textarea>
                            <?php $__errorArgs = ['accountability_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div class="row mb-4">
                        <h5 class="mb-3 text-primary">Konsekuensi</h5>
                        <div class="col-12 mb-3">
                            <label for="consequence_description" class="form-label">Deskripsi Konsekuensi</label>
                            <textarea name="consequence_description" id="consequence_description"
                                class="form-control <?php $__errorArgs = ['consequence_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                rows="3"><?php echo e(old('consequence_description', 'penghargaan kepada Pegawai baik materiil maupun non materiil; dan/atau pemberian penugasan baru. pemberian teguran; dan/atau pengalihan penugasan.')); ?></textarea>
                            <?php $__errorArgs = ['consequence_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Simpan Laporan SKP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/skp_reports/create.blade.php ENDPATH**/ ?>