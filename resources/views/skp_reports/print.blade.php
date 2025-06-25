<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SKP - {{ $skpReport->pegawai->nama_pegawai ?? 'N/A' }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            /* Sesuaikan ukuran font agar mirip PDF */
            margin: 25px;
            /* Margin halaman */
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        ol,
        ul,
        table {
            margin: 0;
            padding: 0;
            line-height: 1.2;
            /* Mengurangi spasi baris */
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .mt-1 {
            margin-top: 5px;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .mt-3 {
            margin-top: 15px;
        }

        .mt-4 {
            margin-top: 20px;
        }

        .mt-5 {
            margin-top: 25px;
        }

        .mb-1 {
            margin-bottom: 5px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .mb-4 {
            margin-bottom: 20px;
        }

        .mb-5 {
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px 8px;
            /* Padding lebih kecil */
            vertical-align: top;
            text-align: left;
            /* Default text align */
        }

        th {
            background-color: #f2f2f2;
            /* Sedikit latar belakang untuk header tabel */
            text-align: center;
            font-weight: bold;
        }

        .no-border td,
        .no-border th {
            border: none;
            padding: 2px 0;
            /* Padding lebih kecil untuk tabel info */
        }

        ol {
            padding-left: 20px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        ol li {
            margin-bottom: 3px;
        }

        .indent {
            margin-left: 20px;
            /* Indentasi untuk bagian tertentu */
        }

        .signature-area {
            height: 60px;
            /* Ruang untuk tanda tangan */
            margin-top: 40px;
            /* Jarak antara nama dan NIP */
        }

        .table-header {
            display: flex;
            justify-content: space-between
        }

        .skp-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .skp-table th,
        .skp-table td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        .skp-table thead th {
            background-color: #d9e1f2;
            /* Biru muda seperti di gambar */
            text-align: center;
            font-weight: bold;
        }

        .skp-table .no-col {
            width: 40px;
            text-align: center;
        }

        .skp-table .title-col {
            width: 200px;
            white-space: nowrap;
        }

        .skp-table .value-col {
            text-transform: uppercase;
        }

        .table-hasil-kerja {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .table-hasil-kerja th,
        .table-hasil-kerja td {
            border: 1px solid black;
            padding: 6px;
            vertical-align: top;
        }

        .table-hasil-kerja thead th {
            background-color: #d9e1f2;
            text-align: center;
            font-weight: bold;
        }

        .table-subheader {
            background-color: #d9e1f2;
            font-weight: bold;
            text-align: left;
        }

        @media print {
            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }

        .lampiran-title {
            font-size: 11pt;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="text-center mb-3">
        <p>SASARAN KINERJA PEGAWAI</p>
        <p>PENDEKATAN HASIL KERJA KUANTITATIF</p>
        <p>BAGI PEJABAT ADMINISTRASI DAN PEJABAT FUNGSIONAL</p>
    </div>
    <div class="table-header">
        <p>PEMERINTAH KOTA BANJARBARU</p>
        <p class="mt-1">PERIODE PENILAIAN:
            {{ \Carbon\Carbon::parse($skpReport->periode_mulai)->isoFormat('D MMMM Y') }} s.d.
            {{ \Carbon\Carbon::parse($skpReport->periode_selesai)->isoFormat('D MMMM Y') }}</p>
    </div>
    <table class="no-border">
        <tr>
            <td style="width: 50%;">
                <table class="skp-table">
                    <thead>
                        <tr>
                            <th class="no-col">NO</th>
                            <th colspan="2">PEGAWAI YANG DINILAI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no-col">1</td>
                            <td class="title-col">NAMA</td>
                            <td class="value-col">{{ $skpReport->pegawai->nama_pegawai ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="no-col">2</td>
                            <td class="title-col">NIP</td>
                            <td class="value-col">{{ $skpReport->pegawai->nip ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="no-col">3</td>
                            <td class="title-col">PANGKAT/ GOL. RUANG</td>
                            <td class="value-col">{{ $skpReport->pegawai->grade->golongan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="no-col">4</td>
                            <td class="title-col">JABATAN</td>
                            <td class="value-col">{{ $skpReport->pegawai->position->nama_jabatan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="no-col">5</td>
                            <td class="title-col">UNIT KERJA</td>
                            <td class="value-col">{{ $skpReport->pegawai->agency->instansi ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="width: 50%;">
                <table class="skp-table">
                    <thead>
                        <tr>
                            <th class="no-col">NO</th>
                            <th colspan="2">PEGAWAI YANG DINILAI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no-col">1</td>
                            <td class="title-col">NAMA</td>
                            <td class="value-col">{{ $skpReport->penilai->nama_pegawai ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="no-col">2</td>
                            <td class="title-col">NIP</td>
                            <td class="value-col">{{ $skpReport->penilai->nip ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="no-col">3</td>
                            <td class="title-col">PANGKAT/ GOL. RUANG</td>
                            <td class="value-col">{{ $skpReport->penilai->grade->golongan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="no-col">4</td>
                            <td class="title-col">JABATAN</td>
                            <td class="value-col">{{ $skpReport->penilai->position->nama_jabatan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="no-col">5</td>
                            <td class="title-col">UNIT KERJA</td>
                            <td class="value-col">{{ $skpReport->penilai->agency->instansi ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <table class="table-hasil-kerja">
        <thead>
            <tr>
                <td colspan="6" class="table-subheader">HASIL KERJA</td>
            </tr>
            <tr>
                <th rowspan="2">NO<br>(1)</th>
                <th rowspan="2">RENCANA HASIL KERJA PIMPINAN YANG DIINTERVENSI<br>(2)</th>
                <th rowspan="2">RENCANA HASIL KERJA<br>(3)</th>
                <th colspan="3">INDIKATOR KINERJA INDIVIDU</th>
            </tr>
            <tr>
                <th>ASPEK<br>(4)</th>
                <th>INDIKATOR KINERJA INDIVIDU<br>(5)</th>
                <th>TARGET<br>(6)</th>
            </tr>
        </thead>
        <tbody>
            {{-- UTAMA --}}
            <tr>
                <td colspan="6" class="table-subheader">UTAMA</td>
            </tr>
            @php $utama = $skpReport->workResults->where('type', 'utama'); @endphp
            @forelse($utama as $index => $result)
                @php $first = true; @endphp
                @foreach ($result->performanceIndicators as $pi)
                    <tr>
                        @if ($first)
                            <td rowspan="{{ count($result->performanceIndicators) }}">{{ $loop->iteration }}</td>
                            <td rowspan="{{ count($result->performanceIndicators) }}">
                                {{ $result->rencana_hasil_kerja_pimpinan }}</td>
                            <td rowspan="{{ count($result->performanceIndicators) }}">
                                {{ $result->rencana_hasil_kerja }}</td>
                            @php $first = false; @endphp
                        @endif
                        <td>{{ $pi->aspek }}</td>
                        <td>{{ $pi->indikator_kinerja_individu }}</td>
                        <td>{{ $pi->target }}</td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="6" class="text-muted text-center">Tidak ada hasil kerja utama.</td>
                </tr>
            @endforelse

            {{-- TAMBAHAN --}}
            <tr>
                <td colspan="6" class="table-subheader">TAMBAHAN</td>
            </tr>
            @php $tambahan = $skpReport->workResults->where('type', 'tambahan'); @endphp
            @forelse($tambahan as $index => $result)
                @php $first = true; @endphp
                @foreach ($result->performanceIndicators as $pi)
                    <tr>
                        @if ($first)
                            <td rowspan="{{ count($result->performanceIndicators) }}">{{ $loop->iteration }}</td>
                            <td rowspan="{{ count($result->performanceIndicators) }}">
                                {{ $result->rencana_hasil_kerja_pimpinan }}</td>
                            <td rowspan="{{ count($result->performanceIndicators) }}">
                                {{ $result->rencana_hasil_kerja }}</td>
                            @php $first = false; @endphp
                        @endif
                        <td>{{ $pi->aspek }}</td>
                        <td>{{ $pi->indikator_kinerja_individu }}</td>
                        <td>{{ $pi->target }}</td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="6" class="text-muted text-center">Tidak ada hasil kerja tambahan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <table class="table-hasil-kerja">
        <thead>
            <tr>
                <td colspan="6" class="table-subheader">PERILAKU KERJA</td>
            </tr>
            <tr>
                <th style="width: 5%;">NO</th>
                <th style="width: 25%;">PERILAKU KERJA</th>
                <th style="width: 50%;">DESKRIPSI</th>
                <th style="width: 20%;">EKSPEKTASI KHUSUS PIMPINAN</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skpReport->workBehaviors as $index => $behavior)
                <tr>
                    <td class="text-center align-top">{{ $index + 1 }}</td>
                    <td class="align-top"><strong>{{ $behavior->perilaku_kerja }}</strong></td>
                    <td class="align-top">
                        {!! nl2br(e($behavior->deskripsi_perilaku)) !!}
                    </td>
                    <td class="align-top">
                        Ekspektasi Khusus Pimpinan: {{ $behavior->ekspektasi_pimpinan ?? 'Sesuai Ekspektasi' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-muted text-center">Tidak ada data perilaku kerja.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <table style="width: 100%; border: none; margin-top: 40px;" class="no-border">
        <tr>
            <td style="width: 50%; text-align: center;">
                Pegawai yang Dinilai
            </td>
            <td style="width: 50%; text-align: center;">
                Banjarbaru, {{ \Carbon\Carbon::parse($skpReport->tanggal_penilaian)->isoFormat('D MMMM Y') }}<br>
                Pejabat Penilai Kinerja
            </td>
        </tr>
        <tr>
            <td style="height: 70px;"></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center; font-weight: bold;">
                {{ strtoupper($skpReport->pegawai->nama_pegawai ?? '-') }}
            </td>
            <td style="text-align: center; font-weight: bold;">
                {{ strtoupper($skpReport->penilai->nama_pegawai ?? '-') }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                NIP. {{ $skpReport->pegawai->nip ?? '-' }}
            </td>
            <td style="text-align: center;">
                NIP. {{ $skpReport->penilai->nip ?? '-' }}
            </td>
        </tr>
    </table>

    <!-- Lampiran Section -->
    <div class="lampiran-title text-center">LAMPIRAN SASARAN KINERJA PEGAWAI</div>

    <table style="width: 100%; border-collapse: collapse; font-size: 10pt; margin-top: 10px;">
        <tr>
            <td colspan="2" style="font-weight: bold; background-color: #d9e1f2; border: 1px solid #000;">
                PEMERINTAH KOTA BANJARBARU
            </td>
            <td colspan="3"
                style="font-weight: bold; background-color: #d9e1f2; border: 1px solid #000; text-align: right;">
                PERIODE PENILAIAN: {{ \Carbon\Carbon::parse($skpReport->periode_mulai)->isoFormat('D MMMM Y') }} SD
                {{ \Carbon\Carbon::parse($skpReport->periode_selesai)->isoFormat('D MMMM Y') }}
            </td>
        </tr>

        {{-- DUKUNGAN SUMBER DAYA --}}
        <tr>
            <td colspan="5" style="font-weight: bold; background-color: #d9e1f2; border: 1px solid #000;">
                DUKUNGAN SUMBER DAYA
            </td>
        </tr>
        @forelse($skpReport->supportingResources as $i => $item)
            <tr>
                <td style="width: 30px; border: 1px solid #000;">{{ $i + 1 }}.</td>
                <td colspan="4" style="border: 1px solid #000;">{{ $item->resource_name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center; border: 1px solid #000; font-style: italic;">Tidak ada
                    dukungan sumber daya.</td>
            </tr>
        @endforelse

        {{-- PERTANGGUNGJAWABAN --}}
        <tr>
            <td colspan="5" style="font-weight: bold; background-color: #d9e1f2; border: 1px solid #000;">
                SKEMA PERTANGGUNGJAWABAN
            </td>
        </tr>
        @forelse($skpReport->accountabilities as $i => $item)
            <tr>
                <td style="width: 30px; border: 1px solid #000;">{{ $i + 1 }}.</td>
                <td colspan="4" style="border: 1px solid #000;">{{ $item->description }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center; border: 1px solid #000; font-style: italic;">Tidak ada
                    skema pertanggungjawaban.</td>
            </tr>
        @endforelse

        {{-- KONSEKUENSI --}}
        <tr>
            <td colspan="5" style="font-weight: bold; background-color: #d9e1f2; border: 1px solid #000;">
                KONSEKUENSI
            </td>
        </tr>
        @forelse($skpReport->consequences as $i => $item)
            <tr>
                <td style="width: 30px; border: 1px solid #000;">{{ $i + 1 }}.</td>
                <td colspan="4" style="border: 1px solid #000;">{{ $item->description }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center; border: 1px solid #000; font-style: italic;">Tidak ada
                    konsekuensi tercatat.</td>
            </tr>
        @endforelse
    </table>


    <table style="width: 100%; border: none; margin-top: 40px;" class="no-border">
        <tr>
            <td style="width: 50%; text-align: center;">
                Pegawai yang Dinilai
            </td>
            <td style="width: 50%; text-align: center;">
                Banjarbaru, {{ \Carbon\Carbon::parse($skpReport->tanggal_penilaian)->isoFormat('D MMMM Y') }}<br>
                Pejabat Penilai Kinerja
            </td>
        </tr>
        <tr>
            <td style="height: 70px;"></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center; font-weight: bold;">
                {{ strtoupper($skpReport->pegawai->nama_pegawai ?? '-') }}
            </td>
            <td style="text-align: center; font-weight: bold;">
                {{ strtoupper($skpReport->penilai->nama_pegawai ?? '-') }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                NIP. {{ $skpReport->pegawai->nip ?? '-' }}
            </td>
            <td style="text-align: center;">
                NIP. {{ $skpReport->penilai->nip ?? '-' }}
            </td>
        </tr>
    </table>

</body>

</html>
