<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Data Laporan Sasaran Kinerja Pegawai (SKP)
                    </div>
                    <?php
                        $role = Auth::user()->role;
                    ?>
                    <?php if($role !== 'pimpinan_bkn'): ?>
                        <div class="col d-flex justify-content-end">
                            <a href="<?php echo e(route('skp.create')); ?>" class="btn btn-primary">Tambah Data</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-body">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 5%;">No</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Penilai</th>
                                <th scope="col">Status</th>
                                <th scope="col">Alasan Ditolak</th>
                                <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($skpReports->isEmpty()): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Tidak ada data laporan SKP.
                                        Silakan tambahkan data baru.</td>
                                </tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $skpReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skpReport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td><?php echo e($skpReport->pegawai->nama_pegawai ?? 'N/A'); ?></td>
                                        <td><?php echo e($skpReport->pegawai->nip ?? 'N/A'); ?></td>
                                        <td><?php echo e($skpReport->pegawai->position->nama_jabatan ?? 'N/A'); ?></td>

                                        <td>
                                            <?php echo e(\Carbon\Carbon::parse($skpReport->periode_mulai)->format('d/m/Y')); ?> -
                                            <?php echo e(\Carbon\Carbon::parse($skpReport->periode_selesai)->format('d/m/Y')); ?>

                                        </td>
                                        <td><?php echo e($skpReport->penilai->nama_pegawai ?? 'N/A'); ?></td>
                                        <td>
                                            <?php switch($skpReport->status):
                                                case ('pending'): ?>
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                <?php break; ?>

                                                <?php case ('rejected'): ?>
                                                    <span class="badge bg-danger">Ditolak</span>
                                                <?php break; ?>

                                                <?php case ('approved_stage_1'): ?>
                                                    <span class="badge bg-info">Disetujui Tahap 1</span>
                                                <?php break; ?>

                                                <?php case ('approved'): ?>
                                                    <span class="badge bg-success">Disetujui</span>
                                                <?php break; ?>

                                                <?php default: ?>
                                                    <span class="badge bg-secondary"><?php echo e($skpReport->status); ?></span>
                                            <?php endswitch; ?>
                                        </td>
                                        <td><?php echo e($skpReport->reject_reason ?? 'Tidak ada'); ?></td>
                                        </td>
                                        <td class="d-flex gap-1 justify-content-center" style="white-space: nowrap">

                                            <?php if($role === 'pimpinan_unit_kerja'): ?>
                                                <?php if($skpReport->status === 'pending' || $skpReport->status === 'rejected'): ?>
                                                    <div>
                                                        <form action="<?php echo e(route('skp.approved_stage_one', $skpReport)); ?>"
                                                            method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">Approve</button>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#rejectModal<?php echo e($skpReport->id); ?>">
                                                            Reject
                                                        </button>

                                                        <!-- Reject Modal -->
                                                        <div class="modal fade" id="rejectModal<?php echo e($skpReport->id); ?>"
                                                            tabindex="-1"
                                                            aria-labelledby="rejectModalLabel<?php echo e($skpReport->id); ?>"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="rejectModalLabel<?php echo e($skpReport->id); ?>">
                                                                            Alasan Penolakan</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="<?php echo e(route('skp.rejected', $skpReport)); ?>"
                                                                        method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="reject_reason"
                                                                                    class="form-label">Alasan
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
                                            <?php endif; ?>

                                            <?php if($role === 'pimpinan_bkn'): ?>
                                                <?php if($skpReport->status === 'approved_stage_1'): ?>
                                                    <div>
                                                        <form action="<?php echo e(route('skp.approved_final', $skpReport)); ?>"
                                                            method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">Approve</button>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#rejectModal<?php echo e($skpReport->id); ?>">
                                                            Reject
                                                        </button>

                                                        <!-- Reject Modal -->
                                                        <div class="modal fade" id="rejectModal<?php echo e($skpReport->id); ?>"
                                                            tabindex="-1"
                                                            aria-labelledby="rejectModalLabel<?php echo e($skpReport->id); ?>"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="rejectModalLabel<?php echo e($skpReport->id); ?>">
                                                                            Alasan Penolakan</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="<?php echo e(route('skp.rejected', $skpReport)); ?>"
                                                                        method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="reject_reason"
                                                                                    class="form-label">Alasan
                                                                                    Penolakan</label>
                                                                                <textarea class="form-control" id="reject_reason" name="reject_reason" rows="3" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
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
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('skp.show', $skpReport->id)); ?>"
                                                class="btn btn-sm btn-warning" target="_blank" title="Lihat Detail">
                                                <i class="bi bi-eye"></i> Lihat
                                            </a>
                                            <?php if($skpReport->status == 'approved'): ?>
                                                <a href="<?php echo e(route('skp.print', $skpReport->id)); ?>"
                                                    class="btn btn-sm btn-success" target="_blank">Cetak</a>
                                            <?php endif; ?>
                                            <?php if($skpReport->status !== 'approved'): ?>
                                                <a href="<?php echo e(route('skp.edit', $skpReport->id)); ?>"
                                                    class="btn btn-sm btn-info" title="Edit Data">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="<?php echo e(route('skp.destroy', $skpReport->id)); ?>" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data laporan SKP ini? Tindakan ini tidak dapat dibatalkan.');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        title="Hapus Data">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/skp_reports/index.blade.php ENDPATH**/ ?>