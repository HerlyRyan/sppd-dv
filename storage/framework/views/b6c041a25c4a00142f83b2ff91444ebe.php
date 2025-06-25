<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    th, td {
        border: 1px solid black;
        padding: 6px;
        text-align: left;
    }

    .signature {
        margin-top: 40px;
        text-align: left;
        font-size: 13px;
    }

    .text-center {
        text-align: center;
    }

    .mt-2 {
        margin-top: 12px;
    }

    .mb-2 {
        margin-bottom: 12px;
    }
</style>

<?php if (isset($component)) { $__componentOriginalb7b80f38d0023f8f730a94fb78f032db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb7b80f38d0023f8f730a94fb78f032db = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kop-surat','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('kop-surat'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb7b80f38d0023f8f730a94fb78f032db)): ?>
<?php $attributes = $__attributesOriginalb7b80f38d0023f8f730a94fb78f032db; ?>
<?php unset($__attributesOriginalb7b80f38d0023f8f730a94fb78f032db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb7b80f38d0023f8f730a94fb78f032db)): ?>
<?php $component = $__componentOriginalb7b80f38d0023f8f730a94fb78f032db; ?>
<?php unset($__componentOriginalb7b80f38d0023f8f730a94fb78f032db); ?>
<?php endif; ?>

<div class="text-center mb-2">
    <h3>SASARAN KINERJA PEGAWAI</h3>
    <p>PERIODE PENILAIAN: <?php echo e(\Carbon\Carbon::parse($skp->periode_mulai)->format('d M Y')); ?> s/d <?php echo e(\Carbon\Carbon::parse($skp->periode_selesai)->format('d M Y')); ?></p>
</div>

<table class="mb-2">
    <tr>
        <td style="width: 50%">Nama Pegawai: <strong><?php echo e($skp->nama_pegawai); ?></strong></td>
        <td>Nama Penilai: <strong><?php echo e($skp->nama_penilai); ?></strong></td>
    </tr>
    <tr>
        <td>NIP: <?php echo e($skp->nip_pegawai); ?></td>
        <td>NIP: <?php echo e($skp->nip_penilai); ?></td>
    </tr>
    <tr>
        <td>Pangkat: <?php echo e($skp->pangkat_pegawai); ?></td>
        <td>Pangkat: <?php echo e($skp->pangkat_penilai); ?></td>
    </tr>
    <tr>
        <td>Jabatan: <?php echo e($skp->jabatan_pegawai); ?></td>
        <td>Jabatan: <?php echo e($skp->jabatan_penilai); ?></td>
    </tr>
    <tr>
        <td>Unit Kerja: <?php echo e($skp->unit_kerja_pegawai); ?></td>
        <td>Unit Kerja: <?php echo e($skp->unit_kerja_penilai); ?></td>
    </tr>
</table>

<h4 class="mb-2">Rencana Hasil Kerja dan Indikator</h4>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Rencana Kerja</th>
            <th>Aspek</th>
            <th>Indikator</th>
            <th>Target</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $skp->indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $indikator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e(ucfirst($indikator->kategori)); ?></td>
                <td><?php echo e($indikator->rencana_kerja); ?></td>
                <td><?php echo e($indikator->aspek); ?></td>
                <td><?php echo e($indikator->indikator); ?></td>
                <td><?php echo e($indikator->target); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="signature mt-2">
    <p>Banjarbaru, <?php echo e(now()->format('d F Y')); ?></p>
    <p>Pejabat Penilai Kinerja</p>
    <br><br><br>
    <p><strong><?php echo e($skp->nama_penilai); ?></strong></p>
    <p>NIP. <?php echo e($skp->nip_penilai); ?></p>
</div>
<?php /**PATH D:\devi\resources\views/skp/skp.blade.php ENDPATH**/ ?>