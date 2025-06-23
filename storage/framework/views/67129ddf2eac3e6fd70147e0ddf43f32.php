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

    .w-full td {
        border: none;
    }


    .w-full {
        margin-top: 40px;
        width: 100%;
        border: none;
    }

    .w-half {
        width: 50%;
    }
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

    
    <div style="text-align: center; margin-bottom: 10px">
        <h3>DAFTAR NOMINATIF</h5>
            <p><?php echo e($judul_surat); ?></p>
            <small style="text-transform: uppercase"><?php echo e($formattedDate); ?></small>
    </div>

    
    <div>
        <table>
            <tr>
                <th style="text-align: center">NO</th>
                <th style="text-align: center">NAMA/NIP/NPWP</th>
                <th style="text-align: center">GOL</th>
                <th style="text-align: center">JABATAN</th>
                <th style="text-align: center">JUMLAH HONOR(RP)</th>
                <th style="text-align: center">PPH 21(RP)</th>
                <th style="text-align: center">JUMLAH DITERIMA(RP)</th>
                <th style="text-align: center">KETERANGAN</th>
            </tr>

            <?php
                $no = 1;
                $jumlah_honor = 0;
                $pph_21 = 0;
                $jumlah_diterima = 0;
            ?>

            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $jumlah_honor += $employee->grade->gaji_pokok;
                    $pph_21 +=
                        $employee->grade->gaji_pokok -
                        ($employee->grade->gaji_pokok - $employee->grade->pajak * ($employee->grade->gaji_pokok / 100));
                    $jumlah_diterima +=
                        $employee->grade->gaji_pokok - $employee->grade->pajak * ($employee->grade->gaji_pokok / 100);
                ?>

                <tr style="text-transform: uppercase">
                    <td><?php echo e($no++); ?></td>
                    <td>
                        <?php echo e($employee->nama_pegawai); ?>

                        <br>
                        <?php echo e($employee->nip); ?>

                        <br>
                        <?php echo e($employee->npwp); ?>

                    </td>
                    <td style="text-align: center"><?php echo e($employee->grade->golongan); ?></td>
                    <td style="text-align: center"><?php echo e($employee->position->nama_jabatan); ?></td>
                    <td style="text-align: right"><?php echo e(number_format($employee->grade->gaji_pokok, 0, ',', '.')); ?></td>
                    <td style="text-align: right">
                        <?php echo e(number_format($employee->grade->gaji_pokok - ($employee->grade->gaji_pokok - $employee->grade->pajak * ($employee->grade->gaji_pokok / 100)), 0, ',', '.')); ?>

                    </td>
                    <td style="text-align: right">
                        <?php echo e(number_format($employee->grade->gaji_pokok - $employee->grade->pajak * ($employee->grade->gaji_pokok / 100), 0, ',', '.')); ?>

                    </td>
                    <td></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td></td>
                <td style="text-align: right;"><b>Jumlah>>>>>>></b></td>
                <td></td>
                <td></td>
                <td style="font-weight: bold; text-align: right">
                    <?php echo e(number_format($jumlah_honor, 0, ',', '.')); ?>

                </td>
                <td style="font-weight: bold; text-align: right">
                    <?php echo e(number_format($pph_21, 0, ',', '.')); ?>

                </td>
                <td style="font-weight: bold; text-align: right">
                    <?php echo e(number_format($jumlah_diterima, 0, ',', '.')); ?>

                </td>
                <td></td>
            </tr>
        </table>
    </div>

    
    <table class="w-full">
        <tr>
            <td style="width: 20px"></td>
            <td align="right" style="text-align:center;width:200px">
                Setuju Dibayar
                <br>
                Pejabat Pembuat Komitmen
            </td>
            <td style="30px"></td>
            <td style="text-align:center;width:300px">
                Banjarbaru, <?php echo e($tanggal_surat->isoFormat('D MMMM YYYY')); ?>

                <br>
                <p>Bendahara</p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td align="right" style="text-align:center;">
                <?php echo e($pejabat_pembuat_komitmen->nama_pegawai); ?>

                <br>
                NIP. <?php echo e($pejabat_pembuat_komitmen->nip); ?>

            </td>
            <td></td>
            <td style="text-align:center;">
                <?php echo e($bendahara->nama_pegawai); ?>

                <br>
                NIP. <?php echo e($bendahara->nip); ?>

            </td>
        </tr>
    </table>
</body>
<?php /**PATH C:\laragon\www\devi\resources\views/daftar-nominatif.blade.php ENDPATH**/ ?>