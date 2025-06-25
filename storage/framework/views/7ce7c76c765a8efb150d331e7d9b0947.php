<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data SKP
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="<?php echo e(route('skp.create')); ?>" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <?php if(session('success')): ?>
                <div class="alert alert-success mb-3" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Periode</th>
                            <th>Penilai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($skps->isEmpty()): ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php else: ?>
                            <?php $__currentLoopData = $skps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($skp->nama_pegawai); ?></td>
                                    <td><?php echo e($skp->nip_pegawai); ?></td>
                                    <td><?php echo e($skp->jabatan_pegawai); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($skp->periode_mulai)->format('d/m/Y')); ?> -
                                        <?php echo e(\Carbon\Carbon::parse($skp->periode_selesai)->format('d/m/Y')); ?>

                                    </td>
                                    <td><?php echo e($skp->nama_penilai); ?></td>
                                    <td class="d-flex gap-1" style="white-space: nowrap">
                                        <a href="<?php echo e(route('skp.show', $skp->id)); ?>" class="btn btn-sm btn-warning" target="_blank">Lihat</a>
                                        
                                        <a href="<?php echo e(route('skp.edit', $skp->id)); ?>" class="btn btn-sm btn-info">Edit</a>
                                        <form action="<?php echo e(route('skp.destroy', $skp->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus data ini?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer">
            <?php echo e($skps->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/skp/index.blade.php ENDPATH**/ ?>