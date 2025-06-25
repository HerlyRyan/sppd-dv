@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">            
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Data Laporan Sasaran Kinerja Pegawai (SKP)
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="{{ route('skp.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 5%;">No</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Penilai</th>
                                <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($skpReports->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Tidak ada data laporan SKP. Silakan tambahkan data baru.</td>
                                </tr>
                            @else
                                @foreach ($skpReports as $index => $skpReport)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $skpReport->pegawai->nama_pegawai ?? 'N/A' }}</td> {{-- Mengambil nama pegawai dari relasi --}}
                                        <td>{{ $skpReport->pegawai->nip ?? 'N/A' }}</td>    {{-- Mengambil NIP pegawai dari relasi --}}
                                        <td>{{ $skpReport->pegawai->position->nama_jabatan ?? 'N/A' }}</td> {{-- Mengambil jabatan pegawai dari relasi --}}
                                        <td>
                                            {{ \Carbon\Carbon::parse($skpReport->periode_mulai)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($skpReport->periode_selesai)->format('d/m/Y') }}
                                        </td>
                                        <td>{{ $skpReport->penilai->nama_pegawai ?? 'N/A' }}</td>     {{-- Mengambil nama penilai dari relasi --}}
                                        <td class="d-flex gap-1 justify-content-center" style="white-space: nowrap">
                                            <a href="{{ route('skp.show', $skpReport->id) }}" class="btn btn-sm btn-warning" target="_blank" title="Lihat Detail">
                                                <i class="bi bi-eye"></i> Lihat
                                            </a>
                                            {{-- Tambahkan ikon Bootstrap jika menggunakan Bootstrap Icons --}}
                                            <a href="{{ route('skp.print', $skpReport->id) }}" class="btn btn-sm btn-success" target="_blank">Cetak</a>
                                            <a href="{{ route('skp.edit', $skpReport->id) }}" class="btn btn-sm btn-info" title="Edit Data">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('skp.destroy', $skpReport->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data laporan SKP ini? Tindakan ini tidak dapat dibatalkan.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
            {{-- Bagian ini hanya diperlukan jika Anda menggunakan pagination di controller, saat ini $skpReports adalah koleksi biasa --}}
            {{-- <div class="card-footer">
                {{ $skpReports->links() }}
            </div> --}}
        </div>
    </div>
@endsection
