<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data SPPD
                </div>
                <!--[if BLOCK]><![endif]--><?php if(Auth::user()->role == 'admin'): ?>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo e(route('sppd.create')); ?>" class="btn btn-primary">Tambah Data</a>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
        <div class="card-body">
            <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
                <div class="alert alert-success mb-3" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NOMOR SURAT</th>
                            <th>TANGGAL SURAT</th>
                            <th>NAMA PEGAWAI</th>
                            <th>TUJUAN SPPD</th>
                            <th>DURASI SPPD</th>
                            <th>TEMPAT TUJUAN</th>
                            <th>BIAYA SPPD</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($item->nomor_surat); ?></td>
                                <td style="white-space: nowrap"><?php echo e($item->tanggal_surat); ?></td>
                                <td><?php echo e($item->employee->nama_pegawai); ?></td>
                                <td><?php echo e($item->tujuan_sppd); ?></td>
                                <td><?php echo e($item->durasi_sppd); ?> Hari</td>
                                <td><?php echo e($item->tempat_tujuan); ?></td>
                                <td><?php echo e(number_format($item->biaya_sppd, 0, ',', '.')); ?></td>
                                <td><?php echo e($item->created_at); ?></td>
                                <td style="white-space: nowrap;" class="d-flex gap-1">
                                    <!--[if BLOCK]><![endif]--><?php if($item->flag_buat_surat == 'N' && Auth::user()->role == 'admin'): ?>
                                        <div>
                                            <a href="<?php echo e(route('sppd.buat-surat', $item)); ?>"
                                                class="btn btn-sm btn-primary">Buat Surat</a>
                                        </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <div>
                                        <a href="<?php echo e(route('sppd.download-surat', $item)); ?>"
                                            class="btn btn-sm btn-success">Download</a>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php if($item->flag_buat_surat == 'N' && Auth::user()->role == 'admin'): ?>
                                        <div>
                                            <form action="<?php echo e(route('sppd.destroy', $item)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\devi\resources\views/livewire/sppd-table.blade.php ENDPATH**/ ?>