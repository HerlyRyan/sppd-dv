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
                            <th>Submission</th>
                            <th>Submission Date</th>
                            <th>Status Approval</th>
                            <th>Approval / Reject Date</th>
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
                                    <td>{{ $item->submission_flag }}</td>
                                    <td>{{ $item->submission_date }}</td>
                                    <td>{{ $item->approval_status }}</td>
                                    <td>{{ $item->approval_date }}</td>
                                    <td style="white-space: nowrap" class="d-flex gap-1">
                                        @if ($item->submission_flag == 'N' && Auth::user()->role == 'pegawai')
                                            <div>
                                                <form action="{{ route('lpj-header.submit', $item) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        @endif

                                        @if ($item->submission_flag == 'Y' && Auth::user()->role == 'admin' && $item->approval_status == 'N')
                                            <div>
                                                <form action="{{ route('lpj-header.approve', $item) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                            </div>
                                        @endif

                                        @if ($item->submission_flag == 'Y' && Auth::user()->role == 'admin' && $item->approval_status == 'N')
                                            <div>
                                                <form action="{{ route('lpj-header.reject', $item) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        @endif

                                        <div>
                                            <a href="{{ route('lpj-header.create-detail', $item) }}"
                                                class="btn btn-sm btn-warning">
                                                Lihat
                                            </a>
                                        </div>

                                        <div>
                                            <a href="{{ route('lpj-header.export', $item) }}"
                                                class="btn btn-sm btn-success">
                                                Download
                                            </a>
                                        </div>
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
