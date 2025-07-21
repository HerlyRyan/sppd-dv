<x-print-layout title="Laporan Perbandingan SKP Antar Pegawai">
    <h3 class="text-center">Laporan Perbandingan SKP Antar Pegawai</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Unit Kerja</th>
                <th>Jumlah SKP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->unit_kerja }}</td>
                    <td>{{ $item->total_skp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <p><strong>Catatan:</strong> Laporan ini menampilkan data perbandingan jumlah SKP antar pegawai.</p>
    </div>
</x-print-layout>
