

<?php $__env->startSection('content'); ?>

    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Laporan Pegawai
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo e(route('laporan.pegawai.print')); ?>" target="_blank" class="btn btn-primary">Cetak</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <?php if(session('success')): ?>
                    <div class="alert alert-success mb-3" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <form method="GET" action="<?php echo e(route('laporan.pegawai.index')); ?>" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control"
                            placeholder="Cari nama/NIP pegawai...">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </form>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th>Jabatan Fungsional</th>
                                <th>Golongan</th>
                                <th>Gaji Pokok (Rp)</th>
                                <th>Pajak</th>
                                <th>Gaji Setelah Pajak (Rp)</th>
                                <th>Lamanya (Tahun)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($items->isEmpty()): ?>
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->nip); ?></td>
                                        <td><?php echo e($item->nama_pegawai); ?></td>
                                        <td><?php echo e($item->jenis_kelamin); ?></td>
                                        <td><?php echo e($item->position->nama_jabatan); ?></td>
                                        <td><?php echo e($item->functional_position->nama_jabatan_fungsional); ?></td>
                                        <td><?php echo e($item->grade->golongan); ?></td>
                                        <td><?php echo e(number_format($item->grade->gaji_pokok, 0, ',', '.')); ?></td>
                                        <td><?php echo e(number_format($item->grade->pajak, 0, ',', '.')); ?>%</td>
                                        <td><?php echo e(number_format($item->grade->gaji_pokok - $item->grade->pajak * ($item->grade->gaji_pokok / 100), 0, ',', '.')); ?>

                                        </td>
                                        <td><?php echo e($item->grade->lama); ?> tahun</td>
                                        <td><span
                                                class="badge <?php echo e($item->status == 'aktif' ? 'text-bg-success' : 'text-bg-danger'); ?>"><?php echo e($item->status); ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <?php echo e($items->appends(['search' => request('search')])->links()); ?>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/report/pegawai/index.blade.php ENDPATH**/ ?>