<?php if (isset($component)) { $__componentOriginalb51e06b1e866a4e900ffc5f46f99fe36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb51e06b1e866a4e900ffc5f46f99fe36 = $attributes; } ?>
<?php $component = App\View\Components\PrintLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('print-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PrintLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Rekapitulasi SPPD per Bulan - '.e($tahun).'']); ?>
    <h3 class="text-center">Rekapitulasi SPPD per Bulan</h3>
    <p class="text-center">Tahun: <strong><?php echo e($tahun); ?></strong></p>

    <table>
        <thead>
            <tr>
                <th style="width: 50%;">Bulan</th>
                <th>Total SPPD</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nama_bulan = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($nama_bulan[$item->bulan]); ?></td>
                    <td><?php echo e($item->total_sppd); ?></td>
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
<?php /**PATH D:\devi\resources\views/report/sppd_per_bulan/print.blade.php ENDPATH**/ ?>