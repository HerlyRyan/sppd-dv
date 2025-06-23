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

@php
    $formattedDate = $tanggal_surat->isoFormat('dddd, D MMMM YYYY');

    $tanggal_berangkat = \App\Http\Controllers\SppdController::formatTanggalIndo($sppd->tanggal_berangkat);
    $tanggal_kembali = \App\Http\Controllers\SppdController::formatTanggalIndo($sppd->tanggal_kembali);
@endphp

<x-kop-surat />

{{-- JUDUL --}}
<div style="text-align: center; margin-bottom: 10px">
    <h3>KANTOR REGIONAL VIII BADAN KEPEGAWAIAN NEGARA BANJARMASIN</h3>
    <p style="margin-bottom: 0px">SURAT PERJALANAN DINAS</p>
    <small style="text-transform: uppercase">Nomor: {{ $sppd->nomor_surat }}</small>
</div>

{{-- TABEL --}}
<table>
    <tr>
        <td>1</td>
        <td>Pejabat Pembuat Komitmen</td>
        <td>Kantor Regional VIII Badan Kepegawaian Negara Banjarmasin</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Nama NIP Pegawai yang melakukan perjalanan dinas</td>
        <td>{{ $sppd->employee->nama_pegawai }} <br> NIP. {{ $sppd->employee->nip }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>
            a. Pangkat dan Golongan
            <br>
            b. Jabatan / Instansi
        </td>
        <td>
            a. {{ $sppd->employee->grade->golongan }}
            <br>
            b. {{ $sppd->employee->functional_position->nama_jabatan_fungsional }}
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td>Maksud Perjalanan Dinas</td>
        <td>{{ $sppd->tujuan_sppd }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Alat angkutan yang dipergunakan</td>
        <td>{{ $sppd->transportasi }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>
            a. Tempat berangkat
            <br>
            b. Tempat tujuan
        </td>
        <td>
            a. {{ $sppd->tempat_berangkat }}
            <br>
            b. {{ $sppd->tempat_tujuan }}
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
            a. {{ $sppd->durasi_sppd }} Hari
            <br>
            b. {{ $tanggal_berangkat }}
            <br>
            c. {{ $tanggal_kembali }}
        </td>
    </tr>
</table>

{{-- TANDA TANGAN --}}
<div class="signature">
    <p style="margin: 0px">Dikeluarkan di Banjarbaru</p>
    <p style="margin: 0px">Tanggal {{ $formattedDate }}</p>
    <p style="margin: 0px">Pejabat Pembuat Dokumen</p>
    <p style="margin-top: 0px; margin-bottom: 100px">Kantor Regional VIII BKN Banjarmasin</p>
    <p style="margin-bottom: 0px">{{ $sppd->pejabat_pembuat_komitmen }}</p>
    <p style="margin-top: 0px">
        NIP. {{ \App\Http\Controllers\SppdController::cari_nip_pejabat($sppd->pejabat_pembuat_komitmen) }}
    </p>
</div>
