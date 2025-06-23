<style>
    /* Menambahkan styling untuk tabel dan body */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        font-size: 12px;
    }

    /* Styling untuk tanda tangan */
    .tanda-tangan-table {
        width: 100%;
        margin-top: 50px;
        border: none;
        /* Memberikan jarak setelah tabel */
    }

    .tanda-tangan-table td {
        padding-top: 10px;
        height: 100px;
        border: none;
    }

    .tanda-tangan-table td:last-child {}
</style>

<body>
    <?php
        $formattedDate = $tanggal_surat->isoFormat('dddd, D MMMM YYYY');
    ?>

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

    
    <div style="text-align: center">
        <h5>DAFTAR HADIR</h5>
        <h5><?php echo e($judul_surat); ?></h5>
        <h5 style="text-transform: uppercase"><?php echo e($formattedDate); ?></h5>
    </div>

    
    <div>
        <table>
            <tr>
                <th style="text-align: center">NO</th>
                <th style="text-align: center">NAMA</th>
                <th style="text-align: center">JABATAN</th>
                <th style="text-align: center">INSTANSI</th>
                <th style="text-align: center">TANDA TANGAN</th>
            </tr>

            <?php
                $no = 1;
            ?>

            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="text-transform: uppercase">
                    <td><?php echo e($no++); ?></td>
                    <td><?php echo e($employee->nama_pegawai); ?></td>
                    <td style="text-align: center"><?php echo e($employee->position->nama_jabatan); ?></td>
                    <td style="text-align: center"><?php echo e($employee->agency->instansi); ?></td>
                    <td></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>

    
    <table class="tanda-tangan-table">
        <tr>
            <td style="width: 50%"></td>
            <td style="width: 50%">
                <p style="margin: 0">Banjarbaru, <?php echo e($tanggal_surat->isoFormat('D MMMM YYYY')); ?></p>
                <p style="margin: 0">Ketua Tim Pelaksana</p>
                <div style="margin-top: 50px"></div>
                <p style="margin: 0"><?php echo e($ketua_tim_pelaksana->nama_pegawai); ?></p>
                <p style="margin: 0">NIP. <?php echo e($ketua_tim_pelaksana->nip); ?></p>
            </td>
        </tr>
    </table>
</body>
<?php /**PATH C:\xampp\htdocs\devi\resources\views/daftar-kehadiran.blade.php ENDPATH**/ ?>