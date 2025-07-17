<?php if (isset($component)) { $__componentOriginalb51e06b1e866a4e900ffc5f46f99fe36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb51e06b1e866a4e900ffc5f46f99fe36 = $attributes; } ?>
<?php $component = App\View\Components\PrintLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('print-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PrintLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Laporan Data Pegawai']); ?>
    <h3 class="text-center">Laporan Data Pegawai</h3>

    <table>
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
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </tbody>
    </table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb51e06b1e866a4e900ffc5f46f99fe36)): ?>
<?php $attributes = $__attributesOriginalb51e06b1e866a4e900ffc5f46f99fe36; ?>
<?php unset($__attributesOriginalb51e06b1e866a4e900ffc5f46f99fe36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb51e06b1e866a4e900ffc5f46f99fe36)): ?>
<?php $component = $__componentOriginalb51e06b1e866a4e900ffc5f46f99fe36; ?>
<?php unset($__componentOriginalb51e06b1e866a4e900ffc5f46f99fe36); ?>
<?php endif; ?>
<?php /**PATH D:\devi\resources\views/report/pegawai/print.blade.php ENDPATH**/ ?>