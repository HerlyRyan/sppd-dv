@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data LPJ
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('lpj-header.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>SPPD</th>
                            <th>Pegawai</th>
                            <th>Anggaran Biaya SPPD</th>
                            <th>Biaya rill</th>
                            <th>Bukti LPJ</th>
                            <th>Submission</th>
                            <th>Submission Date</th>
                            <th>Status Approval</th>
                            <th>Approval / Reject Date</th>
                            <th>Alasan Ditolak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($items->isEmpty())
                            <tr>
                                <td colspan="10" class="text-center">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->sppd->nomor_surat }}</td>
                                    <td>{{ $item->sppd->employee->nama_pegawai }}</td>
                                    <td>{{ number_format($item->sppd->biaya_sppd, 0, ',', '.') }}</td>
                                    <td>
                                        {{ number_format(\App\Http\Controllers\LpjHeaderController::cek_biaya_rill($item->id), 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if ($item->lpjDetail?->bukti_lpj)
                                            <a href="{{ asset('storage/' . $item->lpjDetail->bukti_lpj) }}" target="_blank"
                                                class="text-blue-600 underline">Lihat Bukti (PDF)</a>
                                        @else
                                            <span class="text-gray-500">Belum ada bukti</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->lpjDetail)
                                            @if ($item->submission_flag == 'Y')
                                                <span class="badge bg-success">submitted</span>
                                            @else
                                                <span class="badge bg-warning">not submitted</span>
                                            @endif
                                        @else
                                            Detail Belum Ada
                                        @endif
                                    </td>
                                    <td>{{ $item->submission_date }}</td>
                                    <td>
                                        @if ($item->approval_status == 'N')
                                            <span class="badge bg-warning">pending</span>
                                        @elseif ($item->approval_status == 'R')
                                            <span class="badge bg-danger">rejected</span>
                                        @elseif ($item->approval_status == 'Y')
                                            <span class="badge bg-success">approved</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $item->approval_status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->reject_reason ?? 'Tidak ada' }}
                                    </td>
                                    </td>
                                    <td>{{ $item->approval_date }}</td>
                                    <td style="white-space: nowrap" class="d-flex gap-1">
                                        @if ($item->submission_flag == 'N' && Auth::user()->role == 'pegawai_bkn')
                                            @if ($item->approval_status == 'R')
                                                <div>
                                                    <a href="{{ route('lpj-header.create-detail', $item) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Tambah Detail
                                                    </a>
                                                </div>
                                            @else
                                                @if ($item->lpjDetail)
                                                    <div>
                                                        <form action="{{ route('lpj-header.submit', $item) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endif
                                        @endif

                                        @if (
                                            $item->submission_flag == 'Y' &&
                                                Auth::user()->role == 'admin' &&
                                                ($item->approval_status == 'N' || $item->approval_status == 'R'))
                                            <div>
                                                <form action="{{ route('lpj-header.approve', $item) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                            </div>
                                        @endif

                                        @if (
                                            $item->submission_flag == 'Y' &&
                                                Auth::user()->role == 'admin' &&
                                                ($item->approval_status == 'N' || $item->approval_status == 'R'))
                                            <div>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#rejectModal{{ $item->id }}">
                                                    Reject
                                                </button>

                                                <!-- Reject Modal -->
                                                <div class="modal fade" id="rejectModal{{ $item->id }}" tabindex="-1"
                                                    aria-labelledby="rejectModalLabel{{ $item->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="rejectModalLabel{{ $item->id }}">
                                                                    Alasan Penolakan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('lpj-header.reject', $item) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="reject_reason" class="form-label">Alasan
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

                                        <div>
                                            <a href="{{ route('lpj-header.show-detail', $item) }}"
                                                class="btn btn-sm btn-warning">
                                                Lihat Detail
                                            </a>
                                        </div>
                                        @if ($item->submission_flag == 'Y' && $item->approval_status == 'Y')
                                            <div>
                                                <a href="{{ route('lpj-header.export', $item) }}"
                                                    class="btn btn-sm btn-success">
                                                    Download
                                                </a>
                                            </div>
                                        @endif
                                        @if (
                                            $item->submission_flag == 'N' &&
                                                ($item->approval_status == 'N' || $item->approval_status == 'R') &&
                                                Auth::user()->role == 'admin')
                                            <div>
                                                <form action="{{ route('lpj-header.destroy', $item) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer">
            {{ $items->links() }}
        </div>
    </div>
@endsection
