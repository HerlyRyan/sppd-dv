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
    @php
        $formattedDate = $tanggal_surat->isoFormat('dddd, D MMMM YYYY');
    @endphp

    <x-kop-surat />

    {{-- JUDUL --}}
    <div style="text-align: center; margin-bottom: 10px">
        <h3>DAFTAR NOMINATIF</h5>
            <p>{{ $judul_surat }}</p>
            <small style="text-transform: uppercase">{{ $formattedDate }}</small>
    </div>

    {{-- BODY --}}
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

            @php
                $no = 1;
                $jumlah_honor = 0;
                $pph_21 = 0;
                $jumlah_diterima = 0;
            @endphp

            @foreach ($employees as $employee)
                @php
                    $jumlah_honor += $employee->grade->gaji_pokok;
                    $pph_21 +=
                        $employee->grade->gaji_pokok -
                        ($employee->grade->gaji_pokok - $employee->grade->pajak * ($employee->grade->gaji_pokok / 100));
                    $jumlah_diterima +=
                        $employee->grade->gaji_pokok - $employee->grade->pajak * ($employee->grade->gaji_pokok / 100);
                @endphp

                <tr style="text-transform: uppercase">
                    <td>{{ $no++ }}</td>
                    <td>
                        {{ $employee->nama_pegawai }}
                        <br>
                        {{ $employee->nip }}
                        <br>
                        {{ $employee->npwp }}
                    </td>
                    <td style="text-align: center">{{ $employee->grade->golongan }}</td>
                    <td style="text-align: center">{{ $employee->position->nama_jabatan }}</td>
                    <td style="text-align: right">{{ number_format($employee->grade->gaji_pokok, 0, ',', '.') }}</td>
                    <td style="text-align: right">
                        {{ number_format($employee->grade->gaji_pokok - ($employee->grade->gaji_pokok - $employee->grade->pajak * ($employee->grade->gaji_pokok / 100)), 0, ',', '.') }}
                    </td>
                    <td style="text-align: right">
                        {{ number_format($employee->grade->gaji_pokok - $employee->grade->pajak * ($employee->grade->gaji_pokok / 100), 0, ',', '.') }}
                    </td>
                    <td></td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td style="text-align: right;"><b>Jumlah>>>>>>></b></td>
                <td></td>
                <td></td>
                <td style="font-weight: bold; text-align: right">
                    {{ number_format($jumlah_honor, 0, ',', '.') }}
                </td>
                <td style="font-weight: bold; text-align: right">
                    {{ number_format($pph_21, 0, ',', '.') }}
                </td>
                <td style="font-weight: bold; text-align: right">
                    {{ number_format($jumlah_diterima, 0, ',', '.') }}
                </td>
                <td></td>
            </tr>
        </table>
    </div>

    {{-- Tanda Tangan --}}
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
                Banjarbaru, {{ $tanggal_surat->isoFormat('D MMMM YYYY') }}
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
                {{ $pejabat_pembuat_komitmen->nama_pegawai }}
                <br>
                NIP. {{ $pejabat_pembuat_komitmen->nip }}
            </td>
            <td></td>
            <td style="text-align:center;">
                {{ $bendahara->nama_pegawai }}
                <br>
                NIP. {{ $bendahara->nip }}
            </td>
        </tr>
    </table>
</body>
