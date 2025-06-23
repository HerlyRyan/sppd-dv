<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Tambah Data Detail LPJ
        </div>

        <div class="card-body">
            <form action="<?php echo e(route('lpj-header.store-detail')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="" class="form-label">Nomor Surat SPPD</label>
                        <input type="text" class="form-control" id="" name=""
                            value="<?php echo e($lpj_header->sppd->nomor_surat); ?>" disabled>

                        <input type="hidden" name="lpj_header_id" value="<?php echo e($lpj_header->id); ?>">

                        <?php $__errorArgs = ['nomor_surat_sppd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <?php if($lpj_header->submission_flag == 'N'): ?>
                        <div class="col-6 mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['nama_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="nama_kegiatan" name="nama_kegiatan">

                            <?php $__errorArgs = ['nama_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="biaya_kegiatan" class="form-label">Biaya Kegiatan</label>
                            <input type="number" class="form-control <?php $__errorArgs = ['biaya_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="biaya_kegiatan" name="biaya_kegiatan">

                            <?php $__errorArgs = ['biaya_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Detail Kegiatan LPJ
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Biaya Kegiatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $lpj_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($item->nama_kegiatan); ?></td>
                                <td><?php echo e(number_format($item->biaya_kegiatan, 0, ',', '.')); ?></td>
                                <td class="d-flex gap-1">
                                    <?php if($lpj_header->submission_flag == 'N'): ?>
                                        <div>
                                            <form action="<?php echo e(route('lpj-header.destroy-detail', $item->id)); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center">Tidak Ada Data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devi\resources\views/lpj/create-detail.blade.php ENDPATH**/ ?>