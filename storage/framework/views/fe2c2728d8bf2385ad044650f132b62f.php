

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Laporan SKP</div>
                <div class="col d-flex justify-content-end">
                    <a href="<?php echo e(route('laporan.skp.print')); ?>" target="_blank" class="btn btn-primary">Cetak</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <h5 class="mb-3">Sudah Mengumpulkan SKP</h5>
            <div class="table-responsive mb-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $sudahMengumpulkan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($pegawai->nama_pegawai); ?></td>
                                <td><?php echo e($pegawai->unit_kerja->nama_unit_kerja ?? '-'); ?></td>
                                <td><?php echo e($pegawai->position->nama_jabatan ?? '-'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($sudahMengumpulkan->appends(request()->except('page'))->links()); ?>

            </div>

            
            <h5 class="mb-3">Belum Mengumpulkan SKP</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $belumMengumpulkan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($pegawai->nama_pegawai); ?></td>
                                <td><?php echo e($pegawai->unit_kerja->nama_unit_kerja ?? '-'); ?></td>
                                <td><?php echo e($pegawai->position->nama_jabatan ?? '-'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center">Semua pegawai sudah mengumpulkan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($belumMengumpulkan->appends(request()->except('page'))->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/report/skp/index.blade.php ENDPATH**/ ?>