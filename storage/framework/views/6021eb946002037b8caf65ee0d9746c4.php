<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?php echo e($title ?? 'Laporan'); ?></title>
    <style>
        @media print {
            @page {
                margin: 1.5cm;
            }
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            color: #000;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .kop-surat img {
            position: absolute;
            left: 2cm;
            top: 1cm;
            width: 80px;
        }

        .kop-surat h1,
        .kop-surat h2,
        .kop-surat p {
            margin: 0;
            line-height: 1.2;
        }

        .content {
            margin-top: 20px;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th,
        table td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div style="text-align: center">
        <div>
            <img src="<?php echo e(asset('assets/images/logos/logo-garuda.png')); ?>" width="80">
        </div>
        <h2 style="margin-bottom: 0; font-weight: bolder">
            BADAN KEPEGAWAIAN NEGARA
            <br>
            KANTOR REGIONAL VIII
        </h2>
        <p style="margin: 0;">
            Jalan Bhayangkara Nomor 1 Banjarbaru Selatan, Banjarbaru, Kalimantan Selatan 70714
            <br>
            Telepon (0511) 4781552; Faksmile (0511) 4782314
            <br>
            Laman: banjarbaru.bkn.go.id; Pos-el: kanreg8@bkn.go.id
        </p>
    </div>
    <div class="kop-surat">
    </div>

    <div class="content">
        <?php echo e($slot); ?>

    </div>
</body>

</html>
<?php /**PATH D:\devi\resources\views/components/print-layout.blade.php ENDPATH**/ ?>