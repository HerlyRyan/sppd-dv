@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Detail Kegiatan LPJ
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('lpj-header.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Biaya Kegiatan</th>
                            <th>Bukti LPJ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lpj_details as $item)
                            <tr>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ number_format($item->biaya_kegiatan, 0, ',', '.') }}</td>
                                <td><a href="{{ asset('storage/' . $item->bukti_lpj) }}" target="_blank"
                                        class="text-blue-600 underline">Lihat Bukti (PDF)</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
