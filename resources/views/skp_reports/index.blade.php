@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Data Laporan Sasaran Kinerja Pegawai (SKP)
                    </div>
                    @php
                        $role = Auth::user()->role;
                    @endphp
                    @if ($role !== 'pimpinan_bkn')
                        <div class="col d-flex justify-content-end">
                            <a href="{{ route('skp.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    @endif
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
                                <th scope="col">Status</th>
                                <th scope="col">Alasan Ditolak</th>
                                <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($skpReports->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Tidak ada data laporan SKP.
                                        Silakan tambahkan data baru.</td>
                                </tr>
                            @else
                                @foreach ($skpReports as $index => $skpReport)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $skpReport->pegawai->nama_pegawai ?? 'N/A' }}</td>
                                        <td>{{ $skpReport->pegawai->nip ?? 'N/A' }}</td>
                                        <td>{{ $skpReport->pegawai->position->nama_jabatan ?? 'N/A' }}</td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($skpReport->periode_mulai)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($skpReport->periode_selesai)->format('d/m/Y') }}
                                        </td>
                                        <td>{{ $skpReport->penilai->nama_pegawai ?? 'N/A' }}</td>
                                        <td>
                                            @switch($skpReport->status)
                                                @case('pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @break

                                                @case('rejected')
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @break

                                                @case('approved_stage_1')
                                                    <span class="badge bg-info">Disetujui Tahap 1</span>
                                                @break

                                                @case('approved')
                                                    <span class="badge bg-success">Disetujui</span>
                                                @break

                                                @default
                                                    <span class="badge bg-secondary">{{ $skpReport->status }}</span>
                                            @endswitch
                                        </td>
                                        <td>{{ $skpReport->reject_reason ?? 'Tidak ada' }}</td>
                                        </td>
                                        <td class="d-flex gap-1 justify-content-center" style="white-space: nowrap">

                                            @if ($role === 'pimpinan_unit_kerja')
                                                @if ($skpReport->status === 'pending' || $skpReport->status === 'rejected')
                                                    <div>
                                                        <form action="{{ route('skp.approved_stage_one', $skpReport) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">Approve</button>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#rejectModal{{ $skpReport->id }}">
                                                            Reject
                                                        </button>

                                                        <!-- Reject Modal -->
                                                        <div class="modal fade" id="rejectModal{{ $skpReport->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="rejectModalLabel{{ $skpReport->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="rejectModalLabel{{ $skpReport->id }}">
                                                                            Alasan Penolakan</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="{{ route('skp.rejected', $skpReport) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="reject_reason"
                                                                                    class="form-label">Alasan
                                                                                    Penolakan</label>
                                                                                <textarea class="form-control" id="reject_reason" name="reject_reason" rows="3" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Tolak</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif

                                            @if ($role === 'pimpinan_bkn')
                                                @if ($skpReport->status === 'approved_stage_1')
                                                    <div>
                                                        <form action="{{ route('skp.approved_final', $skpReport) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">Approve</button>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#rejectModal{{ $skpReport->id }}">
                                                            Reject
                                                        </button>

                                                        <!-- Reject Modal -->
                                                        <div class="modal fade" id="rejectModal{{ $skpReport->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="rejectModalLabel{{ $skpReport->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="rejectModalLabel{{ $skpReport->id }}">
                                                                            Alasan Penolakan</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="{{ route('skp.rejected', $skpReport) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="reject_reason"
                                                                                    class="form-label">Alasan
                                                                                    Penolakan</label>
                                                                                <textarea class="form-control" id="reject_reason" name="reject_reason" rows="3" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Tolak</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                            <a href="{{ route('skp.show', $skpReport->id) }}"
                                                class="btn btn-sm btn-warning" target="_blank" title="Lihat Detail">
                                                <i class="bi bi-eye"></i> Lihat
                                            </a>
                                            @if ($skpReport->status == 'approved')
                                                <a href="{{ route('skp.print', $skpReport->id) }}"
                                                    class="btn btn-sm btn-success" target="_blank">Cetak</a>
                                            @endif
                                            @if ($skpReport->status != 'approved' && $skpReport->status != 'approved_stage_1')
                                                <a href="{{ route('skp.edit', $skpReport->id) }}"
                                                    class="btn btn-sm btn-info" title="Edit Data">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('skp.destroy', $skpReport->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data laporan SKP ini? Tindakan ini tidak dapat dibatalkan.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        title="Hapus Data">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif
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
