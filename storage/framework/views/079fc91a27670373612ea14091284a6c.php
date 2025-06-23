<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    .th,
    .td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        font-size: 14px;
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


<div style="text-align: center; margin-bottom: 50px">
    <h3>KANTOR REGIONAL VIII BADAN KEPEGAWAIAN NEGARA BANJARMASIN</h3>
    <p style="margin-bottom: 0px">DAFTAR PENGELUARAN RILL</p>
</div>


<div style="margin-bottom: 50px">
    <p>Yang bertanda tangan di bawah:</p>

    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo e($lpj_header->sppd->employee->nama_pegawai); ?></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td><?php echo e($lpj_header->sppd->employee->nip); ?></td>
        </tr>
        <tr>
            <td>JABATAN</td>
            <td>:</td>
            <td><?php echo e($lpj_header->sppd->employee->functional_position->nama_jabatan_fungsional); ?></td>
        </tr>
    </table>

    <p style="text-align: justify">Berdasarkan Surat Perintah Perjalanan Dinas (SPD) Nomor:
        <?php echo e($lpj_header->sppd->nomor_surat); ?> Tanggal
        <?php echo e(\App\Http\Controllers\SppdController::formatTanggalIndo($lpj_header->sppd->tanggal_surat)); ?> dengan ini kami
        menyatakan dengan sesungguhnya biaya pengeluaran rill meliputi:</p>

    <table>
        <tr>
            <th class="th">No</th>
            <th class="th">Uraian</th>
            <th class="th">Jumlah</th>
        </tr>

        <?php
            $no = 1;
            $jumlah = 0;
        ?>
        <?php $__currentLoopData = $lpj_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $jumlah += $item->biaya_kegiatan;
            ?>
            <tr>
                <td class="td"><?php echo e($no++); ?></td>
                <td class="td">Rp. <?php echo e($item->nama_kegiatan); ?></td>
                <td class="td">Rp. <?php echo e(number_format($item->biaya_kegiatan, 0, ',', '.')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold" class="td">Jumlah</td>
            <td style="font-weight: bold" class="td">Rp. <?php echo e(number_format($jumlah, 0, ',', '.')); ?></td>
        </tr>

        <tr>
            <td class="td">Terbilang</td>
            <td style="font-weight: bold" class="td" colspan="2">
                <?php echo e(\App\Http\Controllers\SppdController::convert($jumlah)); ?>

            </td>
        </tr>
    </table>

    <p style="text-align: justify">
        Jumlah uang tersebut benar-benar dikeluarkan untuk pelaksanaan perjalanan dinas dimaksud dan apabila dikemudian
        hari terdapat kelebihan atas pembayaran, kami bersedia menyetorkan kelebihan tersebut ke Kas Negara
    </p>

    <p style="text-align: justify">
        Demikian pernyataan kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
    </p>
</div>


<table class="w-full">
    <tr>
        <td style="width: 20px"></td>
        <td align="right" style="text-align:center;width:200px">
            Mengetahui/Menyetujui
            <br>
            Pejabat Pembuat Komitmen
        </td>
        <td style="30px"></td>
        <td style="text-align:center;width:300px">
            Banjarbaru, <?php echo e(\Carbon\Carbon::parse($lpj_header->submission_date)->isoFormat('D MMMM YYYY')); ?>

            <br>
            Pelaksana SPD
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <br>
            <br>
            <br>
            <br>
        </td>
    </tr>
    <tr>
        <td></td>
        <td align="right" style="text-align:center;">
            <?php echo e($lpj_header->sppd->pejabat_pembuat_komitmen); ?>

            <br>
            NIP.
            <?php echo e(\App\Http\Controllers\SppdController::cari_nip_pejabat($lpj_header->sppd->pejabat_pembuat_komitmen)); ?>

        </td>
        <td></td>
        <td style="text-align:center;">
            <?php echo e($lpj_header->sppd->employee->nama_pegawai); ?>

            <br>
            NIP. <?php echo e($lpj_header->sppd->employee->nip); ?>

        </td>
    </tr>
</table>
<?php /**PATH C:\xampp\htdocs\devi\resources\views/lpj/lpj.blade.php ENDPATH**/ ?>