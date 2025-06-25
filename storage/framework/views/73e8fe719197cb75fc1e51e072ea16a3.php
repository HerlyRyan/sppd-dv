

<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Laporan Sasaran Kinerja Pegawai (SKP)</h4>
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

                <form action="<?php echo e(route('skp.update', $skpReport->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
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
                                id="periode_mulai" name="periode_mulai"
                                value="<?php echo e(old('periode_mulai', $skpReport->periode_mulai->format('Y-m-d'))); ?>" required>
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
                                id="periode_selesai" name="periode_selesai"
                                value="<?php echo e(old('periode_selesai', $skpReport->periode_selesai->format('Y-m-d'))); ?>" required>
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
                                id="tanggal_penilaian" name="tanggal_penilaian"
                                value="<?php echo e(old('tanggal_penilaian', $skpReport->tanggal_penilaian->format('Y-m-d'))); ?>"
                                required>
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
                                <option value="">-- Pilih Pegawai --</option>
                                <?php $__currentLoopData = $pegawaiOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pegawai->id); ?>" <?php if(old('pegawai_id', $skpReport->pegawai_id) == $pegawai->id): echo 'selected'; endif; ?>>
                                        <?php echo e($pegawai->nama_pegawai); ?> (NIP: <?php echo e($pegawai->nip); ?>) -
                                        <?php echo e($pegawai->position->nama_jabatan ?? 'N/A'); ?>

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
                                <option value="">-- Pilih Penilai --</option>
                                <?php $__currentLoopData = $penilaiOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($penilai->id); ?>" <?php if(old('penilai_id', $skpReport->penilai_id) == $penilai->id): echo 'selected'; endif; ?>>
                                        <?php echo e($penilai->nama_pegawai); ?> (NIP: <?php echo e($penilai->nip); ?>) -
                                        <?php echo e($penilai->position->nama_jabatan ?? 'N/A'); ?>

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

                    
                    <?php $__currentLoopData = $skpReport->workResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $workResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mb-4 border-bottom pb-3">
                            <h5 class="mb-3 text-primary">Hasil Kerja
                                <?php echo e($workResult->type == 'utama' ? 'Utama' : 'Tambahan'); ?> #<?php echo e($index + 1); ?></h5>
                            
                            <input type="hidden" name="work_results[<?php echo e($index); ?>][type]"
                                value="<?php echo e($workResult->type); ?>">
                            <input type="hidden" name="work_results[<?php echo e($index); ?>][id]"
                                value="<?php echo e($workResult->id); ?>">

                            <div class="col-12 mb-3">
                                <label for="rencana_pimpinan_<?php echo e($index); ?>" class="form-label">Rencana Hasil Kerja
                                    Pimpinan yang Diintervensi</label>
                                <textarea name="work_results[<?php echo e($index); ?>][rencana_hasil_kerja_pimpinan]"
                                    id="rencana_pimpinan_<?php echo e($index); ?>"
                                    class="form-control <?php $__errorArgs = ['work_results.' . $index . '.rencana_hasil_kerja_pimpinan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    rows="3"><?php echo e(old('work_results.' . $index . '.rencana_hasil_kerja_pimpinan', $workResult->rencana_hasil_kerja_pimpinan)); ?></textarea>
                                <?php $__errorArgs = ['work_results.' . $index . '.rencana_hasil_kerja_pimpinan'];
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
                                <label for="rencana_kerja_<?php echo e($index); ?>" class="form-label">Rencana Hasil Kerja
                                    Individu</label>
                                <textarea name="work_results[<?php echo e($index); ?>][rencana_hasil_kerja]" id="rencana_kerja_<?php echo e($index); ?>"
                                    class="form-control <?php $__errorArgs = ['work_results.' . $index . '.rencana_hasil_kerja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"
                                    required><?php echo e(old('work_results.' . $index . '.rencana_hasil_kerja', $workResult->rencana_hasil_kerja)); ?></textarea>
                                <?php $__errorArgs = ['work_results.' . $index . '.rencana_hasil_kerja'];
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
                            <?php $__currentLoopData = $workResult->performanceIndicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indIndex => $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 mb-3">
                                    <label for="indikator_aspek_<?php echo e($index); ?>_<?php echo e($indIndex); ?>"
                                        class="form-label">Aspek (<?php echo e($indicator->aspek); ?>)</label>
                                    <input type="text"
                                        name="work_results[<?php echo e($index); ?>][performance_indicators][<?php echo e($indIndex); ?>][aspek]"
                                        value="<?php echo e($indicator->aspek); ?>" class="form-control" readonly>
                                    <input type="hidden"
                                        name="work_results[<?php echo e($index); ?>][performance_indicators][<?php echo e($indIndex); ?>][id]"
                                        value="<?php echo e($indicator->id); ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="indikator_individu_<?php echo e($index); ?>_<?php echo e($indIndex); ?>"
                                        class="form-label">Indikator Kinerja</label>
                                    <input type="text"
                                        name="work_results[<?php echo e($index); ?>][performance_indicators][<?php echo e($indIndex); ?>][indikator_kinerja_individu]"
                                        id="indikator_individu_<?php echo e($index); ?>_<?php echo e($indIndex); ?>"
                                        class="form-control <?php $__errorArgs = ['work_results.' . $index . '.performance_indicators.' . $indIndex . '.indikator_kinerja_individu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('work_results.' . $index . '.performance_indicators.' . $indIndex . '.indikator_kinerja_individu', $indicator->indikator_kinerja_individu)); ?>"
                                        required>
                                    <?php $__errorArgs = ['work_results.' . $index . '.performance_indicators.' . $indIndex .
                                        '.indikator_kinerja_individu'];
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
                                    <label for="indikator_target_<?php echo e($index); ?>_<?php echo e($indIndex); ?>"
                                        class="form-label">Target</label>
                                    <input type="text"
                                        name="work_results[<?php echo e($index); ?>][performance_indicators][<?php echo e($indIndex); ?>][target]"
                                        id="indikator_target_<?php echo e($index); ?>_<?php echo e($indIndex); ?>"
                                        class="form-control <?php $__errorArgs = ['work_results.' . $index . '.performance_indicators.' . $indIndex . '.target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('work_results.' . $index . '.performance_indicators.' . $indIndex . '.target', $indicator->target)); ?>"
                                        required>
                                    <?php $__errorArgs = ['work_results.' . $index . '.performance_indicators.' . $indIndex . '.target'];
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php $__currentLoopData = $skpReport->workBehaviors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $behavior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mb-4 border-bottom pb-3">
                            <h5 class="mb-3 text-primary">Perilaku Kerja: <?php echo e($behavior->perilaku_kerja); ?></h5>
                            
                            <input type="hidden" name="work_behaviors[<?php echo e($index); ?>][id]"
                                value="<?php echo e($behavior->id); ?>">
                            <input type="hidden" name="work_behaviors[<?php echo e($index); ?>][perilaku_kerja]"
                                value="<?php echo e($behavior->perilaku_kerja); ?>">
                            <div class="col-12 mb-3">
                                <label for="deskripsi_perilaku_<?php echo e($index); ?>" class="form-label">Deskripsi
                                    Perilaku</label>
                                <textarea name="work_behaviors[<?php echo e($index); ?>][deskripsi_perilaku]" id="deskripsi_perilaku_<?php echo e($index); ?>"
                                    class="form-control <?php $__errorArgs = ['work_behaviors.' . $index . '.deskripsi_perilaku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    rows="3"><?php echo e(old('work_behaviors.' . $index . '.deskripsi_perilaku', $behavior->deskripsi_perilaku)); ?></textarea>
                                <?php $__errorArgs = ['work_behaviors.' . $index . '.deskripsi_perilaku'];
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
                                <label for="ekspektasi_pimpinan_<?php echo e($index); ?>" class="form-label">Ekspektasi Khusus
                                    Pimpinan</label>
                                <input type="text" name="work_behaviors[<?php echo e($index); ?>][ekspektasi_pimpinan]"
                                    id="ekspektasi_pimpinan_<?php echo e($index); ?>"
                                    class="form-control <?php $__errorArgs = ['work_behaviors.' . $index . '.ekspektasi_pimpinan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('work_behaviors.' . $index . '.ekspektasi_pimpinan', $behavior->ekspektasi_pimpinan)); ?>"
                                    required>
                                <?php $__errorArgs = ['work_behaviors.' . $index . '.ekspektasi_pimpinan'];
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
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
unset($__errorArgs, $__bag); ?>" rows="3"><?php echo e(old('resource_names', $skpReport->supportingResources->pluck('resource_name')->implode(', '))); ?></textarea>
                            <small class="form-text text-muted">Contoh: sumber daya manusia, anggaran, peralatan
                                kerja</small>
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
                            <label for="accountability_description" class="form-label">Deskripsi
                                Pertanggungjawaban</label>
                            <textarea name="accountability_description" id="accountability_description"
                                class="form-control <?php $__errorArgs = ['accountability_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"><?php echo e(old('accountability_description', $skpReport->accountabilities->first()->description ?? '')); ?></textarea>
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
unset($__errorArgs, $__bag); ?>" rows="3"><?php echo e(old('consequence_description', $skpReport->consequences->first()->description ?? '')); ?></textarea>
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
                        <a href="<?php echo e(route('skp.index')); ?>" class="btn btn-secondary btn-lg me-2">Batal</a>
                        <button type="submit" class="btn btn-success btn-lg">Update Laporan SKP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/skp_reports/edit.blade.php ENDPATH**/ ?>