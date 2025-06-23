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
    @php
        $formattedDate = $tanggal_surat->isoFormat('dddd, D MMMM YYYY');
    @endphp

    <x-kop-surat />

    {{-- JUDUL --}}
    <div style="text-align: center">
        <h5>DAFTAR HADIR</h5>
        <h5>{{ $judul_surat }}</h5>
        <h5 style="text-transform: uppercase">{{ $formattedDate }}</h5>
    </div>

    {{-- BODY --}}
    <div>
        <table>
            <tr>
                <th style="text-align: center">NO</th>
                <th style="text-align: center">NAMA</th>
                <th style="text-align: center">JABATAN</th>
                <th style="text-align: center">INSTANSI</th>
                <th style="text-align: center">TANDA TANGAN</th>
            </tr>

            @php
                $no = 1;
            @endphp

            @foreach ($employees as $employee)
                <tr style="text-transform: uppercase">
                    <td>{{ $no++ }}</td>
                    <td>{{ $employee->nama_pegawai }}</td>
                    <td style="text-align: center">{{ $employee->position->nama_jabatan }}</td>
                    <td style="text-align: center">{{ $employee->agency->instansi }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>

    {{-- Tanda Tangan --}}
    <table class="tanda-tangan-table">
        <tr>
            <td style="width: 50%"></td>
            <td style="width: 50%">
                <p style="margin: 0">Banjarbaru, {{ $tanggal_surat->isoFormat('D MMMM YYYY') }}</p>
                <p style="margin: 0">Ketua Tim Pelaksana</p>
                <div style="margin-top: 50px"></div>
                <p style="margin: 0">{{ $ketua_tim_pelaksana->nama_pegawai }}</p>
                <p style="margin: 0">NIP. {{ $ketua_tim_pelaksana->nip }}</p>
            </td>
        </tr>
    </table>
</body>
