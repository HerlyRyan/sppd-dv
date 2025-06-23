<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data Pegawai
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
                <div class="alert alert-success mb-3" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <div class="mb-3">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Search">
            </div>

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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php if($items->isEmpty()): ?>
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php else: ?>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <td class="d-flex gap-1">
                                        <div>
                                            <a href="<?php echo e(route('employees.edit', $item)); ?>"
                                                class="btn btn-sm btn-warning">Edit</a>
                                        </div>
                                        <div>
                                            <form action="<?php echo e(route('employees.destroy', $item)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <?php echo e($items->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\devi\resources\views/livewire/employees-table.blade.php ENDPATH**/ ?>