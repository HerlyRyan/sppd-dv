

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php if(session('success')): ?>
            <div class="alert alert-success mb-3" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
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
                                <td class="d-flex gap-1">
                                    <a href="<?php echo e(asset('storage/surat/' . $item->nama_file)); ?>" class="btn btn-sm btn-success"
                                        target="_blank">
                                        Lihat
                                    </a>
                                    <?php if(Auth::user()->role == 'admin'): ?>
                                        <div>
                                            <form action="<?php echo e(route('history.destroy', $item->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/history.blade.php ENDPATH**/ ?>