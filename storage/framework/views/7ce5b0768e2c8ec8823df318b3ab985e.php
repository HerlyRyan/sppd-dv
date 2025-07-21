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
                            <th>Bukti LPJ</th>
                            <th>Submission</th>
                            <th>Submission Date</th>
                            <th>Status Approval</th>
                            <th>Approval / Reject Date</th>
                            <th>Alasan Ditolak</th>
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
                                    <td>
                                        <?php if($item->lpjDetail?->bukti_lpj): ?>
                                            <a href="<?php echo e(asset('storage/' . $item->lpjDetail->bukti_lpj)); ?>" target="_blank"
                                                class="text-blue-600 underline">Lihat Bukti (PDF)</a>
                                        <?php else: ?>
                                            <span class="text-gray-500">Belum ada bukti</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->lpjDetail): ?>
                                            <?php if($item->submission_flag == 'Y'): ?>
                                                <span class="badge bg-success">submitted</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning">not submitted</span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            Detail Belum Ada
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->submission_date); ?></td>
                                    <td>
                                        <?php if($item->approval_status == 'N'): ?>
                                            <span class="badge bg-warning">pending</span>
                                        <?php elseif($item->approval_status == 'R'): ?>
                                            <span class="badge bg-danger">rejected</span>
                                        <?php elseif($item->approval_status == 'Y'): ?>
                                            <span class="badge bg-success">approved</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary"><?php echo e($item->approval_status); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($item->reject_reason ?? 'Tidak ada'); ?>

                                    </td>
                                    </td>
                                    <td><?php echo e($item->approval_date); ?></td>
                                    <td style="white-space: nowrap" class="d-flex gap-1">
                                        <?php if($item->submission_flag == 'N' && Auth::user()->role == 'pegawai_bkn'): ?>
                                            <?php if($item->approval_status == 'R'): ?>
                                                <div>
                                                    <a href="<?php echo e(route('lpj-header.create-detail', $item)); ?>"
                                                        class="btn btn-sm btn-warning">
                                                        Tambah Detail
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <?php if($item->lpjDetail): ?>
                                                    <div>
                                                        <form action="<?php echo e(route('lpj-header.submit', $item)); ?>"
                                                            method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if(
                                            $item->submission_flag == 'Y' &&
                                                Auth::user()->role == 'admin' &&
                                                ($item->approval_status == 'N' || $item->approval_status == 'R')): ?>
                                            <div>
                                                <form action="<?php echo e(route('lpj-header.approve', $item)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(
                                            $item->submission_flag == 'Y' &&
                                                Auth::user()->role == 'admin' &&
                                                ($item->approval_status == 'N' || $item->approval_status == 'R')): ?>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#rejectModal<?php echo e($item->id); ?>">
                                                    Reject
                                                </button>

                                                <!-- Reject Modal -->
                                                <div class="modal fade" id="rejectModal<?php echo e($item->id); ?>" tabindex="-1"
                                                    aria-labelledby="rejectModalLabel<?php echo e($item->id); ?>"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="rejectModalLabel<?php echo e($item->id); ?>">
                                                                    Alasan Penolakan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="<?php echo e(route('lpj-header.reject', $item)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="reject_reason" class="form-label">Alasan
                                                                            Penolakan</label>
                                                                        <textarea class="form-control" id="reject_reason" name="reject_reason" rows="3" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Tolak</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div>
                                            <a href="<?php echo e(route('lpj-header.show-detail', $item)); ?>"
                                                class="btn btn-sm btn-warning">
                                                Lihat Detail
                                            </a>
                                        </div>
                                        <?php if($item->submission_flag == 'Y' && $item->approval_status == 'Y'): ?>
                                            <div>
                                                <a href="<?php echo e(route('lpj-header.export', $item)); ?>"
                                                    class="btn btn-sm btn-success">
                                                    Download
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(
                                            $item->submission_flag == 'N' &&
                                                ($item->approval_status == 'N' || $item->approval_status == 'R') &&
                                                Auth::user()->role == 'admin'): ?>
                                            <div>
                                                <form action="<?php echo e(route('sppd.destroy', $item)); ?>" method="POST">
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

        </div>
        <div class="card-footer">
            <?php echo e($items->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/lpj/index.blade.php ENDPATH**/ ?>