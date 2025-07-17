<x-print-layout title="Ringkasan Kinerja per Unit Kerja">
    <h3 class="text-center">Ringkasan Kinerja per Unit Kerja</h3>

    <table>
        <thead>
            <tr>
                <th>Unit Kerja</th>
                <th>Total SKP</th>
                <th>Disetujui</th>
                <th>Ditolak</th>
                <th>Menunggu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->unit_kerja }}</td>
                    <td>{{ $item->total_skp }}</td>
                    <td>{{ $item->skp_disetujui }}</td>
                    <td>{{ $item->skp_ditolak }}</td>
                    <td>{{ $item->skp_menunggu }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-print-layout>
