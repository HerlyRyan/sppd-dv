

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Detail Kegiatan LPJ
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="<?php echo e(route('lpj-header.index')); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Biaya Kegiatan</th>
                            <th>Bukti LPJ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $lpj_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($item->nama_kegiatan); ?></td>
                                <td><?php echo e(number_format($item->biaya_kegiatan, 0, ',', '.')); ?></td>
                                <td><a href="<?php echo e(asset('storage/' . $item->bukti_lpj)); ?>" target="_blank"
                                        class="text-blue-600 underline">Lihat Bukti (PDF)</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center">Tidak Ada Data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/lpj/lpj-detail.blade.php ENDPATH**/ ?>