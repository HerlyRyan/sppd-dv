

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Edit Data
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('unit_kerja.update', $unit_kerja)); ?>" method="POST">
                <div class="row gap-3">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="col-12">
                        <label for="nama_unit_kerja" class="form-label">Nama Unit Kerja</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['nama_unit_kerja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_unit_kerja"
                            name="nama_unit_kerja" value="<?php echo e(old('nama_unit_kerja', $unit_kerja->nama_unit_kerja)); ?>">

                        <?php $__errorArgs = ['nama_unit_kerja'];
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/unit-kerja/edit.blade.php ENDPATH**/ ?>