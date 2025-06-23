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
        font-size: 14px;
    }

    .signature {
        position: absolute;
        right: 0;
        text-align: left;
        margin-top: 40px;
        font-size: 14px;
    }

    .signature-line {
        border-top: 1px solid black;
        width: 250px;
        margin-top: 10px;
    }
</style>

<?php
    $formattedDate = $tanggal_surat->isoFormat('dddd, D MMMM YYYY');

    $tanggal_berangkat = \App\Http\Controllers\SppdController::formatTanggalIndo($sppd->tanggal_berangkat);
    $tanggal_kembali = \App\Http\Controllers\SppdController::formatTanggalIndo($sppd->tanggal_kembali);
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
    <h3>KANTOR REGIONAL VIII BADAN KEPEGAWAIAN NEGARA BANJARMASIN</h3>
    <p style="margin-bottom: 0px">SURAT PERJALANAN DINAS</p>
    <small style="text-transform: uppercase">Nomor: <?php echo e($sppd->nomor_surat); ?></small>
</div>


<table>
    <tr>
        <td>1</td>
        <td>Pejabat Pembuat Komitmen</td>
        <td>Kantor Regional VIII Badan Kepegawaian Negara Banjarmasin</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Nama NIP Pegawai yang melakukan perjalanan dinas</td>
        <td><?php echo e($sppd->employee->nama_pegawai); ?> <br> NIP. <?php echo e($sppd->employee->nip); ?></td>
    </tr>
    <tr>
        <td>3</td>
        <td>
            a. Pangkat dan Golongan
            <br>
            b. Jabatan / Instansi
        </td>
        <td>
            a. <?php echo e($sppd->employee->grade->golongan); ?>

            <br>
            b. <?php echo e($sppd->employee->functional_position->nama_jabatan_fungsional); ?>

        </td>
    </tr>
    <tr>
        <td>4</td>
        <td>Maksud Perjalanan Dinas</td>
        <td><?php echo e($sppd->tujuan_sppd); ?></td>
    </tr>
    <tr>
        <td>5</td>
        <td>Alat angkutan yang dipergunakan</td>
        <td><?php echo e($sppd->transportasi); ?></td>
    </tr>
    <tr>
        <td>6</td>
        <td>
            a. Tempat berangkat
            <br>
            b. Tempat tujuan
        </td>
        <td>
            a. <?php echo e($sppd->tempat_berangkat); ?>

            <br>
            b. <?php echo e($sppd->tempat_tujuan); ?>

        </td>
    </tr>
    <tr>
        <td>7</td>
        <td style="white-space: nowrap">
            a. Lamanya perjalanan dinas
            <br>
            b. Tanggal berangkat
            <br>
            c. Tanggal harus kembali
        </td>
        <td>
            a. <?php echo e($sppd->durasi_sppd); ?> Hari
            <br>
            b. <?php echo e($tanggal_berangkat); ?>

            <br>
            c. <?php echo e($tanggal_kembali); ?>

        </td>
    </tr>
</table>


<div class="signature">
    <p style="margin: 0px">Dikeluarkan di Banjarbaru</p>
    <p style="margin: 0px">Tanggal <?php echo e($formattedDate); ?></p>
    <p style="margin: 0px">Pejabat Pembuat Dokumen</p>
    <p style="margin-top: 0px; margin-bottom: 100px">Kantor Regional VIII BKN Banjarmasin</p>
    <p style="margin-bottom: 0px"><?php echo e($sppd->pejabat_pembuat_komitmen); ?></p>
    <p style="margin-top: 0px">
        NIP. <?php echo e(\App\Http\Controllers\SppdController::cari_nip_pejabat($sppd->pejabat_pembuat_komitmen)); ?>

    </p>
</div>
<?php /**PATH C:\xampp\htdocs\devi\resources\views/sppd/sppd.blade.php ENDPATH**/ ?>