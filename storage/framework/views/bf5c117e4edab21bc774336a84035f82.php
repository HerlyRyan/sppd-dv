<?php if (isset($component)) { $__componentOriginalb51e06b1e866a4e900ffc5f46f99fe36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb51e06b1e866a4e900ffc5f46f99fe36 = $attributes; } ?>
<?php $component = App\View\Components\PrintLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('print-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PrintLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Laporan Kehadiran Tahunan Pegawai']); ?>
    <h3 class="text-center">Laporan Kehadiran Tahunan Pegawai Tahun: <?php echo e($tahun); ?></h3>

    <table>
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
<?php /**PATH D:\devi\resources\views/report/kehadiran_tahunan/print.blade.php ENDPATH**/ ?>