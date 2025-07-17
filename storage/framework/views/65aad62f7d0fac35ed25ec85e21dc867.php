

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Rekapitulasi SPPD per Bulan (Tahun <?php echo e($tahun); ?>)</h5>
            <div>
                <form method="GET" action="<?php echo e(route('laporan.sppd-per-bulan.index')); ?>" class="d-inline">
                    <select name="tahun" class="form-select d-inline w-auto" onchange="this.form.submit()">
                        <?php for($y = date('Y'); $y >= 2020; $y--): ?>
                            <option value="<?php echo e($y); ?>" <?php echo e($tahun == $y ? 'selected' : ''); ?>><?php echo e($y); ?>

                            </option>
                        <?php endfor; ?>
                    </select>
                </form>

                <a href="<?php echo e(route('laporan.sppd-per-bulan.print', ['tahun' => $tahun])); ?>" class="btn btn-primary ms-2"
                    target="_blank">
                    Cetak
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Total SPPD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nama_bulan = [
                            1 => 'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember',
                        ];
                    ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($nama_bulan[$item->bulan]); ?></td>
                            <td><?php echo e($item->total_sppd); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/report/sppd_per_bulan/index.blade.php ENDPATH**/ ?>