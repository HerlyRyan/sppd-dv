<x-print-layout title="Laporan Kehadiran Tahunan Pegawai">
    <h3 class="text-center">Laporan Kehadiran Tahunan Pegawai Tahun: {{ $tahun }}</h3>

    <table>
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Unit Kerja</th>
                <th>Jumlah SPPD</th>
                <th>Total Hari Hadir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->nama_pegawai }}</td>
                    <td>{{ $item->unit_kerja }}</td>
                    <td>{{ $item->jumlah_sppd }}</td>
                    <td>{{ $item->total_hari_hadir }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-print-layout>
