

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Ringkasan Kinerja per Unit Kerja</div>
                <div class="col d-flex justify-content-end">
                    <a href="<?php echo e(route('laporan.ringkasan-kinerja.print')); ?>" target="_blank" class="btn btn-primary">Cetak</a>
                </div>
            </div>            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Unit Kerja</th>
                            <th>Total SKP</th>
                            <th>Disetujui</th>
                            <th>Ditolak</th>
                            <th>Menunggu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($item->unit_kerja); ?></td>
                                <td><?php echo e($item->total_skp); ?></td>
                                <td><?php echo e($item->skp_disetujui); ?></td>
                                <td><?php echo e($item->skp_ditolak); ?></td>
                                <td><?php echo e($item->skp_menunggu); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/report/ringkasan_kinerja/index.blade.php ENDPATH**/ ?>