

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data Jabatan
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="<?php echo e(route('positions.create')); ?>" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <?php if(session('success')): ?>
                <div class="alert alert-success mb-3" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($items->isEmpty()): ?>
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php else: ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->nama_jabatan); ?></td>
                                <td class="d-flex gap-1">
                                    <div>
                                        <a href="<?php echo e(route('positions.edit', $item)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                    </div>
                                    <div>
                                        <form action="<?php echo e(route('positions.destroy', $item)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/jabatan/index.blade.php ENDPATH**/ ?>