<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <?php if(Auth::user()->role == 'admin'): ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Total Pegawai Aktif
                        </div>
                        <div class="card-body text-center">
                            <h2 class="card-title"><?php echo e($totalPegawaiAktif); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Total Pegawai Non Aktif
                        </div>
                        <div class="card-body text-center">
                            <h2 class="card-title"><?php echo e($totalPegawaiNonAktif); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Total SPPD <?php echo e(Auth::user()->nama_pegawai); ?>

                        </div>
                        <div class="card-body text-center">
                            <h2 class="card-title"><?php echo e(\App\Http\Controllers\SppdController::total_sppd_user()); ?>

                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devi\resources\views/welcome.blade.php ENDPATH**/ ?>