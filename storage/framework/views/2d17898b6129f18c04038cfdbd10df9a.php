

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            History Surat
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No Surat</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal Dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($items->isEmpty()): ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php else: ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->no_surat); ?></td>
                                <td><?php echo e($item->jenis_surat); ?></td>
                                <td><?php echo e($item->tanggal_surat); ?></td>
                                <td>
                                    <a href="<?php echo e(asset('storage/surat/' . $item->nama_file)); ?>"
                                        class="btn btn-sm btn-success" target="_blank">
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?php echo e($items->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devi\resources\views/history.blade.php ENDPATH**/ ?>