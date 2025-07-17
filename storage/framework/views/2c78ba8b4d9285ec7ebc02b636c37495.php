

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Laporan Kehadiran Tahunan Pegawai</div>
                <div class="col d-flex justify-content-end">
                    <a href="<?php echo e(route('laporan.kehadiran-tahunan.print', ['tahun' => request('tahun')])); ?>" target="_blank"
                        class="btn btn-primary">Cetak</a>
                </div>
            </div>
            <form action="<?php echo e(route('laporan.kehadiran-tahunan.index')); ?>" method="GET"
                class="d-flex align-items-center gap-2">
                <div>Laporan Kehadiran Pegawai Tahun:</div>
                <input type="number" name="tahun" value="<?php echo e($tahun); ?>" class="form-control" style="width: 100px;">
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                <a href="<?php echo e(route('laporan.kehadiran-tahunan.index')); ?>" class="btn btn-secondary btn-sm">Reset</a>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>Jumlah SPPD</th>
                            <th>Total Hari Hadir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($item->nama_pegawai); ?></td>
                                <td><?php echo e($item->unit_kerja); ?></td>
                                <td><?php echo e($item->jumlah_sppd); ?></td>
                                <td><?php echo e($item->total_hari_hadir); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/report/kehadiran_tahunan/index.blade.php ENDPATH**/ ?>