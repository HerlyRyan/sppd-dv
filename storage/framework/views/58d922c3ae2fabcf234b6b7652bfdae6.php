<?php if (isset($component)) { $__componentOriginalb51e06b1e866a4e900ffc5f46f99fe36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb51e06b1e866a4e900ffc5f46f99fe36 = $attributes; } ?>
<?php $component = App\View\Components\PrintLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('print-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PrintLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Laporan Perbandingan SKP Antar Pegawai']); ?>
    <h3 class="text-center">Laporan Perbandingan SKP Antar Pegawai</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jumlah SKP</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($item->nama_pegawai); ?></td>
                    <td><?php echo e($item->total_skp); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mt-4">
        <p><strong>Catatan:</strong> Laporan ini menampilkan data perbandingan jumlah SKP antar pegawai.</p>
    </div>
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
<?php /**PATH D:\devi\resources\views/report/grafik_skp/print.blade.php ENDPATH**/ ?>