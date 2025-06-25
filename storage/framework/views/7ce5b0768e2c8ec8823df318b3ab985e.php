<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data LPJ
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="<?php echo e(route('lpj-header.create')); ?>" class="btn btn-primary">Tambah Data</a>
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
                            <th>SPPD</th>
                            <th>Pegawai</th>
                            <th>Anggaran Biaya SPPD</th>
                            <th>Biaya rill</th>
                            <th>Submission</th>
                            <th>Submission Date</th>
                            <th>Status Approval</th>
                            <th>Approval / Reject Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($items->isEmpty()): ?>
                            <tr>
                                <td colspan="10" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php else: ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->sppd->nomor_surat); ?></td>
                                    <td><?php echo e($item->sppd->employee->nama_pegawai); ?></td>
                                    <td><?php echo e(number_format($item->sppd->biaya_sppd, 0, ',', '.')); ?></td>
                                    <td>
                                        <?php echo e(number_format(\App\Http\Controllers\LpjHeaderController::cek_biaya_rill($item->id), 0, ',', '.')); ?>

                                    </td>
                                    <td><?php echo e($item->submission_flag); ?></td>
                                    <td><?php echo e($item->submission_date); ?></td>
                                    <td><?php echo e($item->approval_status); ?></td>
                                    <td><?php echo e($item->approval_date); ?></td>
                                    <td style="white-space: nowrap" class="d-flex gap-1">
                                        <?php if($item->submission_flag == 'N' && Auth::user()->role == 'pegawai'): ?>
                                            <div>
                                                <form action="<?php echo e(route('lpj-header.submit', $item)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($item->submission_flag == 'Y' && Auth::user()->role == 'admin' && $item->approval_status == 'N'): ?>
                                            <div>
                                                <form action="<?php echo e(route('lpj-header.approve', $item)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($item->submission_flag == 'Y' && Auth::user()->role == 'admin' && $item->approval_status == 'N'): ?>
                                            <div>
                                                <form action="<?php echo e(route('lpj-header.reject', $item)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        <?php endif; ?>

                                        <div>
                                            <a href="<?php echo e(route('lpj-header.create-detail', $item)); ?>"
                                                class="btn btn-sm btn-warning">
                                                Lihat
                                            </a>
                                        </div>

                                        <div>
                                            <a href="<?php echo e(route('lpj-header.export', $item)); ?>"
                                                class="btn btn-sm btn-success">
                                                Download
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer">
            <?php echo e($items->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/lpj/index.blade.php ENDPATH**/ ?>