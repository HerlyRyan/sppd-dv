<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Tambah Data LPJ
        </div>

        <div class="card-body">
            <form action="<?php echo e(route('lpj-header.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row gap-3">
                    <div class="col-12">
                        <label for="sppd_id" class="form-label">SPPD</label>
                        <select name="sppd_id" id="sppd_id" class="form-select <?php $__errorArgs = ['sppd_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="" selected>-- Pilih SPPD --</option>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sppd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sppd->id); ?>" <?php if(old('sppd_id') == $sppd->id): echo 'selected'; endif; ?>>
                                    <?php echo e($sppd->nomor_surat); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php $__errorArgs = ['sppd_id'];
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
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devi\resources\views/lpj/create.blade.php ENDPATH**/ ?>