<x-print-layout title="Rekapitulasi SPPD per Bulan - {{ $tahun }}">
    <h3 class="text-center">Rekapitulasi SPPD per Bulan</h3>
    <p class="text-center">Tahun: <strong>{{ $tahun }}</strong></p>

    <table>
        <thead>
            <tr>
                <th style="width: 50%;">Bulan</th>
                <th>Total SPPD</th>
            </tr>
        </thead>
        <tbody>
            @php
                $nama_bulan = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $nama_bulan[$item->bulan] }}</td>
                    <td>{{ $item->total_sppd }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-print-layout>
