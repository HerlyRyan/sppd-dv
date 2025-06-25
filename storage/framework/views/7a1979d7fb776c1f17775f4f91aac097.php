<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white text-center py-4">
                <h5 class="mb-1">PEMERINTAH KOTA BANJARBARU</h5>
                <h4 class="mb-1">SASARAN KINERJA PEGAWAI</h4>
                <h5 class="mb-3">PENDEKATAN HASIL KERJA KUANTITATIF</h5>
                <h6 class="mb-0">BAGI PEJABAT ADMINISTRASI DAN PEJABAT FUNGSIONAL</h6>
                <p class="mb-0">PERIODE PENILAIAN:
                    <?php echo e(\Carbon\Carbon::parse($skpReport->periode_mulai)->format('d F Y')); ?> SD
                    <?php echo e(\Carbon\Carbon::parse($skpReport->periode_selesai)->format('d F Y')); ?>

                </p>
            </div>

            <div class="card-body p-4">
                <div class="row mb-4">
                    <div class="col-md-6 border-end">
                        <h5 class="text-primary mb-3">PEGAWAI YANG DINILAI</h5>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td style="width: 30%;">NAMA</td>
                                <td style="width: 5%;">:</td>
                                <td><?php echo e($skpReport->pegawai->nama_pegawai ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td><?php echo e($skpReport->pegawai->nip ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <td>PANGKAT/GOL. RUANG</td>
                                <td>:</td>
                                <td><?php echo e($skpReport->pegawai->grade->golongan ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <td>JABATAN</td>
                                <td>:</td>
                                <td><?php echo e($skpReport->pegawai->position->nama_jabatan ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <td>UNIT KERJA</td>
                                <td>:</td>
                                <td><?php echo e($skpReport->pegawai->agency->instansi ?? 'N/A'); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary mb-3">PEJABAT PENILAI KINERJA</h5>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td style="width: 30%;">NAMA</td>
                                <td style="width: 5%;">:</td>
                                <td><?php echo e($skpReport->penilai->nama_pegawai ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td><?php echo e($skpReport->penilai->nip ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <td>PANGKAT/GOL. RUANG</td>
                                <td>:</td>
                                <td><?php echo e($skpReport->penilai->grade->golongan ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <td>JABATAN</td>
                                <td>:</td>
                                <td><?php echo e($skpReport->penilai->position->nama_jabatan ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <td>UNIT KERJA</td>
                                <td>:</td>
                                <td><?php echo e($skpReport->pegawai->agency->instansi ?? 'N/A'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <h5 class="text-primary mb-3 mt-4">HASIL KERJA</h5>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr>
                                <th rowspan="2" class="align-middle text-center" style="width: 5%;">NO</th>
                                <th rowspan="2" class="align-middle text-center" style="width: 25%;">RENCANA HASIL KERJA
                                    PIMPINAN YANG DIINTERVENSI</th>
                                <th rowspan="2" class="align-middle text-center" style="width: 25%;">RENCANA HASIL KERJA
                                </th>
                                <th colspan="3" class="text-center">INDIKATOR KINERJA INDIVIDU</th>
                            </tr>
                            <tr>
                                <th class="text-center" style="width: 10%;">ASPEK</th>
                                <th class="text-center" style="width: 20%;">INDIKATOR KINERJA INDIVIDU</th>
                                <th class="text-center" style="width: 15%;">TARGET</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $skpReport->workResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $workResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $firstIndicator = true;
                                ?>
                                <?php $__empty_2 = true; $__currentLoopData = $workResult->performanceIndicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind => $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <?php if($firstIndicator): ?>
                                            <td rowspan="<?php echo e(count($workResult->performanceIndicators)); ?>"
                                                class="align-top text-center"><?php echo e($index + 1); ?></td>
                                            <td rowspan="<?php echo e(count($workResult->performanceIndicators)); ?>"
                                                class="align-top"><?php echo e($workResult->rencana_hasil_kerja_pimpinan ?? '-'); ?>

                                            </td>
                                            <td rowspan="<?php echo e(count($workResult->performanceIndicators)); ?>"
                                                class="align-top"><?php echo e($workResult->rencana_hasil_kerja); ?></td>
                                            <?php $firstIndicator = false; ?>
                                        <?php endif; ?>
                                        <td><?php echo e($indicator->aspek); ?></td>
                                        <td><?php echo e($indicator->indikator_kinerja_individu); ?></td>
                                        <td><?php echo e($indicator->target); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td class="align-top text-center"><?php echo e($index + 1); ?></td>
                                        <td class="align-top"><?php echo e($workResult->rencana_hasil_kerja_pimpinan ?? '-'); ?></td>
                                        <td class="align-top"><?php echo e($workResult->rencana_hasil_kerja); ?></td>
                                        <td colspan="3" class="text-center text-muted">Tidak ada indikator kinerja</td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada Hasil Kerja Utama/Tambahan.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <h5 class="text-primary mb-3 mt-4">PERILAKU KERJA</h5>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%;">NO</th>
                                <th style="width: 30%;">PERILAKU KERJA</th>
                                <th style="width: 45%;">DESKRIPSI</th>
                                <th style="width: 20%;">EKSPEKTASI KHUSUS PIMPINAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $skpReport->workBehaviors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $behavior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-center align-top"><?php echo e($index + 1); ?></td>
                                    <td class="align-top"><strong><?php echo e($behavior->perilaku_kerja); ?></strong></td>
                                    <td class="align-top"><?php echo e($behavior->deskripsi_perilaku ?? '-'); ?></td>
                                    <td class="align-top"><?php echo e($behavior->ekspektasi_pimpinan); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada data Perilaku Kerja.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <h5 class="text-primary mb-3 mt-4">LAMPIRAN SASARAN KINERJA PEGAWAI</h5>
                <div class="mb-4">
                    <h6 class="text-secondary mb-2">DUKUNGAN SUMBER DAYA</h6>
                    <ol>
                        <?php $__empty_1 = true; $__currentLoopData = $skpReport->supportingResources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><?php echo e($resource->resource_name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="text-muted">Tidak ada dukungan sumber daya yang tercatat.</li>
                        <?php endif; ?>
                    </ol>
                </div>

                <div class="mb-4">
                    <h6 class="text-secondary mb-2">PERTANGGUNGJAWABAN (SKEMA)</h6>
                    <ol>
                        <?php $__empty_1 = true; $__currentLoopData = $skpReport->accountabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accountability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><?php echo e($accountability->description); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="text-muted">Tidak ada skema pertanggungjawaban yang tercatat.</li>
                        <?php endif; ?>
                    </ol>
                </div>

                <div class="mb-4">
                    <h6 class="text-secondary mb-2">KONSEKUENSI</h6>
                    <ol>
                        <?php $__empty_1 = true; $__currentLoopData = $skpReport->consequences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consequence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><?php echo e($consequence->description); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="text-muted">Tidak ada konsekuensi yang tercatat.</li>
                        <?php endif; ?>
                    </ol>
                </div>

                <div class="d-flex justify-around">
                    <div class="row mt-4">
                        <div class="text-center">
                            <p class="mb-4">Pegawai yang Dinilai</p>
                            <br><br><br> 
                            <p class="mb-0"><strong><?php echo e($skpReport->pegawai->name ?? 'N/A'); ?></strong></p>
                            <p class="mb-0">NIP. <?php echo e($skpReport->pegawai->nip ?? 'N/A'); ?></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="text-center">
                            <p class="mb-1"><?php echo e(\Carbon\Carbon::parse($skpReport->tanggal_penilaian)->format('d F Y')); ?>

                            </p>
                            <p class="mb-4">Pejabat Penilai Kinerja</p>
                            <br><br><br> 
                            <p class="mb-0"><strong><?php echo e($skpReport->penilai->name ?? 'N/A'); ?></strong></p>
                            <p class="mb-0">NIP. <?php echo e($skpReport->penilai->nip ?? 'N/A'); ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/skp_reports/show.blade.php ENDPATH**/ ?>