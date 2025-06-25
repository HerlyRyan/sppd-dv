<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <div class="card shadow-sm">            
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Data Laporan Sasaran Kinerja Pegawai (SKP)
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo e(route('skp.create')); ?>" class="btn btn-primary">Tambah Data</a>
                    </div>
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
                                <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($skpReports->isEmpty()): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Tidak ada data laporan SKP. Silakan tambahkan data baru.</td>
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
                                        <td class="d-flex gap-1 justify-content-center" style="white-space: nowrap">
                                            <a href="<?php echo e(route('skp.show', $skpReport->id)); ?>" class="btn btn-sm btn-warning" target="_blank" title="Lihat Detail">
                                                <i class="bi bi-eye"></i> Lihat
                                            </a>
                                            
                                            <a href="<?php echo e(route('skp.print', $skpReport->id)); ?>" class="btn btn-sm btn-success" target="_blank">Cetak</a>
                                            <a href="<?php echo e(route('skp.edit', $skpReport->id)); ?>" class="btn btn-sm btn-info" title="Edit Data">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="<?php echo e(route('skp.destroy', $skpReport->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus data laporan SKP ini? Tindakan ini tidak dapat dibatalkan.');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
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