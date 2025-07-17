@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Ringkasan Kinerja per Unit Kerja</div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('laporan.ringkasan-kinerja.print') }}" target="_blank" class="btn btn-primary">Cetak</a>
                </div>
            </div>            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
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
            </div>
        </div>
    </div>
@endsection
