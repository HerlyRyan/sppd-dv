@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Laporan SKP</div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('laporan.skp.print') }}" target="_blank" class="btn btn-primary">Cetak</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Tabel Pegawai yang SUDAH mengumpulkan SKP --}}
            <h5 class="mb-3">Sudah Mengumpulkan SKP</h5>
            <div class="table-responsive mb-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sudahMengumpulkan as $pegawai)
                            <tr>
                                <td>{{ $pegawai->nama_pegawai }}</td>
                                <td>{{ $pegawai->unit_kerja->nama_unit_kerja ?? '-' }}</td>
                                <td>{{ $pegawai->position->nama_jabatan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $sudahMengumpulkan->appends(request()->except('page'))->links() }}
            </div>

            {{-- Tabel Pegawai yang BELUM mengumpulkan SKP --}}
            <h5 class="mb-3">Belum Mengumpulkan SKP</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($belumMengumpulkan as $pegawai)
                            <tr>
                                <td>{{ $pegawai->nama_pegawai }}</td>
                                <td>{{ $pegawai->unit_kerja->nama_unit_kerja ?? '-' }}</td>
                                <td>{{ $pegawai->position->nama_jabatan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Semua pegawai sudah mengumpulkan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $belumMengumpulkan->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
@endsection
