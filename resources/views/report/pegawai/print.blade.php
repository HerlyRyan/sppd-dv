<x-print-layout title="Laporan Data Pegawai">
    <h3 class="text-center">Laporan Data Pegawai</h3>

    <table>
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Jabatan Fungsional</th>
                <th>Golongan</th>
                <th>Gaji Pokok (Rp)</th>
                <th>Pajak</th>
                <th>Gaji Setelah Pajak (Rp)</th>
                <th>Lamanya (Tahun)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $index => $item)
                <tr>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama_pegawai }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->position->nama_jabatan }}</td>
                    <td>{{ $item->functional_position->nama_jabatan_fungsional }}</td>
                    <td>{{ $item->grade->golongan }}</td>
                    <td>{{ number_format($item->grade->gaji_pokok, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->grade->pajak, 0, ',', '.') }}%</td>
                    <td>{{ number_format($item->grade->gaji_pokok - $item->grade->pajak * ($item->grade->gaji_pokok / 100), 0, ',', '.') }}
                    </td>
                    <td>{{ $item->grade->lama }} tahun</td>
                    <td><span
                            class="badge {{ $item->status == 'aktif' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $item->status }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-print-layout>
