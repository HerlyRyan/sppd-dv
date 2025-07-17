@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Laporan Kehadiran Tahunan Pegawai</div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('laporan.kehadiran-tahunan.print', ['tahun' => request('tahun')]) }}" target="_blank"
                        class="btn btn-primary">Cetak</a>
                </div>
            </div>
            <form action="{{ route('laporan.kehadiran-tahunan.index') }}" method="GET"
                class="d-flex align-items-center gap-2">
                <div>Laporan Kehadiran Pegawai Tahun:</div>
                <input type="number" name="tahun" value="{{ $tahun }}" class="form-control" style="width: 100px;">
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                <a href="{{ route('laporan.kehadiran-tahunan.index') }}" class="btn btn-secondary btn-sm">Reset</a>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
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
            </div>
        </div>
    </div>
@endsection
