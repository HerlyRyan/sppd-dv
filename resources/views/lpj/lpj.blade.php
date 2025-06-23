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

<x-kop-surat />

{{-- JUDUL --}}
<div style="text-align: center; margin-bottom: 50px">
    <h3>KANTOR REGIONAL VIII BADAN KEPEGAWAIAN NEGARA BANJARMASIN</h3>
    <p style="margin-bottom: 0px">DAFTAR PENGELUARAN RILL</p>
</div>

{{-- BODY --}}
<div style="margin-bottom: 50px">
    <p>Yang bertanda tangan di bawah:</p>

    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $lpj_header->sppd->employee->nama_pegawai }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $lpj_header->sppd->employee->nip }}</td>
        </tr>
        <tr>
            <td>JABATAN</td>
            <td>:</td>
            <td>{{ $lpj_header->sppd->employee->functional_position->nama_jabatan_fungsional }}</td>
        </tr>
    </table>

    <p style="text-align: justify">Berdasarkan Surat Perintah Perjalanan Dinas (SPD) Nomor:
        {{ $lpj_header->sppd->nomor_surat }} Tanggal
        {{ \App\Http\Controllers\SppdController::formatTanggalIndo($lpj_header->sppd->tanggal_surat) }} dengan ini kami
        menyatakan dengan sesungguhnya biaya pengeluaran rill meliputi:</p>

    <table>
        <tr>
            <th class="th">No</th>
            <th class="th">Uraian</th>
            <th class="th">Jumlah</th>
        </tr>

        @php
            $no = 1;
            $jumlah = 0;
        @endphp
        @foreach ($lpj_details as $item)
            @php
                $jumlah += $item->biaya_kegiatan;
            @endphp
            <tr>
                <td class="td">{{ $no++ }}</td>
                <td class="td">Rp. {{ $item->nama_kegiatan }}</td>
                <td class="td">Rp. {{ number_format($item->biaya_kegiatan, 0, ',', '.') }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold" class="td">Jumlah</td>
            <td style="font-weight: bold" class="td">Rp. {{ number_format($jumlah, 0, ',', '.') }}</td>
        </tr>

        <tr>
            <td class="td">Terbilang</td>
            <td style="font-weight: bold" class="td" colspan="2">
                {{ \App\Http\Controllers\SppdController::convert($jumlah) }}
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

{{-- TANDA TANGAN --}}
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
            Banjarbaru, {{ \Carbon\Carbon::parse($lpj_header->submission_date)->isoFormat('D MMMM YYYY') }}
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
            {{ $lpj_header->sppd->pejabat_pembuat_komitmen }}
            <br>
            NIP.
            {{ \App\Http\Controllers\SppdController::cari_nip_pejabat($lpj_header->sppd->pejabat_pembuat_komitmen) }}
        </td>
        <td></td>
        <td style="text-align:center;">
            {{ $lpj_header->sppd->employee->nama_pegawai }}
            <br>
            NIP. {{ $lpj_header->sppd->employee->nip }}
        </td>
    </tr>
</table>
